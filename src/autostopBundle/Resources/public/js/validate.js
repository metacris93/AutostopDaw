function checkPasswordMatch() {
    var password = $("#newPassword").val();
    var confirmPassword = $("#confirmPassword").val();

    if (password != confirmPassword)
        $("#checkPasswordMatch").html("Passwords do not match!");
    else
        $("#checkPasswordMatch").html("Passwords match.");
}

$(window).ready(function () {
   $("#confirmPassword").keyup(checkPasswordMatch);
    $('input[name=auto]').click(function(){
        if($(this).val()=='si'){
            $('.auto').fadeIn(1000);
        }
        if($(this).val()=='no'){
            $('.auto').fadeOut(1000);
        }
    })
});



