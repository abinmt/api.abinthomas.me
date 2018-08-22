<?php
require PATH_PHP_SERVICE_HANDLERS . 'PostsHandler.php';

$objApp->get('/getAllPosts', $fnGetAllPosts);