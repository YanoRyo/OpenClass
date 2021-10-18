$(function(){
  $('.list-detail-show-inCharge').each(function(index, element){
    var getClass = $(this).children().attr('class');
    if(
      getClass !== 'txt-span inCharge'
    ){
      $(this).append('<span class="txt-span inCharge">掲載なし</span>');
    }
  });
});
$(function(){
  $('.updateForm__date--category').each(function(index, element){
    var profCat = $(this).val();
    var profCatSplit = profCat.split(',');
    var profCatDisplay = '';
    $.each(profCatSplit, function(index, val){
      profCatDisplay += '<data class="updateForm__edit--tmp--categorySplit" value="' + val + '"></data>';
    });
    profCatDisplay += '';
    $(this).next().children().append(profCatDisplay);
  });
  $('.category-btn-selectbox').each(function(index, element){
    $(this).find('.updateForm__edit--tmp--categorySplit').each(function(i){
      $(this).addClass('updateForm__category'+(i+1));
    });
    var profCat1 = $(this).find('.updateForm__category1').val();
    var profCat2 = $(this).find('.updateForm__category2').val();
    var profCat3 = $(this).find('.updateForm__category3').val();
    var profCat4 = $(this).find('.updateForm__category4').val();
    var profCat5 = $(this).find('.updateForm__category5').val();
    var profCat6 = $(this).find('.updateForm__category6').val();
    var profCat7 = $(this).find('.updateForm__category7').val();
    var profCat8 = $(this).find('.updateForm__category8').val();
    var profCat9 = $(this).find('.updateForm__category9').val();
    var profCat10 = $(this).find('.updateForm__category10').val();
    var nowCat = $(this).find('.category-btn-selectbox-js').val();
    if(profCat1 == nowCat){
      $(this).find('.category-btn-selectbox-js').prop('checked', true);
    } else if (profCat2 == nowCat){
      $(this).find('.category-btn-selectbox-js').prop('checked', true);
    } else if (profCat3 == nowCat){
      $(this).find('.category-btn-selectbox-js').prop('checked', true);
    }　else if (profCat4 == nowCat){
      $(this).find('.category-btn-selectbox-js').prop('checked', true);
    }　else if (profCat5 == nowCat){
      $(this).find('.category-btn-selectbox-js').prop('checked', true);
    }　else if (profCat6 == nowCat){
      $(this).find('.category-btn-selectbox-js').prop('checked', true);
    }　else if (profCat7 == nowCat){
      $(this).find('.category-btn-selectbox-js').prop('checked', true);
    }　else if (profCat8 == nowCat){
      $(this).find('.category-btn-selectbox-js').prop('checked', true);
    }　else if (profCat9 == nowCat){
      $(this).find('.category-btn-selectbox-js').prop('checked', true);
    }　else if (profCat10 == nowCat){
      $(this).find('.category-btn-selectbox-js').prop('checked', true);
    }　else {
      $(this).find('.category-btn-selectbox-js').prop('checked', false);
    }
  });
});
$(function(){
    　$('.mgmtList__main__list--child').each(function(){
    var spins = $(this).next().find('.js-category-span').val();
    var spons = spins.split(',');
    //console.log(spons);
    
   var spanTag = '';
    $.each(spons, function(index, val) {
      spanTag += '<span class="category-span">'+val+'</span>';
    });
    spanTag += '';
     
    // HTMLに出力
    $(this).next().find('.list-detail-show-category').html(spanTag);
    
  });
});
$(function(){

  /*$('.actionBtn__btn--edit').on('click', function(e){
    var teacherID = $(this).attr('id');
    history.pushState(null,null,"/V2teacher/V2updateTeacher/"+teacherID);
  });
  $('.updateForm__submit--btn--cancel').on('click',function(){
    history.pushState(null,null,"/V2teacher");
  });*/
  
  $('.actionBtn__btn--edit--prof').on('click', function(){
    var teacherID = $(this).attr('id');
    var teacherIDnew = teacherID.slice(4);
    window.location.href = "/V2updateTeacher/"+teacherIDnew;
  });
  $('.actionBtn__btn--edit--class').on('click', function(){
    var classID = $(this).attr('id');
    window.location.href = "/V2updateClass/"+classID;
  });
  
  //gNav eachBtn href
  $('#gNav-management-btn').on('click', function(){
    	window.location.href = "/V2class";
  })
  $('#gNav-archive-btn').on('click', function(){
    	window.location.href = "/V2archiveClass";
  })
  $('#gNav-category-btn').on('click', function(){
    	window.location.href = "/V2category";
  })
  $('#gNav-accessManagement-btn').on('click', function(){
    	window.location.href = "#";
  })
  $('#gNav-QuestionnaireSettings-btn').on('click', function(){
    	window.location.href = "#";
  })
  
  //management class prof switchbtn
  $('.mainHead__switch__btn--class').on('click', function(){
    	window.location.href = "/V2class";
  })
  $('.mainHead__switch__btn--prof').on('click', function(){
    	window.location.href = "/V2teacher";
  })
  //management archive class prof switchbtn
  $('.mainHead__switch__btn--class--archive').on('click', function(){
    	window.location.href = "/V2archiveClass";
  })
  $('.mainHead__switch__btn--prof--archive').on('click', function(){
    	window.location.href = "/V2archiveTeacher";
  })

  //management list accordion   click-state
  $('.mgmtList__main__list--child').on('click', function(){
    $(this).delay(300).queue(function(){
      $(this).toggleClass('mgmtList__main__list--bgchanged').dequeue();
      $(this).prev('.mgmtList__main__list--check').toggleClass('mgmtList__main__list--bgchanged').dequeue();
    });
    
  });

  //management list  accordion
  $('.mgmtList__main__list--child').each(function(){
      $(this).on('click',function(){
          $("+.mgmtList__main__list--detail",this).slideToggle();
          return false;
      });
  });

  //management list hover-state
  $('.mgmtList__main__list').on({
    mouseenter: function(){
      $(this).css('background-color', '#E2F2FF');
    },
    mouseleave: function(){
      $(this).css('background-color', '#F4FAFF');
    }
  });

  //management list action button hover-state
  var btnHoverIn = {
    opacity: "1",
    transition: ".3s"
  }
  var btnHoverOut = {
    opacity: "0"
  }
  
  $('.js-actionBtn__btn').on({
    mouseenter: function(){
      $(this).parent('.actionBtn').css('width', '101px');
      $(this).find('.mgmt-displayBtn').css('display', 'none');
      $(this).find('.mgmt-archiveBtn').css(btnHoverIn);
      $(this).find('.mgmt-editBtn').css(btnHoverIn);
      $(this).find('.mgmt-deleteBtn').css(btnHoverIn);
    },
    mouseleave: function(){
      $(this).parent('.actionBtn').css('width', '28px');
      $(this).find('.mgmt-displayBtn').css('display', 'block');
      $(this).find('.mgmt-archiveBtn').css(btnHoverOut);
      $(this).find('.mgmt-editBtn').css(btnHoverOut);
      $(this).find('.mgmt-deleteBtn').css(btnHoverOut);
    }
  });

  //management list action button each  click-state
  // $('.actionBtn__btn--archive').on('click', function(e){
  //   alert('アーカイブボタンが押されました。');
  //   e.stopPropagation();
  // });
  $('.actionBtn__btn--edit').on('click', function(e){
    $('.updateForm').addClass('active');
    e.stopPropagation();
    //filterAction
    $('.filterMW').removeClass('filterMW__main--active');
    $('.mainHead__opt--filter').find('.filter-logo-img').removeClass('filter-logo-img-active');
    $('.mainHead__opt--filter').css('pointer-events','none');
  });
  // $('.actionBtn__btn--delete').on('click', function(e){
  //   alert('デリートボタンが押されました。');
  //   e.stopPropagation();
  // });
  $('.actionBtn__btn').on('click', function(e){
    // alert('ディスプレイボタンが押されました。');
    e.stopPropagation();
  });
  
  //management list upadate click-state
  $('.updateForm__submit--btn--cancel').on('click',function(){
    $('.updateForm').removeClass('active');
    //filterAction
    $('.mainHead__opt--filter').css('pointer-events','auto');
  });

  //management list update file upload
  $('#prof-image').on('change', function (e) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $('.profImg-preview').attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
  });

  //management optionBtn new addition
  $('.mainHead__opt--add--newaddition').on('click', function(){
    $('.addNewForm').addClass('active');
    $('.updateForm').removeClass('active');
    //filterAction
    $('.filterMW').removeClass('filterMW__main--active');
    $('.mainHead__opt--filter').find('.filter-logo-img').removeClass('filter-logo-img-active');
    //filterAction
    $('.mainHead__opt--filter').css('pointer-events','none');
  });

  //management new addition form click-state
  $('.addNewForm__submit--btn--cancel').on('click',function(){
    $('.addNewForm').removeClass('active');
    //filterAction
    $('.mainHead__opt--filter').css('pointer-events','auto');
  });

  //management option filter 
  $('.filterMW__main--reset--btn').on('click', function(){
    $("input[name='filterMW-category']").removeAttr("checked").prop("checked", false).on('change');
  });

  $('.mainHead__opt--filter').on('click', function(){
    $('.filterMW').toggleClass('filterMW__main--active');
    $(this).find('.filter-logo-img').toggleClass('filter-logo-img-active');
  });



    
  
});

