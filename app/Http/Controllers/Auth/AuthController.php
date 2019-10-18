<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginPostRequest;

class AuthController extends Controller
{
    public function login(LoginPostRequest $requerst){
        $credentials = $this->credentials($requerst);
        if (Auth::guard('web')->attempt($credentials, false)) {
            return response()->success(200,'登陆成功',null);
        } else {
            return response()->file(100,'用户名或密码错误',null);
        }
    }
    public function modifyPassword(){

    }


    /**
     * 生成用户凭证
     * @param $request
     * @return array
     */
    protected function credentials($request)
    {
        return ['user_student_number' => $request['user_student_number'], 'password' => $request['user_password']];
    }
}
