<!DOCTYPE html>
<html  class="iframe-h">
	<head>
		<meta charset="UTF-8">
		<meta name="renderer" content="webkit">
  		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>导航栏设置</title>
		<link rel="stylesheet" type="text/css" href="{{url('static/admin/layui/css/layui.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{url('static/admin/css/admin.css')}}" />
		<script src="{{url('static/admin/layui/layui.js')}}" type="text/javascript" charset="utf-8"></script>
		<script src="{{url('static/admin/js/common.js')}}" type="text/javascript" charset="utf-8"></script>
	</head>
	<body  class="iframe-h">
	<div class="layui-form email-list" id="table-list">
		<button type="button" class="layui-btn navigation-add-btn" data-id="1" data-url="{{url('admin/navigation_add')}}">增 加</button>
		<table class="layui-table" lay-even lay-skin="line">
			<colgroup>
				<col width="200">
				<col>
				<col class="hidden-xs" width="150">
			</colgroup>
			<thead>
				<tr>
					<th class="hidden-xs">名称</th>
					<th>URL</th>
					<th class="hidden-xs">操作</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="hidden-xs">通知</td>
					<td><a href="javascript:;"></a>http://127.0.0.1:8000/admin</td>
					<td class="hidden-xs">
						<button class="layui-btn layui-btn-mini layui-btn-normal navigation-edit-btn" data-id="1" data-url="{{url('admin/navigation_add')}}"><i class="layui-icon">&#xe642;</i>修改</button>
						<button class="layui-btn layui-btn-mini layui-btn-danger del-btn" data-id="1"><i class="layui-icon">&#xe640;</i>删除</button>
					</td>
				</tr>
				<tr>
					<td class="hidden-xs">关于我们</td>
					<td><a href="javascript:;"></a>http://127.0.0.1:8000/admin</td>
					<td class="hidden-xs">
						<button class="layui-btn layui-btn-mini layui-btn-normal navigation-edit-btn" data-id="1" data-url="{{url('admin/navigation_add')}}"><i class="layui-icon">&#xe642;</i>修改</button>
						<button class="layui-btn layui-btn-mini layui-btn-danger del-btn" data-id="1"><i class="layui-icon">&#xe640;</i>删除</button>
					</td>
				</tr>
				<tr>
					<td class="hidden-xs">模板设置</td>
					<td><a href="javascript:;"></a>http://127.0.0.1:8000/admin</td>
					<td class="hidden-xs">
						<button class="layui-btn layui-btn-mini layui-btn-normal navigation-edit-btn" data-id="1" data-url="{{url('admin/navigation_add')}}"><i class="layui-icon">&#xe642;</i>修改</button>
						<button class="layui-btn layui-btn-mini layui-btn-danger del-btn" data-id="1"><i class="layui-icon">&#xe640;</i>删除</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<script>
		layui.use(['form', 'laypage', 'jquery','layer'], function() {
				var form = layui.form(),
					$ = layui.jquery;
				form.render();
			});
	</script>
</body>
</html>