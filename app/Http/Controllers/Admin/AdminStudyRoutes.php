<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StudyRoutes;
use App\Models\Categorys;

use App\Http\Requests\Admin\StudyRoutes\StudyRoutesStoreRequest;

define("PERPAGENUMBER",10);
define("SELECTEFIELDARRAY",['study_routes.study_route_id',
                            'study_routes.study_route_title',
                            'study_routes.study_route_intro',
                            'study_routes.study_route_state',
                            'study_routes.study_route_create_time',
                            'study_routes.study_route_update_time',
                            'study_routes.study_route_cover_picture_id',
                            'study_routes.study_route_video_id',
                            'categorys.category_name as category_name']);

class AdminStudyRoutes extends Controller
{
    public function index(){
        $studyRoutes = StudyRoutes::leftjoin('categorys','study_routes.category_id','categorys.category_id')
                                    ->select(SELECTEFIELDARRAY)
                                    ->paginate(PERPAGENUMBER);
        return response()->success(200,'成功',$studyRoutes);
    }
    public function store(StudyRoutesStoreRequest $request){
        if(Categorys::find($request->category_id)->category_index != 0) return response()->success(100,'不能为小路线添加！',null);
        $studyRoute = new StudyRoutes;
        $studyRoute->study_route_title = $request->study_route_title;
        $studyRoute->study_route_intro = $request->study_route_intro;
        $studyRoute->study_route_content = $request->study_route_content;
        $studyRoute->category_id = $request->category_id;
        $studyRoute->study_route_state = $request->study_route_state;
        $studyRoute->study_route_cover_picture_id = $request->study_route_cover_picture_id;
        $studyRoute->study_route_video_id = $request->study_route_video_id;
        $studyRoute->study_route_create_time = date("Y-m-d H:i:s");
        $studyRoute->study_route_update_time = date("Y-m-d H:i:s");
        if($studyRoute->save()){
            return response()->success(200,'添加成功',['study_route_id'=>$studyRoute->study_route_id]);
        }
    }
    public function show($id){
        $newSelectArray = SELECTEFIELDARRAY;
        array_push($newSelectArray,'study_routes.study_route_content');
        $studyRoute = StudyRoutes::leftjoin('categorys','study_routes.category_id','categorys.category_id')
                                    ->select($newSelectArray)
                                    ->where('study_routes.study_route_id',$id)
                                    ->first();
        // dd($studyRoute);
        if($studyRoute != null){
            return response()->success(200,'成功',$studyRoute);
        }else{
            return response()->success(100,'未找到对应学习路线',null);
        }             
        
    }
    public function update(StudyRoutesStoreRequest $request, $id){
        $studyRoute = StudyRoutes::find($id);
        if($studyRoute == null){
            return response()->success(100,'未找到该学习路线！',null);
        }
        if(Categorys::find($request->category_id)->category_index != 0) return response()->success(100,'不能修改为小路线！',null);
        $studyRoute->study_route_title = $request->study_route_title;
        $studyRoute->study_route_intro = $request->study_route_intro;
        $studyRoute->study_route_content = $request->study_route_content;
        $studyRoute->category_id = $request->category_id;
        $studyRoute->study_route_state = $request->study_route_state;
        $studyRoute->study_route_cover_picture_id = $request->study_route_cover_picture_id;
        $studyRoute->study_route_video_id = $request->study_route_video_id;
        $studyRoute->study_route_update_time = date("Y-m-d H:i:s");
        if($studyRoute->save()){
            return response()->success(200,'修改成功',['study_route_id'=>$studyRoute->study_route_id]);
        }
    }
    public function destroy($id){
        if(StudyRoutes::destroy($id)) return response()->success(200,'删除成功',null);
        return response()->fail(100,'删除失败,未找到指定学习路线！',null);
    }
}
