<?php

namespace App\Http\Controllers\Aliyun;

use App\Http\Controllers\Controller;
use App\Models\SystemSettings;
use Wangjian\Alivod\AliyunVod;

class VideoController extends Controller
{
    protected $aliyunvod;

    public function __construct() {
        $key = json_decode(file_get_contents(config_path('aliyun.config')));
        $this->aliyunvod = new AliyunVod($key->system_accessKeyId,$key->system_accessKeySecret);
    }
    /**
     * 创建上传视频
     * 
     */
    public function createUploadVideo(){
        $this->aliyunvod->createUploadVideo('标题','1.mp4','','');
    }
    public function refreshUploadVideo(){

    }
    public function getVideoPlayAuth(){

    }
    public function deleteVideo(){

    }
}
