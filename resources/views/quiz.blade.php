<!DOCTYPE html>
<html>
<head>
    <title>E-Exam</title>
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
                        <h5 class="mb-4 questionsclass">Frage <span id="step_name">1</span> / <span id="last_step"></span></h5>
                        <form method="POST" action="submit-exam" class="setp_wrap mb-4" autocomplete="off">
                        @csrf

                        @foreach($questions as $question)
                            @if($question['type'] == 'invoice')
                                @continue
                            @endif
                            <div class="mySet @if($loop->iteration == 1) active_tab @endif" data="{{ $loop->iteration }}">
                                <h3>{{ $question['question'] }}</h3>
                                <div class="content_box my-4">
                                    @if($question['type'] == 'multiple_choice')

                                        @if($loop->iteration == 5)
                                        <div class="row">
                                            <div class="col-lg-8 col-md-12 mb-4 mb-lg-0">
                                        @endif

                                        @if($loop->iteration == 4)
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                        @endif

                                        @foreach($question['answers'] as $answer)
                                            <label class="quiz_radio">{{ $answer['option'] }}
                                                <input type="radio" name="question_{{ $question['id'] }}" value="{{ $answer['id'] }}">
                                                <span class="quiz_mark"></span>
                                            </label>
                                        @endforeach

                                        @if($loop->iteration == 5)
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <img id="NZoomImg" data-NZoomscale="2" src="images/testin_machine.png" class="img-fluid float-end">
                                            </div>
                                        </div>
                                        @endif

                                        @if($loop->iteration == 4)
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="open_cal_btn theme_btn cal_close float-end"><i class="fa fa-calculator" aria-hidden="true"></i></div>
                                            </div>
                                        </div>
                                        @endif

                                    @elseif($question['type'] == 'dropdown')

                                        <div class="field">
                                            <select name="question_{{ $question['id'] }}">
                                                @foreach($question['answers'] as $answer)
                                                    <option value="{{ $answer['id'] }}">{{ $answer['option'] }}</option>
                                                @endforeach  
                                            </select>
                                        </div>

                                    @elseif($question['type'] == 'textarea')
                                        <div class="field">
                                            <textarea class='questiontexarea' name="question_{{ $question['id'] }}" placeholder="Hier eingeben..."></textarea>
                                        </div>
                                    @else
                                        <ol class="fields_wrap">
                                        @foreach($question['answers'] as $answer)
                                            <li class="field">
                                                <input type="text" name="question_{{ $question['id'] }}[]" placeholder="Hier eingeben...">
                                            </li>

                                            @if($question['type'] == 'blanks_no_sequence' && $loop->iteration == 4)
                                                @break
                                            @endif
                                            
                                        @endforeach
                                        </ol>
                                    @endif
                                </div>

                                @if($loop->iteration > 1)
                                    <a  class="web_btn theme_bg prev_btn float-start"><i class="fa fa-arrow-left" aria-hidden="true"></i> Vorherige Frage</a>
                                @endif

                                <a  class="web_btn theme_bg next_btn float-end">Nächste Frage <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                
                            </div>
                        @endforeach

                        <div class="mySet" data="10" step="Stepp10">
                            <h3 class="mb-2">Erstellen Sie für die durchgeführten Arbeiten eine Kundenrechnung.</h3>
                            <ol class="fields_wrap">
                                <li><p>Berechnen Sie die Lohnkosten.</p></li>
                                <li><p>Berechnen Sie die Materialkosten.</p></li>
                                <li><p>Berechnen Sie den Gesamtbetrag inkl. der gesetzlichen Mehrwertsteuer.</p></li>
                            </ol>

                            <!-- Cost -->
                            <hr>
                            <div class="content_box mt-4">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="field">
                                            <h3>Lohnkosten</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12">
                                        <div class="field">
                                            <p class="field_lable">Anzahl</p>
                                            <div class="f_inner">
                                                <input type="text" name="cost_quantity[]" placeholder="Hier eingeben...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12">
                                        <div class="field">
                                            <p class="field_lable">Einheit</p>
                                            <div class="f_inner">
                                                <input type="text" name="cost_unit[]" placeholder="Hier eingeben...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12">
                                        <div class="field">
                                            <p class="field_lable">Bedeutung</p>
                                            <div class="f_inner">
                                                <input type="text" name="cost_importance[]" placeholder="Hier eingeben...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-12">
                                        <div class="field">
                                            <p class="field_lable">Summe</p>
                                            <div class="f_inner">
                                                <input type="text" name="cost_total[]" placeholder="Hier eingeben...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-1" style="margin-top: 6px;margin-left: -15px;font-size: 20px;">
                                        <div class="field">
                                            <p class="field_lable"></p>
                                        </div>
                                        €
                                    </div>
                                </div>
                                <div class="row" id="cost_dynamic">
                                </div>
                                <!-- cost_button -->
                                <div class="row" style="margin-top: -10px; margin-bottom: 10px;">
                                    <div class="col-lg-12 col-md-12">
                                        <button type="button" class="btn btn-primary" id="cost_dynamic_button">+</button>
                                    </div>
                                </div>
                                <!-- Cost Totals -->
                                <div class="row">
                                    <div class="col-lg-9 col-md-9">
                                        <div class="field">
                                            <h4>Zwischensumme Lohnkosten</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2">
                                        <div class="field">
                                            <p class="field_lable"></p>
                                            <div class="f_inner">
                                                <input type="text" name="cost_grand_total" placeholder="Hier eingeben...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-1" style="margin-top: 6px;margin-left: -15px;font-size: 20px;">
                                        €
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <!-- Material -->
                            <div class="content_box mt-4">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="field">
                                            <h3>Materialkosten</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12">
                                        <div class="field">
                                            <p class="field_lable">Anzahl</p>
                                            <div class="f_inner">
                                                <input type="text" name="material_quantity[]" placeholder="Hier eingeben...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12">
                                        <div class="field">
                                            <p class="field_lable">Einheit</p>
                                            <div class="f_inner">
                                                <input type="text" name="material_unit[]" placeholder="Hier eingeben...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12">
                                        <div class="field">
                                            <p class="field_lable">Bedeutung</p>
                                            <div class="f_inner">
                                                <input type="text" name="material_importance[]" placeholder="Hier eingeben...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-12">
                                        <div class="field">
                                            <p class="field_lable">Summe</p>
                                            <div class="f_inner">
                                                <input type="text" name="material_total[]" placeholder="Hier eingeben...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-1" style="margin-top: 6px;margin-left: -15px;font-size: 20px;">
                                        <div class="field">
                                            <p class="field_lable"></p>
                                        </div>
                                        €
                                    </div>
                                </div>
                                <div class="row" id="material_dynamic">
                                </div>
                                <!-- material_button -->
                                <div class="row" style="margin-top: -10px; margin-bottom: 10px;">
                                    <div class="col-lg-12 col-md-12">
                                        <button type="button" class="btn btn-primary" id="material_dynamic_button">+</button>
                                    </div>
                                </div>
                                <!-- Material Totals -->
                                <div class="row">
                                    <div class="col-lg-9 col-md-9">
                                        <div class="field">
                                            <h4>Zwischensumme Material</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2">
                                        <div class="field">
                                            <p class="field_lable"></p>
                                            <div class="f_inner">
                                                <input type="text" name="material_grand_total" placeholder="Hier eingeben...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-1" style="margin-top: 6px;margin-left: -15px;font-size: 20px;">
                                        €
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <!-- Invoice Total -->
                            <div class="content_box mt-4">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="field">
                                            <h3>Gesamtbetrag</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-9">
                                        <div class="field">
                                            <p class="field_lable">Bezeichnung </p>
                                            <div class="f_inner">
                                                <input type="text" value="Rechnungsbetrag" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2">
                                        <div class="field">
                                            <p class="field_lable">Summe</p>
                                            <div class="f_inner">
                                                <input type="text" name="invoice_sub_total" placeholder="Hier eingeben...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-1" style="margin-top: 6px;margin-left: -15px;font-size: 20px;">
                                        <div class="field">
                                            <p class="field_lable"></p>
                                        </div>
                                        €
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-9 col-md-9">
                                        <div class="field">
                                            <p class="field_lable"></p>
                                            <div class="f_inner">
                                                <input type="text" value="19 % Mehrwertsteuer" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2">
                                        <div class="field">
                                            <p class="field_lable"></p>
                                            <div class="f_inner">
                                                <input type="text" name="invoice_tax" placeholder="Hier eingeben...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-1" style="margin-top: 6px;margin-left: -15px;font-size: 20px;">
                                        €
                                    </div>
                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-lg-9 col-md-9">
                                        <div class="field">
                                            <p class="field_lable"></p>
                                            <div class="f_inner">
                                                <input type="text" value="Gesamtbetrag" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2">
                                        <div class="field">
                                            <p class="field_lable"></p>
                                            <div class="f_inner">
                                                <input type="text" name="invoice_grand_total" placeholder="Hier eingeben...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-1" style="margin-top: 6px;margin-left: -15px;font-size: 20px;">
                                        €
                                    </div>
                                </div>
                            </div>

                            <!-- Next/Previous -->
                            <a  class="web_btn theme_bg prev_btn float-start"><i class="fa fa-arrow-left" aria-hidden="true"></i> Vorherige Frage</a>
                            <a  class="web_btn theme_bg next_btn float-end">Nächste Frage <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                        </div>

                        <div class="mySet" data="11">
                            <h3>Abschlussprüfung "Kraftfahrzeugmechatroniker/-in"</h3>
                            <div class="content_box my-4">
                                <p>Sind Sie sich sicher, dass Sie die Prüfung abschließen wollen?</p>
                                <input type="checkbox" id="final_exam_submission" name=""> <label for="t&c" class="check_txt">Sie haben alle Fragen beantwortet.</label>
                              <div class="missingQuestionContainer">
                                
                                </div>
                            </div>

                            <a  class="web_btn theme_bg prev_btn float-start"><i class="fa fa-arrow-left" aria-hidden="true"></i> Vorherige Frage</a>
                            <button  class="web_btn theme_bg float-end submitclick">Prüfung abgeben</button>
                        </div>

                        </form>
                        <ul class="set_btn">
                            <li><a href="#" id="pop_btn1">Auftragsspezifische Angaben</a></li>
                            <li><a href="#" id="pop_btn2">Anlagen zum Auftrag</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="cal-body" id="dragit">
        <div class="cal_close calclose_btn">X</div>
        <p class="m-0"><b>Sie können das Notizfeld verschieben.</b></p>
        <div class="screen_box">
            <textarea class="screen" rows="6" cols="50" id="calculator_text">{{ session()->get('calculator_text') }}</textarea>
        </div>
        <div class="cal_paid">
            <table>
                <tr id="calculator_buttons">
                    <td><input class="cal_btn" type="button" value="+" onclick="insert('+');"></td>
                    <td><input class="cal_btn" type="button" value="-" onclick="insert('-');"></td>
                    <td><input class="cal_btn" type="button" value="." onclick="insert('.')"></td>
                    <td><input class="cal_btn" type="button" value="x" onclick="insert('*');"></td>
                    <td><input class="cal_btn" type="button" value="/" onclick="insert('/');"></td>
                </tr>       
            </table>
        </div>
    </div>


    <div class="paypopup pop_1">
        <div class="poppup_box">
            <div class="pop_close closer">x</div>
            <div class="content">
                <div id="1_to_5">
                    <h5 class="black mv4">Sie erhalten den Kundenauftrag:</h5>
                    <br>
                    <ul>
                        <li>Fahrzeuge und Systeme nach Vorgaben zu warten und
                        zu inspizieren</li>
                       <li>Inspektionen und Zusatzarbeiten durchzuführen</li>
                       <li>Einfache Baugruppen und Systeme zu prüfen, zu
                        demontieren, auszutauschen und zu montieren</li>
                        <li>Funktionsstörungen zu identifizieren und zu beseitigen</li>
                        <li>Funktionsstörungen an Bordnetz-, Ladestrom- und
                        Startsystemen zu diagnostizieren und zu beheben</li>
                        <li>Umrüstarbeiten nach Kundenwünschen durchzuführen</li>
                    </ul>
                    Die Aufgaben 1 bis 5 beziehen sich im Allgemeinen
                        auf die damit verbundenen Themen.
                </div>
                <div id="6_to_10" style="display: none;">
                    <ul>
                        <li>Nach einer HU-Untersuchung stellte sich heraus, dass die Bremsleitung zum Radbremszylinder hinten rechts  beschädigt.</li>
                        <li>Sie sind beauftragt hier eine ordnungsgemäße Instandsetzung durchzuführen. Dazu sind zahlreiche Planungsarbeiten notwendig, von denen Sie exemplarisch einige auszuführen haben.</li>
                        <li>Fahrzeug: VW Touran mit 125 kW; Modelljahr: 2012</li>
                        <li>Bitte beachten Sie:</li>
                        Die benötigten Informationen sind den technischen Unterlagen zu entnehmen (Blatt 1 von 4 bis Blatt 4 von 4).
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="paypopup pop_2 tc">
        <div class="poppup_box" style="width: 50%;">
            <div class="pop_close closer">x</div>
            <div class="content">
                <object width="1000" height="600" data="BSM-IHK Testprüfung_0880_K2_A.pdf" type="application/pdf">
                    <iframe src="https://docs.google.com/viewer?url=your_url_to_pdf&embedded=true"></iframe>
                </object>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="js/jquery.js"></script>
    <script src="owl/js/owl.carousel.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/Nzoom.min.js"></script>
  
    <script>
    ////////////////////////////////////////////////////////////////POPUP JS  
    jQuery('.closer').click(function(){
        jQuery('.paypopup').css('opacity','0');
        jQuery('.paypopup').css('z-index','-1');
        jQuery('.poppup_box').css('transform','scale(0)');
      jQuery('.poppup_box').css('opacity','0');
    }); 
    jQuery('#pop_btn1').click(function(){
        jQuery('.pop_1').css('opacity','1');
        jQuery('.pop_1').css('z-index','99999');
        jQuery('.pop_1 .poppup_box').css('transform','scale(1)');
        jQuery('.pop_1 .poppup_box').css('opacity','1');
    });
    jQuery('#pop_btn2').click(function(){
        jQuery('.pop_2').css('opacity','1');
        jQuery('.pop_2').css('z-index','99999');
        jQuery('.pop_2 .poppup_box').css('transform','scale(1)');
        jQuery('.pop_2 .poppup_box').css('opacity','1');
    });
    ////////////////////////////////////////////////////////////////POPUP JS   

    $( "#calculator_text" ).keypress(function() {
        updateCalculatorValue();
    });

    $( "#calculator_buttons" ).click(function() {
        updateCalculatorValue();
    });

