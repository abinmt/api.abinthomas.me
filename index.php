<?php
/*
require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->blog_abinthomas_me->posts;

$result = $collection->find();


foreach ($result as $entry) {
    echo $entry['_id'], ': ', $entry['name'], "\n";
}

exit();
*/

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
*/

/*
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;

require 'App/Routes/Router.php';

$app->run();

*/

require 'Paths.defines.php';
require 'vendor/autoload.php';

$objEnvironment = new \Dotenv\Dotenv(PATH_DOCUMENT_ROOT);
$objEnvironment->load();

require PATH_PHP_BOOTSTRAP . 'Config.php';
$arrmixConfiguration = getConfiguration();

$objApp = new \Slim\App($arrmixConfiguration);

require PATH_PHP_BOOTSTRAP . 'Dependency.php';
require PATH_PHP_ROUTES . 'Routes.php';

$objApp->run();