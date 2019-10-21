<!DOCTYPE html>
<html>

<head>
  <title>工作日志详情页</title>
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
  <link rel="stylesheet" type="text/css" href="{{url('static/head/css/logDetails.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('static/head/css/footer.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('static/head/css/goTop.css')}}">
</head>

<body>
  <!-- header菜单栏 -->
  <div id="header" class="header header-white">
    <a class="home" href="{{url('index')}}" title="慕课网">
      <img src="{{url('img/head/logo.png')}}" alt="">
    </a>
    <ul class="menu">
			<li class="item"><a class="item-hover" href="{{url('index')}}">网站首页</a></li>
			<li class="item "><a class="item-hover" href="{{url('learnPathList')}}">学习路线</a></li>
			<li class="item "><a class="item-hover" href="{{url('log')}}">日志主页</a></li>
    </ul>
    <ul class="header-unlogin clearfix">
      <li class="login">
        <img class="login-img" src="{{url('img/head/VIP.png')}}" alt="登录">
        <a href="{{url('login')}}">登录</a>
      </li>
    </ul>
    <div class="search-area">
      <input placeholder="请输入想要的搜索内容..." class="search-input" type="text">
      <div class="search-btn"><i class="icon icon-search">&#xe63d;</i></div>
    </div>

  </div>
  <!-- 标题栏 -->
  <div class="top-title">
    <div class="top-content">
      <div class="top-content-name">
        <img src="{{url('img/head/logContent.png')}}" alt="">
        <span>个人日志详情</span>
        <span>管理查看个人日志。</span>
      </div>

      <div class="top-content-title">
        <p>Linux核心技能与应用</p>
        <p>Linux核心技能与应用</p>
      </div>
    </div>
  </div>
  <!-- 详情框 -->
  <div class="content">
    <div class="content-info">
      <div class="content-info-title">路线详情</div>
      <div class="content-info-main"></div>
      <div class="content-info-video">
        <span>相关视频</span>
        <div></div>
      </div>
    </div>
  </div>

  <!-- footer -->
  <div class="footer">
    <p>© 2019 成都东软学院项目组 版权所有 网络文化经营许可证：川网文[2019]0000-000号</p>
  </div>

  <!-- GotoTop -->
  <div class="gotoTop">
    <a href="" class="gotoTop-bar">
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
</body>

</html>