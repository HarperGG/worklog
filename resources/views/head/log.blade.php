<!DOCTYPE html>
<html>

<head>
	<title>日志主页</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- 兼容移动设备 -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="format-detection" content="telephone=no">
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="Pragma" content="no-cache" />
	<!-- 让IE的文档渲染模式永远都是最新的 -->
	<meta http-equiv="X-UA-Compatible" content="IE=Edge，chrome=1">
	<meta http-equiv="Expires" content="0" />
	<link rel="icon" href="{{url('img/head/logo2.ico')}}" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="{{url('static/head/css/common.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('static/head/css/log.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('static/head/css/footer.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('static/head/css/goTop.css')}}">
</head>

<body>
	<!-- header菜单栏 -->
	<div class="header header-black">
		<ul class="menu" id="log-menu">
			<li class="item"><a class="item-hover" href="{{url('index')}}">网站首页</a></li>
			<li class="item "><a class="item-hover" href="{{url('learnPathList')}}">学习路线</a></li>
			<li class="item "><a class="item-hover" href="{{url('log')}}">日志主页</a></li>
		</ul>
		<ul class="header-unlogin clearfix">
			<li class="login">
				<img class="login-img" src="{{url('img/head/VIP1.png')}}" alt="登录">
				<a href="{{url('login')}}">登录</a>
			</li>
		</ul>
	</div>

	<!-- 标题头部 -->
	<div class="shizhan-title">
		<div class="shizhan-title-wrap">
			<div class="title-img">
				<a href="index.html"><img src="{{url('img/head/logo.png')}}" alt=""></a>
			</div>
			<div class="title-search">
				<div class="search">
					<input type="text" placeholder="搜索感兴趣的实战课程内容">
					<div class="submit"><i class="icon">&#xe63d;</i></div>
				</div>
			</div>
		</div>
	</div>

	<!--分类栏 -->
	<div class="shizhan-fenlei">
		<div class="shizhan-fenlei-wrap">
			<span>全部</span>
			<span>前端开发</span>
			<span>后端开发</span>
			<span>移动开发</span>
			<span>数据库</span>
			<span>云计算&大数据</span>
			<span>运维&测试</span>
			<span>UI设计</span>
			<span>人工智能</span>
		</div>
	</div>

	<!-- 详细分类 -->
	<div class="shizhan-menu">
		<div class="shizhan-menu-wrap">
			<span>不限</span>
			<span>HTML/CSS</span>
			<span>JavaScript</span>
			<span>Html5</span>
			<span>CSS3</span>
			<span>JQuery</span>
			<span>Node.js</span>
			<span>Angular</span>
			<span>ReactJS</span>
			<span>Vue.js</span>
			<span>WebApp</span>
			<span>前端工具</span>
			<span>ThinkPHP</span>
			<span>PHP</span>
			<span>Yii</span>
			<span>Java</span>
			<span>SpringBoot</span>
			<span>Python</span>
			<span>C++</span>
			<span>Go</span>
			<span>算法</span>
			<span>Android</span>
			<span>iOS</span>
			<span>MySQL</span>
			<span>MongoDB</span>
			<span>NoSql</span>
			<span>机器学习</span>
			<span>深度学习</span>
			<span>大数据</span>
			<span>测试</span>
			<span>Linux</span>
			<span>APPUI设计</span>
			<span>设计基础</span>
		</div>
	</div>

	<!--课程内容 -->
	<div class="shizhan-content">
		<div class="shizhan-content-wrap clearfix">
			<div class="course-card mr24">
				<div class="course-img">
					<img src="{{url('img/head/shizhan1.jpg')}}" alt="">
				</div>
				<p class="course-name">基于Python玩转人工智能最火框架TensorFlow应用实践</p>
				<p class="course-desc">机器学习入门，打牢TensorFlow框架应用是关键，深度学习TensorFlow</p>
			</div>
		</div>
		<!-- 分页 -->
		<div class="pagenation">
			<span>首页</span>
			<span>上一页</span>
			<span class="num page-select">1</span>
			<span class="num">2</span>
			<span class="num">3</span>
			<span class="num">4</span>
			<span class="num">5</span>
			<span class="num">6</span>
			<span class="num">7</span>
			<span>下一页</span>
			<span>尾页</span>
		</div>
	</div>


	<!-- footer -->
	<div class="footer">
		<p>© 2019 成都东软学院项目组 版权所有 网络文化经营许可证：川网文[2019]0000-000号</p>
	</div>

	<!-- GotoTop -->
  <div class="gotoTop">
    <a href="{{url('logEdit')}}" class="gotoTop-bar">
      <img src="{{url('img/head/circle-add.png')}}" alt="">
      <span>添加日志</span>
    </a>
    <a href="" class="gotoTop-bar">
      <img src="{{url('img/head/circle-location.png')}}" alt="">
      <span>官方微博</span>
    </a>
    <a href="" class="gotoTop-name">
      <img src="{{url('img/head/circle-message.png')}}" alt="">
      <span>公众号</span>
      <div class="gotoTop-gzh"></div>
    </a>
    <a id="goTop" href="#header" class="gotoTop-bar">
      <img src="{{url('img/head/circle-arrow-up.png')}}" alt="">
      <span>返回顶部</span>
    </a>
  </div>
	<script type="text/javascript" src="{{url('static/head/js/jquery-3.2.0.min.js')}}"></script>
	<script type="text/javascript" src="{{url('static/head/js/common.js')}}"></script>
	<script type="text/javascript" src="{{url('static/head/js/log.js')}}"></script>
</body>

</html>