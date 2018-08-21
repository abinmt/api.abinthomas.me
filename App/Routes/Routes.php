<?php
//$objApp->add( Application\Middlewares\App\CRequestValidatorMiddleware::class );

/*
$objApp->group( '/admin', function() {
	$this->get( '/task/{id}', Application\Controllers\Admin\CTaskController::class . ':getTask' );
	$this->post( '/task', Application\Controllers\Admin\CTaskController::class . ':createTask' );
	$this->put( '/task/{id}', Application\Controllers\Admin\CTaskController::class . ':updateTask' );
	$this->delete( '/task/{id}', Application\Controllers\Admin\CTaskController::class . ':deleteTask' );
} )->add( Application\Middlewares\Route\Admin\CAuthMiddleware::class );
*/

use \App\ServiceHandlers\CAbstractController;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$objApp->get('/getAllPosts', function (Request $request, Response $response, array $args) {
    
    $response->getBody()->write("Hello");

    return $response;
});