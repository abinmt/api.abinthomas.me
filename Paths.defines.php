<?php
if( false === defined('PATH_DOCUMENT_ROOT')) {
	define('PATH_DOCUMENT_ROOT', str_replace('\\', '/', __DIR__ . '/'));
	define('PATH_PHP_APPLICATION', PATH_DOCUMENT_ROOT . 'App/');
	define('PATH_PHP_ROUTES', PATH_PHP_APPLICATION . 'Routes/');
	define('PATH_PHP_BOOTSTRAP', PATH_PHP_APPLICATION . 'Bootstrap/');
	define('PATH_PHP_LIBRARY', PATH_PHP_APPLICATION . 'Library/');
	define('PATH_PHP_TESTS', PATH_PHP_APPLICATION . 'Tests/');
	define('PATH_PHP_SERVICE_HANDLERS', PATH_PHP_APPLICATION . 'ServiceHandlers/');
}