<?php

namespace App\Http\Controllers\Head;

use App\Http\Requests\Head\CategoryIdGetRequest;
use App\Http\Requests\Head\ContentGetRequest;
use App\Models\Articles;
use App\Models\Categorys;
use App\Models\NavigationColumns;
use App\Http\Controllers\Controller;
use App\Http\Requests\Head\UploadPicPostRequest;
use App\Models\Rotations;
use App\Models\StudyRoutes;
use App\Models\TopArticles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class IndexController extends Controller
{
    public function getNavigationBar()
    {
        try {
            $result = NavigationColumns::select('navigation_id', 'navigation_columns_name', 'navigation_jump_url')->get();
        } catch (\Exception $e) {
            return response()->fail(100, '服务器错误!', null, 500);
        }
        if ($result->toArray() != null) {
            return response()->success(200, '获取成功!', $result);
        }
        return response()->fail(100, '获取失败!', null);
    }

    public function getClassifyBay()
    {
        try {
            $result = Categorys::where('category_index', '=', 0)->with('allChild')
                ->select('category_id', 'category_name')
                ->get();
        } catch (\Exception $e) {
            return response()->fail(100, '服务器错误!', null, 500);
        }
        if ($result->toArray() != null) {
            return response()->success(200, '获取成功!', $result);
        }
        return response()->fail(100, '获取失败!', null);
    }

    public function getLearnRecommend(CategoryIdGetRequest $request)
    {
        try {
            $result = DB::table('top_articles')->select('articles.article_id', 'article_title', 'article_intro', 'cover_picture_url')
                ->leftjoin('articles', 'top_articles.article_id', 'articles.article_id')
                ->leftjoin('cover_pictures', 'articles.cover_picture_id', 'cover_pictures.cover_picture_id')
                ->where('articles.article_category_id', '=', $request->input('category_id'))
                ->where('article_state', '=', 1)
                ->limit(9)
                ->orderBy('article_create_time', 'desc')
                ->get();
        } catch (\Exception $e) {
            return response()->fail(100, '服务器错误!', null, 500);
        }
        $res = $result->toArray();
        $s = [];
        for ($i = 0; $i < sizeof($res); $i++) {
            $s[$i] = $res[$i]->article_id;
        }
        if ($res != null && sizeof($res) > 8) {
            return response()->success(200, '获取成功!', $result);
        }
        if ($res != null && sizeof($res) < 9) {
            try {
                $more = Articles::select('article_title', 'article_intro', 'cover_picture_url')
                    ->leftjoin('cover_pictures', 'articles.cover_picture_id', 'cover_pictures.cover_picture_id')
                    ->where('article_category_id', '=', $request->input('category_id'))
                    ->where('article_state', '=', 1)
                    ->whereNotIn('article_id', $s)
                    ->limit(9 - sizeof($result->toArray()))
                    ->orderBy('article_create_time', 'desc')
                    ->get();
            } catch (\Exception $e) {
                return response()->fail(100, '服务器错误!', null, 500);
            }
            $totle = sizeof($res) + sizeof($more->toArray());
            if ($more->toArray() != null) {
                $j = 0;
                for ($i = sizeof($res); $i < $totle; $i++) {
                    $res[$i]['article_title'] = $more[$j]->article_title;
                    $res[$i]['article_intro'] = $more[$j]->article_intro;
                    $res[$i]['cover_picture_url'] = $more[$j]->cover_picture_url;
                    $j++;
                }
                return response()->success(200, '获取成功!', $res);
            }
            return response()->success(200, '获取成功!', $result);
        }
        return response()->fail(100, '获取失败!', null);
    }

    public function getBlogRoll(CategoryIdGetRequest $request)
    {
        try {
            $result = Categorys::select('friendship_link_id', 'friendship_link_title', 'friendship_link_click_url')
                ->leftjoin('friendship_links', 'categorys.category_id', 'friendship_links.category_id')
                ->where('friendship_links.category_id', '=', $request->input('category_id'))
                ->get();
        } catch (\Exception $e) {
            return response()->fail(100, '服务器错误!', null, 500);
        }
        if ($result->toArray() != null) {
            return response()->success(200, '获取成功!', $result);
        }
        return response()->fail(100, '获取失败!', null);
    }

    public function getLearnPath(CategoryIdGetRequest $request)
    {
        try {
            $result = DB::table('categorys')->select('study_route_id', 'study_route_title', 'study_route_intro', 'cover_picture_url')
                ->leftjoin('study_routes', 'categorys.category_id', 'study_routes.category_id')
                ->leftjoin('cover_pictures', 'study_routes.study_route_cover_picture_id', 'cover_pictures.cover_picture_id')
                ->where('categorys.category_id', '=', $request->input('category_id'))
                ->where('study_route_state', '=', 1)
                ->limit(4)
                ->orderBy('study_route_create_time', 'desc')
                ->get();
        } catch (\Exception $e) {
            return response()->fail(100, '服务器错误!', null, 500);
        }
        if ($result->toArray() != null) {
            return response()->success(200, '获取成功!', $result);
        }
        return response()->fail(100, '获取失败!', null);
    }

    public function getRecent()
    {
        try {
            $result = Articles::select('article_id', 'article_title', 'article_intro', 'cover_picture_url')
                ->leftjoin('cover_pictures', 'articles.cover_picture_id', 'cover_pictures.cover_picture_id')
                ->where('article_state', '=', 1)
                ->limit(8)
                ->orderBy('article_create_time', 'desc')
                ->get();
        } catch (\Exception $e) {
            return response()->fail(100, '服务器错误!', null, 500);
        }
        if ($result->toArray() != null) {
            return response()->success(200, '获取成功!', $result);
        }
        return response()->fail(100, '获取失败!', null);
    }

    public function getAssignLearnPath($id)
    {
        try {
            $result = StudyRoutes::select('study_route_title', 'study_route_intro', 'study_route_content', 'study_route_create_time', 'study_route_update_time', 'cover_picture_url', 'study_route_video_id')
                ->leftjoin('cover_pictures', 'study_routes.study_route_cover_picture_id', 'cover_pictures.cover_picture_id')
                ->where('study_route_id', '=', $id)
                ->where('study_route_state', '=', 1)
                ->get();
        } catch (\Exception $e) {
            return response()->fail(100, '服务器错误!', null, 500);
        }
        if ($result->toArray() != null) {
            return response()->success(200, '获取成功!', $result);
        }
        return response()->fail(100, '获取失败!', null);
    }

    public function getAssignLearnRecommend($id)
    {
        try {
            $result = TopArticles::select('article_title', 'article_intro', 'article_content', 'article_create_time', 'article_update_time', 'cover_picture_url', 'article_video_id')
                ->leftjoin('articles', 'top_articles.article_id', 'articles.article_id')
                ->leftjoin('cover_pictures', 'articles.cover_picture_id', 'cover_pictures.cover_picture_id')
                ->where('articles.article_id', '=', $id)
                ->where('article_state', '=', 1)
                ->get();
        } catch (\Exception $e) {
            return response()->fail(100, '服务器错误!', null, 500);
        }
        if ($result->toArray() != null) {
            return response()->success(200, '获取成功!', $result);
        }
        return response()->fail(100, '获取失败!', null);
    }

    public function getSlideshow()
    {
        try {
            $result = Rotations::select('rotation_picture_url', 'rotation_click_url')->get();
        } catch (\Exception $e) {
            return response()->fail(100, '服务器错误!', null, 500);
        }
        if ($result->toArray() != null) {
            return response()->success(200, '获取成功!', $result);
        }
        return response()->fail(100, '获取失败!', null);
    }

    public function getAllLearnPath(CategoryIdGetRequest $request)
    {
        if ($request->input('category_id') == 0) {
            try {
                $result = DB::table('categorys')->select('study_route_id', 'study_route_title', 'study_route_intro', 'cover_picture_url')
                    ->leftjoin('study_routes', 'categorys.category_id', 'study_routes.category_id')
                    ->leftjoin('cover_pictures', 'study_routes.study_route_cover_picture_id', 'cover_pictures.cover_picture_id')
                    ->where('study_route_state', '=', 1)
                    ->orderBy('study_route_create_time', 'desc')
                    ->paginate(20);
            } catch (\Exception $e) {
                return response()->fail(100, '服务器错误!', null, 500);
            }
        } else {
            try {
                $result = DB::table('categorys')->select('study_route_id', 'study_route_title', 'study_route_intro', 'cover_picture_url')
                    ->leftjoin('study_routes', 'categorys.category_id', 'study_routes.category_id')
                    ->leftjoin('cover_pictures', 'study_routes.study_route_cover_picture_id', 'cover_pictures.cover_picture_id')
                    ->where('categorys.category_id', '=', $request->input('category_id'))
                    ->where('study_route_state', '=', 1)
                    ->orderBy('study_route_create_time', 'desc')
                    ->paginate(20);
            } catch (\Exception $e) {
                return response()->fail(100, '服务器错误!', null, 500);
            }
        }
        $result->appends(['category_id' => $request->input('category_id')])->render();
        if ($result->toArray() != null) {
            return response()->success(200, '获取成功!', $result);
        }
        return response()->fail(100, '获取失败!', null);
    }

    public function search(ContentGetRequest $request)
    {
        try {
            $result = Articles::select('article_id', 'article_title', 'article_intro', 'cover_picture_url')
                ->leftjoin('cover_pictures', 'articles.cover_picture_id', 'cover_pictures.cover_picture_id')
                ->whereRaw("concat(`article_title`,`article_intro`) like '%" . $request->input('content') . "%'")
                ->paginate(20);
        } catch (\Exception $e) {
            return response()->fail(100, '服务器错误!', null, 500);
        }
        $result->appends(['content' => $request->input('search_content')])->render();
        if ($result->toArray() != null) {
            return response()->success(200, '获取成功!', $result);
        }
        return response()->fail(100, '获取失败!', null);
    }

    public function uploadPic(UploadPicPostRequest $request)
    { 
        if ($request->isMethod('POST')) { //判断文件是否是 POST的方式上传
            $tmp = $request->file('pictures');
            $path = 'storage/user_pictures_local'; //
            if ($tmp->isValid()) { 
                //写入磁盘
                $FileType = $tmp->getClientOriginalExtension(); 
                $FilePath = $tmp->getRealPath(); 
                $FileName = date('Y-m-d') .'-'. uniqid() . '.' . $FileType; 
                $tempbool = Storage::disk('user_pictures')->put($FileName, file_get_contents($FilePath)); 
                if(!$tempbool) return response()->fail(100,'添加失败',['error'=>'写入磁盘失败！']);
                $urlPath = $path . '/' . $FileName;
                if($tempbool){
                    return response()->success(200,'添加成功',$urlPath);
                }else{
                    return response()->fail(100,'添加失败',null);
                }
            }
        }
    }
}
