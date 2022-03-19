if(localStorage.getItem('islogin')==1){

}else{
    check_auth = prompt('Bitte Passwort eingeben');
    if(check_auth){
        if(check_auth=='admin123'){
            localStorage.setItem('islogin', '1');
        }else{
            window.location.href = '/';
        }
    }else{
        window.location.href = '/';
    }    
}
////////////////////////////////////////////////////////SHOW HIDE PASSWORD
jQuery('i.myEyeIcon').click(function(){
    var a = jQuery(this).next().attr('type');

    if(a == 'password'){
        jQuery(this,'i.myEyeIcon').css('color','#015aff ');
        jQuery(this).next().attr('type','text');
    }
    else{
        jQuery(this,'i.myEyeIcon').css('color','#c9c9c9');
        jQuery(this).next().attr('type','password'); 
    }
}); 
////////////////////////////////////////////////////////SHOW HIDE PASSWORD
  function missingQuestionList(){
    questionList = '';
        if (!$("input[name='question_1']:checked").val()) {
          questionList += ' Frage 1,';  
        }if (!$("input[name='question_2']:checked").val()) {
          questionList += ' Frage 2,';  
        }if (!$("input[name='question_3']:checked").val()) {
          questionList += ' Frage 3,';  
        }if (!$("input[name='question_4']:checked").val()) {
          questionList += ' Frage 4,';  
        }if (!$("input[name='question_5']:checked").val()) {
          questionList += ' Frage 5,';  
        }
        var question_6_text = [];
        var question_8_text = [];
        var question_9 = [];

        $("input[name='question_6[]']").each(function() {
            var question_6 = $(this).val();
            if (question_6) {
                question_6_text.push(question_6);
            }
        });
        if (question_6_text.length === 0) {
             questionList += ' Frage 6,';
        }
        $("input[name='question_8[]']").each(function() {
            var question_8 = $(this).val();
            if (question_8) {
                question_8_text.push(question_8);
            }
        });
        if (question_8_text.length === 0) {
             questionList += ' Frage 8,';
        }
        if($(".questiontexarea").val()==''){
            questionList += ' Frage 9,';
        }
        
        if($("input[name='cost_quantity[]']").val() == '' ||
        $("input[name='cost_unit[]']").val() == '' ||
        $("input[name='cost_importance[]']").val() == '' ||
        $("input[name='cost_total[]']").val() == '' ||
        $("input[name='cost_grand_total']").val() == ''
        ){
            questionList += ' Frage 10,';
        }
 
        if(questionList!=''){
            questionList = 'Sie haben folgende Fragen noch nicht beantwortet:'+questionList;
        }
        return questionList;
   }        
/////////////////////////////////////////////////////////QUIZ STEP
jQuery(document).ready(function(){
    var height = jQuery('.active_tab').height();
    jQuery('.setp_wrap').css('height',height);

    //var c = jQuery('.mySet').lenght();
    //var vall = 100 / c;
    //jQuery('.progess_bar_wrap .progess_bar').css('width',vall+'%');

    jQuery('.next_btn').click(function(){
        jQuery('.mySet').removeClass('active_tab');
        jQuery(this).parent().next().addClass('active_tab');
        var step_name = jQuery('.active_tab').attr('data');
        var height = jQuery('.active_tab').height();
         if(step_name == 11)
        {
            jQuery('.questionsclass').hide();
             missingQuestionResult =  missingQuestionList();
             missingQuestionResultTxt = missingQuestionResult.replace(/,([^,]*)$/, '$1');
             if(missingQuestionResultTxt == ''){
                $('#final_exam_submission').prop('checked', true);
              }
              else
              {
                height = '230px';
              }
           jQuery('.missingQuestionContainer').text(missingQuestionResultTxt);
        }else{
            jQuery('.questionsclass').show();
        }

        jQuery('.setp_wrap').css('height',height);
         var data = { "question" :step_name,'start-time':$.now()}
          $.ajax({
            type: "POST",
            url: '/save-questiontime',
            data: data
        });
        //jQuery('.progess_bar_wrap .progess_bar').css('width',vall+vall+vall+vall+'%');
    });
    jQuery('.prev_btn').click(function(){
        jQuery('.mySet').removeClass('active_tab');
        jQuery(this).parent().prev().addClass('active_tab');
        var height = jQuery('.active_tab').height();
        var step_name = jQuery('.active_tab').attr('data');
         if(step_name == 11)
        {
            jQuery('.questionsclass').hide();
        }else{
            jQuery('.questionsclass').show();
        }
        jQuery('.setp_wrap').css('height',height);
        //jQuery('.progess_bar_wrap .progess_bar').css('width',vall+vall+vall+vall+'%');
    });
    jQuery('.setp_wrap .web_btn').click(function(){
        var step_name = jQuery('.active_tab').attr('data');
        var step = jQuery('.active_tab').attr('step');
        jQuery('#step_name').text(step_name);
        if (step == 'Stepp10') {
            jQuery('.setp_wrap').addClass(step);
        }
        else{
            jQuery('.setp_wrap').removeClass('Stepp10');
        }
        if(step_name > 5)
        {
            jQuery('#1_to_5').hide();
            jQuery('#6_to_10').show();
        }
        else
        {
            jQuery('#6_to_10').hide();
            jQuery('#1_to_5').show();    
        }
    });
    var last_step = 10;
    jQuery('#last_step').text(last_step);    
});
/////////////////////////////////////////////////////////QUIZ STEP

/////////////////////////////////////////////////////////CALCULATER
var draggable = $('#dragit');
draggable.on('mousedown', function(e){
var dr = $(this).addClass("drag").css("cursor","move");
height = dr.outerHeight();
width = dr.outerWidth();
ypos = dr.offset().top + height - e.pageY,
xpos = dr.offset().left + width - e.pageX;
$(document.body).on('mousemove', function(e){
    var itop = e.pageY + ypos - height;
    var ileft = e.pageX + xpos - width;
if(dr.hasClass("drag")){
    dr.offset({top: itop,left: ileft});
}
}).on('mouseup', function(e){
    dr.removeClass("drag");
});
});

jQuery('.cal_close').click(function(){
    jQuery('.cal-body').toggleClass('open_cal');
});

function insert(num){
    $(".screen").val($(".screen").val() + num);
}

function eql(){
    $(".screen").val(eval($(".screen").val()));
}

function clr(){
    $(".screen").val('');
}

function del() {
    value = $('.screen').val();
    $('.screen').val(value.substring(0, value.length - 1));
}
/////////////////////////////////////////////////////////CALCULATER