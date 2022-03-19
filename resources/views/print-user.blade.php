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

    <style type="text/css">
        @media print {
            #printPageButton {
                display: none;
            }
            #printPageButton1 {
                display: none;
            }
            #printPageButton2 {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="body_wrap">
        <div class="inner_body col-12">
            <div class="container">
                <div class="col-lg-6 col-md-12 mx-auto">
                    <div class="main_clm ">
                        <form method="POST" action="submit-exam" class="setp_wrap mb-4" autocomplete="off">
                            <div class="mySet active_tab" style="text-align: center;">
                                <h6>Abschlussprüfung Kraftfahrzeugmechatroniker/-in (02/22)</h6>
                                <div class="content_box my-4">
                                    
                                    <br>
                                    <br>
                                    <br>
                                    <h3>Name des Teilnehmers</h3>
                                    <h4>{{ $user->name }}</h4>
                                    <br>

                                    <br>

                                    <br>
                                    <h3>Teilnehmernummer</h3>
                                    <h4>{{ $user->participant_number }}</h4>
                                    <br>

                                    <br>

                                    <br>
                                    <h3>Bitte geben Sie diesen Code am Prüfungsrechner ein:</h3>
                                    <h4>{{ $user->code }}</h4>
                                    <br>
                                </div>
                            </div>
                        </form>

                        <ul class="set_btn">
                         <li><a style="height: 100%;" href="/student-overview" id="printPageButton">  Abschließen </a></li>
                             <li><a style="height: 100%;" href="/" id="printPageButton1"> Klicken Sie hier, um sich einzuloggen </a></li>
                            <li><a style="height: 100%;" onclick="window.print()" id="printPageButton2" href="javascript:void(0)"> Drucken </a></li>
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