<?php
require PATH_PHP_SERVICE_HANDLERS . 'PostsHandler.php';

$objApp->get('/', $fnWelcome);
$objApp->get('/get-all-posts', $fnGetAllPosts);
$objApp->post('/insert-post', $fnInsertPost);
