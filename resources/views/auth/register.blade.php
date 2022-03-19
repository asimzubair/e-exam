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
            <div class="col-lg-6 col-md-12 mx-auto">
                <div class="main_clm">
                    <h3 style='text-transform: none;'>Teilnehmer registrieren</h3>
                    <form method="POST" action="{{ route('register') }}" autocomplete="off">
                        @if($errors->any())
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br/>
                            @endforeach
                            <br/>
                        @endif
                        @csrf
                        <div class="field">
                            <p class="field_lable">Name des Teilnehmers</p>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Geben Sie den Teilnehmernamen ein">
                        </div>
                        <div class="field">
                            <p class="field_lable">Teilnehmernummer</p>
                            <input type="text" name="participant_number" value="{{ old('participant_number') }}" placeholder="Geben Sie die Teilnehmernummer ein">
                        </div>
                        <div class="field">
                            <p class="field_lable">Code</p>
                            <input type="text" name="code" id="generated_code" value="{{ old('code') }}">
                            <button type="button" id="generate_code" class="btn btn-danger btn-sm" style="margin-top: 10px;">Generieren</button>
                        </div>
                        <button type="submit" class="web_btn theme_bg">Teilnehmerbrief drucken</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
    <!-- JS -->
    <script src="js/jquery.js"></script>
    <script src="owl/js/owl.carousel.js"></script>
    <script src="js/custom.js"></script>
    <script type="text/javascript">
        $( "#generate_code" ).click(function() {
            $( "#generated_code" ).val(Math.random().toString().slice(2,11));
        });
    </script>
</body>
</html>