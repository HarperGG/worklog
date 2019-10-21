/*
 * @Description: 
 * @Autor: YangZeMiao
 * @Date: 2019-10-21 12:54:02
 * @LastEditors: YangZeMiao
 * @LastEditTime: 2019-10-21 15:31:30
 */
layui.config({
	base: '../../static/admin/js/module/'
}).extend({
	dialog: 'dialog',
});

layui.use(['form', 'jquery', 'laydate', 'layer', 'laypage', 'dialog', 'element'], function () {
	var form = layui.form(),
		layer = layui.layer,
		$ = layui.jquery,
		dialog = layui.dialog;
	//获取当前iframe的name值
	var iframeObj = $(window.frameElement).attr('name');
	//全选
	form.on('checkbox(allChoose)', function (data) {
		var child = $(data.elem).parents('table').find('tbody input[type="checkbox"]');
		child.each(function (index, item) {
			item.checked = data.elem.checked;
		});
		form.render('checkbox');
	});
	//渲染表单
	form.render();
	//列表添加
	$('#table-list').on('click', '.member-add-btn', function () {
		var url = $(this).attr('data-url');
		//将iframeObj传递给父级窗口
		parent.page("成员添加", url, iframeObj, w = "400px", h = "400px");
		return false;
	})
	$('#table-list').on('click', '.classification-add-btn', function () {
		var url = $(this).attr('data-url');
		//将iframeObj传递给父级窗口
		parent.page("学习分类添加", url, iframeObj, w = "300px", h = "300px");
		return false;
	})
	$('#table-list').on('click', '.linksetting-add-btn', function () {
		var url = $(this).attr('data-url');
		//将iframeObj传递给父级窗口
		parent.page("友联添加", url, iframeObj, w = "300px", h = "300px");
		return false;
	})
	$('#table-list').on('click', '.carousel-add-btn', function () {
		var url = $(this).attr('data-url');
		//将iframeObj传递给父级窗口
		parent.page("轮播图添加", url, iframeObj, w = "500px", h = "500px");
		return false;
	})
	$('#table-list').on('click', '.navigation-add-btn', function () {
		var url = $(this).attr('data-url');
		//将iframeObj传递给父级窗口
		parent.page("导航栏添加", url, iframeObj, w = "300px", h = "300px");
		return false;
	})
	$('#table-list').on('click', '.path-add-btn', function () {
	location.href ="path_add"
	})

	//列表删除
	$('#table-list').on('click', '.del-btn', function () {
		var url = $(this).attr('data-url');
		var id = $(this).attr('data-id');
		dialog.confirm({
			message: '您确定要进行删除吗？',
			success: function () {
				layer.msg('确定了')
			},
			cancel: function () {
				layer.msg('取消了')
			}
		})
		return false;
	})
	//编辑栏目
	$('#table-list').on('click', '.member-edit-btn', function () {
		var That = $(this);
		var id = That.attr('data-id');
		var url = That.attr('data-url');
		//将iframeObj传递给父级窗口
		parent.page("成员编辑", url + "?id=" + id, iframeObj, w = "400px", h = "400px");
		return false;
	})
	$('#table-list').on('click', '.linksetting-edit-btn', function () {
		var That = $(this);
		var id = That.attr('data-id');
		var url = That.attr('data-url');
		//将iframeObj传递给父级窗口
		parent.page("友联编辑", url + "?id=" + id, iframeObj, w = "300px", h = "300px");
		return false;
	})
	$('#table-list').on('click', '.navigation-edit-btn', function () {
		var That = $(this);
		var id = That.attr('data-id');
		var url = That.attr('data-url');
		//将iframeObj传递给父级窗口
		parent.page("导航栏编辑", url + "?id=" + id, iframeObj, w = "300px", h = "300px");
		return false;
	})
	$('#table-list').on('click', '.path-edit-btn', function () {
		var That = $(this);
		var id = That.attr('data-id');
		var url = That.attr('data-url');
		//将iframeObj传递给父级窗口
		parent.page("导航栏编辑", url + "?id=" + id, iframeObj, w = "300px", h = "300px");
		return false;
	})
	//重置按钮
	$('#table-list').on('click', '.member-reset-btn', function () {
		layer.msg('该用户密码已重置为初始密码：123456');
	})
});

/**
 * 控制iframe窗口的刷新操作
 */
var iframeObjName;

//父级弹出页面
function page(title, url, obj, w, h) {
	if (title == null || title == '') {
		title = false;
	};
	if (url == null || url == '') {
		url = "404.html";
	};
	if (w == null || w == '') {
		w = '700px';
	};
	if (h == null || h == '') {
		h = '350px';
	};
	iframeObjName = obj;
	//如果手机端，全屏显示
	if (window.innerWidth <= 768) {
		var index = layer.open({
			type: 2,
			title: title,
			area: [320, h],
			fixed: false, //不固定
			content: url
		});
		layer.full(index);
	} else {
		var index = layer.open({
			type: 2,
			title: title,
			area: [w, h],
			fixed: false, //不固定
			content: url
		});
	}
}

/**
 * 刷新子页,关闭弹窗
 */
function refresh() {
	//根据传递的name值，获取子iframe窗口，执行刷新
	if (window.frames[iframeObjName]) {
		window.frames[iframeObjName].location.reload();
	} else {
		window.location.reload();
	}

	layer.closeAll();
}