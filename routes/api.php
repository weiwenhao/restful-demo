<?php
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->get('users/{id}', function ($id) {
        dd($id);
    });
});