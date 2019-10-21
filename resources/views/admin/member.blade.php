<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>成员管理</title>
    <link rel="stylesheet" type="text/css" href="{{url('static/admin/layui/css/layui.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('static/admin/css/admin.css')}}" />
    <script src="{{url('static/admin/layui/layui.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{url('static/admin/js/common.js')}}" type="text/javascript" charset="utf-8"></script>
</head>

<body>
    <div class="page-content-wrap">
        <div class="layui-form" id="table-list">
            <button type="button" class="layui-btn member-add-btn" data-id="1" data-url="{{url('admin/member_add')}}">增 加</button>
            <table class="layui-table" lay-skin="line">
                <colgroup>
                    <col width="220">
                    <col width="220">
                    <col width="220">
                    <col width="220">
                    <col width="220">
                    <col width="300">
                </colgroup>
                <thead>
                    <tr>
                        <th>姓名</th>
                        <th>账号</th>
                        <th>专业</th>
                        <th>年级</th>
                        <th>权限</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id='node-1' class="parent collapsed">
                        <td class="hidden-xs">XLF</td>
                        <td class="hidden-xs">17310920</td>
                        <td class="hidden-xs">xx工程</td>
                        <td>20xx级</td>
                        <td><button class="layui-btn layui-btn-mini layui-btn-normal table-list-status" data-status='1'>可读</button></td>
                        <td>
                            <div class="layui-inline">
                                <button class="layui-btn layui-btn-mini layui-btn-normal  member-edit-btn" data-id="1" data-url="{{url('admin/member_add')}}"><i class="layui-icon">&#xe642;</i>修改</button>
                                <button class="layui-btn layui-btn-mini layui-btn-danger del-btn" data-id="1"><i class="layui-icon">&#xe640;</i>删除</button>
                                <button class="layui-btn layui-btn-mini layui-btn-warm member-reset-btn" data-id="1">重置密码</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        layui.use(['jquery'], function() {
            var $ = layui.jquery;
            //修改状态
            $('#table-list').on('click', '.table-list-status', function() {
                var That = $(this);
                var status = That.attr('data-status');
                var id = That.parent().attr('data-id');
                if (status == 1) {
                    That.removeClass('layui-btn-normal').addClass('layui-btn').html('可读可写').attr('data-status', 2);
                } else if (status == 2) {
                    That.removeClass('layui-btn-warm').addClass('layui-btn-normal').html('可读').attr('data-status', 1);

                }
            })
        });
    </script>
</body>

</html>