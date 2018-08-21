<?php
if( 'dev' == getenv('APP_ENV') && false != getenv('DEBUG') ) {
	error_reporting(E_ALL);
  ini_set('display_errors', 1); 
}

function getConfiguration() {
  if('dev' == getenv('APP_ENV')) {
    return [
              'db_string' => getenv('DEV_DB_CONNECTION_STRING'), 
              'database_name' => getenv('DATABASE_NAME')
           ];
  }
}