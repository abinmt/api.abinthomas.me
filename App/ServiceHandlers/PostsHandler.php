<?php
use \Psr\Http\Message\ServerRequestInterface as IRequest;
use \Psr\Http\Message\ResponseInterface as IResponse;

$getAllPosts = function(IRequest $objRequest, IResponse $objResponse, array $arrmixArgs): IResponse {
  global $_objContainer;

  $result = $_objContainer['posts']->find();

  /*
  foreach ($result as $entry) {
      echo $entry['_id'], ' ff:ff ', $entry['name'], "\n";
  }
  */

  $objResponse->getBody()->write("Hello Dude1");

  return $objResponse;
};