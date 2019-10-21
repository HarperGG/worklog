<!DOCTYPE html>
<html class="iframe-h">

<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>系统设置</title>
    <link rel="stylesheet" type="text/css" href="{{url('static/admin/layui/css/layui.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('static/admin/css/admin.css')}}" />
    <script src="{{url('static/admin/layui/layui.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{url('static/admin/js/common.js')}}" type="text/javascript" charset="utf-8"></script>
</head>

<body class="iframe-h">
    <div class="wrap-container email-wrap clearfix">
        <div class="row system-row">
            <div class="col-lg-10">
                <div class="email-content">
                    <form class="layui-form system-content" style="width: 90%;padding-top: 20px;">
                        <div class="layui-form-item">
                            <label class="layui-form-label system-label">备案：</label>
                            <div class="layui-input-block system-input">
                                <input type="text" name="title" required lay-verify="required" placeholder="请输入备案" autocomplete="off" class="layui-input">
                            </div>

                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label system-label">KeyId：</label>
                            <div class="layui-input-block system-input">
                                <input type="text" name="title" required lay-verify="required" placeholder="请输入AccessKeyId" autocomplete="off" class="layui-input">
                            </div>
       
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label system-label">KeySecret：</label>
                            <div class="layui-input-block system-input">
                                <input type="text" name="title" required lay-verify="required" placeholder="请输入AccessKeySecret" autocomplete="off" class="layui-input">
                            </div>

                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label system-label">微信二维码：</label>
                            <div class="layui-input-block system-input">
                                <div>
                                    <img class="system-img" src="{{url('img/admin/QRcode.png')}}" />
                                </div>
                                <button type="button" class="layui-btn layui-btn-normal system-upload">上传图片</button>
                            </div>

                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label system-label">页脚：</label>
                            <div class="layui-input-block system-input">
                                <input type="text" name="title" required lay-verify="required" placeholder="请输入页脚" autocomplete="off" class="layui-input">
                            </div>

                        </div>
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button class="layui-btn layui-btn-normal system-sub-btn" lay-submit lay-filter="formDemo">提 交</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        //Demo
        layui.use(['form'], function() {
            var form = layui.form();
            form.render();
            //监听提交
            form.on('submit(formDemo)', function(data) {
                layer.msg(JSON.stringify(data.field));
                return false;
            });
        });
    </script>
</body>

</html>