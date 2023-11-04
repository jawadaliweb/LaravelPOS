var colors = ["#1abc9c", "#4a81d4"];
var dataColors = $("#sales-analytics").data("colors");
if (dataColors) {
  colors = dataColors.split(",");
}

// Assuming you have the sales data in your Blade view as $sales
var salesData = @json($sales); // Convert PHP array to JSON

var revenueData = salesData.map(function (sale) {
  return sale.total_price;
});

var salesCount = salesData.map(function (sale) {
  return sale.total_quantity;
});

var dates = salesData.map(function (sale) {
  return sale.date;
});

var options = {
  series: [
    { name: "Revenue", type: "column", data: revenueData },
    { name: "Sales", type: "line", data: salesCount }
  ],
  chart: { height: 378, type: "line", offsetY: 10 },
  stroke: { width: [2, 3] },
  plotOptions: { bar: { columnWidth: "50%" } },
  colors: colors,
  dataLabels: { enabled: true, enabledOnSeries: [1] },
  xaxis: { categories: dates, type: "datetime" },
  legend: { offsetY: 7 },
  grid: { padding: { bottom: 20 } },
  fill: {
    type: "gradient",
    gradient: {
      shade: "light",
      type: "horizontal",
      shadeIntensity: 0.25,
      gradientToColors: null,
      inverseColors: true,
      opacityFrom: 0.75,
      opacityTo: 0.75,
      stops: [0, 0, 0]
    }
  },
  yaxis: [
    { title: { text: "Net Revenue" } },
    { opposite: true, title: { text: "Number of Sales" } }
  ]
};

var chart = new ApexCharts(document.querySelector("#sales-analytics"), options);
chart.render();
