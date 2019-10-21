<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Users;
use DB;
define("PERPAGENUMBER",10);

class AdminUploadSituation extends Controller
{
    //查看上交情况
    public function viewUploadSituation(){
        $res = Users::orderBy('user_id','desc')
        ->select('user_id','user_name')
        // ->with('selectArtileCreateTime')
        ->withCount('articles as upload_times')
        ->paginate(PERPAGENUMBER);
    
        // foreach ($res as $key => $value) {
            
        // }
        // $res = Users::find(141)->selectArtileCreateTime;
        // $res = Articles::find(46)->post;

        // $users=Users::all();
        //查询出对应条件的文章
        $res->each(function ($res) {
            $res->artileCreateTime;
            if(isset($res->artileCreateTime[0])){
                $res['last_upload_time'] = $res->artileCreateTime[0]->article_create_time;
                unset($res->artileCreateTime);
            }else{
                $res['last_upload_time'] = null;
                unset($res->artileCreateTime);
            }
        });
        
        return response()->success(200,'成功',$res);
        // dd($res);
    }
}
