



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
  
  
  
  /*$('.actionBtn__btn--edit').on('click', function(e){
    var teacherID = $(this).attr('id');
    history.pushState(null,null,"/V2teacher/V2updateTeacher/"+teacherID);
  });
  $('.updateForm__submit--btn--cancel').on('click',function(){
    history.pushState(null,null,"/V2teacher");
  });*/
  
  $('.actionBtn__btn--edit--prof').on('click', function(){
    var teacherID = $(this).attr('id');
    window.location.href = "/V2updateTeacher/"+teacherID;
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





