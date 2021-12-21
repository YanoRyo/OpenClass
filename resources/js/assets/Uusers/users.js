$(function(){
  // hover state of each category list.
  $('.categoryBlock__list--each').on({
    'mouseenter':function(){
      var categoryListHover = {
        "font-size": "15px",
        "width": "180px",
        "height": "34px",
        "line-height": "34px",
        "background-color": "#004681",
        "color": "#FFF",
        "font-weight": "bold",
        "box-shadow": "3px 2px 12px 2px rgba(53, 53, 58, .3)"
      }
      var categoryListHoverP = {
        "font-size": "14px",
        "width": "160px",
        "height": "29px",
        "background-color": "#0071D0",
        "line-height": "29px",
        "box-shadow": "0 0 0 0 rgba(53, 53, 58, 0)"
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
        "background-color": "#7FC4FC",
        "color": "#FFF",
        "font-weight": "normal",
        "box-shadow": "0 0 0 0 rgba(53, 53, 58, 0)"
      }
      $(this).children().css(categoryListUnhover);
      $(this).prev().children().css(categoryListUnhover);
      $(this).next().children().css(categoryListUnhover);
    }
  });

  // anker link jumping  categoryLink -- main listLink
  $('.mainBlock').find('.listLine').each(function(){
    var position = $(this).offset().top;
    $(this).attr('data-position', '' + position);
  });
  $('.categoryBlock__list--each').on('click', function(){
    var categoryID = $(this).data('categoryid');
    var position = $('.mainBlock').find('#'+categoryID).data('position');
    // console.log(position);
    $('html, .mainBlock').animate({scrollTop: position - 100}, 500);
  });

  // switchBlockPC scroll and hide
  // searchBlock scroll and hide
  var startPos = 0,winScrollTop = 0;
  $('.mainBlock').on('scroll',function(){
      winScrollTop = $(this).scrollTop();
      if (winScrollTop >= startPos) {
        if(winScrollTop >= 150){
          $('.switchBlockPC').addClass('switchBlockPChide');
          $('.searchBlock').addClass('searchBlock--hide');
          $('.switchBlock').addClass('switchBlock--hide');
        }
          
      } else {
          $('.switchBlockPC').removeClass('switchBlockPChide');
          $('.searchBlock').removeClass('searchBlock--hide');
          $('.switchBlock').removeClass('switchBlock--hide');
      }
      startPos = winScrollTop;
  });
  
  //each card category split
  $('.sbjProfCard__info').each(function(){
    var splitCat = $(this).find('.js-category-span').val();
    var splitCatEach = splitCat.split(',');
    var spanTag = '';
    $.each(splitCatEach, function(index, val){
      spanTag += '<div class="sbjProfCard__info__bottom--category"><span>'+val+'</span></div>';
    });
    spanTag += '';
    $(this).find('.sbjProfCard__info__bottom').append(spanTag);
  });
  
  //category classification 'other' pattern
  $('#other').each(function(){
    var categoryEachArr = $('.categoryBlock__list--each--span').map(function(index, element){
    return element.innerHTML;
    });
    $(this).find('.sbjProfCard__info__bottom--category').each(function(){
      var smallCat = $(this).text();
      var categoryUnMatch = $.inArray(smallCat, categoryEachArr);
      if(categoryUnMatch === -1){
        var otherCategroyTag = '<div class="sbjProfCard__info__bottom--category" style="display:none"><span>その他</span></div>';
        $(this).parents('.sbjProfCard__info__bottom').append(otherCategroyTag);
      }
    });
  });
   //category classification2 
  $('.listLine__cardBlock--each').each(function(){
    var bigCat = $(this).find('.js-bigCat-span').val();
    $(this).find('.sbjProfCard__info__bottom--category').each(function(){
      var smallCat = $(this).text();
      var matchCat = bigCat === smallCat;
      if(matchCat === true){
        $(this).parent().children('.js-category-span').attr('data-categorytype', '1');
      }
    });
    if(
      $(this).find('.js-category-span').data('categorytype') === 0
    ){
      $(this).remove();
    }
  });
  //category classification hidden pattern
  $('.listLine').each(function(){
    var cardLength = $(this).find('.listLine__cardBlock--each').length;
    if(cardLength == 0){
      $(this).find('.listLine__cardBlock').html('<div class="sbjProfCard--unregistered"><span style="color:#707070">表示できるものがありません。</span></div>');
      $(this).children('.listLine__categoryTtl').css('background-color','#b2c7d9');
    }
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
  
   //loading animation
  // var images = document.getElementsByTagName('img'); // ページ内の画像取得
  // var percent = document.getElementById('percent-text'); // パーセントのテキスト部分
  // var gauge = document.getElementById('gauge'); // ゲージ
  // var loadingBg = document.getElementById('loadingBg'); // ローディング背景
  // var loading = document.getElementById('loading'); // ローディング要素
  // var imgCount = 0;
  // var baseCount = 0;
  // var gaugeMax = 100; // ゲージの幅指定
  // var current;
   
  // // 画像の読み込み
  // for (var i = 0; i < images.length; i++) {
  //     var img = new Image(); // 画像の作成
  //     // 画像読み込み完了したとき
  //     img.onload = function() {
  //         imgCount += 1;
  //     }
  //     // 画像読み込み失敗したとき
  //     img.onerror = function() {
  //         imgCount += 1;
  //     }
  //     img.src = images[i].src; // 画像にsrcを指定して読み込み開始
  // };
   
  // // ローディング処理
  // var nowLoading = setInterval(function() {
  //     if(baseCount <= imgCount) { // baseCountがimgCountを追い抜かないようにする
  //         // 現在の読み込み具合のパーセントを取得
  //         current = Math.floor(baseCount / images.length * 100);
  //         // パーセント表示の書き換え
  //         percent.innerHTML = current;
  //         // ゲージの変更
  //         gauge.style.width = Math.floor(gaugeMax / 100 * current) + 'vw';
  //         baseCount += 1;
  //         // 全て読み込んだ時
  //         if(baseCount == images.length) {
  //             // ローディング要素の非表示
  //             loadingBg.style.display = 'none';
  //             loading.style.display = 'none';
  //             // ローディングの終了
  //             clearInterval(nowLoading);
  //         }
  //     }
  // }, 10);

  
  //senni
  $('.sbjProfCard-class-js').on('click', function(){
    var classID = $(this).data('classid');
    window.location.href = "/users/studentsClass_show/"+classID;
  });
  $('.sbjProfCard-teacher-js').on('click', function(){
    var teacherID = $(this).data('teacherid');
    window.location.href = "/users/studentsTeacher_show/"+teacherID;
  });
  
  //students switch btn
  $('.switchBlockPC__btn--left').on('click', function(){
    window.location.href = "/users/studentsClass/";
  });
  $('.switchBlockPC__btn--right').on('click', function(){
    window.location.href = "/users/studentsTeacher/";
  });
  
});



