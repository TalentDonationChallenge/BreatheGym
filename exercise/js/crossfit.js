$(document).ready(function () {
    Morris.Line({
        element:'line-graph',
        data:[
            {y:'2015-08-20', a:25},
            {y:'2015-08-21', a:30},
            {y:'2015-08-22', a:20},
            {y:'2015-08-23', a:10}
        ],
        xkey:'y',
        ykeys:['a'],
        labels:['백분위'],
        xLabels:"day"
    });
});
