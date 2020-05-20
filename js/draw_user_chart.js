

let httpReq = null;

if (window.XMLHttpRequest) {
  httpReq = new XMLHttpRequest();
} else if (window.ActiveObject) {
  httpReq = new ActiveXObject("Microsoft.XMLHTTP");
}

httpReq.onload = function()
{
  const data = JSON.parse(httpReq.responseText);
  const goal_data = data['goal_data'];
  let progress_data = data['progress_data'];

  let ctx;

  // if chart exists, then get reference of chart object 
  if (document.getElementById('userChart')) {
    ctx = document.getElementById('userChart').getContext('2d');
  }

  const start_date = goal_data['start_date'];
  const goal_date = goal_data['goal_date'];

  // if there is progress data, then transform into a array of the form:
  // [
  //   {
  //     x: Date,
  //     y: Number
  //   },
  //   {
  //     x: Date,
  //     y: Number
  //   },
  //   ...
  // ]
  progress_data = (progress_data) ? 
    progress_data.reduce((total, item) => {
      total.push({x: item.entry_date, y: item.weight})
      return total
    }, []) : [];

  // Using ChartJs library, populate chart to draw 2 lines
  // first will be showing the user goal 
  // second will be user weight posting history
  let chart = new Chart(ctx, {
    type: 'line',
    data: {
      datasets: [{ 
        label: "Goal",
        fill: false,
        borderDash: [10, 5],
        borderColor: "#40e2e8",
        data: [{
          x: start_date,
          y: goal_data['start_weight']
        }, {
          x: goal_date,
          y: goal_data['goal_weight']
        }]   
      }, {
        label: "Progress",
        fill: false,
        borderColor: "#37cc52",
        lineTension: 0,
        data: progress_data
      }]
    },
    options: {
      scales: {
        xAxes: [{
          type: 'time'
        }]
      }
    }
  });

}

httpReq.open('GET','../get_user_chart_data.php', true);
httpReq.send();

