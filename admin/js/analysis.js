$(document).ready(function () {
    $(".sparkline").each(function(){
        var $data = $(this).data();
        $data.valueSpots = {'0:': $data.spotColor};
        $(this).sparkline( $data.data || "html", $data, {
            tooltipFormat: '<span style="display:block; padding:0px 10px 12px 0px;">' +
            '<span style="color: {{color}}">&#9679;</span> {{offset:names}} ({{percent.1}}%)</span>'
        });
    });
    $("#piechart").sparkline([2,1,1,1], {
        type: 'pie',
        width: '150',
        height: '200',
        sliceColors: ['#41CAC0', '#A8D76F', '#F8D347', '#EF6F66']
//        tooltipFormat: '<span style="display:block; padding:0px 10px 12px 0px;">' +
//    '<span style="color: {{color}}">&#9679;</span> {{offset:names}} ({{percent.1}}%)</span>'});

    });
    Morris.Line({
        element:'line-graph',
        data:[
            {y:'2015-08', a:115},
            {y:'2015-09', a:130},
            {y:'2015-10', a:110},
            {y:'2015-11', a:105}
        ],
        xkey:'y',
        ykeys:['a'],
        labels:['명'],
        xLabels:"month"
    });
});
