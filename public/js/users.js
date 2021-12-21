/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/assets/Uusers/users.js":
/*!*********************************************!*\
  !*** ./resources/js/assets/Uusers/users.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  // hover state of each category list.
  $('.categoryBlock__list--each').on({
    'mouseenter': function mouseenter() {
      var categoryListHover = {
        "font-size": "15px",
        "width": "180px",
        "height": "34px",
        "line-height": "34px",
        "background-color": "#004681",
        "color": "#FFF",
        "font-weight": "bold",
        "box-shadow": "3px 2px 12px 2px rgba(53, 53, 58, .3)"
      };
      var categoryListHoverP = {
        "font-size": "14px",
        "width": "160px",
        "height": "29px",
        "background-color": "#0071D0",
        "line-height": "29px",
        "box-shadow": "0 0 0 0 rgba(53, 53, 58, 0)"
      };
      $(this).children().css(categoryListHover);
      $(this).prev().children().css(categoryListHoverP);
      $(this).next().children().css(categoryListHoverP);
    },
    'mouseleave': function mouseleave() {
      var categoryListUnhover = {
        "font-size": "13px",
        "width": "145px",
        "height": "29px",
        "line-height": "29px",
        "background-color": "#7FC4FC",
        "color": "#FFF",
        "font-weight": "normal",
        "box-shadow": "0 0 0 0 rgba(53, 53, 58, 0)"
      };
      $(this).children().css(categoryListUnhover);
      $(this).prev().children().css(categoryListUnhover);
      $(this).next().children().css(categoryListUnhover);
    }
  }); // anker link jumping  categoryLink -- main listLink

  $('.mainBlock').find('.listLine').each(function () {
    var position = $(this).offset().top;
    $(this).attr('data-position', '' + position);
  });
  $('.categoryBlock__list--each').on('click', function () {
    var categoryID = $(this).data('categoryid');
    var position = $('.mainBlock').find('#' + categoryID).data('position'); // console.log(position);

    $('html, .mainBlock').animate({
      scrollTop: position - 100
    }, 500);
  }); // switchBlockPC scroll and hide
  // searchBlock scroll and hide

  var startPos = 0,
      winScrollTop = 0;
  $('.mainBlock').on('scroll', function () {
    winScrollTop = $(this).scrollTop();

    if (winScrollTop >= startPos) {
      if (winScrollTop >= 150) {
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
  }); //each card category split

  $('.sbjProfCard__info').each(function () {
    var splitCat = $(this).find('.js-category-span').val();
    var splitCatEach = splitCat.split(',');
    var spanTag = '';
    $.each(splitCatEach, function (index, val) {
      spanTag += '<div class="sbjProfCard__info__bottom--category"><span>' + val + '</span></div>';
    });
    spanTag += '';
    $(this).find('.sbjProfCard__info__bottom').append(spanTag);
  }); //category classification2 

  $('.listLine__cardBlock--each').each(function () {
    var bigCat = $(this).find('.js-bigCat-span').val();
    $(this).find('.sbjProfCard__info__bottom--category').each(function () {
      var smallCat = $(this).text();
      var matchCat = bigCat === smallCat;

      if (matchCat === true) {
        $(this).parent().children('.js-category-span').attr('data-categorytype', '1');
      }
    });

    if ($(this).find('.js-category-span').data('categorytype') === 0) {
      $(this).remove();
    }
  }); //category classification hidden pattern

  $('.listLine').each(function () {
    var cardLength = $(this).find('.listLine__cardBlock--each').length;

    if (cardLength == 0) {
      $(this).find('.listLine__cardBlock').html('<div class="sbjProfCard--unregistered"><span>This category is not registered.</span></div>');
      $(this).children('.listLine__categoryTtl').css('background-color', '#b2c7d9');
    }
  }); //questionnaire

  $(function () {
    $('#question__time--time--display').text(97);
    setInterval(function () {
      var timeDisplay = $('#question__time--time--display').text();
      var nowTime = timeDisplay - 1;
      $('#question__time--time--display').text(nowTime);

      if (nowTime <= 0) {
        $('.question__time--time').children().css('color', '#FF5D15');
      }
    }, 1200);
  });
  $(function () {
    $('.quesWrap__ques--each__block--value--val--each').on('click', function () {
      if ($(this).nextAll().children().hasClass('valueBtn-value-clicked')) {
        $(this).nextAll().children().removeClass('valueBtn-value-clicked');
      } else if ($(this).prevAll().children().hasClass('valueBtn-value-clicked')) {
        $(this).prevAll().children().removeClass('valueBtn-value-clicked');
      }

      $(this).children('.valueBtn-value').addClass('valueBtn-value-clicked');
    });
  }); //loading animation
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

  $('.sbjProfCard__info__top--val--pentagon').each(function () {
    //average Q1
    var dataQ1 = $(this).find('.data-average-each-1').text();
    var arrDataQ1 = dataQ1.split('');
    var arrNumDataQ1 = arrDataQ1.map(Number);
    var arrLengthQ1 = $(arrNumDataQ1).length;
    var sumQ1 = arrNumDataQ1.reduce(function (sum, element) {
      return sum + element;
    }, 0);
    var averageQ1 = sumQ1 / arrLengthQ1; //average Q2

    var dataQ2 = $(this).find('.data-average-each-2').text();
    var arrDataQ2 = dataQ2.split('');
    var arrNumDataQ2 = arrDataQ2.map(Number);
    var arrLengthQ2 = $(arrNumDataQ2).length;
    var sumQ2 = arrNumDataQ2.reduce(function (sum, element) {
      return sum + element;
    }, 0);
    var averageQ2 = sumQ2 / arrLengthQ2; //average Q3

    var dataQ3 = $(this).find('.data-average-each-3').text();
    var arrDataQ3 = dataQ3.split('');
    var arrNumDataQ3 = arrDataQ3.map(Number);
    var arrLengthQ3 = $(arrNumDataQ3).length;
    var sumQ3 = arrNumDataQ3.reduce(function (sum, element) {
      return sum + element;
    }, 0);
    var averageQ3 = sumQ3 / arrLengthQ3; //average Q4

    var dataQ4 = $(this).find('.data-average-each-4').text();
    var arrDataQ4 = dataQ4.split('');
    var arrNumDataQ4 = arrDataQ4.map(Number);
    var arrLengthQ4 = $(arrNumDataQ4).length;
    var sumQ4 = arrNumDataQ4.reduce(function (sum, element) {
      return sum + element;
    }, 0);
    var averageQ4 = sumQ4 / arrLengthQ4; //average Q5

    var dataQ5 = $(this).find('.data-average-each-5').text();
    var arrDataQ5 = dataQ5.split('');
    var arrNumDataQ5 = arrDataQ5.map(Number);
    var arrLengthQ5 = $(arrNumDataQ5).length;
    var sumQ5 = arrNumDataQ5.reduce(function (sum, element) {
      return sum + element;
    }, 0);
    var averageQ5 = sumQ5 / arrLengthQ5;
    var averageAll = (averageQ1 + averageQ2 + averageQ3 + averageQ4 + averageQ5) / 5;
    var evaluation = averageAll.toFixed(1);
    $(this).find('.evaluation-js').html(evaluation);
    var numOfQue = (arrLengthQ1 + arrLengthQ2 + arrLengthQ3 + arrLengthQ4 + arrLengthQ5) / 5; // var numOfQueAbout = numOfQue.toFixed();
    // console.log(numOfQueAbout);
    // $(this).parents('.mgmtList__main__list--detail--right').find('.numOfQueAbout').html(numOfQueAbout);
  }); //senni

  $('.sbjProfCard-class-js').on('click', function () {
    var classID = $(this).data('classid');
    window.location.href = "/users/studentsClass_show/" + classID;
  });
  $('.sbjProfCard-teacher-js').on('click', function () {
    var teacherID = $(this).data('teacherid');
    window.location.href = "/users/studentsTeacher_show/" + teacherID;
  }); //students switch btn

  $('.switchBlockPC__btn--left').on('click', function () {
    window.location.href = "/users/studentsClass/";
  });
  $('.switchBlockPC__btn--right').on('click', function () {
    window.location.href = "/users/studentsTeacher/";
  });
});

/***/ }),

/***/ 2:
/*!***************************************************!*\
  !*** multi ./resources/js/assets/Uusers/users.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/ec2-user/environment/openclass/resources/js/assets/Uusers/users.js */"./resources/js/assets/Uusers/users.js");


/***/ })

/******/ });