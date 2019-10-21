
var wenzi = ['意见反馈','常见问题','APP下载<div class="app-qrcode"></div>','官方微信<div class="wx-qrcode"></div>'];
var icon =['<i class="icon">&#xe61e;</i>','<i class="icon">&#xe619;</i>','<i class="icon">&#xe61a;</i>','<i class="icon">&#xe62b;</i>'];

$('.info-block').on('mouseenter',function(){
	var index = $(this).index();
	
	$(this).html(wenzi[index]);
}).on('mouseleave',function(){
	var index = $(this).index();
	
	$(this).html(icon[index]);
})

// 右侧标签
// 标签文字显示
$('.gotoTop-bar').hover(function () {
	$(this).find('img').css('display', 'none')
	$(this).find('span').css('display', 'block')
}, function () {
	$(this).find('img').css('display', 'block')
	$(this).find('span').css('display', 'none')
})


$('.gotoTop-name').hover(function () {
	$(this).find('img').css('display', 'none')
	$(this).find('span').css('display', 'block')
	$(this).find('div').css('display', 'block')
	$(this).find('div').animate({
		width: '172px',
		height: '212px',
		bottom: '-2px',
		right: '59px',
	}, "slow");
}, function () {
	$(this).find('img').css('display', 'block')
	$(this).find('span').css('display', 'none')
	$(this).find('div').css('display', 'none')
	$(this).find('div').css('width', '0')
	$(this).find('div').css('height', '0')
	$(this).find('div').css('bottom', '6px')
	$(this).find('div').css('right', '59px')
})

// 回到顶部
$("#goTop").click(function () {
	$('body,html').animate({
		scrollTop: 0
	}, );
	return false;
});
