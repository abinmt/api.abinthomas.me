-- Database: abinthomas.me

CREATE DATABASE "abinthomas.me"
    WITH 
    OWNER = dba
    ENCODING = 'UTF8'
    LC_COLLATE = 'en_US.utf8'
    LC_CTYPE = 'en_US.utf8'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1;

-- Table: public.users

CREATE TABLE public.users
(
    id integer NOT NULL DEFAULT nextval('users_id_seq'::regclass),
    login_name character varying(255) COLLATE pg_catalog."default" NOT NULL,
    pass character varying(255) COLLATE pg_catalog."default" NOT NULL,
    email character varying(255) COLLATE pg_catalog."default" NOT NULL,
    display_name character varying(255) COLLATE pg_catalog."default",
    activation_key character varying(255) COLLATE pg_catalog."default",
    meta_data jsonb,
    is_admin boolean NOT NULL DEFAULT false,
    deleted_by integer,
    deleted_on timestamp with time zone,
    updated_by integer,
    updated_on timestamp with time zone,
    created_by integer,
    created_on timestamp with time zone,
    CONSTRAINT users_pkey PRIMARY KEY (id)
)

TABLESPACE pg_default;

ALTER TABLE public.users
    OWNER to dba;

COMMENT ON COLUMN public.users.id
    IS 'Primary Key';

COMMENT ON COLUMN public.users.login_name
    IS 'Unique username for the user';

COMMENT ON COLUMN public.users.pass
    IS 'Hash of the user’s password';

COMMENT ON COLUMN public.users.email
    IS 'Email address of the user';

COMMENT ON COLUMN public.users.display_name
    IS 'Desired name to be used publicly in the site, can be user_login, user_nicename, first name or last name ';

COMMENT ON COLUMN public.users.activation_key
    IS 'Used for resetting passwords';

COMMENT ON COLUMN public.users.meta_data
    IS 'Key:Value fieild to stor any further information related to the users';

COMMENT ON COLUMN public.users.is_admin
    IS 'Flag to decide whether user is admin or not. Default is false(Non Admin)';

COMMENT ON COLUMN public.users.deleted_by
    IS 'The user who soft deleted this record';

COMMENT ON COLUMN public.users.deleted_on
    IS 'The date and time when this record was soft deleted';

COMMENT ON COLUMN public.users.updated_by
    IS 'The user who updated this record most recently';

COMMENT ON COLUMN public.users.updated_on
    IS 'The last date and time this record was updated';

COMMENT ON COLUMN public.users.created_by
    IS 'The user who inserted this record';

COMMENT ON COLUMN public.users.created_on
    IS 'The time and date when this record was inserted';

-- Table: public.posts

CREATE TABLE public.posts
(
    id integer NOT NULL DEFAULT nextval('posts_id_seq'::regclass),
    user_id integer NOT NULL,
    title character varying COLLATE pg_catalog."default" NOT NULL,
    content text COLLATE pg_catalog."default" NOT NULL,
    is_published boolean NOT NULL DEFAULT false,
    deleted_by integer,
    deleted_on timestamp with time zone,
    updated_by integer NOT NULL,
    updated_on timestamp with time zone NOT NULL,
    created_by integer NOT NULL,
    created_on timestamp with time zone NOT NULL,
    meta_data jsonb,
    CONSTRAINT posts_pkey PRIMARY KEY (id),
    CONSTRAINT created_by_fkey FOREIGN KEY (created_by)
        REFERENCES public.users (id) MATCH SIMPLE
        ON UPDATE RESTRICT
        ON DELETE RESTRICT
        NOT VALID,
    CONSTRAINT deleted_by_fkey FOREIGN KEY (deleted_by)
        REFERENCES public.users (id) MATCH SIMPLE
        ON UPDATE RESTRICT
        ON DELETE RESTRICT
        NOT VALID,
    CONSTRAINT updated_by_fkey FOREIGN KEY (updated_by)
        REFERENCES public.users (id) MATCH SIMPLE
        ON UPDATE RESTRICT
        ON DELETE RESTRICT
        NOT VALID,
    CONSTRAINT user_id_fkey FOREIGN KEY (user_id)
        REFERENCES public.users (id) MATCH SIMPLE
        ON UPDATE RESTRICT
        ON DELETE RESTRICT
        NOT VALID
)

