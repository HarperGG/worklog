<!DOCTYPE html>
<html  class="iframe-h">
	<head>
		<meta charset="UTF-8">
		<meta name="renderer" content="webkit">
  		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>上传日志</title>
		<link rel="stylesheet" type="text/css" href="{{url('static/admin/layui/css/layui.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{url('static/admin/css/admin.css')}}" />
		<script src="{{url('static/admin/layui/layui.js')}}" type="text/javascript" charset="utf-8"></script>
		<script src="{{url('static/admin/js/common.js')}}" type="text/javascript" charset="utf-8"></script>
	</head>
	<body  class="iframe-h">
	<div class="wrap-container email-wrap clearfix">
		<div class="row">
			<div class="col-lg-10">
				<div class="email-content">
					<div class="layui-form email-list" id="table-list">
						<table class="layui-table" lay-even lay-skin="nob">
							<colgroup>
								<col width="200">
								<col>
								<col class="hidden-xs" width="150">
							</colgroup>
							<thead>
								<tr>
									<th class="hidden-xs">用户</th>
									<th>上传次数</th>
									<th class="hidden-xs">最后一次上传时间</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="hidden-xs">XLF</td>
									<td><a href="javascript:;">01</a></td>
									<td><a href="javascript:;">2019-12-14</a></td>
								</tr>
							</tbody>
						</table>
						<div id="email-page" style="text-align: center;"></div>
					</div>
				</div>
			</div>
		</div>
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