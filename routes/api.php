<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Api'
], function ($api) {
    $api->resource('users', 'UserController');
    $api->resource('diaries', 'DiaryController');
    $api->resource('goals', 'GoalController');
    $api->resource('categories', 'CategoryController');

    $api->get('goals/{goal_id}/diaries', 'DiaryController@index')->middleware('param.add');
    $api->get('users/{user_id}/diaries', 'DiaryController@index')->middleware('param.add');

    $api->get('categories/{category_id}/goals', 'GoalController@index')->middleware('param.add');
    $api->get('categories/{category_id}/diaries', 'DiaryController@index')->middleware('param.add');

//    $api->get('categories/{category_id}/users', 'UserController@index')->middleware('param.add'); // 暂时无法跨表获取数据
});