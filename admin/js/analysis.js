$(document).ready(function () {
    var month = [];
    for (var i = 0; i < 5; i++) {
        month[i] = moment().subtract(5-i, 'months');
    }
    month[5] = moment();
    var monthLabel = [];
    for (var i = 0; i < 6; i++) {
        monthLabel[i] = month[i].format("MMM");
    }
    var lineChartSetting = { //꺾은선 그래프 설정
        animation: false,
        showScale: false,
        responsive: true,
        scaleShowGridLines : false,
        bezierCurve : false,
        pointDot : true,
        datasetStroke : false,
        datasetFill : false
    };
    $.ajax({
        url:'load.php'
    }).done(function (msg) {
        //월별 가입 회원수 가져오기
        var joinedData = [];
        for (var i = 0; i < 6; i++) { //최근 6개월내 값이 없을시 0을 할당
            var flag = true;
            for (var m in msg.monthlyJoinedMember) {
                if (month[i].format("MM") == msg.monthlyJoinedMember[m].month) {
                    joinedData.push(msg.monthlyJoinedMember[m].count*1);
                    msg.monthlyJoinedMember.shift();
                    flag = false;
                    break;
                }
            }
            if(flag){
                joinedData.push(0);
            }
        }
        var monthlyJoinedChart = new Chart($("#joinedChart").get(0).getContext("2d")).Line({
            labels: monthLabel,
            datasets:[{
                label: "월별 가입회원수",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data : joinedData
            }]
        },lineChartSetting);
    });
    var dailyAttendChart = new Chart($("#attendChart").get(0).getContext("2d")).Line({
        labels: ['10일','10일','10일','10일','10일','10일'],
        datasets:[{
            label: "날짜별 출석회원수",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data : [50, 70, 30, 50, 66, 55]
        }]
    },lineChartSetting);
    var myDoughnut = new Chart($("#piechart").get(0).getContext("2d")).Doughnut([{
        value: 60,
        color:"#68dff0"
    },{
        value : 30,
        color : "#444c57"
    },{
        value : 10,
        color : "#fff"
    }]);
    var myBarchart = new Chart($("#bar-graph").get(0).getContext("2d")).Bar({
        labels: monthLabel,
        datasets: [{
            label: "전체 회원 수 추이",
            fillColor: "rgba(220,220,220,0.5)",
            strokeColor: "rgba(220,220,220,0.8)",
            highlightFill: "rgba(220,220,220,0.75)",
            highlightStroke: "rgba(220,220,220,1)",
            data : [50, 70, 30, 50, 66, 55]
        }]
    },{
        responsive:true,
        scaleShowGridLines : true,
        scaleGridLineColor : "rgba(0,0,0,.05)",
        scaleGridLineWidth : 1,
        scaleShowHorizontalLines: true,
        scaleShowVerticalLines: true,
        barShowStroke : false,
        barStrokeWidth : 2,
        barValueSpacing : 30
    });
});
