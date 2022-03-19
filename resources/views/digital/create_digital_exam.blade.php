<!DOCTYPE html>
<html>
<head>
    <title>E-Exam::Digitale Prüfung erstelle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/web_theme.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="owl/css/owl.carousel.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Black+Ops+One|Odibee+Sans|Orbitron|Press+Start+2P|Quantico|ZCOOL+QingKe+HuangYou&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
<div class="repeater">
</head>
<body>

    <div class="body_wrap">
        <div class="inner_body col-12">
            <div class="container">
                <div class="col-lg-10 col-md-12 mx-auto">
                    <div class="main_clm ">
                       
                       <form method="POST" action="save-digital-exam" class="setp_wrap mb-4" autocomplete="off">
                    @csrf     
                        <?php $examNumber = rand();?>
                            <div >
                                <h3 style="text-transform: none;">Digitale Prüfung erstellen</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 mb-4 mb-lg-12">
                      
                                    <p style="border:1px solid grey;padding: 10px;">Folgende Prüfungen müssen noch nicht fertiggestellt werden: <br>Prüfung <?=$examNumber?></p>
                                    <input type="hidden" name="exam_id" value="<?=$examNumber?>">
                                    </div>
                                      <div class="row">
                                            <div class="col-md-6 col-lg-6 col-sm-6">
                                                <label>Bitte wählen Sie die Berufsgruppennummer aus:</label>
                                            </div>
                                             <div class="col-md-6 col-lg-6 col-sm-6">
                                               <select class="form-control" name="professional_group_number">
                                                   <option value="0884">0884</option>
                                               </select>
                                            </div>
                                      </div> 
                                      <br><br/><br/>
                                       <div class="row">
                                            <div class="col-md-6 col-lg-6 col-sm-6">
                                                <label>Bitte wählen Sie die ausführende Prüfungsstelle aus:</label>
                                            </div>
                                             <div class="col-md-6 col-lg-6 col-sm-6">
                                                <select class="form-control" name="examing_body">
                                                   <option value="IHK Stuttgart">IHK Stuttgart</option>
                                               </select>
                                            </div>
                                      </div>  
                                      <br><br/><br/>
                                       <div class="row">
                                            <div class="col-md-6 col-lg-6 col-sm-6">
                                                <label>Bitte geben Sie das Datum der Prüfungsdurchführung an:</label>
                                            </div>
                                             <div class="col-md-6 col-lg-6 col-sm-6">
                                               <input type="date"  required name="date_of_examination" class="form-control">
                                            </div>
                                      </div>  
                                       <br><br/><br/> 
                                      <div class="row">
                                            <div class="col-md-6 col-lg-6 col-sm-6">
                                                <label>Prüfungsfreigabe</label>
                                                <div class="col-md-12 targetDiv" id="div0">
                                                    <div id="group1" class="fvrduplicate">
                                                      <div class="row entry">
                                                        <div class="col-xs-12 col-md-12">
                                                          <div class="form-group">
                                                            <select class="form-control" name="exam_release[]">
                                                            @foreach($students as $student)
                                                            <option value="{{ $student->code }}">{{ $student->name }}-{{ $student->code }}</option>
                                                             @endforeach
                                                             </select>
                                                          </div>
                                                        </div>
                                                        <div class="col-xs-12 col-md-12">
                                                          <div class="form-group">
                                                            <label>&nbsp;</label>
                                                            <button type="button" class="btn btn-success btn-sm btn-add">
                                                              <i class="fa fa-plus" aria-hidden="true"></i>
                                                            </button>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                          </div>
                                            </div>
                                             <div class="col-md-6 col-lg-6 col-sm-6">
                                               <label>Prüfungskorrektoren</label>
                                               <div class="col-md-12 targetDiv" id="div1">
                                                    <div id="group1" class="fvrduplicate">
                                                      <div class="row entry">
                                                        <div class="col-xs-12 col-md-12">
                                                          <div class="form-group">
                                                            <select class="form-control" name="exam_graders[]">
                                                            @foreach($teacherArray as $teacherKey=> $teacher)
                                                            <option value="{{ $teacherKey }}">{{ $teacher }}</option>
                                                             @endforeach
                                                             </select>
                                                          </div>
                                                        </div>
                                                        <div class="col-xs-12 col-md-12">
                                                          <div class="form-group">
                                                            <label>&nbsp;</label>
                                                            <button type="button" class="btn btn-success btn-sm btn-add">
                                                              <i class="fa fa-plus" aria-hidden="true"></i>
                                                            </button>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                          </div>
                                            </div>
                                      </div>
                                       

                                      <div class="row">
                                            <div class="col-md-12 col-lg-12 col-sm-12" style="margin-left:800px;margin-top:20px;" >
                                                <input type="submit" value="Zur Fragenauswahl">
                                            </div>
                                      </div> 
                                           
                                </div>
                                       

                                    

                                       

                                 
                               

                                
                                
                            </div>
                            </form>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    
<script type="text/javascript">
 $(function() {
    $(document).on('click', '.btn-add', function(e) {
        e.preventDefault();
        var controlForm = $(this).closest('.fvrduplicate'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);
        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<i class="fa fa-minus" aria-hidden="true"></i>');
    }).on('click', '.btn-remove', function(e) {
        $(this).closest('.entry').remove();
        return false;
    });
});
</script>   

</body>
</html>