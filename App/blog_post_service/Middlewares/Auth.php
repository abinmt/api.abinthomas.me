<?php
use \Psr\Http\Message\ServerRequestInterface as IRequest;
use \Psr\Http\Message\ResponseInterface as IResponse;

$fnAuth = function (IRequest $objRequest, IResponse $objResponse, $fnNext) {
    //$response->getBody()->write('BEFORE');
    $objResponse = $fnNext($objRequest, $objResponse);
    //$response->getBody()->write('AFTER');

    return $objResponse;
};

$objApp->add($fnAuth);