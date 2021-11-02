$(document).ready(function(){
    $("form[name='send-mail-form']").on("submit", function(e){
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("send-mail", "");
        formData.append("AdID", adID);

        $.ajax({
            url: "process-send-mail.php",
            type: "POST",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data){
                $('.send-alert').html(data);
                mail_sent = 1;
                email_add = $('input[name="email"]').val() ;
            }
        })
    })

    $("form[name='confirm-code-form']").on("submit", function(e){
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("confirm-code", "");
        if(mail_sent==1){
            formData.append("AdEmail", email_add);
        }
        formData.append("AdID", adID);

        $.ajax({
            url: "process-send-mail.php",
            type: "POST",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data){
                var confirm = data.split('|');
                if(confirm[0]=="updated"){
                    window.location.replace(confirm[1]);
                }else{
                    $('.confirm-alert').html(confirm[1]);
                }
            }
        })
    })

})

