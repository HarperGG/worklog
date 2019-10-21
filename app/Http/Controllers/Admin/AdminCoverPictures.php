<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CoverPictures;
use Storage;

use App\Http\Requests\Admin\CoverPictures\CoverPictureStoreRequest;

define("PERPAGENUMBER",10);

class AdminCoverPictures extends Controller
{
    public function index(){
        $pictures = CoverPictures::paginate(PERPAGENUMBER);
        return response()->success(200,'成功',$pictures);
    }
    public function store(CoverPictureStoreRequest $request){
        //
        // $file = $request->file('picture_file');

        if ($request->isMethod('POST')) { //判断文件是否是 POST的方式上传
            $tmp = $request->file('picture_file');
            $path = 'storage/cover_pictures_local'; //
            if ($tmp->isValid()) { 
                //写入磁盘
                $FileType = $tmp->getClientOriginalExtension(); 
                $FilePath = $tmp->getRealPath(); 
                $FileName = date('Y-m-d') .'-'. uniqid() . '.' . $FileType; 
                $tempbool = Storage::disk('cover_pictures')->put($FileName, file_get_contents($FilePath)); 
                if(!$tempbool) return response()->fail(100,'添加失败',['error'=>'写入磁盘失败！']);
                $urlPath = $path . '/' . $FileName;
                //写入数据库
                $picture = new CoverPictures;
                $picture->cover_picture_url = $urlPath;
                if($picture->save()){
                    return response()->success(200,'添加成功',$picture);
                }else{
                    return response()->fail(100,'添加失败',null);
                }
            }
        }
    }
    public function destroy($id){
        $picture = CoverPictures::find($id);
        if(!$picture) return response()->fail(100,'未找到对应图片！',null);
        $url_array = explode("/", $picture->cover_picture_url);
        $fileName = $url_array[count($url_array)-1];
        $exists = Storage::disk('cover_pictures')->exists($fileName);
        if(!$exists){
            $picture->delete();
            return response()->fail(100,'图片已不存在！将从数据库中删除此数据！',null);
        } else{
            $pictureDisk = Storage::disk('cover_pictures');
            if(!$picture->delete()) return response()->fail(100,'从数据库中删除失败',null);
            if(!$pictureDisk->delete($fileName)) return response()->fail(100,'从磁盘中删除失败',null);
            return response()->success(200,'删除成功',null);
        }
    }
}
