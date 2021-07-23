
var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'radar', 
        data: { 
            labels: ["授業の質", "楽しい", "対応力", "わかりやすい", "ためになる"],
            datasets: [{
                label: 'parson A',
                data: [4.7, 3, 5, 4, 4],
                backgroundColor: 'RGBA(105, 145, 255, 0.7)',
                borderColor: 'RGBA(105, 145, 255, 1)',
                borderWidth: 1,
                pointBackgroundColor: 'RGB(46,106,177)'
            }]
        },
        options: {
            title: {
                display: false,
                text: '試験成績',
                fontSize: 16
            },
            scale:{
                ticks:{
                    suggestedMin: 0,
                    suggestedMax: 5,
                    stepSize: 1,
                    fontSize: 14
                }
            },
            legend: {
              display: false
            }
            
        }
    });
