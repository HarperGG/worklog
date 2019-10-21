/*
 * @Description: 
 * @Autor: YangZeMiao
 * @Date: 2019-10-21 18:46:24
 * @LastEditors: YangZeMiao
 * @LastEditTime: 2019-10-21 18:46:24
 */
//用户登录

// 鼠标放上去提示信息
$('#user').hover(function () {  
  $('.login-input-userInfo').fadeIn(100)
},function () {  
$('.login-input-userInfo').fadeOut(100)

})
$('#password').hover(function () {
  $('.login-input-passwordInfo').fadeIn(50)
}, function () {
  $('.login-input-passwordInfo').fadeOut(50)
})
//错误提示
$('#login-button').click(function () { 

  let passwordStr = /^[a-z0-9]+$/i;
  if (!passwordStr.test($('#password').val())) {
   errorMessage('请正确输入密码！');
   return ;
  }
   $.ajax({
     type: "post",
     url:  "/auth/login",
     data: {
       user_number:$('#user').val(),
       user_password:$('#password').val()
     },
     dataType: "json",
     success: function (data) {
       if (data.code == 200){
          errorMessage('登陆成功！');
         $(location).css('href','index.html');
       }
     },
     error:function (error) {  

     }
   });
   
})

function errorMessage(errorStr) {  
  var bttn = document.getElementById('login-button');
  bttn.disabled = false;
  bttn.addEventListener('click', function () {
    classie.add(bttn, 'active');
    setTimeout(function () {
      classie.remove(bttn, 'active');
      var notification = new NotificationFx({
        message: errorStr,
        layout: 'growl',
        effect: 'genie',
        type: 'notice',
        onClose: function () {
          bttn.disabled = false;
        }
      });
      notification.show();
    }, 10);
    this.disabled = true;
  });

}


