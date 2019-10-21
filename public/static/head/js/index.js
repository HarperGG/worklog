/*
 * @Description: 
 * @Autor: YangZeMiao
 * @Date: 2019-10-21 18:46:24
 * @LastEditors: YangZeMiao
 * @LastEditTime: 2019-10-21 18:46:24
 */
var swiper = new Swiper('.banner-img', {
	pagination: '.swiper-pagination',
	paginationClickable: '.swiper-pagination',
	nextButton: '.swiper-button-next',
	prevButton: '.swiper-button-prev',
	effect: 'fade',
	loop: true,
	autoplay: true
});


$('.search-input').focusin(function () {
	$(".search-area").addClass('search-area-focus');
	$('.search-btn').addClass('hover');
}).focusout(function () {
	$('.search-area').removeClass('search-area-focus');
	$('.search-btn').removeClass('hover');
})
$('.download').hover(function () {
	$(this).find('span').toggleClass('hover')
	$('.download-detail').toggleClass('hide');
})
$(".shop-cart").hover(function () {
	$('.shop-cart>i,.shop-cart>span').toggleClass('hover');
	$(this).toggleClass('shop-cart-hover');
	$('.shop-cart-detail').toggleClass('hide');
})


// table选项卡
$("body").on("mouseenter", ".banner-menu-item", function () {
	$(this).children('a').toggleClass('white');
	$(this).find('.banner-menu-item-detail').css('display', 'block');
});
$("body").on("mouseleave", ".banner-menu-item", function () {
	$(this).children('a').toggleClass('white');
	$(this).find('.banner-menu-item-detail').css('display', 'none');
});

var indexHeight = 0; //初始高度
var indexStr;
var num = 0; //计数：有几个li，是否到达最底部
// 点击向下
$(document).on('click', '.banner-menu-next-button', function () {
	num += 1;
	if (num <= $('.banner-menu-item').length - 7) {
		indexHeight -= 53; //每次滑动的距离
		indexStr = indexHeight + 'px'; //换算单位
		$('.banner-menu-item').eq(0).animate({ //滑动函数
			'margin-top': indexStr
		}, "slow");
	}
})
// 向上点击
$(document).on('click', '.banner-menu-prev-button', function () {
	if ($('.banner-menu-item').eq(0).css('margin-top') != '0px') {
		indexHeight += 53;
		indexStr = indexHeight + 'px';
		$('.banner-menu-item').eq(0).animate({
			'margin-top': indexStr
		}, "slow");
	}
})


