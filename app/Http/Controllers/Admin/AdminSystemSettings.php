<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SystemSettings;

use App\Http\Requests\Admin\SystemSettings\SystemSettingStoreRequest;

class AdminSystemSettings extends Controller
{
    public function index(){
        return response()->success(200,'成功',SystemSettings::find(1));
    }
    public function update(SystemSettingStoreRequest $request, $id){
        $systemSetting = SystemSettings::find(1);
        $systemSetting->system_setting_site_record_info = $request->system_setting_site_record_info;
        $systemSetting->system_setting_other = $request->system_setting_other;
        $systemSetting->system_setting_wx_qrcode = $request->system_setting_wx_qrcode;
        try{
            //磁盘操作
            $obj =json_decode(file_get_contents(config_path('aliyun.config')));
            $obj->system_accessKeyId=$request->system_access_key_id;
            $obj->system_accessKeySecret=$request->system_access_key_secret;
            file_put_contents(config_path('aliyun.config'),json_encode($obj));
        }catch(\Exception $e){
            return response()->success(100,'修改失败',null);
        }

        if($systemSetting->save()){
            $systemSetting->system_access_key_id = $request->system_access_key_id;
            $systemSetting->system_access_key_secret = $request->system_access_key_secret;
            return response()->success(200,'修改成功',$systemSetting);
        }else{
            return response()->success(100,'修改失败',null);
        }
    }
}
