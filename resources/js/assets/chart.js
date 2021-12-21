
$('.canvas').each(function(){
    var classID = $(this).data('classid');
    
    
    //average Q1
    var dataQ1 = $(this).find('.data-average-each-1').text();
    var arrDataQ1 = dataQ1.split('');
    var arrNumDataQ1 = arrDataQ1.map(Number);
    var arrLengthQ1 = $(arrNumDataQ1).length;
    var sumQ1 = arrNumDataQ1.reduce(function(sum, element){
      return sum + element;
    }, 0);
    var averageQ1 = sumQ1 / arrLengthQ1;
    //average Q2
    var dataQ2 = $(this).find('.data-average-each-2').text();
    var arrDataQ2 = dataQ2.split('');
    var arrNumDataQ2 = arrDataQ2.map(Number);
    var arrLengthQ2 = $(arrNumDataQ2).length;
    var sumQ2 = arrNumDataQ2.reduce(function(sum, element){
      return sum + element;
    }, 0);
    var averageQ2 = sumQ2 / arrLengthQ2;
    //average Q3
    var dataQ3 = $(this).find('.data-average-each-3').text();
    var arrDataQ3 = dataQ3.split('');
    var arrNumDataQ3 = arrDataQ3.map(Number);
    var arrLengthQ3 = $(arrNumDataQ3).length;
    var sumQ3 = arrNumDataQ3.reduce(function(sum, element){
      return sum + element;
    }, 0);
    var averageQ3 = sumQ3 / arrLengthQ3;
    //average Q4
    var dataQ4 = $(this).find('.data-average-each-4').text();
    var arrDataQ4 = dataQ4.split('');
    var arrNumDataQ4 = arrDataQ4.map(Number);
    var arrLengthQ4 = $(arrNumDataQ4).length;
    var sumQ4 = arrNumDataQ4.reduce(function(sum, element){
      return sum + element;
    }, 0);
    var averageQ4 = sumQ4 / arrLengthQ4;
    //average Q5
    var dataQ5 = $(this).find('.data-average-each-5').text();
    var arrDataQ5 = dataQ5.split('');
    var arrNumDataQ5 = arrDataQ5.map(Number);
    var arrLengthQ5 = $(arrNumDataQ5).length;
    var sumQ5 = arrNumDataQ5.reduce(function(sum, element){
      return sum + element;
    }, 0);
    var averageQ5 = sumQ5 / arrLengthQ5;
    
    var averageAll = (averageQ1 + averageQ2 + averageQ3 + averageQ4 + averageQ5)/5;
    var evaluation = averageAll.toFixed(1);
    $(this).parents('.mgmtList__main__list--detail--right').find('.evaluation-js').html(evaluation);
    var numOfQue = (arrLengthQ1 +arrLengthQ2 +arrLengthQ3 +arrLengthQ4 +arrLengthQ5)/5;
    var numOfQueAbout = numOfQue.toFixed();
    $(this).parents('.mgmtList__main__list--detail--right').find('.numOfQueAbout').html(numOfQueAbout);
    
    var ctx = document.getElementById("myRaderChart"+ classID);
    var myRadarChart = new Chart(ctx, {
      type: 'radar', 
      data: { 
          labels: ["Q1", "Q2", "Q3", "Q4", "Q5"],
          datasets: [{
              data: [averageQ1,averageQ2,averageQ3,averageQ4,averageQ5],
              backgroundColor: 'RGBA(0, 113, 208, 0.5)',
              borderColor: 'RGBA(0, 113, 208, 1)',
              borderWidth: 1,
              pointBackgroundColor: 'RGB(46,106,177)'
          }]
      },
      options: {
          title: {
              display: false,
              text: '試験成績'
          },
          legend:{
            display: false
          },
          scale:{
              ticks:{
                  suggestedMin: 0,
                  suggestedMax: 5,
                  stepSize: 1,
                  fontSize: 14,
                  callback: function(value, index, values){
                      
                      return  value +  '';
                  }
              },
              pointLabels:{
                fontSize: 14
              }
          }
      }
    });
});