saveQuestionTime();
    function updateCalculatorValue()
    {
        var calculator_text =  $( "#calculator_text" ).val();
        var data = { "calculator_text" : calculator_text }
        $.ajax({
            type: "POST",
            url: '{{ url("/save-calculator") }}',
            data: data
        });
    } 

   function saveQuestionTime()
    {
        var data = { "question" :'1','start-time':$.now()}
        $.ajax({
            type: "POST",
            url: '{{ url("/save-questiontime") }}',
            data: data
        });
    } 

    $( "#material_dynamic_button" ).click(function() {
        $("#material_dynamic").append($("#material_dynamic_data").html());
    });

    $( "#cost_dynamic_button" ).click(function() {
        $("#cost_dynamic").append($("#cost_dynamic_data").html());
    });
    
    
    </script>


    <div id="cost_dynamic_data" style="display:none">
        <div class="col-lg-3 col-md-12">
            <div class="field">
                <div class="f_inner">
                    <input type="text" name="cost_quantity[]" placeholder="Hier eingeben...">
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12">
            <div class="field">
                <div class="f_inner">
                    <input type="text" name="cost_unit[]" placeholder="Hier eingeben...">
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12">
            <div class="field">
                <div class="f_inner">
                    <input type="text" name="cost_importance[]" placeholder="Hier eingeben...">
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-12">
            <div class="field">
                <div class="f_inner">
                    <input type="text" name="cost_total[]" placeholder="Hier eingeben...">
                </div>
            </div>
        </div>
        <div class="col-lg-1 col-md-1" style="margin-top: -10px;margin-left: -15px;font-size: 20px;">
            <div class="field">
                <p class="field_lable"></p>
            </div>
            €
        </div>
    </div>

    <div id="material_dynamic_data" style="display:none">
        <div class="col-lg-3 col-md-12">
            <div class="field">
                <div class="f_inner">
                    <input type="text" name="material_quantity[]" placeholder="Hier eingeben...">
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12">
            <div class="field">
                <div class="f_inner">
                    <input type="text" name="material_unit[]" placeholder="Hier eingeben...">
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12">
            <div class="field">
                <div class="f_inner">
                    <input type="text" name="material_importance[]" placeholder="Hier eingeben...">
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-12">
            <div class="field">
                <div class="f_inner">
                    <input type="text" name="material_total[]" placeholder="Hier eingeben...">
                </div>
            </div>
        </div>
        <div class="col-lg-1 col-md-1" style="margin-top: -10px;margin-left: -15px;font-size: 20px;">
            <div class="field">
                <p class="field_lable"></p>
            </div>
            €
        </div>
    </div>

</body>
</html>