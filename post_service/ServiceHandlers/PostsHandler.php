<?php
use \Psr\Http\Message\ServerRequestInterface as IRequest;
use \Psr\Http\Message\ResponseInterface as IResponse;

$fnWelcome = function (IRequest $objRequest, IResponse $objResponse, array $arrmixArgs): IResponse {
    $conn = pg_connect("host=db port=5432 dbname=abinthomas.me user=postgres");

    echo "<pre>";
    print_r($conn);

    if (!$conn) {
        echo "An error occurred.\n";
        exit;
    }

    $result = pg_query($conn, "SELECT * FROM blogs");

    print_r($result);
    

    //return $objResponse->withJson(['Welcome those big, sticky, complicated problems. In them are your most powerful opportunities.']);
};

$fnGetAllPosts = function (IRequest $objRequest, IResponse $objResponse, array $arrmixArgs): IResponse {
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

$fnInsertPost = function (IRequest $objRequest, IResponse $objResponse, array $arrmixArgs): IResponse {
    $arrmixdata = $objRequest->getParsedBody();

    $arrmixpost['name'] = filter_var($arrmixdata['name'], FILTER_SANITIZE_STRING);
    $arrmixpost['status'] = filter_var($arrmixdata['status'], FILTER_SANITIZE_STRING);
    $arrmixpost['created_on'] = filter_var($arrmixdata['created_on'], FILTER_SANITIZE_STRING);
    $arrmixpost['updated_on'] = filter_var($arrmixdata['updated_on'], FILTER_SANITIZE_STRING);
    $arrmixpost['contents'] = filter_var($arrmixdata['contents'], FILTER_SANITIZE_STRING);
    $arrmixpost['tags'] = filter_var($arrmixdata['tags'], FILTER_SANITIZE_STRING);
    $arrmixpost['comments'] = filter_var($arrmixdata['comments'], FILTER_SANITIZE_STRING);

    $arrobjResultsIterator = $this->posts->insertOne($arrmixpost);

    return $objResponse->withJson($arrobjResultsIterator);
};
