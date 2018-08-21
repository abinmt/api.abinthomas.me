<?php
$objContainer = $objApp->getContainer();

$objContainer['mongo_client'] = function($objContainer) {
  return new MongoDB\Client($objContainer->get('db_string'));
};

$objContainer['database'] = function($objContainer) {
  return $objContainer->get( 'database_name' );
};

$objContainer['posts'] = function($objContainer) {
  $objMongoClient = $objContainer['mongo_client'];
  $strDbName = $objContainer['database'];

  return $objMongoClient->$strDbName->posts;
};