$(function(){
  $('.sbjProfCard__info__top--val--pentagon').each(function(){
    //average Q1
    var dataQ1 = $(this).find('.data-average-each-1').text();
    var arrDataQ1 = dataQ1.split('');
    var arrNumDataQ1 = arrDataQ1.map(Number);
    var arrLengthQ1 = $(arrNumDataQ1).length;
    var sumQ1 = arrNumDataQ1.reduce(function(sum, element){
      return sum + element;
    }, 0);
    var averageQ1 = sumQ1 / arrLengthQ1;
    //average Q2
    var dataQ2 = $(this).find('.data-average-each-2').text();
    var arrDataQ2 = dataQ2.split('');
    var arrNumDataQ2 = arrDataQ2.map(Number);
    var arrLengthQ2 = $(arrNumDataQ2).length;
    var sumQ2 = arrNumDataQ2.reduce(function(sum, element){
      return sum + element;
    }, 0);
    var averageQ2 = sumQ2 / arrLengthQ2;
    //average Q3
    var dataQ3 = $(this).find('.data-average-each-3').text();
    var arrDataQ3 = dataQ3.split('');
    var arrNumDataQ3 = arrDataQ3.map(Number);
    var arrLengthQ3 = $(arrNumDataQ3).length;
    var sumQ3 = arrNumDataQ3.reduce(function(sum, element){
      return sum + element;
    }, 0);
    var averageQ3 = sumQ3 / arrLengthQ3;
    //average Q4
    var dataQ4 = $(this).find('.data-average-each-4').text();
    var arrDataQ4 = dataQ4.split('');
    var arrNumDataQ4 = arrDataQ4.map(Number);
    var arrLengthQ4 = $(arrNumDataQ4).length;
    var sumQ4 = arrNumDataQ4.reduce(function(sum, element){
      return sum + element;
    }, 0);
    var averageQ4 = sumQ4 / arrLengthQ4;
    //average Q5
    var dataQ5 = $(this).find('.data-average-each-5').text();
    var arrDataQ5 = dataQ5.split('');
    var arrNumDataQ5 = arrDataQ5.map(Number);
    var arrLengthQ5 = $(arrNumDataQ5).length;
    var sumQ5 = arrNumDataQ5.reduce(function(sum, element){
      return sum + element;
    }, 0);
    var averageQ5 = sumQ5 / arrLengthQ5;
    
    
    var averageAll = (averageQ1 + averageQ2 + averageQ3 + averageQ4 + averageQ5)/5;
    var evaluation = averageAll.toFixed(1);
    $(this).parents('.mgmtList__main__list--detail--right').find('.evaluation-js').html(evaluation);
  });


  //studentsClass_show, studentsTeacher_show evaluation
  $('.detail__pentagon--js').each(function(){
    //average Q1
    var dataQ1 = $(this).find('.data-average-each-1').text();
    var arrDataQ1 = dataQ1.split('');
    var arrNumDataQ1 = arrDataQ1.map(Number);
    var arrLengthQ1 = $(arrNumDataQ1).length;
    var sumQ1 = arrNumDataQ1.reduce(function(sum, element){
      return sum + element;
    }, 0);
    var averageQ1 = sumQ1 / arrLengthQ1;
    //average Q2
    var dataQ2 = $(this).find('.data-average-each-2').text();
    var arrDataQ2 = dataQ2.split('');
    var arrNumDataQ2 = arrDataQ2.map(Number);
    var arrLengthQ2 = $(arrNumDataQ2).length;
    var sumQ2 = arrNumDataQ2.reduce(function(sum, element){
      return sum + element;
    }, 0);
    var averageQ2 = sumQ2 / arrLengthQ2;
    //average Q3
    var dataQ3 = $(this).find('.data-average-each-3').text();
    var arrDataQ3 = dataQ3.split('');
    var arrNumDataQ3 = arrDataQ3.map(Number);
    var arrLengthQ3 = $(arrNumDataQ3).length;
    var sumQ3 = arrNumDataQ3.reduce(function(sum, element){
      return sum + element;
    }, 0);
    var averageQ3 = sumQ3 / arrLengthQ3;
    //average Q4
    var dataQ4 = $(this).find('.data-average-each-4').text();
    var arrDataQ4 = dataQ4.split('');
    var arrNumDataQ4 = arrDataQ4.map(Number);
    var arrLengthQ4 = $(arrNumDataQ4).length;
    var sumQ4 = arrNumDataQ4.reduce(function(sum, element){
      return sum + element;
    }, 0);
    var averageQ4 = sumQ4 / arrLengthQ4;
    //average Q5
    var dataQ5 = $(this).find('.data-average-each-5').text();
    var arrDataQ5 = dataQ5.split('');
    var arrNumDataQ5 = arrDataQ5.map(Number);
    var arrLengthQ5 = $(arrNumDataQ5).length;
    var sumQ5 = arrNumDataQ5.reduce(function(sum, element){
      return sum + element;
    }, 0);
    var averageQ5 = sumQ5 / arrLengthQ5;
    
    var averageAll = (averageQ1 + averageQ2 + averageQ3 + averageQ4 + averageQ5)/5;
    var evaluation = averageAll.toFixed(1);
    $(this).find('.evaluation-js').html(evaluation);
  });
});

  $('.sbjProfCard__info__top--val--pentagon').each(function(){
    //average Q1
    var dataQ1 = $(this).find('.data-average-each-1').text();
    var arrDataQ1 = dataQ1.split('');
    var arrNumDataQ1 = arrDataQ1.map(Number);
    var arrLengthQ1 = $(arrNumDataQ1).length;
    var sumQ1 = arrNumDataQ1.reduce(function(sum, element){
      return sum + element;
    }, 0);
    var averageQ1 = sumQ1 / arrLengthQ1;
    //average Q2
    var dataQ2 = $(this).find('.data-average-each-2').text();
    var arrDataQ2 = dataQ2.split('');
    var arrNumDataQ2 = arrDataQ2.map(Number);
    var arrLengthQ2 = $(arrNumDataQ2).length;
    var sumQ2 = arrNumDataQ2.reduce(function(sum, element){
      return sum + element;
    }, 0);
    var averageQ2 = sumQ2 / arrLengthQ2;
    //average Q3
    var dataQ3 = $(this).find('.data-average-each-3').text();
    var arrDataQ3 = dataQ3.split('');
    var arrNumDataQ3 = arrDataQ3.map(Number);
    var arrLengthQ3 = $(arrNumDataQ3).length;
    var sumQ3 = arrNumDataQ3.reduce(function(sum, element){
      return sum + element;
    }, 0);
    var averageQ3 = sumQ3 / arrLengthQ3;
    //average Q4
    var dataQ4 = $(this).find('.data-average-each-4').text();
    var arrDataQ4 = dataQ4.split('');
    var arrNumDataQ4 = arrDataQ4.map(Number);
    var arrLengthQ4 = $(arrNumDataQ4).length;
    var sumQ4 = arrNumDataQ4.reduce(function(sum, element){
      return sum + element;
    }, 0);
    var averageQ4 = sumQ4 / arrLengthQ4;
    //average Q5
    var dataQ5 = $(this).find('.data-average-each-5').text();
    var arrDataQ5 = dataQ5.split('');
    var arrNumDataQ5 = arrDataQ5.map(Number);
    var arrLengthQ5 = $(arrNumDataQ5).length;
    var sumQ5 = arrNumDataQ5.reduce(function(sum, element){
      return sum + element;
    }, 0);
    var averageQ5 = sumQ5 / arrLengthQ5;

    
    var averageAll = (averageQ1 + averageQ2 + averageQ3 + averageQ4 + averageQ5)/5;
    var evaluation = averageAll.toFixed(1)
    $(this).find('.evaluation-js').html(evaluation);
    var numOfQue = (arrLengthQ1 +arrLengthQ2 +arrLengthQ3 +arrLengthQ4 +arrLengthQ5)/5;
    // var numOfQueAbout = numOfQue.toFixed();
    // console.log(numOfQueAbout);
    // $(this).parents('.mgmtList__main__list--detail--right').find('.numOfQueAbout').html(numOfQueAbout);
  });


//evaluation-js when data null
$(function(){
  $('.evaluation-js').each(function(){
    var evaluationCheck = $(this).html();
    if(evaluationCheck == 'NaN'){
      $(this).html('ー');
    }
  });
});