TABLESPACE pg_default;

ALTER TABLE public.posts
    OWNER to dba;

-- Table: public.comments

CREATE TABLE public.comments
(
    post_id integer NOT NULL,
    author character varying(50) COLLATE pg_catalog."default" NOT NULL,
    author_email character varying(50) COLLATE pg_catalog."default" NOT NULL,
    author_ip character varying(50) COLLATE pg_catalog."default",
    parent_id integer,
    content text COLLATE pg_catalog."default" NOT NULL,
    created_by integer,
    created_on timestamp with time zone NOT NULL,
    meta_data jsonb,
    id integer NOT NULL DEFAULT nextval('comments_id_seq'::regclass),
    CONSTRAINT comments_pkey PRIMARY KEY (id),
    CONSTRAINT created_by_fkey FOREIGN KEY (created_by)
        REFERENCES public.users (id) MATCH SIMPLE
        ON UPDATE RESTRICT
        ON DELETE RESTRICT
        NOT VALID,
    CONSTRAINT post_id_fkey FOREIGN KEY (post_id)
        REFERENCES public.posts (id) MATCH SIMPLE
        ON UPDATE RESTRICT
        ON DELETE RESTRICT
        NOT VALID
)

TABLESPACE pg_default;

ALTER TABLE public.comments
    OWNER to dba;
COMMENT ON TABLE public.comments
    IS 'Comments table';

-- Table: public.tags

CREATE TABLE public.tags
(
    id integer NOT NULL DEFAULT nextval('tags_id_seq'::regclass),
    name character varying(50) COLLATE pg_catalog."default" NOT NULL,
    deleted_by integer,
    deleted_on timestamp with time zone,
    updated_by integer,
    updated_on timestamp with time zone,
    created_by integer NOT NULL,
    created_on timestamp with time zone,
    meta_data jsonb,
    CONSTRAINT tags_pkey PRIMARY KEY (id),
    CONSTRAINT created_by_fkey FOREIGN KEY (created_by)
        REFERENCES public.users (id) MATCH SIMPLE
        ON UPDATE RESTRICT
        ON DELETE RESTRICT,
    CONSTRAINT deleted_by_fkey FOREIGN KEY (deleted_by)
        REFERENCES public.users (id) MATCH SIMPLE
        ON UPDATE RESTRICT
        ON DELETE RESTRICT,
    CONSTRAINT updated_by_fkey FOREIGN KEY (updated_by)
        REFERENCES public.users (id) MATCH SIMPLE
        ON UPDATE RESTRICT
        ON DELETE RESTRICT
)

TABLESPACE pg_default;

ALTER TABLE public.tags
    OWNER to dba;

-- Table: public.posts_tags

CREATE TABLE public.posts_tags
(
    id integer NOT NULL DEFAULT nextval('posts_tags_id_seq'::regclass),
    post_id integer NOT NULL,
    tag_id integer NOT NULL,
    CONSTRAINT posts_tags_pkey PRIMARY KEY (id),
    CONSTRAINT post_id_fkey FOREIGN KEY (post_id)
        REFERENCES public.posts (id) MATCH SIMPLE
        ON UPDATE RESTRICT
        ON DELETE RESTRICT,
    CONSTRAINT tag_id_fkey FOREIGN KEY (tag_id)
        REFERENCES public.tags (id) MATCH SIMPLE
        ON UPDATE RESTRICT
        ON DELETE RESTRICT
)

TABLESPACE pg_default;

ALTER TABLE public.posts_tags
    OWNER to dba;