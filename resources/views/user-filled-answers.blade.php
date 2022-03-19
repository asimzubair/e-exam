<div class="main_clm mb-4">
	@foreach($mushkilAnswer as $question)
		@if($loop->iteration == 1)
		    <h3>{{ $number }}) {{ $question->question }}</h3>
		    <div class="content_box my-4">
		        <div class="dyan_txt_box_ mb-2">
		            <p>
		                Erwartete Antwort: 
		                <b><br>
		                    @php $correctAnswers = App\Models\Options::getAllCorrectAnswers($question->question_id); @endphp
		                    @foreach($correctAnswers as $correctAnswer)
		                    	{{$loop->iteration}}) {{ $correctAnswer->option }} <br>
		                    @endforeach
		                </b>
		            </p>
		        </div>
		@endif
    @endforeach

        @foreach($mushkilAnswer as $key => $ans)
	        <div class="dyan_txt_box_ mb-2">
	        	<p>Antwort des Prüflings: <b>{{$loop->iteration}}) {{ $ans->option_text }}</b></p>
	    	</div>
	        <div class="row align-items-center">
	            <div class="col-lg-4 col-md-12 mb-2 mb-lg-0">
	                <div class="txt_box">
	                    <h4>Maschinelle Entscheidung:</h4>
	                    <p></p>
	                    <p>Antwort: @if($ans->is_correct) Richtig @else Falsch @endif</p>
	                    <p>Punkte: @if($ans->is_correct) 1/1 @else 0/1 @endif</p>
	                </div>
	            </div>
	            <div class="col-lg-4 col-md-12 mb-2 mb-lg-0">
	                <div class="txt_box">
	                    <h4>Genauigkeit der Entscheidung:</h4>
	                    <div class="progress_bar_wrap">
	                        <div class="box">
	                            <div class="chart" data-percent="{{ $ans->accuracy }}" >{{ $ans->accuracy }}%</div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-4 col-md-12 mb-2 mb-lg-0">
	                <div class="txt_box">
	                    <br>
	                    <h4>Korrektur der Antwort:</h4>
	                    <label class="quiz_radio">
	                        <span class="btn btn-success">Richtige Antwort</span>
	                        <input type="radio" name="question_{{ $ans->id }}" value="correct" 
	                        @if($ans->is_correct) checked @endif>
	                        <span class="quiz_mark"></span>
	                    </label>
	                    <label class="quiz_radio">
	                        <span class="btn btn-danger">Falsche Antwort</span>
	                        <input type="radio" name="question_{{ $ans->id }}" value="wrong" 
	                        @if(!$ans->is_correct) checked @endif>
	                        <span class="quiz_mark"></span>
	                    </label>
	                </div>
	            </div>
	        </div>
        @endforeach
    </div>
</div>