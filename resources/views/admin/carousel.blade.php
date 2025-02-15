<!DOCTYPE html>
<html  class="iframe-h">
	<head>
		<meta charset="UTF-8">
		<meta name="renderer" content="webkit">
  		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>轮播图设置</title>
		<link rel="stylesheet" type="text/css" href="{{url('static/admin/layui/css/layui.css')}}"/>
		<link rel="stylesheet" type="text/css" href="{{url('static/admin/css/admin.css')}}"/>
		<script src="{{url('static/admin/layui/layui.js')}}" type="text/javascript" charset="utf-8"></script>
		<script src="{{url('static/admin/js/common.js')}}" type="text/javascript" charset="utf-8"></script>
	</head>
	<body  class="iframe-h">
	<div class="layui-form email-list" id="table-list">
		<button type="button" class="layui-btn carousel-add-btn" data-id="1" data-url="{{url('admin/carousel_add')}}">增 加</button>
		<table class="layui-table" lay-even lay-skin="line">
			<colgroup>
				<col width="200">
				<col>
				<col class="hidden-xs" width="300">
			</colgroup>
			<thead>
				<tr>
					<th class="hidden-xs">图片</th>
					<th>链接URL</th>
					<th class="hidden-xs">操作</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="hidden-xs url">
						<img class="cover-img" src="{{url('img/admin/项目组logo.png')}}" />
					</td>
					<td><a href="javascript:;">www.bilibili.com</a></td>
					<td class="hidden-xs">
						<button class="layui-btn layui-btn-mini layui-btn-danger del-btn" data-id="1"><i class="layui-icon">&#xe640;</i>删除</button>
					</td>
				</tr>
			</tbody>
		</table>
		<div id="email-page" style="text-align: center;"></div>
	</div>
	<script>
		layui.use(['form', 'laypage', 'jquery','layer'], function() {
				var form = layui.form(),
					layer = layui.layer,
					laypage = layui.laypage,
					$ = layui.jquery;
				//分页
				laypage({
				    cont: 'email-page'
				    ,pages: 10
				    ,skin: '#1E9FFF'
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