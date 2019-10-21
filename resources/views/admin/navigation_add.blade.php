<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>成员管理添加</title>
		<link rel="stylesheet" type="text/css" href="{{url('static/admin/layui/css/layui.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{url('static/admin/css/admin.css')}}" />
		<script src="{{url('static/admin/layui/layui.js')}}" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<div class="wrap-container">
			<form class="layui-form" style="width: 90%;padding-top: 20px;">
					<div class="layui-form-item">
						<label class="layui-form-label">名称：</label>
						<div class="layui-input-block">
							<input type="text" name="title" required lay-verify="required" placeholder="请输入名称" autocomplete="off" class="layui-input">
						</div>

					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">URL：</label>
						<div class="layui-input-block">
							<input type="text" name="title" required lay-verify="required" placeholder="请输入URL" autocomplete="off" class="layui-input">
						</div>

					</div>
					<div class="layui-form-item">
						<div class="layui-input-block">
							<button class="layui-btn layui-btn-normal linksetting-subBtn" lay-submit lay-filter="formDemo">提 交</button>
						</div>
					</div>
				</form>
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