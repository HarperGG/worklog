<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categorys;

use App\Http\Requests\Admin\Categorys\CategorysStoreRequest;

define("PERPAGENUMBER",10);

class AdminCategorys extends Controller
{
    public function index(){
        return response()->success(200,'成功',Categorys::leftjoin('categorys as t1','categorys.category_index','t1.category_id')
        ->select('categorys.category_id','categorys.category_name','t1.category_name as category_big_name','categorys.category_index')
        ->where('t1.category_name','!=','')
        ->paginate(PERPAGENUMBER));
    }
    public function store(CategorysStoreRequest $request){
        $bigCategory = Categorys::where('category_name',$request->category_big_name)->where('category_index',0)->first();
        $smallCategory = Categorys::where('category_name',$request->category_name)->first();
        if($smallCategory && $bigCategory){
            if($smallCategory->category_index == $bigCategory->category_id){
                 return response()->fail(100,'添加失败,已存在该分类！',null);
            }
            $newCategory = new Categorys;
            $newCategory->category_index = $bigCategory->category_id;
            $newCategory->category_name = $request->category_name;
            if($newCategory->save()) return response()->success(200,'添加成功！',null); 
            return response()->fail(100,'添加失败,数据库错误！',null);
        }else if($bigCategory && !$smallCategory){
            $newCategory = new Categorys;
            $newCategory->category_index = $bigCategory->category_id;
            $newCategory->category_name = $request->category_name;
            if($newCategory->save()) return response()->success(200,'添加成功！',null); 
            return response()->fail(100,'添加失败,数据库错误！',null);
        }else{
            $newSmallCategory = new Categorys;
            $newBigCategory = new Categorys;
            $newBigCategory->category_index = 0;
            $newBigCategory->category_name = $request->category_big_name;
            if($newBigCategory->save()){
                $newSmallCategory->category_index = $newBigCategory->category_id;
                $newSmallCategory->category_name = $request->category_name;
                if($newSmallCategory->save()){
                    return response()->success(200,'添加成功！',null); 
                }else{
                    $newBigCategory->delete();
                    return response()->fail(100,'添加失败,数据库错误！',null);
                }
            }else{
                return response()->fail(100,'添加失败,数据库错误！',null);
            }
        }
    }
    public function update(CategorysStoreRequest $request, $id){
        $oldCategory = Categorys::find($id);
        if($oldCategory->category_index == 0){
            $oldCategory->category_name = $request->category_big_name;
            if($oldCategory->save()) return response()->success(200,'修改成功',null);
            return response()->fail(100,'修改失败',null);
        }else{
            $oldCategory->category_name = $request->category_name;
            if($oldCategory->save()) return response()->success(200,'修改成功',null);
            return response()->fail(100,'修改失败',null);
        }
    }
    public function destroy($id){
        $category = Categorys::find($id);
        if(!$category){
            return response()->fail(100,'删除失败,未找到对应id',null);
        }
        if($category->category_index == 0){
            return response()->fail(100,'删除失败,大分类不能删除',null);
        }
        $smallCategoryDelBool = $category->delete();
        $totleCategorys = Categorys::where('category_index',$category->category_index)->first();
        if($totleCategorys == null){
            $bigCategoryBool = Categorys::destroy($category->category_index);
        }
        if($smallCategoryDelBool || $bigCategoryBool) return response()->success(200,'删除成功',null);
        return response()->fail(100,'删除失败',null);
    }
}
