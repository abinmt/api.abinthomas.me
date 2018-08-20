<?php
require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->blog_abinthomas_me->posts;

$result = $collection->find()->sort(['created_on']);


foreach ($result as $entry) {
    echo $entry['_id'], ': ', $entry['name'], "\n";
}

exit();

/*
https://docs.mongodb.com/php-library/current/tutorial/
_id

name

status

created_on

updated_on

contents

tags

comments


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;
$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {

    $connection = new MongoClient();
    $db = $connection->blog_abinthomas_me;

    $posts = $db->posts;

     // all records
    $result = $posts->find();

    $name = $args['name'];
    $response->getBody()->write("Hello, $result");

    return $response;
});

$app->run();
*/