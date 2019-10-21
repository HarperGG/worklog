<?php

namespace App\Http\Controllers\Aliyun;

use App\Http\Controllers\Controller;
use App\Http\Requests\Aliyun\CreateUploadVideoPostRequest;
use App\Http\Requests\Aliyun\VideoIdPostRequest;
use Wangjian\Alivod\AliyunVod;

class VideoController extends Controller
{
    protected $aliyunvod;

    public function __construct()
    {
        $key = json_decode(file_get_contents(config_path('aliyun.config')));
        $this->aliyunvod = new AliyunVod($key->system_accessKeyId, $key->system_accessKeySecret);
    }



    /**
     * 创建上传视频
     * @param CreateUploadVideoPostRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createUploadVideo(CreateUploadVideoPostRequest $request)
    {
        try {
            $certificate = $this->aliyunvod->createUploadVideo($request->video_title, $request->video_file_name, '', '');
            if (isset($certificate['errCode'])) {
                return response()->success(100, '获取失败', null);
            } else {
                return response()->success(200, '获取成功', $certificate);
            }
        } catch (\Exception $ex) {
            return response()->fail(100, '服务器错误', null, 500);
        }
    }


    /**
     * 刷新上传视频凭证
     * @param VideoIdPostRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function refreshUploadVideo(VideoIdPostRequest $request)
    {
        try {
            $certificate = $this->aliyunvod->refreshUploadVideo($request->video_id);
            if (isset($certificate['errCode'])) {
                return response()->success(100, '获取失败', null);
            } else {
                return response()->success(200, '获取成功', $certificate);
            }
        } catch (\Exception $ex) {
            return response()->fail(100, '服务器错误', null, 500);
        }
    }


    /**
     * 获取播放凭证
     * @param VideoIdPostRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getVideoPlayAuth(VideoIdPostRequest $request)
    {
        try {
            $certificate = $this->aliyunvod->getVideoPlayAuth($request->video_id);
            if (isset($certificate['errCode'])) {
                return response()->success(100, '获取失败', null);
            } else {
                return response()->success(200, '获取成功', $certificate);
            }
        } catch (\Exception $ex) {
            return response()->fail(100, '服务器错误', null, 500);
        }
    }


    /**
     * 删除视频
     * @param VideoIdPostRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteVideo(VideoIdPostRequest $request)
    {
        try {
            $isDelete = $this->aliyunvod->deleteVideo($request->video_id);
            if (isset($isDelete['errCode'])) {
                return response()->success(100, '删除失败', null);
            } else {
                return response()->success(200, '删除成功', $isDelete);
            }
        } catch (\Exception $ex) {
            return response()->fail(100, '服务器错误', null, 500);
        }
    }
}
