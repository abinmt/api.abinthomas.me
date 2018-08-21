<?php
namespace Application\ServiceHandlers\PostsHandler;

use \App\ServiceHandlers\CAbstractController;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class CPostsHandler {
  public function getAllPosts( Request $objRequest, Response $objResponse, array $arrmixArgs ): Response {
    
    echo "Hello"; exit();
    
    $result = $objContainer['posts']->find();


    foreach ($result as $entry) {
        echo $entry['_id'], ': ', $entry['name'], "\n";
    }

    exit();
  }
}