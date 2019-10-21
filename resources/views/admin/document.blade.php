<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>文档管理</title>
    <link rel="stylesheet" type="text/css" href="{{url('static/admin/layui/css/layui.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('static/admin/css/admin.css')}}" />
    <script src="{{url('static/admin/layui/layui.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{url('static/admin/js/common.js')}}" type="text/javascript" charset="utf-8"></script>
</head>

<body>
    <div class="page-content-wrap">
        <form class="layui-form" action="">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <input type="text" name="title" placeholder="请输入标题" autocomplete="off" class="layui-input input-title">
                </div>
                <button class="layui-btn layui-btn-normal" lay-submit="search">搜索</button>
            </div>
        </form>
        <div class="layui-form" id="table-list">
            <table class="layui-table" lay-skin="line">
                <colgroup>
                    <col width="220">
                    <col width="220">
                    <col width="220">
                    <col width="220">
                    <col width="220">
                    <col width="220">
                    <col width="300">
                </colgroup>
                <thead>
                    <tr>
                        <th>文档名称</th>
                        <th>类别</th>
                        <th>提交时间</th>
                        <th>作者</th>
                        <th>文章可见(状态)</th>
                        <th>置顶</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id='node-1' class="parent collapsed">
                        <td class="hidden-xs">IDEA的8种错误</td>
                        <td class="hidden-xs">2019-12-14</td>
                        <td class="hidden-xs">xxxx</td>
                        <td>20xx级</td>
                        <td>
                            <div class="layui-form" action="">
                                <div class="layui-form-item">
                                    <input type="checkbox" name="switch" lay-skin="switch">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="layui-form" action="">
                                <div class="layui-form-item">
                                    <input type="checkbox" name="switch" lay-skin="switch">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="layui-inline">
                                <button class="layui-btn layui-btn-mini layui-btn-danger del-btn" data-id="1"><i class="layui-icon">&#xe640;</i>删除</button>
                            </div>
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