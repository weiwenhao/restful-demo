<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Api'
], function ($api) {
    $api->resource('users', 'UserController');

    $api->resource('diaries', 'DiaryController');

    $api->resource('goals', 'GoalController');
});