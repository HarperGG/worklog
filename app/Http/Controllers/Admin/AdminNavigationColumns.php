<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NavigationColumns;

use App\Http\Requests\Admin\Navigation\NavigationStoreRequest;
use App\Http\Requests\Admin\Navigation\NavigationUpdateRequest;

define("PERPAGENUMBER",10);

class AdminNavigationColumns extends Controller
{
    //显示上导航栏全部信息
    public function index(){
        $navigations = NavigationColumns::paginate(PERPAGENUMBER);
        return response()->success(200,'成功',$navigations);
    }
    //新建一个上导航栏
    public function store(NavigationStoreRequest $request){
        //
        $navigation = new NavigationColumns;
        $navigation->navigation_columns_name = $request->navigation_columns_name;
        $navigation->navigation_jump_url = $request->navigation_jump_url;
        $saveNaviRes = $navigation->save();
        if($saveNaviRes){
            return response()->success(200,'添加成功',$navigation);
        }else{
            return response()->fail(100,'添加失败',null);
        }
    }
    //显示指定上导航栏id 上导航栏信息
    public function show($id){
        //
        $navi = NavigationColumns::find($id);
        if($navi != null){
            return response()->success(200,'成功',$navi);
        }else{
            return response()->fail(100,'失败',['errors'=>'未找到分栏']);
        }
    }
    //通过上导航栏id 修改上导航栏信息
    public function update(NavigationUpdateRequest $request, $id){
        //
        $navi = NavigationColumns::find($id);
        $navi->navigation_columns_name = $request->navigation_columns_name;
        $navi->navigation_jump_url = $request->navigation_jump_url;
        $naviSaveRes = $navi->save();
        if($naviSaveRes){
            return response()->success(200,'修改成功',$navi);
        }else{
            return response()->fail(100,'修改失败',null);
        }
    }
    //通过上导航栏id 删除上导航栏
    public function destroy($id){
        //
        $delRes = NavigationColumns::destroy($id);
        if(!$delRes){
            return response()->fail(100,'删除失败，未找到对应分栏',null);
        }
        return response()->success(200,'删除成功',$delRes);
    }
}
