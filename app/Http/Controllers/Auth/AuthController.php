<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginPostRequest;
use App\Http\Requests\Auth\ModifyPasswordPostRequest;
use Faker\Provider\Uuid;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;

const ADMIN_URL = '/admin';
const USER_URL = '/';

class AuthController extends Controller
{
    /**
     * 用户登录
     * @param LoginPostRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginPostRequest $requerst)
    {
        try {
            $credentials = $this->credentials($requerst);
            if (Auth::guard('web')->attempt($credentials, false)) {
                if ($this->writeUuid(Auth::user()->user_id, $this->createUuid())) {
                    return response()->success(200, '登陆成功', $this->backUrl(Auth::user()->user_permissions));
                }
            } else {
                return response()->fail(100, '用户名或密码错误', null);
            }
        } catch (\Exception $ex) {
            return response()->fail(100, '服务器错误', null, 500);
        }
    }
    /**
     * 修改密码
     * @param ModifyPasswordPostRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function modifyPassword(ModifyPasswordPostRequest $requerst)
    {
        try {
            $isUpdate = Users::where('user_id', Auth::user()->user_id)->update([
                'user_password' => bcrypt($requerst->new_password),
            ]);
            if ($isUpdate) {
                return response()->success(200, '修改密码成功', null);
            } else {
                return response()->fail(100, '修改密码失败', null);
            }
        } catch (\Exception $ex) {
            return response()->fail(100, '服务器错误', null, 500);
        }
    }

    /**
     * 
     *  用户退出登陆
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        try {
            Auth::guard('web')->logout();
            if (Auth::guard('web')->check()) {
                return response()->fail(100, '退出登陆失败', null);
            } else {
                return response()->success(200, '成功退出登陆', null);
            }
        } catch (\Exception $ex) {
            return response()->fail(100, '服务器错误', null, 500);
        }
    }


    /**
     * 生成用户凭证
     * @param $request
     * @return array
     */
    protected function credentials($request)
    {
        return ['user_student_number' => $request['user_number'], 'password' => $request['user_password']];
    }

    /**
     * 获取返回跳转url
     * @param $user_permissions
     * @return array
     */
    protected function backUrl($user_permissions)
    {
        if ($user_permissions == 0) {
            return ['url' => ADMIN_URL];
        }
        return ['url' => USER_URL];
    }

    /**
     * 生成uuid
     * @param null
     * @return string
     */
    protected function createUuid()
    {
        return Uuid::uuid();
    }

    /**
     * 写入登陆标识
     * @param $user_id,$uuid
     * @return int
     */
    protected function writeUuid($user_id, $uuid)
    {
        session(['remember_token' => $uuid]);
        return Users::where('user_id', $user_id)->update([
            'user_token' => $uuid,
        ]);
    }
}
