// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var  label = [];
var count = [];
$(document).ready(function () {
  showGraph();
});


function showGraph()
{
  {
      $.post("data.php",
      function (data)
      {
          console.log(data);
          for (var i in data) {
            label.push(data[i].location);
            count.push(data[i].count);
          }   

          var chartdata = {
              labels: label,
              datasets: [
                  {
                      label: 'Location',
                      backgroundColor: '#49e2ff',
                      borderColor: '#46d5f1',
                      hoverBackgroundColor: '#CCCCCC',
                      hoverBorderColor: '#666666',
                      data: count
                  }
              ]
          };

          var graphTarget = $("#myBarChart");

          var barGraph = new Chart(graphTarget, {
              type: 'bar',
              data: chartdata,
              options: {
                    scales: {
                      xAxes: [{
                        time: {
                          unit: 'Area'
                        },
                        gridLines: {
                          display: false
                        }
                      }],
                      yAxes: [{
                        ticks: {
                          min: 0,
                          max: 10,
                          maxTicksLimit: 5
                        },
                        gridLines: {
                          display: true
                        }
                      }],
                    },
                    legend: {
                      display: false
                    }
                  }

          });
      });
  }
}