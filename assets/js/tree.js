google.charts.load("current", { packages: ["orgchart"] });
google.charts.setOnLoadCallback(drawChart);

var wft_tree_data = JSON.parse(tree_data.results);
var tree_data_style = JSON.parse(tree_data.wftree_opts);
console.log(tree_data_style.wft_background_color);

var tree_values = wft_tree_data.map((doc) => Object.values(doc));

function drawChart() {
  var data = new google.visualization.DataTable();
  data.addColumn("string", "Name");
  data.addColumn("string", "Manager");

  // For each orgchart box, provide the name, manager, and tooltip to show.
  data.addRows(tree_values);

  console.log(tree_values);
  //Styling

  var style = `background-image:none; background-color:${tree_data_style.wft_background_color}; color:${tree_data_style.wft_color}; font-weight:${tree_data_style.wft_font_weight}; border:0; font-style: ${tree_data_style.wft_font_style};`;

  for (let i = 0; i < tree_values.length; i++) {
    data.setRowProperty(i, "style", style);
  }

  // Create the chart.
  var chart = new google.visualization.OrgChart(
    document.getElementById("chart_div")
  );
  // Draw the chart, setting the allowHtml option to true for the tooltips.
  chart.draw(data, { allowHtml: true });
}