var baseUrl=window.location.host;
window.onload = function () {

	// 导航栏标题
	$.ajax({
		type: "get",
		url: baseUrl + "/head/get_navigation_bar",
		dataType: "json",
		success: function (data) {
			if (data.code == 200) {

				$('.menu').empty();
				data.data.forEach(function (item) {
					let $liStr = `<li class="item"><a class="item-hover" href="${item.url}">${item.name}</a></li>`
					$('.menu').append($liStr);
				})
			}
		}
	});

	//搜索框

	// 获取分类栏信息
	$.ajax({
		type: "get",
		url: baseUrl + "/head/get_classify_bar",
		dataType: "json",
		success: function (data) {
			if (data.code == 200) {
				$('.banner-menu').empty();
				$('#learnRecommend ul').empty();
				$('#learnLink ul').empty();
				$(data.data).each(function (index, item) {
					let $liStr = `<li class="banner-menu-item " data-id="${item.category_id}">
					<a href="#">${item.category_name}</a>
					<div class="banner-menu-item-detail hide">
						<div class="light">
							<div class="xian">
								<span>相关知识</span>
							</div>			
						</div>
					</div>
				</li>`
					$('.banner-menu').append($liStr);
					item.all_child.forEach(function (item1) {

						let $childStr = `<a data-id="${item1.category_id}">${item1.category_name}</a>`
						$('.light').eq(index).append($childStr);
					})
				})

				// 学习推荐分类
				let $learn = `<li data-id="${item.category_id}">${item.category_name}</li>`
				$('#learnRecommend ul').append($learn);

				// 学习路线分类
				let $road = `<li data-id="${item.category_id}">${item.category_name}</li>`
				$('#learnLink ul').append($road);
			}

			// 上下箭头js
			if ($('.banner-menu-item').length > 7) {
				$('.banner-menu-prev').css('display', 'block');
				$('.banner-menu-next').css('display', 'block');
			}
		}
	});


	// 点击分类跳转详情
	$(document).on("click", '.banner-menu-item-detail a',function () {  
		//存入cookie
		setCookie("category_id", $(this).text(), 30);
		window.open('log.html');
	})

	//默认获取学习推荐信息
	getLearnInfo(1)

	// 获取学习推荐信息
	$(document).on('click', '#learnRecommend ul li',function () {  
		getLearnInfo($(this).attr('data-id'));
		$('#learnRecommend ul li').each(function (index,item) {  
			$(item).css('color','#545C63');
			$(item).css('border-bottom','none');
		})
		$(this).css('color', '#F20D0D');
		$(this).css('border-bottom', '2px solid #F20D0D');
	})

	// 获取学习推荐信息方法
	function getLearnInfo(categoryID) {  
		$.ajax({
			type: "get",
			url: baseUrl + "/head/get_learn_recommend",
			data: {
				category_id: categoryID
			},
			dataType: "json",
			success: function (data) {
				if (data.code == 200) {

					$('.shizhan-content').empty();
					data.data.forEach(function (item) {
						let $aStr = `<a href="#" class="content-item mr18">
					<div class="img">
						<span class="tag">Python</span>
						<img src="${ baseUrl + item.url}" alt="">
					</div>
					<div class="content-item-title">
						${item.title}
					</div>
					<p class="shizhan-desc">${item.intro}</p>
				</a>`
						$('.shizhan-content').append($aStr);
					})
				}
			}
		});
	}

var friendLinkNum
	let pageNum = 1; //当前页码
	// 获取友情链接信息函数
	$.ajax({
		type: "get",
		url: baseUrl + "/head/get_blog_roll",
		data: {
			category_id: ''
		},
		dataType: "json",
		success: function (data) {
			if (data.code == 200) {
				friendLinkNum = data.data;
				
				$('.article-intro-content').empty();
				var pageData = Math.ceil(friendLinkNum.length / 4);
				if (pageNum == pageData) {
					for (let i = (pageNum - 1) * 4; i < friendLinkNum.length; i++) {
						let $str = `<a href="${friendLinkNum[i].url}">${friendLinkNum[i].title}</a>`
						$('.article-intro-content').append($str);
					}
					pageNum = 0;
				} else {
					for (let i = (pageNum - 1) * 4; i < (pageNum) * 4; i++) {
						let $str = `<a href="${friendLinkNum[i].url}">${friendLinkNum[i].title}</a>`
						$('.article-intro-content').append($str);
					}
				}
				pageNum++;
			}
		}
	});

	//换一批点击事件
	$(document).on('click', '.article-intro-control span:nth-of-type(2)', function () {
		$('.article-intro-content').empty();
		var pageData = Math.ceil(friendLinkNum.length / 4);
		if (pageNum == pageData) {
			for (let i = (pageNum-1) * 4; i < friendLinkNum.length; i++) {
				let $str = `<a href="${friendLinkNum[i].url}">${friendLinkNum[i].title}</a>`
				$('.article-intro-content').append($str);
			}
			pageNum = 0;
		}else{
			for (let i = (pageNum - 1)* 4; i < (pageNum) * 4; i++) {
				let $str = `<a href="${friendLinkNum[i].url}">${friendLinkNum[i].title}</a>`
				$('.article-intro-content').append($str);
			}
		}
		pageNum++;

	})
	
	//默认获取学习路线信息(id为 1 )
	getLearnLoad(1)

	// 获取学习路线信息
	$(document).on('click', '#learnLink ul li', function () {
		getLearnLoad($(this).attr('data-id'));
		$('#learnLink ul li').each(function (index, item) {
			$(item).css('color', '#545C63');
			$(item).css('border-bottom', 'none');
		})
		$(this).css('color', '#F20D0D');
		$(this).css('border-bottom', '2px solid #F20D0D');
	})

	//获取学习路线信息函数
	function getLearnLoad(categoryID) {  
		$.ajax({
			type: "get",
			url: baseUrl + "/head/get_learn_path",
			data: {
				category_id: categoryID
			},
			dataType: "json",
			success: function (data) {
				if (data.code == 200) {
					$('#learnRoad').empty();
					data.data.forEach(function (item) {
						let $boxStr = `<div class="course-box" data-id="${item.study_route_id}">
						<div class="course-cover">
							<div class="img-up" style="background-image: url(${baseUrl + item.cover_picture_url}); background-size: 100% 100%"></div>
							<div class="img-mid" style="background-image: url(${baseUrl + item.cover_picture_url}); background-size: 100% 100%"></div>
							<div class="img-down" style="background-image: url(${baseUrl + item.cover_picture_url}); background-size: 100% 100%"></div>
						</div>
						<div class="course-content">
							<p class="course-content-p">${item.study_route_title}</p>
							<span>${item.study_route_intro}</span>
						</div>
					</div>`
						$('#learnRoad').append($boxStr);
					})
				}
			}
		});

	}

// 最新发布
	$.ajax({
		type: "get",
		url: baseUrl + "/head/get_recent",
		dataType: "json",
		success: function (data) {
			if (data.code == 200) {
				$('#learnRoad').empty();
				data.data.forEach(function (item) {
					let $boxStr = `<a href="#" class="content-item mr18" data-id="${item.id}">
					<div class="img">
						<span class="tag">Python</span>
						<img src="${item.cover_picture_url}" alt="">
					</div>
					<div class="content-item-title">
						${item.article_title}
					</div>
					<p class="shizhan-desc">${item.article_intro}</p>
					</a>`
					$('#learnRoad').append($boxStr);
				})
			}
		}
	});

// 获取轮播图信息
	$.ajax({
		type: "get",
		url: baseUrl + "/head/get_slideshow",
		data: {
			category_id: ''
		},
		dataType: "json",
		success: function (data) {
			if (data.code == 200) {

			}
		}
	});

	// 存cookie函数
	function setCookie(cname, cvalue, exdays) {
		var d = new Date();
		d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
		var expires = "expires=" + d.toGMTString();
		document.cookie = cname + "=" + cvalue + "; " + expires;
	}

}

