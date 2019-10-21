<!DOCTYPE html>
<html class="iframe-h">

<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>封面图片库管理</title>
    <link rel="stylesheet" type="text/css" href="{{url('static/admin/layui/css/layui.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('static/admin/css/admin.css')}}" />
    <script src="{{url('static/admin/layui/layui.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{url('static/admin/js/common.js')}}" type="text/javascript" charset="utf-8"></script>
</head>

<body class="iframe-h">
    <div class="layui-form email-list" id="table-list">
    <table class="layui-table" lay-even lay-skin="line">
        <colgroup>
            <col width="300">
            <col>
            <col width="80">
            <col class="hidden-xs" width="250">
        </colgroup>
        <thead>
            <tr>
                <th class="hidden-xs">缩略图</th>
                <th></th>
                <th><button type="button" class="layui-btn layui-btn-normal" data-id="1">上传</button></th>
                <th class="hidden-xs">批量删除</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="hidden-xs">
                    <img class="cover-img" src="{{url('img/admin/项目组logo.png')}}" />
                </td>
                <td></td>
                <td></td>
                <td>
                    <div class="layui-form" action="">
                        <div class="layui-form-item">
                            <button type="button" class="layui-btn layui-btn-danger">删除</button>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <div id="email-page" style="text-align: center;"></div>
    </div>
        
    <script>
        layui.use(['form', 'laypage', 'jquery', 'layer'], function() {
            var form = layui.form(),
                layer = layui.layer,
                laypage = layui.laypage,
                $ = layui.jquery;
            //分页
            laypage({
                cont: 'email-page',
                pages: 10,
                skin: '#1E9FFF'
            });
            form.on('checkbox(emailAllChoose)', function(data) {
                var child = $(data.elem).parents('table').find('tbody input[type="checkbox"]');
                child.each(function(index, item) {
                    item.checked = data.elem.checked;
                });
                form.render('checkbox');
            });

            form.render();
        });
    </script>
</body>

</html>