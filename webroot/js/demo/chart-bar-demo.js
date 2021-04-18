// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月", "未定請求月"],
    datasets: [
      {
        label: "請求額",
        backgroundColor: "#4e73df",
        hoverBackgroundColor: "#2e59d9",
        borderColor: "#4e73df",
        data: [sum_January, sum_February, sum_March, sum_April, sum_May, sum_June, sum_July, sum_August, sum_September, sum_October, sum_November, sum_December, sum_Predicted],
      },
      {
        label: '見込額',
        backgroundColor: "#ccc",
        hoverBackgroundColor: "#bbb",
        borderColor: "#4e73df",
        data: [predicted_January, predicted_February, predicted_March, predicted_April, predicted_May, predicted_June, predicted_July, predicted_August, predicted_September, predicted_October, predicted_November, predicted_December, predicted_Month],
      },
    ],
  },
  options: {
    maintainAspectRatio: false,
    scales: {
        xAxes: [{
              stacked: true, //積み上げ棒グラフにする設定
              categoryPercentage:0.4 //棒グラフの太さ
        }],
        yAxes: [{
              stacked: true, //積み上げ棒グラフにする設定
              ticks: {
                maxTicksLimit: 5,
                padding: 10,
                // Include a dollar sign in the ticks
                callback: function(value, index, values) {
                  return '￥' + number_format(value);
                }
              },
        }]
    },
    legend: {
        labels: {
              boxWidth:30,
              padding:20 //凡例の各要素間の距離
        },
        display: true
    },
    tooltips:{
      mode:'label', //マウスオーバー時に表示されるtooltip
      callbacks: {
        label: function(tooltipItem, data) {
          var datasetLabel = data.datasets[tooltipItem.datasetIndex].label;

          // Loop through all datasets to get the actual total of the index
          var total = 0;
          for (var i = 0; i < data.datasets.length; i++)
              total += data.datasets[i].data[tooltipItem.index];
  
          // If it is not the last dataset, you display it as you usually do
          if (tooltipItem.datasetIndex != data.datasets.length - 1) {
              return datasetLabel + " : ￥" + number_format(tooltipItem.yLabel);
          } else { // .. else, you display the dataset and the total, using an array
              return [datasetLabel + " : ￥" + number_format(tooltipItem.yLabel), "合計　 : ￥" + number_format(total)];
          }
        }
      }
    }
  }
});