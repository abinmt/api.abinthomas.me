<?php
$fnAuth = function ($IRequest, $IResponse, $next) {
    //$IRequest->getBody()->write('BEFORE');
    $IRequest = $next($IRequest, $IResponse);
   // $IRequest->getBody()->write('AFTER');

    return $IResponse;
};

$objApp->add($fnAuth);