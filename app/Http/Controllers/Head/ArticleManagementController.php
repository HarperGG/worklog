<?php

namespace App\Http\Controllers\Head;

use App\Http\Requests\Head\ArticlePostRequest;
use App\Http\Requests\Head\CategoryIdGetRequest;
use App\Models\Articles;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ArticleManagementController extends Controller
{
    public function index(CategoryIdGetRequest $request)
    {
        if ($request->input('category_id') == 0) {
            try {
                $result = Articles::select('article_id', 'article_title', 'article_intro', 'cover_picture_url')
                    ->leftjoin('cover_pictures', 'articles.cover_picture_id', 'cover_pictures.cover_picture_id')
                    ->where('article_state', '=', 1)
                    ->orderBy('article_create_time', 'desc')
                    ->paginate(25);
            } catch (\Exception $e) {
                return response()->fail(100, '服务器错误!', null, 500);
            }
        } else {
            try {
                $result = Articles::select('article_id', 'article_title', 'article_intro', 'cover_picture_url')
                    ->leftjoin('cover_pictures', 'articles.cover_picture_id', 'cover_pictures.cover_picture_id')
                    ->where('articles.article_category_id', '=', $request->input('category_id'))
                    ->where('article_state', '=', 1)
                    ->orderBy('article_create_time', 'desc')
                    ->paginate(25);
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

    public function create()
    { }

    public function store(ArticlePostRequest $request)
    {
        try {
            $articles = new Articles();
            $articles->article_title = $request->input('title');
            $articles->article_intro = $request->input('intro');
            $articles->article_content = $request->input('content');
            $articles->article_user_id = Auth::user()->user_id;
            $articles->article_category_id = $request->input('category_id');
            $articles->article_state = 1;
            $articles->article_create_time = date('Y-m-d H:i:s');
            $articles->article_update_time = date('Y-m-d H:i:s');
            $articles->cover_picture_id = $request->input('picture_id');
            $articles->article_video_id = $request->input('video');
            $result = $articles->save();
        } catch (\Exception $e) {
            return response()->fail(100, '服务器错误!', null, 500);
        }
        if ($result) {
            return response()->success(200, '添加成功!');
        }
        return response()->fail(100, '添加失败!', null);
    }

    public function show($id)
    {
        try {
            $result = Articles::select('article_title', 'article_intro', 'article_content', 'article_create_time', 'article_update_time', 'cover_picture_url', 'article_video_id')
                ->leftjoin('cover_pictures', 'articles.cover_picture_id', 'cover_pictures.cover_picture_id')
                ->where('article_id', '=', $id)
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

    public function edit($id)
    { }

    public function update(ArticlePostRequest $request, $id)
    {
        try {
            $result = Articles::where('article_id', '=', $id)
                ->update([
                    'article_title' => $request->input('title'),
                    'article_intro' => $request->input('intro'),
                    'article_content' => $request->input('content'),
                    'article_category_id' => $request->input('category_id'),
                    'article_update_time' => date('Y-m-d H:i:s'),
                    'cover_picture_id' => $request->input('picture_id'),
                    'article_video_id' => $request->input('video')
                ]);
        } catch (\Exception $e) {
            return response()->fail(100, '服务器错误!', null, 500);
        }
        if ($result) {
            return response()->success(200, '修改成功!');
        }
        return response()->fail(100, '修改失败!', null);
    }

    public function destroy($id)
    {
        try {
            $result = Articles::where('article_id', '=', $id)->delete();
        } catch (\Exception $e) {
            return response()->fail(100, '服务器错误!', null, 500);
        }
        if ($result) {
            return response()->success(200, '删除成功!');
        }
        return response()->fail(100, '删除失败!', null);
    }
}
