<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\TopArticles;
use App\Models\Categorys;
use App\Models\Users;

use App\Http\Requests\Admin\Articles\ArticleSearchRequest;
use App\Http\Requests\Admin\Articles\ArticleUpdateTopSateRequest;
use App\Http\Requests\Admin\Articles\ArticleUpdateBanSateRequest;

define("PERPAGENUMBER",10);

class AdminArticles extends Controller
{
    //显示所有文章的列表
    public function index(){
        $articles = Articles::paginate(PERPAGENUMBER);
        return response()->success(200,'成功',$articles);
    }
    //删除指定 文章id 的文章
    public function destroy($id){
        $delRes = Articles::destroy($id);
        if(!$delRes){
            return response()->fail(100,'删除失败，未找到对应文章',null);
        }
        return response()->success(200,'删除成功',$delRes);
    }
    //搜索 标题，类别，作者方法
    public function searchArticles(ArticleSearchRequest $request){
        $searchContent = $request->search_content;
        $category = Categorys::where('category_name',$searchContent)->where('category_index','!=',0)->first();
        $user = Users::where('user_name',$searchContent)->first();
        if(isset($category)){
            $articles = Articles::where('article_category_id',$category->category_id)->orderBy('article_create_time','desc')->paginate(PERPAGENUMBER);
        }else if(isset($user)){
            $articles = Articles::where('article_user_id',$user->user_id)->orderBy('article_create_time','desc')->paginate(PERPAGENUMBER);
        }else{
            $articles = Articles::where('article_title',$searchContent)
            ->orWhere('article_title','like','%'.$searchContent.'%')
            ->orWhere('article_intro','like','%'.$searchContent.'%')
            ->orderBy('article_create_time','desc')
            ->paginate(PERPAGENUMBER);
        }
        if(isset($articles)) return response()->success(200,'成功',$articles);
        return response()->fail(100,'失败',null);
    }
    //修改文章禁用状态
    public function updateBanState(ArticleUpdateBanSateRequest $request,$article_id){
        // dd($article_id.$request->article_ban_sate);
        $updateArticleRes = Articles::where('article_id',$article_id)->update(['article_state'=>$request->article_ban_sate]);
        if($updateArticleRes){
            return response()->success(200,'修改成功',null);
        }else{
            return response()->fail(100,'参数错误',['errors'=>'不存在该文章或改文章状态已为设置状态']);
        }
    }
    //修改文章置顶状态
    public function updateTopState(ArticleUpdateTopSateRequest $request,$article_id){
        if($request->article_top_sate == 1){
            if(TopArticles::where('article_id',$article_id)->first() != null){
                return response()->fail(100,'修改失败',['errors'=>'该文章已加入推荐！']);
            }
            $topArticle = new TopArticles;
            $topArticle->article_id = $article_id;
            $topArticle->save();
            return response()->success(200,'修改成功',null);
        }else if($request->article_top_sate == 0){
            $topArticle = TopArticles::where('article_id',$article_id)->first();
            if($topArticle == null){
                return response()->success(100,'修改失败',['errors'=>'该文章并非推荐！']);
            }
            $topArticle->delete();
            return response()->success(200,'修改成功',null);
        }else{
            return response()->success(100,'修改失败',['errors'=>'状态错误!']);
        }
    }

}
