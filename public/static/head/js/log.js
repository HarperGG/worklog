/*
 * @Description: 
 * @Autor: YangZeMiao
 * @Date: 2019-10-21 18:46:24
 * @LastEditors: YangZeMiao
 * @LastEditTime: 2019-10-21 18:50:01
 */
var baseUrl=window.location.host; //基础地址
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
          let $liStr = `<li class="item"><a href="${item.url}">${item.name}</a></li>`
          $('.menu').append($liStr);
        })
      }
    }
  });


  var classifyData; //分类数据
  // 获取分类栏信息
  $.ajax({
    type: "get",
    aysnc: false,
    url: baseUrl + "/head/get_classify_bar",
    data: {
      category_id: ''
    },
    dataType: "json",
    success: function (data) {
      if (data.code == 200) {
        $('.shizhan-fenlei-wrap').empty();
        $('.shizhan-menu-wrap').empty();
        classifyData = data.data;
        $(data.data).each(function (index, item) {
          let $liStr = `<li class="banner-menu-item ">
					<a href="#">${item.category_name}</a>
					<div class="banner-menu-item-detail hide">
						<div class="light">
							<div class="xian">
								<span>相关知识</span>
							</div>			
						</div>
					</div>
				</li>`
          $('.shizhan-fenlei-wrap').append($liStr);
          item.all_child.forEach(function (item1) {
            let $childStr = `<a data-id="${item1.category_id}">${item1.category_name}</a>`
            $('.shizhan-menu-wrap').append($childStr);
          })
        })
      }

    }
  });

  // 点击一级不同分类的事件
  $(document).on('click','.shizhan-fenlei-wrap span',function () { 
    	changeClassify($(this).attr('data-id'));
    	$('.shizhan-fenlei-wrap span').each(function (index, item) {
    	  $(item).css('color', '#000');
    	  $(item).css('border-bottom', 'none');
    	})
    	$(this).css('color', '#f01414');
    	$(this).css('border-bottom', '3px solid #f01414');
  })

    // 点击不同二级分类的事件
    $(document).on('click', '.shizhan-menu-wrap span', function () {
      
      $('.shizhan-menu-wrap span').each(function (index, item) {
        $(item).css('color', '#4d555d');
        $(item).css('background', 'none');
      })
      $(this).css('color', '#fff');
      $(this).css('background', '#2b333b');
    })

  //点击不同分类的事件函数
  function changeClassify(categoryID) {
    $('.shizhan-menu-wrap').empty();
    classifyData.forEach(function (item) {
      if (item.category_id == categoryID) {
        item.all_child.forEach(function (item1) {
          let $childStr = `<a data-id="${item1.category_id}">${item1.category_name}</a>`
          $('.shizhan-menu-wrap').append($childStr);
        })
      }
    })
  }


  // 获取所有的文章
  $.ajax({
    type: "get",
    url: baseUrl + "/articles",
    data: {
      category_id: ''
    },
    dataType: "json",
    success: function (data) {
      if (data.code == 200) {

        $('.shizhan-content-wrap').empty();
        data.data.forEach(function (item) {
          let $liStr = `<div class="course-card mr24" data-id="${item.article_id}">
				<div class="course-img">
					< img src = "${baseUrl + item.cover_picture_url}"alt = "" >
				</div>
				<p class="course-name">${item.article_title}</p>
				<p class="course-desc">${item.article_intro}</p>
			</div>`
          $('.shizhan-content-wrap').append($liStr);
        })
      }
    }
  });

  // 点击文章查看
  $(document).on('click', '.course-card', function () {
    window.open('')
  })


}