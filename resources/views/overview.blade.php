<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/web_theme.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="owl/css/owl.carousel.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Black+Ops+One|Odibee+Sans|Orbitron|Press+Start+2P|Quantico|ZCOOL+QingKe+HuangYou&display=swap" rel="stylesheet">
</head>
<body>
    <div class="body_wrap">
        <div class="inner_body col-12">
            <div class="container">
                <div class="col-lg-8 col-md-12 mx-auto">
                    <div class="main_clm ">
                        <form method="POST" action="submit-exam" class="setp_wrap mb-4" autocomplete="off">
                            <div class="mySet active_tab">
                                <h3>Übersicht</h3>
                                <div class="content_box my-4">
                                    
                                        <!-- when was the exam -->
                                        <p class="field">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            &nbsp;
                                            Die Prüfung wurde am <b>
						@if($lastSubmission)
							{{$lastSubmission->end_time}} 
						@endif
					</b> durchgeführt
                                        </p>
                                        <!-- how many students submitted -->
                                        <p class="field">
                                            <i class="fa fa-users" aria-hidden="true"></i>
                                            &nbsp;
                                            Es haben <b>{{ $totalExamsSubmitted }}</b> Prüflinge teilgenommen
                                        </p>
                                        <!-- average points out of 7/10 -->
                                        <p class="field">
                                            <i class="fa fa-barcode" aria-hidden="true"></i>
                                            &nbsp;
                                            @if($averageScore > 0)
                                                Durchnittiche Punktzahl: <b>{{ $averageScore }} / 10</b> Punkte
                                            @else
                                                Es liegen bisher keine Ergebnisse vor
                                            @endif
                                        </p>
                                        <!-- Average time for exam to finish -->
                                        <p class="field">
                                            <i class="fa fa-hourglass" aria-hidden="true"></i>
                                            &nbsp;
                                            @if($averageTime > 0)
                                                Durchschnittiche Bearbeitungszeit: <b>{{ $averageTime }} Minuten</b>
                                            @else
                                                Es liegen bisher keine Ergebnisse vor
                                            @endif
                                        </p>
                                    
                                </div>
                            </div>
                        </form>

                        <ul class="set_btn">
                             <li><a href="/home"> Zurück </a></li>
                            <li><a href="report"> Ausführliche Auswertung </a></li>
                            <li><a href="register">Schüler hinzufügen </a></li>
                            <li><a href="attempts">Korrektur starten</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JS -->
    <script src="js/jquery.js"></script>
    <script src="owl/js/owl.carousel.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
