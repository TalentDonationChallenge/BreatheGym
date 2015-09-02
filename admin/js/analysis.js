$(document).ready(function () {
    var myNewChart = new Chart($("#chart").get(0).getContext("2d")).Line({
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [65, 59, 80, 81, 56, 55, 40]
            }
        ]
    },{
        animation: false,
        showScale: false,
        responsive: true,
        scaleShowGridLines : false,
        bezierCurve : false,
        pointDot : true,
        datasetStroke : false,
        datasetFill : false
    });
    var myNewChart01 = new Chart($("#chart2").get(0).getContext("2d")).Line({
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [65, 59, 80, 81, 56, 55, 40]
            }
        ]
    },{
        animation: false,
        showScale: false,
        responsive: true,
        scaleShowGridLines : false,
        bezierCurve : false,
        pointDot : true,
        datasetStroke : false,
        datasetFill : false
    });
    var doughnutData = [{
        value: 60,
        color:"#68dff0"
    },{
        value : 40,
        color : "#444c57"
    }];
    var myDoughnut = new Chart($("#piechart").get(0).getContext("2d")).Doughnut(doughnutData);
    var myBarchart = new Chart($("#bar-graph").get(0).getContext("2d")).Bar({
        labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.5)",
            strokeColor: "rgba(220,220,220,0.8)",
            highlightFill: "rgba(220,220,220,0.75)",
            highlightStroke: "rgba(220,220,220,1)",
            data: [65, 59, 80, 81, 56, 55, 40]
        }
    ]
    },{
        responsive:true,
        scaleBeginAtZero : false,
        //Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines : true,
        //String - Colour of the grid lines
        scaleGridLineColor : "rgba(0,0,0,.05)",
        //Number - Width of the grid lines
        scaleGridLineWidth : 1,
        //Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,
        //Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines: true,
        //Boolean - If there is a stroke on each bar
        barShowStroke : false,
        //Number - Pixel width of the bar stroke
        barStrokeWidth : 2,
        //Number - Spacing between each of the X value sets
        barValueSpacing : 30
    });
});
