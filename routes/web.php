<?php
/*
|--------------------------------------------------------------------------
| 								后台模块路由
|--------------------------------------------------------------------------
 */

/* 仪表盘路由 */
Route::prefix('admin')->group(function ()
{
	Route::get('index', 'Admin\IndexController@index');

	Route::get('count', 'Admin\IndexController@count');
});

/* 用户模块路由 */
Route::resource('admin/user','Admin\UserController');


/*
|--------------------------------------------------------------------------
| 								前台模块路由
|--------------------------------------------------------------------------
 */