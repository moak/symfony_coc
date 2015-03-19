/**
 * Created by Florent1 on 19/03/15.
 */

//var label = '{##} seasons #} '.replace(/&#039;/g, "'");
// console.log(label);
//console.log(label);
var attackChartData = {

    labels : label_chart,
    datasets : [
        {
            label: "Attacks",
            fillColor : "rgba(220,220,220,0.2)",
            strokeColor : "rgba(0,128,0,0.9)",
            pointColor : "rgba(220,220,220,1)",
            pointStrokeColor : "#fff",
            pointHighlightFill : "#fff",
            pointHighlightStroke : "rgba(220,220,220,1)",

            data : result_attackWon
        },

    ]

}

var trophyChartData = {
    labels : label_chart,
    datasets : [
        {
            label: "Trophies",
            strokeColor : "green",
            pointColor : "green",
            pointStrokeColor : "green",
            pointHighlightStroke : "rgba(220,220,220,1)",
            data : result_trophy
        }
    ]

}


var totalChartData = {

    labels : label_chart,
    datasets : [
        {
            label: "Attacks",
            fillColor : "green",
            strokeColor : "#9CFF88",
            pointColor : "orange",
            pointStrokeColor : "#fff",
            pointHighlightFill : "white",
            pointHighlightStroke : "rgba(220,220,220,1)",

            data : result_total
        },

    ]

}


var activityChartData = {

    labels : label_chart,
    datasets : [
        {
            label: "Troops Sent",
            strokeColor : "green",
            pointColor : "green",
            pointStrokeColor : "green",
            pointHighlightStroke : "rgba(220,220,220,1)",
            data : result_troopSent

        },
        {
            label: "Troops Received",
            strokeColor : "red",
            pointColor : "red",
            pointStrokeColor : "red",
            pointHighlightFill : "red",
            pointHighlightStroke : "red",
            data : result_troopReceived
        }
    ]
}



window.onload = function(){
    var ctxAttacks = document.getElementById("chart-attacks").getContext("2d");
    window.myLine = new Chart(ctxAttacks).Line(attackChartData, {
//String - Colour of the grid lines
        scaleGridLineColor : "rgba(200,200,200,.05)",

        responsive: true,
        scaleOverride: false,
        scaleSteps: 10,
        scaleStepWidth: Math.ceil(120 / 10),
        scaleStartValue: 0,
        bezierCurve : false,
        scaleShowGridLines : true
    });

    var ctxActivity = document.getElementById("chart-activity").getContext("2d");
    window.myLine = new Chart(ctxActivity).Line(activityChartData, {
//String - Colour of the grid lines
        scaleGridLineColor : "rgba(200,200,200,.05)",
        responsive: true,
        scaleOverride: false,
        datasetFill : false,
        scaleSteps: 7,
        scaleStepWidth: 300,
        scaleStartValue: 0,
        bezierCurve : false,
        scaleShowGridLines : true
    });


    var ctxTrophy = document.getElementById("chart-trophy").getContext("2d");
    window.myLine = new Chart(ctxTrophy).Line(trophyChartData, {
//String - Colour of the grid lines
        scaleGridLineColor : "rgba(200,200,200,.05)",
        responsive: true,
        scaleOverride: false,
        datasetFill : false,
        scaleSteps: 7,
        scaleStepWidth: 300,
        scaleStartValue: 0,
        bezierCurve : false,
        scaleShowGridLines : true
    });

    var ctxTotal = document.getElementById("chart-total").getContext("2d");
    window.myLine = new Chart(ctxTotal).Line(totalChartData, {
//String - Colour of the grid lines
        scaleGridLineColor : "rgba(200,200,200,.05)",
        responsive: true

    });


}