//update form 制限
$(function(){
  const $submitBtnProf = $('#addProf_submit')
  var addressCheck = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/;
  $('#addProf_form').on('change', function(){
    if(
      $(this).find('.addNewForm__edit--input').val() !=="" &&
      $(this).find('.addNewForm__edit--input--ID').val().length >= 4 &&
      $(this).find('.addNewForm__edit--input--email').val().match(addressCheck) &&
      $(this).find('#prof-Category-js input:checkbox:checked').length > 0
    ){
      $submitBtnProf.prop('disabled', false);
      $submitBtnProf.css({'opacity':'1'},{'box-shadow':'0px 3px 10px 0px rgb(0 60 111 / 20%)'});
    } else {
      $submitBtnProf.prop('disabled', true);
      $submitBtnProf.css({'opacity':'.4'},{'box-shadow':'0px 3px 10px 0px rgb(0 60 111 / 0%)'});
    }
  });
});

$(function(){
  const $submitBtnClass = $('#addClass_submit')
  $('#addClass_form').on('change', function(){
    if(
      $(this).find('.addNewForm__edit--input').val() !=="" &&
      $(this).find('.addNewForm__edit--input--ID').val().length >= 4 &&
      $(this).find('#prof-Category-js input:checkbox:checked').length > 0
      ){
        $submitBtnClass.prop('disabled', false);
        $submitBtnClass.css({'opacity':'1'},{'box-shadow':'0px 3px 10px 0px rgba(0, 60, 111, 0.2)'});
      } else {
        $submitBtnClass.prop('disabled', true);
        $submitBtnClass.css({'opacity':'.4'},{'box-shadow':'0px 3px 10px 0px rgba(0, 60, 111, 0)'});
      }
  });
  
  const $submitBtnUpdate = $('#updateForm_submit')
    if(
      $(this).find('.addNewForm__edit--input--name').val() !=="" &&
      $(this).find('.addNewForm__edit--input--ID').val().length >= 4 &&
      $(this).find('.updateForm__edit--tmp--category input:checkbox:checked').length > 0
      ){
        $submitBtnUpdate.prop('disabled', false);
        $submitBtnUpdate.css({'opacity':'1'},{'box-shadow':'0px 3px 10px 0px rgba(0, 60, 111, 20%)'});
      } else {
        $submitBtnUpdate.prop('disabled', true);
        $submitBtnUpdate.css({'opacity':'.4'},{'box-shadow':'0px 3px 10px 0px rgba(0, 60, 111, 0%)'});
      }
});

