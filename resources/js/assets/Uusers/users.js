
$(function(){
  
	$('.sbjProfCard').on('click', function(){
		location.href = $(this).attr('data-url');
	});
	
	
	$('.sbjProfCard').on('click', function(){
		console.log('クリックされました。');
	});
	
  $('.categoryList__list--each').on({
    'mouseenter':function(){
      var categoryListHover = {
        "font-size": "15px",
        "width": "180px",
        "height": "34px",
        "line-height": "34px",
        "background-color": "#61819D",
        "color": "#FFF",
        "font-weight": "bold"
      }
      var categoryListHoverP = {
        "font-size": "14px",
        "width": "160px",
        "height": "29px",
        "line-height": "29px"
      }
      $(this).children().css(categoryListHover);
      $(this).prev().children().css(categoryListHoverP);
      $(this).next().children().css(categoryListHoverP);
    },
    'mouseleave':function(){
      var categoryListUnhover = {
        "font-size": "13px",
        "width": "145px",
        "height": "29px",
        "line-height": "29px",
        "background-color": "#FFF",
        "color": "#000",
        "font-weight": "normal"
      }
      $(this).children().css(categoryListUnhover);
      $(this).prev().children().css(categoryListUnhover);
      $(this).next().children().css(categoryListUnhover);
    }
  });
  
    $('.sbjProfCard__info__bottom').each(function(index, element){
    var categoryOriginal = $(this).children().text();
    console.log(categoryOriginal);
    var categorySplit = categoryOriginal.split(',');
    console.log(categorySplit);
    var categoryOutput = '';
    $.each(categorySplit, function(index, val){
      categoryOutput += '<div class="sbjProfCard__info__bottom--category"><span>' + val + '</span></div>';
    });
    categoryOutput += '';
    $(this).append(categoryOutput);
  });
  
});

//questionnaire
$(function(){
  $('#question__time--time--display').text(97);
  setInterval(function(){
    var timeDisplay = $('#question__time--time--display').text();
    var nowTime = timeDisplay - 1;
    $('#question__time--time--display').text(nowTime);
    if(nowTime <= 0){
      $('.question__time--time').children().css('color','#FF5D15');
    }
  }, 1200);
});

$(function(){
  $('.quesWrap__ques--each__block--value--val--each').on('click', function(){
    if(
      $(this).nextAll().children().hasClass('valueBtn-value-clicked')
    ){
      $(this).nextAll().children().removeClass('valueBtn-value-clicked');
    } else if(
      $(this).prevAll().children().hasClass('valueBtn-value-clicked')
    ){
      $(this).prevAll().children().removeClass('valueBtn-value-clicked');
    }
    $(this).children('.valueBtn-value').addClass('valueBtn-value-clicked');
  });
});





