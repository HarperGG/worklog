<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>登录</title>
  <link rel="stylesheet" type="text/css" href="{{url('static/head/css/login.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('static/head/css/common.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('static/head/lib/css/normalize.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('static/head/lib/css/ns-default.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('static/head/lib/css/ns-style-growl.css')}}">

</head>

<body>
  <div class="main">
    <div class="login">
      <img src="{{url('img/head/logo.png')}}" alt="logo">
      <div class="login-input">
        <input class="login-input-userInfo" type="text" value="输入账号...">
        <input class="login-input-passwordInfo" type="text" value="输入密码...">
        <img src="{{url('img/head/user.png')}}" alt="">
        <input type="text" name="" id="user">
        <img src="{{url('img/head/password.png')}}" alt="">
        <input type="text" name="" id="password">
      </div>
      <input type="button" value="登录" name="" id="login-button">
    </div>
  </div>
  <script type="text/javascript" src="{{url('static/head/js/jquery-3.2.0.min.js')}}"></script>
  <script type="text/javascript" src="{{url('static/head/lib/js/modernizr.custom.js')}}"></script>
  <script type="text/javascript" src="{{url('static/head/lib/js/notificationFx.js')}}"></script>
  <script type="text/javascript" src="{{url('static/head/lib/js/classie.js')}}"></script>
  <script type="text/javascript" src="{{url('static/head/js/login.js')}}"></script>
</body>

</html>