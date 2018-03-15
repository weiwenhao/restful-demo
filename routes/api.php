<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Api'
], function ($api) {
    $api->resource('users', 'UserController');
    $api->resource('diaries', 'DiaryController');
    $api->resource('goals', 'GoalController');
    $api->resource('categories', 'CategoryController');

    //点赞日记与取消点赞日记
    $api->post('diaries/{diaries}/likes', 'DiaryController@store');
    $api->delete('diaries/{diaries}/likes', 'DiaryController@destroy');

    $api->get('goals/{goal_id}/diaries', 'DiaryController@index')->middleware('param.add');
    $api->get('users/{user_id}/diaries', 'DiaryController@index')->middleware('param.add');

    $api->get('categories/{category_id}/goals', 'GoalController@index')->middleware('param.add');
    $api->get('categories/{category_id}/diaries', 'DiaryController@index')->middleware('param.add');

    $api->get('categories/{category_id}/users', 'UserController@index')->middleware('param.add');
});