$(function(){
  if(
    $('.addNewForm__edit--input--name').val() !== ""
    ){
      $('.addNewForm__edit--input--name').prev().find('.form-required').html('*OK');
      $('.addNewForm__edit--input--name').prev().find('.form-required').addClass('form-required-ok');
    }
  if(
    $('.addNewForm__edit--input--ID').val() !== ""
    ){
      $('.addNewForm__edit--input--ID').prev().find('.form-required').html('*OK');
      $('.addNewForm__edit--input--ID').prev().find('.form-required').addClass('form-required-ok');
    }
  if(
    $('.addNewForm__edit--input--email').val() !== ""
    ){
      $('.addNewForm__edit--input--email').prev().find('.form-required').html('*OK');
      $('.addNewForm__edit--input--email').prev().find('.form-required').addClass('form-required-ok');
    }
  if(
      $('.updateForm__edit--tmp--category input:checkbox:checked').length > 0
    ){
      $('.updateForm__edit--tmp--category').prev().prev().find('.form-required').html('*OK');
      $('.updateForm__edit--tmp--category').prev().prev().find('.form-required').addClass('form-required-ok');
    }
  $('.updateForm__edit--tmp--category input').on('change', function(){
    if(
      $('.updateForm__edit--tmp--category input:checkbox:checked').length > 0
      ){
        $(this).parent().parent().prev().prev().find('.form-required').html('*OK');
        $(this).parent().parent().prev().prev().find('.form-required').addClass('form-required-ok');
      } else {
        $(this).parent().parent().prev().prev().find('.form-required').html('*必須');
        $(this).parent().parent().prev().prev().find('.form-required').removeClass('form-required-ok');
      }
  })
});

