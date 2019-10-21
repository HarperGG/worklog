<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;

use App\Http\Requests\Admin\Users\UserStoreRequest;
use App\Http\Requests\Admin\Users\UserUpdateRequest;
define("PERPAGENUMBER",10);
define("DEFAULTPASSWORD",123456);
define("SELECTEFIELDARRAY",['user_id','user_student_number','user_name','user_grade','user_major','user_permissions']);

class AdminUsers extends Controller
{
    public function index(){
        $users = Users::select(SELECTEFIELDARRAY)->paginate(PERPAGENUMBER);
        return response()->success(200,'成功',$users);
    }
    public function store(UserStoreRequest $request){
        $newUser = new Users;
        $newUser->user_student_number = $request->user_student_number;
        $newUser->user_name = $request->user_name;
        $newUser->user_grade = $request->user_grade;
        $newUser->user_major = $request->user_major;
        $newUser->user_password = bcrypt(DEFAULTPASSWORD);
        $newUser->user_permissions = $request->user_permissions;
        $saveRes = $newUser->save();
        if($saveRes){
            return response()->success(200,'添加成功',$newUser);
        }else{
            return response()->fail(100,'添加失败',null);
        }
    }
    public function show($id){
        //
        $user = Users::select(SELECTEFIELDARRAY)->where('user_id',$id)->first();
        if($user != null){
            return response()->success(200,'成功',$user);
        }else{
            return response()->fail(100,'失败',['errors'=>'未找到用户']);
        }
    }
    public function update(UserUpdateRequest $request, $id){
        $user = Users::find($id);
        $user->user_student_number = $request->user_student_number;
        $user->user_name = $request->user_name;
        $user->user_grade = $request->user_grade;
        $user->user_major = $request->user_major;
        $user->user_password = bcrypt($request->user_password);
        $user->user_permissions = $request->user_permissions;
        $saveRes = $user->save();
        if($saveRes){
            return response()->success(200,'修改成功',null);
        }else{
            return response()->fail(100,'修改失败',null);
        }
    }
    public function destroy($id){
        $delRes = Users::destroy($id);
        if(!$delRes){
            return response()->fail(100,'删除失败，未找到对应用户',null);
        }
        return response()->success(200,'删除成功',$delRes);
    }
    public function resetPassword($user_id){
        $updateRes = Users::where('user_id',$user_id)->update(['user_password'=>bcrypt(DEFAULTPASSWORD)]);
        if($updateRes){
            return response()->success(200,'修改成功',null);
        }else{
            return response()->fail(100,'修改失败',['errors'=>'不存在该用户']);
        }
    }

}
