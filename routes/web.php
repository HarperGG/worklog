<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/**
 * 杨泽淼
 */

//Auth/AuthController
Route::post('/auth/login', 'Auth\AuthController@login'); //用户登陆
Route::post('/auth/logout', 'Auth\AuthController@logout'); //退出登陆
Route::post('/auth/modify_password', 'Auth\AuthController@modifyPassword'); //修改密码
//Aliyun/VideoController
Route::post('/video/create_upload_video', 'Aliyun\VideoController@createUploadVideo'); //获取上传凭证
Route::post('/video/refresh_upload_video', 'Aliyun\VideoController@refreshUploadVideo');//刷新上传凭证
Route::post('/video/get_video_play_auth', 'Aliyun\VideoController@getVideoPlayAuth');//获取播放凭证
Route::post('/video/delete_video', 'Aliyun\VideoController@deleteVideo');//删除视频