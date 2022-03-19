<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="colorlib.com">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Answers</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main">
        <div class="container">
            <form method="POST" action="submit-exam" id="signup-form" class="signup-form" enctype="multipart/form-data">
                @foreach($answers as $answer)
                    <h3>Question {{ $answer['question_id'] }}  &nbsp; &nbsp;  : &nbsp; &nbsp; {{ $answer['is_correct'] ? 'Correct' : 'Wrong' }}</h3>
                @endforeach
            </form>
            <a href="{{ url('') }}" style='color:white'>Attempt Again</a>
        </div>
    </div>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="vendor/jquery-steps/jquery.steps.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>