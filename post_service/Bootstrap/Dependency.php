<?php
$_objContainer = $objApp->getContainer();

$_objContainer['mongo_client'] = function($_objContainer) {
  return new MongoDB\Client($_objContainer->get('db_string'));
};

$_objContainer['database'] = function($_objContainer) {
  return $_objContainer->get( 'database_name' );
};

$_objContainer['posts'] = function($_objContainer) {
  $objMongoClient = $_objContainer['mongo_client'];
  $strDbName = $_objContainer['database'];

  return $objMongoClient->$strDbName->posts;
};