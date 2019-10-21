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
Route::post('/auth/login', 'Auth\AuthController@login');                                                        //用户登陆
Route::post('/auth/logout', 'Auth\AuthController@logout');                                                      //退出登陆
Route::post('/auth/modify_password', 'Auth\AuthController@modifyPassword');                                     //修改密码
//Aliyun/VideoController
Route::post('/video/create_upload_video', 'Aliyun\VideoController@createUploadVideo');                          //获取上传凭证
Route::post('/video/refresh_upload_video', 'Aliyun\VideoController@refreshUploadVideo');                        //刷新上传凭证
Route::post('/video/get_video_play_auth', 'Aliyun\VideoController@getVideoPlayAuth');                           //获取播放凭证
Route::post('/video/delete_video', 'Aliyun\VideoController@deleteVideo');                                       //删除视频

/**
 * 杜宇博
 */
Route::resource('articles', 'Head\ArticleManagementController');
Route::get('/head/get_navigation_bar', 'Head\IndexController@getNavigationBar');                                //导航栏
Route::get('/head/get_classify_bay', 'Head\IndexController@getClassifyBay');                                    //分类栏
Route::get('/head/get_learn_recommend', 'Head\IndexController@getLearnRecommend');                              //学习推荐
Route::get('/head/get_blog_roll', 'Head\IndexController@getBlogRoll');                                          //友情链接
Route::get('/head/get_learn_path', 'Head\IndexController@getLearnPath');                                        //学习路线
Route::get('/head/get_recent', 'Head\IndexController@getRecent');                                               //近期发布
Route::get('/head/get_slideshow', 'Head\IndexController@getSlideshow');                                         //轮播图
Route::get('/head/get_assign_learn_path/{id}', 'Head\IndexController@getAssignLearnPath')
    ->where('id', '[0-9]+');                                                                                    //获取指定学习路线
Route::get('/head/get_assign_learn_recommend/{id}', 'Head\IndexController@getAssignLearnRecommend')
    ->where('id', '[0-9]+');  //获取指定学习推荐
Route::get('/head/get_all_learn_path', 'Head\IndexController@getAllLearnPath');                                 //获取所有的学习路线
Route::get('/head/search', 'Head\IndexController@search');                                                      //搜索
Route::Post('/head/upload_pic', 'Head\IndexController@uploadPic');                                              //上传图片


//李承坤

//get传参验证 只能为数字
Route::group(['middleware' => ['resource.id.check']], function () {
    //文章  
    Route::get('admin/articles/search', 'Admin\AdminArticles@searchArticles');
    Route::put('admin/articles/update_ban_state/{article_id}', 'Admin\AdminArticles@updateBanState');
    Route::put('admin/articles/update_top_state/{article_id}', 'Admin\AdminArticles@updateTopState');
    Route::apiResource('admin/articles', 'Admin\AdminArticles', ['only' => [
        'index', 'destroy'
    ]]);
    //上导航栏
    Route::apiResource('admin/navigaion_columns', 'Admin\AdminNavigationColumns');
    //用户 
    Route::put('admin/users/reset_password/{user_id}', 'Admin\AdminUsers@resetPassword');
    Route::apiResource('admin/users', 'Admin\AdminUsers');
    //封面图片
    Route::apiResource('admin/cover_pictures', 'Admin\AdminCoverPictures', ['only' => [
        'index', 'destroy', 'store'
    ]]);
    //学习路线
    Route::apiResource('admin/study_routes', 'Admin\AdminStudyRoutes');
    //轮播图
    Route::post('admin/rotations/update/{rotation_id}', 'Admin\AdminRotations@update');
    Route::apiResource('admin/rotations', 'Admin\AdminRotations', ['only' => [
        'index', 'destroy', 'store', 'show'
    ]]);
    //系统设置
    Route::apiResource('admin/system_setting', 'Admin\AdminSystemSettings', ['only' => [
        'index', 'update'
    ]]);
    //友情链接
    Route::get('admin/friend_ship_link/category/{category_id}', 'Admin\AdminFriendShipLink@indexByCategory');
    Route::apiResource('admin/friend_ship_link', 'Admin\AdminFriendShipLink', ['only' => [
        'index', 'update', 'store', 'destroy'
    ]]);
    //分类目录
    Route::apiResource('admin/categorys', 'Admin\AdminCategorys', ['only' => [
        'index', 'update', 'store', 'destroy'
    ]]);
    //上交情况
    Route::get('admin/upload_situation', 'Admin\AdminUploadSituation@viewUploadSituation');
});




Route::get('/admin', function () {
    return view('admin.index');
});
Route::get('/admin/carousel_add', function () {
    return view('admin.carousel_add');
});
Route::get('/admin/carousel', function () {
    return view('admin.carousel');
});
Route::get('/admin/classification_add', function () {
    return view('admin.classification_add');
});
Route::get('/admin/classification', function () {
    return view('admin.classification');
});
Route::get('/admin/cover', function () {
    return view('admin.cover');
});
Route::get('/admin/document', function () {
    return view('admin.document');
});
Route::get('/admin/linksetting_add', function () {
    return view('admin.linksetting_add');
});
Route::get('/admin/linksetting', function () {
    return view('admin.linksetting');
});
Route::get('/admin/member_add', function () {
    return view('admin.member_add');
});
Route::get('/admin/member', function () {
    return view('admin.member');
});
Route::get('/admin/navigation_add', function () {
    return view('admin.navigation_add');
});
Route::get('/admin/navigation', function () {
    return view('admin.navigation');
});
Route::get('/admin/system', function () {
    return view('admin.system');
});
Route::get('/admin/uploadtime', function () {
    return view('admin.uploadtime');
});
Route::get('/admin/path', function () {
    return view('admin.path');
});
Route::get('/admin/path_add', function () {
    return view('admin.path_add');
});
Route::get('/', function () {
    return view('head.index');
});
Route::get('/learn_path', function () {
    return view('head.learnPath');
});
Route::get('/learn_path_list', function () {
    return view('head.learnPathList');
});
Route::get('/log', function () {
    return view('head.log');
});
Route::get('/log_details', function () {
    return view('head.logDetails');
});
Route::get('/log_edit', function () {
    return view('head.logEdit');
});
Route::get('/login', function () {
    return view('head.login');
});
