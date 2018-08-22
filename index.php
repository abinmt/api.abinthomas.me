<?php
require 'Paths.defines.php';
require 'vendor/autoload.php';

$objEnvironment = new \Dotenv\Dotenv(PATH_DOCUMENT_ROOT);
$objEnvironment->load();

require PATH_PHP_BOOTSTRAP . 'Config.php';
$arrmixConfiguration = getConfiguration();

$objApp = new \Slim\App($arrmixConfiguration);

require PATH_PHP_BOOTSTRAP . 'Dependency.php';
//require PATH_PHP_MIDDLEWARES . 'Auth.php';
require PATH_PHP_ROUTES . 'Routes.php';

$objApp->run();