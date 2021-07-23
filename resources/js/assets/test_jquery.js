// test_jquery.js

//list_teachers,list_classesのページ遷移設定
$('.list-href[data-href]').addClass('clickable')
    .click(function (e) {
      if (!$(e.target).is('a')) {
        window.location = $(e.target).closest('tr').data('href');
      }
  });
  
$('.gNav__list__menu[data-href]').addClass('clickable')
    .click(function (e) {
      if (!$(e.target).is('a')) {
        window.location = $(e.target).closest('.gNav__list__menu').data('href');
      }
  });

  



//list_teachers,list_classesのheaderWidthの可変設定  
$(function(){
  var classNumGet = $('.class-num-get').width();
  $('.class-num').width(classNumGet);

  var classNameGet = $('.class-name-get').width();
  $('.class-name').width(classNameGet);

  var classProfGet = $('.class-prof-get').width();
  $('.class-prof').width(classProfGet);

  var classCategoryGet = $('.class-category-get').width();
  $('.class-category').width(classCategoryGet);
});

$(function(){
  var profNameGet = $('.prof-name-get').width();
  $('.prof-name').width(profNameGet);

  var profEmailGet = $('.prof-email-get').width();
  $('.prof-email').width(profEmailGet);

  var profCategoryGet = $('.prof-category-get').width();
  $('.prof-category').width(profCategoryGet);
});



$('#teacher_img').on('change', function (e) {
  var reader = new FileReader();
  reader.onload = function (e) {
      $('#profImg-preview').attr('src', e.target.result);
  };
  reader.readAsDataURL(e.target.files[0]);
});


//class追加>教員追加フォーム
document.querySelector('input[list]').addEventListener('input', function(e) {
  var input = e.target,
      list = input.getAttribute('list'),
      options = document.querySelectorAll('#' + list + ' option'),
      hiddenInput = document.getElementById(input.getAttribute('id') + '-hidden'),
      inputValue = input.value;

  hiddenInput.value = inputValue;

  for(var i = 0; i < options.length; i++) {
      var option = options[i];

      if(option.innerText === inputValue) {
          hiddenInput.value = option.getAttribute('data-value');
          break;
      }
  }
});

//templategNav__listの背景色変更

//$(function() {
//    $('.gNav__list__menu').on('click', function() {
//      $(this).parent().addClass("changed-bg");
//      });
//});