$(function(){
  $('.addNewForm__edit--input').on('input', function(){
    if(
      $(this).val() !== ""
    ){
      $(this).prev().find('.form-required').html('*OK');
      $(this).prev().find('.form-required').addClass('form-required-ok');
    } else {
      $(this).prev().find('.form-required').html('*必須');
      $(this).prev().find('.form-required').removeClass('form-required-ok');
    }
  });
  $('.addNewForm__edit--input--ID').on('input', function(){
    if(
      $(this).val().length >= 4
    ){
      $(this).prev().find('.form-required').html('*OK');
      $(this).prev().find('.form-required').addClass('form-required-ok');
    } else {
      $(this).prev().find('.form-required').html('*必須');
      $(this).prev().find('.form-required').removeClass('form-required-ok');
    }
  });
  $('.addNewForm__edit--input--email').on('input', function(){
    var addressCheck = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/;
    if(
      $(this).val().match(addressCheck)
    ){
      $(this).prev().find('.form-required').html('*OK');
      $(this).prev().find('.form-required').addClass('form-required-ok');
    } else {
      $(this).prev().find('.form-required').html('*必須');
      $(this).prev().find('.form-required').removeClass('form-required-ok');
    }
  });
  $('#prof-Category-js input').on('change', function(){
    if(
      $('#prof-Category-js input:checkbox:checked').length > 0
    ){
      $(this).parent().parent().prev().find('.form-required').html('*OK');
      $(this).parent().parent().prev().find('.form-required').addClass('form-required-ok');
    } else {
      $(this).parent().parent().prev().find('.form-required').html('*必須');
      $(this).parent().parent().prev().find('.form-required').removeClass('form-required-ok');
    }
  });
});

$(function(){
  $('.addCategory__added--category').find('input:checkbox').on('change', function(){
    var cnt = $('.addCategory__added--category').find('input:checkbox:checked').length;
    if (
      cnt > 0
    ){
      $('#delete-submit').prop('disabled', false);
      $('.delete__btn--category').addClass('delete__btn--category--checked');
    } else if(
      cnt == 0
    ){
      $('#delete-submit').prop('disabled', true);
      $('.delete__btn--category').removeClass('delete__btn--category--checked');
    }
  });
});
$(function(){
  $('#new-category-input').on('input', function(){
    var searchText = $(this).val();
    $('.attention-message').empty();
    var newCategory = $(this).val().length;
    var categoryVals = $('.category-btn-selectbox data').map(function(){
      return $(this).val();
    }).get();
    if(
      $.inArray(searchText, categoryVals) != -1
    ){
      var attention = '<span>*重複するため追加できません。</span>';
      $('.attention-message').append(attention);
      $('.addCategory__form--submit').prop('disabled', true);
      $('#actionBtn--blue--category').removeClass('actionBtn--blue--category');
      $('#actionBtn--blue--category').addClass('actionBtn--blue--category--disabled');
    } else if (
      newCategory > 0
    ){
      $('.addCategory__form--submit').prop('disabled', false);
      $('#actionBtn--blue--category').addClass('actionBtn--blue--category');
      $('#actionBtn--blue--category').removeClass('actionBtn--blue--category--disabled');
    } else if (
      newCategory == 0
    ){
      $('.addCategory__form--submit').prop('disabled', true);
      $('#actionBtn--blue--category').removeClass('actionBtn--blue--category');
      $('#actionBtn--blue--category').addClass('actionBtn--blue--category--disabled');
    }
  });
});


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









