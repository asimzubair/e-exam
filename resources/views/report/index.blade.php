<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<body>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/web_theme.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="owl/css/owl.carousel.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Black+Ops+One|Odibee+Sans|Orbitron|Press+Start+2P|Quantico|ZCOOL+QingKe+HuangYou&display=swap" rel="stylesheet">
<style type="text/css">
    .nav-link{
        color: white;
    }
</style>
    <div class="body_wrap">
        <div class="inner_body col-12">
            <div class="container">
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Teilnehmer</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Punkteverteilung</button>
  </li>
   <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-Zeit-tab" data-bs-toggle="pill" data-bs-target="#pills-Zeit" type="button" role="tab" aria-controls="pills-Zeit" aria-selected="false">Zeit pro Frage</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Schwierigste Frage</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-lowQuestion-tab" data-bs-toggle="pill" data-bs-target="#pills-lowQuestion" type="button" role="tab" aria-controls="pills-lowQuestion" aria-selected="false">Leichteste Frage</button>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
   
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div id="container"></div>
    </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
     <div id="container2"></div>
  </div>
  <div class="tab-pane fade" id="pills-Zeit" role="tabpanel" aria-labelledby="pills-Zeit-tab">
     <div id="container3"></div>
  </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
      <div style="background: white;height: 200px; padding: 10px;"><h3><?=$hardQuestion?></h3></div>
  </div>
  <div class="tab-pane fade" id="pills-lowQuestion" role="tabpanel" aria-labelledby="pills-lowQuestion-tab">
      <div style="background: white;height: 200px; padding: 10px;"><h3><?=$lowQuestion?></h3></div>
  </div>
  <br>
   <a class="web_btn theme_bg" href="/home"><i class="fa fa-arrow-left" aria-hidden="true"></i> Zurück</a>
</div>
</div>
</div>
</div>
</body>
<script type="text/javascript">
  // Build the chart
  countArray = <?=json_encode($countNumberArray,true)?>;
   questionDiffArray = <?=json_encode($questionDiff,true)?>;
  
  console.log(questionDiffArray);
Highcharts.chart('container', {

    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: ''
    },lang: {
                viewFullscreen: "In Vollbild ansehen",
                printChart: "Chart ausdrucken",
                downloadPNG: "Download als PNG",
                downloadJPEG: "Download als JPEG",
                downloadPDF: "Download als PDF",
                downloadSVG: "Download als SVG",
                downloadCSV: "Download als CSV",
                downloadXLS: "Download als Excel-Dokument",
                viewData: "Datenquelle anschauen",
            },
    tooltip: {

        //pointFormat: '{series.name}: <b>{series.y}</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '{point.y}',
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Teilnehmer',
        colorByPoint: true,
       data: [{
            name: 'Fehlende Teilnehmer',
            y: <?=$registerUser?>,
            color: "rgb(92,92,97)"
        }, {
            name: 'Teilnehmer',
            y: <?=$takeExam?>,
            color: "rgb(124,181,236)"
        }]
    }]
});



// Create the chart
Highcharts.chart('container2', {
    chart: {
        type: 'column'
    },
     title: {
        text: ''
    },lang: {
                viewFullscreen: "In Vollbild ansehen",
                printChart: "Chart ausdrucken",
                downloadPNG: "Download als PNG",
                downloadJPEG: "Download als JPEG",
                downloadPDF: "Download als PDF",
                downloadSVG: "Download als SVG",
                downloadCSV: "Download als CSV",
                downloadXLS: "Download als Excel-Dokument",
                viewData: "Datenquelle anschauen",
            },
    series: [
       {
            colorByPoint: true,
            name: "Anzahl der Schüler",
            data:countArray
        }
    ],
     xAxis: {
        type: 'Frage'
    },
    yAxis: {
        title: {
            text: 'Anzahl der Schüler'
        }

    },
    legend: {
        enabled: true
    },
});

// Create the chart
Highcharts.chart('container3', {
    chart: {
                type: 'column',
                 
            },
            title: {
                text: ''
            },
            lang: {
                viewFullscreen: "In Vollbild ansehen",
                printChart: "Chart ausdrucken",
                downloadPNG: "Download als PNG",
                downloadJPEG: "Download als JPEG",
                downloadPDF: "Download als PDF",
                downloadSVG: "Download als SVG",
                downloadCSV: "Download als CSV",
                downloadXLS: "Download als Excel-Dokument",
                viewData: "Datenquelle anschauen",
            },
            xAxis: {
                 categories: ['1', '2','3','4','5','6', '7','8','9','10'],
                name: 'Fragennummer',
            },
            yAxis: {
                 type: 'time', //y-axis will be in milliseconds
                 dateTimeLabelFormats: { //force all formats to be hour:minute:second
                    second: 'M:%S',
                    minute: 'M:%S',
                    hour: 'M:%S',
                    day: 'M:%S',
                    week: 'M:%S',
                    month: 'M:%S',
                    year: 'M:%S'
                },'title':{
                    text:'Durchschnittlich benötigte Zeit in Sekunde'
                }
            },
            series: [
                {  data: questionDiffArray,
                name: 'Fragennummer' }
                 ]
});
jQuery('.highcharts-credits').hide();
</script>
</html>