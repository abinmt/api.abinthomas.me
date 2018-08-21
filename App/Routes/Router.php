<?php

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {

   $client = new MongoDB\Client("mongodb://localhost:27017");
    $collection = $client->blog_abinthomas_me->posts;

    $result = $collection->find()->sort(['created_on']);


    foreach ($result as $entry) {
        echo $entry['_id'], ': ', $entry['name'], "\n";
    }

exit();

     // all records
    $result = $posts->find();

    //$name = $args['name'];
    //$response->getBody()->write("Hello, $result");

    //return $response;
});