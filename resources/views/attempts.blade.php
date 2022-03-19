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
                <div class="col-lg-10 col-md-12 mx-auto">
                    <div class="main_clm ">
                        <form method="POST" action="submit-exam" class="setp_wrap mb-4" autocomplete="off">

                                <div class="mySet active_tab">
                                    <h3>Prüfungseinreichungen</h3>
                                    <div class="content_box my-4">

                                        <table class="table">
                                            <tr>
                                                <th>Name des Prüflings</th>
                                                <th>Teilnehmernummer</th>
                                                <th>Abgabetermin</th>
                                                <th>Prüfungskorrektur</th>
                                            </tr>
                                            @foreach($students as $student)
                                           
                                                <tr>
                                                    <td>{{ $student->name }}</td>
                                                    <td>{{ $student->code }}</td>
                                                    <td>{{ date("d.m.Y, H:i", strtotime($student->created_at)) }}</td>
                                                    <td>
                                                        @if($student->marked_correct_by_teacher)
                                                            <label>
                                                                <input type="checkbox" checked readonly>
                                                                Zeitstempel: {{ date("d.m.Y, H:i", strtotime($student->marked_correct_at)) }}
                                                            </label>
                                                        @else
                                                            <a class="btn btn-primary btn-sm" href="evaluation?id={{ $student->id }}">Korrektur starten</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                        </form>

                        <ul class="set_btn">
                            <li><a href="/subject-overview"> Zurück </a></li>
                            <li><a href="register">Schüler hinzufügen </a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Ausloggen
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
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