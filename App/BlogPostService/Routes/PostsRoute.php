<?php
require PATH_PHP_SERVICE_HANDLERS . 'PostsHandler.php';

$objApp->get('/get-all-posts', $fnGetAllPosts);
$objApp->post('/insert-post', $fnInsertPost);