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
        /*************************ANWER SHEET CSS*/
        h4 {font-size: 18px; font-weight: 700; text-transform: capitalize; }
        .answer_sheet_wrap {display: flex; width: 100%; justify-content: center; align-items: center; background-image: var(--body_bd); background-blend-mode: color-dodge; background-size: contain; background-repeat: repeat; background-position: top right; padding: 40px 0; }
        .dyan_txt_box_ {background-color: #fff !important; border-radius: 30px !important; padding: 20px !important; width: 100%; border: 1px solid #00000042; }
        .dyan_txt_box_ p {margin: 0; }

        /*************************ANWER SHEET CSS*/

        /*************************PROGRESS BAR CSS*/
        .progress_bar_wrap {display: grid; }
        @media (min-width: 420px) and (max-width: 659px) {
          .progress_bar_wrap {grid-template-columns: repeat(2, 160px); }
        }
        @media (min-width: 660px) and (max-width: 899px) {
          .progress_bar_wrap {grid-template-columns: repeat(3, 160px); }
        }
        @media (min-width: 900px) {
          .progress_bar_wrap {grid-template-columns: repeat(3, 160px); }
        }
        .box .chart {position: relative; width: 100%; height: 100%; text-align: center; font-size: 20px;font-weight: 600; line-height: 160px; height: 160px; color: #000; }
        .box canvas {position: absolute; top: 0; left: 0; width: 100%; width: 100%; }
        /*************************PROGRESS BAR CSS*/    
    </style>
</head>
<body>

<div class="answer_sheet_wrap">
    <div class="inner_body col-12">
        <div class="container">
            <div class="col-lg-8 col-md-12 mx-auto">
                <form method="POST" action="update-evaluation" class="setp_wrap mb-4" autocomplete="off">
                @csrf
                    <div class="main_clm mb-4">
                        <h3>Nennen Sie Vier Punkte, Die Bei Der Sichtprüfung Und Montage Von Remsleitungen Besonders Zu Beachten Sind.</h3>
                        <div class="content_box my-4">
                            <div class="dyan_txt_box_ mb-2">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum iaculis ornare dui eget dictum. Donec eu lobortis odio. Nullam vestibulum leo sit amet neque porta efficitur in aliquam velit. Integer nec suscipit est, ut iaculis dolor. Cras augue elit, commodo vitae ex in, ultrices interdum justo. Suspendisse eget sapien molestie, lobortis ante sed, auctor justo. Nunc iaculis sollicitudin tellus in blandit. Vivamus nunc massa, lacinia vitae finibus sit amet, iaculis finibus tellus. Curabitur ornare, nulla sit amet pretium rhoncus, massa augue pulvinar ipsum, at aliquam turpis dui ac lorem. Nulla gravida tincidunt quam, nec fermentum nunc facilisis eu. In eu tellus quis quam dictum imperdiet malesuada non nisl.</p>
                            </div>
                            <div class="dyan_txt_box_ mb-2">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum iaculis ornare dui eget dictum. Donec eu lobortis odio. Nullam vestibulum leo sit amet neque porta efficitur in aliquam velit. Integer nec suscipit est, ut iaculis dolor. Cras augue elit, commodo vitae ex in, ultrices interdum justo. Suspendisse eget sapien molestie, lobortis ante sed, auctor justo. Nunc iaculis sollicitudin tellus in blandit. Vivamus nunc massa, lacinia vitae finibus sit amet, iaculis finibus tellus. Curabitur ornare, nulla sit amet pretium rhoncus, massa augue pulvinar ipsum, at aliquam turpis dui ac lorem. Nulla gravida tincidunt quam, nec fermentum nunc facilisis eu. In eu tellus quis quam dictum imperdiet malesuada non nisl.</p>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-4 col-md-12 mb-2 mb-lg-0">
                                    <div class="txt_box">
                                        <h4>Lorem ipsum it is a simply dummy text</h4>
                                        <p>Lorem ipsum</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 mb-2 mb-lg-0">
                                    <div class="txt_box">
                                        <h4>Lorem ipsum it is a simply dummy text</h4>
                                        <p>Lorem ipsum</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 mb-2 mb-lg-0">
                                    <div class="progress_bar_wrap">
                                        <div class="box">
                                            <div class="chart" data-percent="90" >90%</div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="set_btn">
                                    <li><a href="#">Entsheidung annahmen</a></li>
                                    <li><a href="#">Entsheidung ablehenen</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="main_clm mb-4">
                        <h3>Nennen Sie Vier Punkte, Die Bei Der Sichtprüfung Und Montage Von Remsleitungen Besonders Zu Beachten Sind.</h3>
                        <div class="content_box my-4">
                            <div class="dyan_txt_box_ mb-2">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum iaculis ornare dui eget dictum. Donec eu lobortis odio. Nullam vestibulum leo sit amet neque porta efficitur in aliquam velit. Integer nec suscipit est, ut iaculis dolor. Cras augue elit, commodo vitae ex in, ultrices interdum justo. Suspendisse eget sapien molestie, lobortis ante sed, auctor justo. Nunc iaculis sollicitudin tellus in blandit. Vivamus nunc massa, lacinia vitae finibus sit amet, iaculis finibus tellus. Curabitur ornare, nulla sit amet pretium rhoncus, massa augue pulvinar ipsum, at aliquam turpis dui ac lorem. Nulla gravida tincidunt quam, nec fermentum nunc facilisis eu. In eu tellus quis quam dictum imperdiet malesuada non nisl.</p>
                            </div>
                            <div class="dyan_txt_box_ mb-2">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum iaculis ornare dui eget dictum. Donec eu lobortis odio. Nullam vestibulum leo sit amet neque porta efficitur in aliquam velit. Integer nec suscipit est, ut iaculis dolor. Cras augue elit, commodo vitae ex in, ultrices interdum justo. Suspendisse eget sapien molestie, lobortis ante sed, auctor justo. Nunc iaculis sollicitudin tellus in blandit. Vivamus nunc massa, lacinia vitae finibus sit amet, iaculis finibus tellus. Curabitur ornare, nulla sit amet pretium rhoncus, massa augue pulvinar ipsum, at aliquam turpis dui ac lorem. Nulla gravida tincidunt quam, nec fermentum nunc facilisis eu. In eu tellus quis quam dictum imperdiet malesuada non nisl.</p>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-4 col-md-12 mb-2 mb-lg-0">
                                    <div class="txt_box">
                                        <h4>Lorem ipsum it is a simply dummy text</h4>
                                        <p>Lorem ipsum</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 mb-2 mb-lg-0">
                                    <div class="txt_box">
                                        <h4>Lorem ipsum it is a simply dummy text</h4>
                                        <p>Lorem ipsum</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 mb-2 mb-lg-0">
                                    <div class="progress_bar_wrap">
                                        <div class="box">
                                            <div class="chart" data-percent="90" >90%</div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="set_btn">
                                    <li><a href="#">Entsheidung annahmen</a></li>
                                    <li><a href="#">Entsheidung ablehenen</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="main_clm">
                        <h3>Abschlussprüfung "Kraftfahrzeugmechatroniker/-In"</h3>
                        <div class="content_box my-4">
                                <p >Sind Sie sich sicher, dass Sie die Prüfung abschließen wollen?</p>
                                <span class="check_txt">Sie haben alle Fragen beantwortet.</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- JS -->
    <script src="js/jquery.js"></script>
    <script src="owl/js/owl.carousel.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/easy-pie-chart/2.1.6/jquery.easypiechart.min.js" charset="utf-8"></script>

    <script type="text/javascript">
        $(function() {
            $('.chart').easyPieChart({
                size: 160,
                barColor: "#116acc",
                scaleLength: 0,
                lineWidth: 10,
                trackColor: "#ccc",
                lineCap: "circle",
                animate: 2000,
            });
        });
    </script>
</body>
</html>