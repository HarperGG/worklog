<!DOCTYPE html>
<html  class="iframe-h">
	<head>
		<meta charset="UTF-8">
		<meta name="renderer" content="webkit">
  		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>学习分类管理</title>
		<link rel="stylesheet" type="text/css" href="{{url('static/admin/layui/css/layui.css')}}"/>
		<link rel="stylesheet" type="text/css" href="{{url('static/admin/css/admin.css')}}"/>
		<script src="{{url('static/admin/layui/layui.js')}}" type="text/javascript" charset="utf-8"></script>
		<script src="{{url('static/admin/js/common.js')}}" type="text/javascript" charset="utf-8"></script>
	</head>
	<body  class="iframe-h">
	<div class="layui-form email-list" id="table-list">
		<button type="button" class="layui-btn classification-add-btn" data-id="1" data-url="{{url('admin/classification_add')}}">增 加</button>
		<table class="layui-table" lay-even lay-skin="line">
			<colgroup>
				<col width="200">
				<col>
				<col class="hidden-xs" width="150">
			</colgroup>
			<thead>
				<tr>
					<th class="hidden-xs">大类</th>
					<th>小类</th>
					<th class="hidden-xs">操作</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="hidden-xs">前沿</td>
					<td><a href="javascript:;">区块链</a></td>
					<td class="hidden-xs">
						<button class="layui-btn layui-btn-mini layui-btn-danger del-btn" data-id="1"><i class="layui-icon">&#xe640;</i>删除</button>
					</td>
				</tr>
				<tr>
					<td class="hidden-xs">前沿</td>
					<td><a href="javascript:;">人工智能</a></td>
					<td class="hidden-xs">
						<button class="layui-btn layui-btn-mini layui-btn-danger del-btn" data-id="1"><i class="layui-icon">&#xe640;</i>删除</button>
					</td>
				</tr>
				<tr>
					<td class="hidden-xs">前沿</td>
					<td><a href="javascript:;">机器学习</a></td>
					<td class="hidden-xs">
						<button class="layui-btn layui-btn-mini layui-btn-danger del-btn" data-id="1"><i class="layui-icon">&#xe640;</i>删除</button>
					</td>
				</tr>
				<tr>
					<td class="hidden-xs">前沿</td>
					<td><a href="javascript:;">深度学习</a></td>
					<td class="hidden-xs">
						<button class="layui-btn layui-btn-mini layui-btn-danger del-btn" data-id="1"><i class="layui-icon">&#xe640;</i>删除</button>
					</td>
				</tr>
				<tr>
					<td class="hidden-xs">前沿</td>
					<td><a href="javascript:;">数据挖掘</a></td>
					<td class="hidden-xs">
						<button class="layui-btn layui-btn-mini layui-btn-danger del-btn" data-id="1"><i class="layui-icon">&#xe640;</i>删除</button>
					</td>
				</tr>
				<tr>
					<td class="hidden-xs">前端</td>
					<td><a href="javascript:;">CSS</a></td>
					<td class="hidden-xs">
						<button class="layui-btn layui-btn-mini layui-btn-danger del-btn" data-id="1"><i class="layui-icon">&#xe640;</i>删除</button>
					</td>
				</tr>
				<tr>
					<td class="hidden-xs">前端</td>
					<td><a href="javascript:;">JS</a></td>
					<td class="hidden-xs">
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