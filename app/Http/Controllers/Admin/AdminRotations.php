<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rotations;
use Storage;

use App\Http\Requests\Admin\Rotations\RotationStoreRequest;

define("PERPAGENUMBER",10);

class AdminRotations extends Controller
{
    public function index(){
        $rotations = Rotations::paginate(PERPAGENUMBER);
        return response()->success(200,'成功',$rotations);
    }
    public function store(RotationStoreRequest $request){
        if ($request->isMethod('POST')) { //判断文件是否是 POST的方式上传
            $tmp = $request->file('rotation_picture_file');
            $path = 'storage/rotation_pictures_local'; //
            if ($tmp->isValid()) { 
                //写入磁盘
                $FileType = $tmp->getClientOriginalExtension(); 
                $FilePath = $tmp->getRealPath(); 
                $FileName = date('Y-m-d') .'-'. uniqid() . '.' . $FileType; 
                $tempbool = Storage::disk('rotation_pictures')->put($FileName, file_get_contents($FilePath)); 
                if(!$tempbool) return response()->fail(100,'添加失败',['error'=>'写入磁盘失败！']);
                $urlPath = $path . '/' . $FileName;
                //写入数据库
                $rotation = new Rotations;
                $rotation->rotation_click_url = $request->rotation_click_url;
                $rotation->rotation_picture_url = $urlPath;
                if($rotation->save()){
                    return response()->success(200,'添加成功',$rotation);
                }else{
                    return response()->fail(100,'添加失败',null);
                }
            }
        }
    }
    public function show($id){
        $rotation = Rotations::find($id);
        if($rotation) return response()->success(200,'成功',$rotation);
        return response()->success(100,'失败',null);
    }
    public function update(RotationStoreRequest $request, $id){
        $rotation = Rotations::find($id);
        if(!$rotation) return response()->fail(100,'未找到对应图片！',null);
        $url_array = explode("/", $rotation->rotation_picture_url);
        $oldRotationPictureName = $url_array[count($url_array)-1];
        $returnMessage = '';

        if ($request->isMethod('POST')) { //判断文件是否是PUT的方式上传
            $tmp = $request->file('rotation_picture_file');
            $path = 'storage/rotation_pictures_local'; 
            if ($tmp->isValid()) { 
                //写入磁盘
                $FileType = $tmp->getClientOriginalExtension(); 
                $FilePath = $tmp->getRealPath(); 
                $FileName = date('Y-m-d') .'-'. uniqid() . '.' . $FileType; 
                $tempbool = Storage::disk('rotation_pictures')->put($FileName, file_get_contents($FilePath)); 
                if(!$tempbool) return response()->fail(100,'修改失败',['error'=>'写入磁盘失败！']);
                $urlPath = $path . '/' . $FileName;
                //写入数据库
                $rotation->rotation_click_url = $request->rotation_click_url;
                $rotation->rotation_picture_url = $urlPath;
                if($rotation->save()){
                    $returnMessage = $returnMessage.'修改成功,';
                }else{
                    $returnMessage = $returnMessage.'修改失败,';
                }
            }


            
        }
        //从磁盘中删除图片
        $exists = Storage::disk('rotation_pictures')->exists($oldRotationPictureName);
        if(!$exists){
            return response()->fail(100,$returnMessage.'之前图片已不存在！',null);
         }else{
              $rotationDisk = Storage::disk('rotation_pictures');
              if(!$rotationDisk->delete($oldRotationPictureName)) return response()->fail(100,$returnMessage.'从磁盘中删除失败',null);
              return response()->success(200,$returnMessage,null);
         }
    }
    public function destroy($id){
        $rotation = Rotations::find($id);
        if(!$rotation) return response()->fail(100,'未找到对应图片！',null);
        $url_array = explode("/", $rotation->rotation_picture_url);
        $fileName = $url_array[count($url_array)-1];
        $exists = Storage::disk('rotation_pictures')->exists($fileName);
        if(!$exists){
            $rotation->delete();
            return response()->fail(100,'图片已不存在！将从数据库中删除此数据！',null);
        }else{
            $rotationDisk = Storage::disk('rotation_pictures');
            if(!$rotation->delete()) return response()->fail(100,'从数据库中删除失败',null);
            if(!$rotationDisk->delete($fileName)) return response()->fail(100,'从磁盘中删除失败',null);
            return response()->success(200,'删除成功',null);
        }
    }
}
