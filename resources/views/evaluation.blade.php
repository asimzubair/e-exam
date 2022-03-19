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
        h4 {font-size: 18px; font-weight: 700;  }
        .answer_sheet_wrap {display: flex; width: 100%; justify-content: center; align-items: center; background-image: var(--body_bd); background-blend-mode: color-dodge; background-size: contain; background-repeat: repeat; background-position: top right; padding: 40px 0; }
        .dyan_txt_box_ {background-color: #fff !important; border-radius: 30px !important; padding: 20px !important; width: 100%; border: 1px solid #00000042; }
        .dyan_txt_box_ p {margin: 0; }

        /*************************ANWER SHEET CSS*/

        /*************************PROGRESS BAR CSS*/
        .progress_bar_wrap {display: grid; margin-left: 20%; }
        @media (min-width: 420px) and (max-width: 659px) {
          .progress_bar_wrap {grid-template-columns: repeat(2, 160px); }
        }
        @media (min-width: 660px) and (max-width: 899px) {
          .progress_bar_wrap {grid-template-columns: repeat(3, 160px); }
        }
        @media (min-width: 900px) {
          .progress_bar_wrap {grid-template-columns: repeat(3, 160px); }
        }
        .box .chart {position: relative; width: 90px; height: 90px; line-height: 90px; text-align: center; font-size: 14px;font-weight: 600; color: #000; }
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
                    <input type="hidden" name="user_id" value="{{ $userId }}">

                    @php $totalPoints = 0; @endphp
                    @foreach($answers as $answer)
                        
                        @if($answer->type != 'invoice')
                            <div class="main_clm mb-4">
                                <h3>{{ $loop->iteration }}) {{ $answer->question }}</h3>
                                <div class="content_box my-4">
                                    <div class="dyan_txt_box_ mb-2">
                                        <p>
                                            Erwartete Antwort: 
                                            <b>
                                                {{ App\Models\Options::getCorrectAnswer($answer->question_id) }}
                                            </b>
                                        </p>
                                    </div>
                                    <div class="dyan_txt_box_ mb-2">
                                        @if($answer->type == 'multiple_choice' || $answer->type == 'dropdown')
                                            <p>Antwort des Prüflings: <b>{{ $answer->option }}</b></p>
                                        @elseif($answer->type == 'textarea')
                                            <p>Antwort des Prüflings: <b>{{ $answer->option_text }}</b></p>
                                        @endif
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-md-12 mb-2 mb-lg-0">
                                            <div class="txt_box">
                                                <h4>Maschinelle Entscheidung:</h4>
                                                <p></p>
                                                <p>Antwort: @if($answer->is_correct) Richtig @else Falsch @endif</p>
                                                <p>Punkte: @if($answer->is_correct) 1/1 @else 0/1 @endif</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 mb-2 mb-lg-0">
                                            <div class="txt_box">
                                                <h4>Genauigkeit der Entscheidung: </h4>
                                                <div class="progress_bar_wrap">
                                                    <div class="box">
                                                        <div class="chart" data-percent="{{ $answer->accuracy }}" >{{ $answer->accuracy }}%</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 mb-2 mb-lg-0">
                                            <div class="txt_box">
                                                <br>
                                                <h4>Korrektur der Antwort: </h4>
                                                <label class="quiz_radio">
                                                    <span class="btn btn-success">Richtige Antwort</span>
                                                    <input type="radio" name="question_{{ $answer->id }}" value="correct" 
                                                    @if($answer->is_correct) checked @endif>
                                                    <span class="quiz_mark"></span>
                                                </label>
                                                <label class="quiz_radio">
                                                    <span class="btn btn-danger">Falsche Antwort</span>
                                                    <input type="radio" name="question_{{ $answer->id }}" value="wrong" 
                                                    @if(!$answer->is_correct) checked @endif>
                                                    <span class="quiz_mark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="main_clm mb-4">
                                <h3>{{ $loop->iteration }}) {{ $answer->question }}</h3>
                                <div class="content_box my-4">
                                    <div class="dyan_txt_box_ mb-2">
                                        <p>
                                            Erwartete Antwort: 
                                            <b>
                                                {{ App\Models\Options::getCorrectAnswer($answer->question_id) }}
                                            </b>
                                        </p>
                                    </div>
                                    <div class="dyan_txt_box_ mb-2">
                                        Antwort des Prüflings: <br>                                            
                                            @php $json = json_decode($answer->option_text); @endphp
                                            <div class="row">
                                                @foreach($json as $key => $value)
                                                    @if($key == 'cost_grand_total' || $key == 'material_grand_total' || $key == 'invoice_sub_total' || $key == 'invoice_tax' || $key == 'invoice_grand_total')
                                                        
                                                        @if($key == 'cost_grand_total' || $key == 'material_grand_total')
                                                            <div class="col-lg-10">&nbsp;</div>
                                                            <div class="col-lg-2">&nbsp;&nbsp;{{ $value }}</div>
                                                        @endif

                                                        @if($key == 'invoice_sub_total')
                                                            <div class="col-lg-12">&nbsp;</div>
                                                            <div class="col-lg-10">Rechnungsbetrag</div>
                                                            <div class="col-lg-2">&nbsp;&nbsp;<b>{{ $value }} €</b></div>
                                                        @endif

                                                        @if($key == 'invoice_tax')
                                                            <div class="col-lg-10">19 % Mehrwertsteuer</div>
                                                            <div class="col-lg-2">&nbsp;&nbsp;<b>{{ $value }} €</b></div>
                                                        @endif

                                                        @if($key == 'invoice_grand_total')
                                                            <div class="col-lg-12">&nbsp;</div>
                                                            <div class="col-lg-10">Gesamtbetrag</div>
                                                            <div class="col-lg-2">&nbsp;&nbsp;<b>{{ $value }} €</b></div>
                                                        @endif

                                                        @continue
                                                    @endif

                                                    
                                                    @if($key == 'cost_quantity')
                                                        <div class="col-lg-12">&nbsp;</div>
                                                        <div class="col-lg-12">Lohnkosten</div>
                                                    @elseif($key == 'material_quantity')
                                                        <div class="col-lg-12">&nbsp;</div>
                                                        <div class="col-lg-12">Materialkosten</div>
                                                    @endif

                                                    @if($key == 'cost_importance' || $key == 'material_importance')
                                                        <div class="col-lg-6">
                                                    @else
                                                        <div class="col-lg-2">
                                                    @endif
                                                        <table class="table">
                                                            <tr>
                                                                @if($key == 'cost_quantity')
                                                                    <th>Anzahl </th>
                                                                @elseif($key == 'cost_unit')
                                                                    <th>Einheit </th>
                                                                @elseif($key == 'cost_importance')
                                                                    <th>Bedeutung </th>
                                                                @elseif($key == 'cost_total')
                                                                    <th>Summe </th>

                                                                @elseif($key == 'material_quantity')
                                                                    <th>Anzahl </th>
                                                                @elseif($key == 'material_unit')
                                                                    <th> Einheit </th>
                                                                @elseif($key == 'material_importance')
                                                                    <th> Bedeutung </th>
                                                                @elseif($key == 'material_total')
                                                                    <th> Summe </th>
                                                                @endif
                                                            </tr>
                                                            @if(is_array($value))
                                                                @foreach($value as $data)
                                                                    <tr>
                                                                        <td>{{ $data }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </table>
                                                    </div>
                                                @endforeach
                                            </div>
                                            
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-md-12 mb-2 mb-lg-0">
                                            <div class="txt_box">
                                                <h4>Maschinelle Entscheidung:</h4>
                                                <p></p>
                                                <p>Antwort: @if($answer->is_correct) Richtig @else Falsch @endif</p>
                                                <p>Punkte: @if($answer->is_correct) 1/1 @else 0/1 @endif</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 mb-2 mb-lg-0">
                                            <div class="txt_box">
                                                <h4>Genauigkeit der Entscheidung: </h4>
                                                <div class="progress_bar_wrap">
                                                    <div class="box">
                                                        <div class="chart" data-percent="{{ $answer->accuracy }}" >{{ $answer->accuracy }}%</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 mb-2 mb-lg-0">
                                            <div class="txt_box">
                                                <br>
                                                <h4>Korrektur der Antwort: </h4>
                                                <label class="quiz_radio">
                                                    <span class="btn btn-success">Richtige Antwort</span>
                                                    <input type="radio" name="question_{{ $answer->id }}" value="correct" 
                                                    @if($answer->is_correct) checked @endif>
                                                    <span class="quiz_mark"></span>
                                                </label>
                                                <label class="quiz_radio">
                                                    <span class="btn btn-danger">Falsche Antwort</span>
                                                    <input type="radio" name="question_{{ $answer->id }}" value="wrong" 
                                                    @if(!$answer->is_correct) checked @endif>
                                                    <span class="quiz_mark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($answer->is_correct)
                            @php $totalPoints++; @endphp
                        @endif
                    @endforeach

                    {!! $mushkilAnswers !!}


                    <div class="main_clm">
                        <h3>Gesamt : {{ $totalPoints+$totalMushkilPoints }}/10 Punkte</h3>
                        
                        @php App\Models\StudentExam::where('user_id', $userId)->update([ 'total_score' => $totalPoints+$totalMushkilPoints] ) @endphp
                        <br>
                        <button type="submit" class="web_btn theme_bg next_btn">Auswertung speichern und senden</button>
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