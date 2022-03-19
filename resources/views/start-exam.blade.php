<!DOCTYPE html>
<html>
<head>
    <title>Exam Instructions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/web_theme.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="owl/css/owl.carousel.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Black+Ops+One|Odibee+Sans|Orbitron|Press+Start+2P|Quantico|ZCOOL+QingKe+HuangYou&display=swap" rel="stylesheet">
  <style>
    .active-instruction {
          background-color: white;
    }
  </style>
</head>
<body>
<div class="body_wrap">
	<div class="inner_body col-12">
		<div class="container">
			<div class="col-lg-8 col-md-12 mx-auto">
				<div class="main_clm mb-3">
					<h3>Abschlussprüfung "Kraftfahrzeugmechatroniker/-in"</h3>
					<p>Herzlich Willkommen zum Teil 1 Ihrer Abschlussprüfung. <br><br>Bitte beachten Sie folgende Hinweise:</p>
				</div>
				<form action="exam" class="row examtab">
					<div class="col-lg-5 col-md-12">
						<div class="main_clm min_hieght_100px d-flex align-items-center  mb-3 ausfu active-instruction" style="cursor:pointer;">
							<h5>Ausfüllhinweise</h5>
						</div>
						<div class="main_clm min_hieght_100px d-flex align-items-center  mb-3 auftra" style="cursor:pointer;">
							<h5>Auftragsspezifische Hinweise</h5>
						</div>
						<div class="main_clm min_hieght_100px d-flex align-items-center  mb-3 analagen" style="cursor:pointer;">
							<h5>Anlagen</h5>
						</div>
					</div>
					<div class="col-lg-7 col-md-12 d-flex ">
						<div class="main_clm  mb-3 w-100">
							<p class="attempttext">Diese Prüfung beinhaltet 10 Fragen. Bitte achten Sie darauf, dass Sie alle Fragen ausfüllen. Sollte das System währen der Prüfung abstürzen, wenden Sie sich bitte an die Prüfungsleitung.</p>
						</div>
					</div>
					<div class="col-lg-12">
						<input type="checkbox" name="" class="confirmExam"><h5 style="display:inline; color:#e6ff00;">&nbsp;&nbsp;Ich bestätige, dass ich mich gesund fühle und die Prüfung ablegen will.</h5><br><br>	
						<input type="button" class="theme_btn m-auto d-table" value="Prüfung starten">
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
    <script>
    	$('.ausfu').click(function(){
    		$('.attempttext').text('Diese Prüfung beinhaltet 10 Fragen. Bitte achten Sie darauf, dass Sie alle Fragen ausfüllen. Sollte das System währen der Prüfung abstürzen, wenden Sie sich bitte an die Prüfungsleitung.');
    	    $('.ausfu').addClass('active-instruction');
     	    $('.auftra').removeClass('active-instruction');
      	    $('.analagen').removeClass('active-instruction');
         });
    	$('.auftra').click(function(){
    		$('.attempttext').text('Sie finden in der linken unteren Ecke die zur Frage gehörigen Auftragsspezifischen Hinweise. Es liegen unterschiedliche Auftragsspezifische Hinweise für die Fragen 1 - 5 und 6 - 10 vor.');
            $('.auftra').addClass('active-instruction');	
            $('.ausfu').removeClass('active-instruction');
      	    $('.analagen').removeClass('active-instruction');
        });
    	$('.analagen').click(function(){
    		$('.attempttext').text('Unten rechts finden Sie die zur Prüfung gehörigen Anlagen. Bitte lesen Sie diese Aufmerksam durch.');
            $('.analagen').addClass('active-instruction');
            $('.auftra').removeClass('active-instruction');
      	    $('.ausfu').removeClass('active-instruction');	
        });
    	$('.d-table').click(function(){
    		if ($("input[type=checkbox]").is(
	          ":checked")) {
	          //  alert("Check box in Checked");
	        } else {
	            alert("Kontrollkästchen aktivieren");
	            return false;
	        }
    		$('.examtab').submit();
    	});
    </script>
</body>
</html>