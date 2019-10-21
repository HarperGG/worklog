<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>学习路线管理</title>
    <link rel="stylesheet" type="text/css" href="{{url('static/admin/layui/css/layui.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('static/admin/css/admin.css')}}" />
    <script src="{{url('static/admin/layui/layui.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{url('static/admin/js/common.js')}}" type="text/javascript" charset="utf-8"></script>
</head>
<body>
    <div class="page-content-wrap">
        <form class="layui-form" action="">
            <div class="layui-form-item path-select">
                <label class="layui-form-label link-select">分类：</label>
                <div class="layui-form layui-input-block" action="">
                    <div class="layui-form-item">
                        <select name="type" lay-verify="required">
                            <option value="">请选择一个分类</option>
                            <option value="010">前端</option>
                            <option value="010">后端</option>
                            </select>    
                        </div>
                </div>
            </div>
        </form>
        <div class="layui-form" id="table-list">
        <button type="button" class="layui-btn path-add-btn" data-id="1">增 加</button>
            <table class="layui-table" lay-skin="line">
                <colgroup>
                    <col width="300">
                    <col width="300">
                    <col>
                    <col class="hidden-xs" width="200">
                </colgroup>
                <thead>
                    <tr>
                        <th class="hidden-xs">名称</th>
                        <th>分类</th>
                        <th>时间</th>
                        <th class="hidden-xs">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="hidden-xs">哔哩哔哩</td>
                        <td><a href="javascript:;">前端</a></td>
                        <td><a href="javascript:;">www.bilibili.com</a></td>
                        <td class="hidden-xs">
                        <button class="layui-btn layui-btn-mini layui-btn-normal path-edit-btn" data-id="1" data-url="{{url('admin/path_add')}}"><i class="layui-icon">&#xe642;</i>修改</button>
                            <button class="layui-btn layui-btn-mini layui-btn-danger del-btn" data-id="1"><i class="layui-icon">&#xe640;</i>删除</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div id="email-page" style="text-align: center;"></div>
        </div>
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