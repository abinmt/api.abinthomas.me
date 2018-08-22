<?php
use \Psr\Http\Message\ServerRequestInterface as IRequest;
use \Psr\Http\Message\ResponseInterface as IResponse;

$fnGetAllPosts = function(IRequest $objRequest, IResponse $objResponse, array $arrmixArgs): IResponse {
  $arrobjResultsIterator = $this->posts->find();

  $arrmixRecords = [];

  foreach ($arrobjResultsIterator as $intIndex => $arrmixData) {
     $arrmixRecords[$intIndex]['name'] = $arrmixData['name'];
     $arrmixRecords[$intIndex]['status'] = $arrmixData['status'];
     $arrmixRecords[$intIndex]['created_on'] = $arrmixData['created_on'];
     $arrmixRecords[$intIndex]['updated_on'] = $arrmixData['updated_on'];
     $arrmixRecords[$intIndex]['contents'] = $arrmixData['contents'];
     $arrmixRecords[$intIndex]['tags'] = $arrmixData['tags'];
     $arrmixRecords[$intIndex]['comments'] = $arrmixData['comments'];
  }

  return $objResponse->withJson($arrmixRecords);
};