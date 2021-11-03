if (typeof takeRoll == 'undefined') {
    var takeRoll = "";
}
var takeClass = "";
var mail_sent = 0;
var email_add = "";

$(document).ready(function(){

    $("[name='save']").on("click", function(){
        var formData = new FormData(change_infor);
        formData.append("save", "");
        formData.append("UserID", userID);

        $.ajax({
            url: "process-profile.php",
            type: "POST",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data){
                $(".infor").html(data);
            }
        })
    })

    $("form[name='send-mail-form']").on("submit", function(e){
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("send-mail", "");
        formData.append("UserID", userID);

        $.ajax({
            url: "send-confirm.php",
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
            formData.append("UserEmail", email_add);
        }
        formData.append("UserID", userID);

        $.ajax({
            url: "send-confirm.php",
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

    $('#class-select').on('change', function(){
        var formData = new FormData();
        formData.append("class-select", $('#class-select').val());
        formData.append("class-select-change", "");

        $.ajax({
            url: "transcript-select.php",
            type: "POST",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data){
                $('.subject-select').html(data);
            }
        })
    })

    $('#class-select1').on('change', function(){
        var formData = new FormData();
        formData.append("class-select", $('#class-select1').val());
        formData.append("class-select-change", "");

        $.ajax({
            url: "transcript-select.php",
            type: "POST",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data){
                $('.subject-select1').css("display", "block");
                $('.subject-select1').html(data);
            }
        })
    })

    $('[name="RName-tran"]').on('input', function(){
        var formData = new FormData();
        formData.append("RName-tran", $('[name="RName-tran"]').val());
        formData.append("class-select", $('#class-select1').val());
        formData.append("RName-change", "");

        $.ajax({
            url: "transcript-select.php",
            type: "POST",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data){
                $('.list-student').html(data);
            }
        })
    })

    $('form[name="transcript-select-form"]').on('submit', function(e){
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("class-select", $('#class-select').val());
        formData.append("subject-select", $('#subject-select1').val());
        formData.append("transcript-select", "");

        $.ajax({
            url: "transcript-select.php",
            type: "POST",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data){
                $('tbody').html(data);
                $('.first').css('display', 'none');
                $('.table-scroll').addClass('active');
            }
        })
    })

    $('body').on('click', '.student-select', function(){
        var student_select = $(this).attr('id');
        var subject_select = $('.subject-select1 #subject-select1').val();
        $('.student-select').css('border', 'solid 1px #000');
        $(this).css('border', 'solid 2px #20c2f388');
        $.ajax({
            url:'transcript-Select.php',
            type:'POST',
            method:'POST',
            data: {student_select: student_select,
            subject_select: subject_select},
            success: function(data){
                $('#score').html(data);
            }
        })
    })

    $("#file_import").on("submit", function(event){
        event.preventDefault();
        var formData = new FormData(this);
        formData.append("display_import", "");
        $.ajax({
            url: "transcript-select.php",
            method: 'POST',
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data){
                $('#modal_body').html(data);
            }
        })
    })
    
    $('button[name="import"]').on("click", function(){
        if($('#class-select').val()=="null"){
            alert("Cần phải chọn lớp muốn nhập điểm.");
        }else{
            var formData = new FormData(file_import_form);
            formData.append("import", "");
            formData.append("class", $('#class-select').val());
            formData.append("subject", $('#subject-select1').val());

            $.ajax({
                url: "transcript-select.php",
                method: 'POST',
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data){
                    $('tbody').html(data);
                }
            })
        }
    })

    $('#profile_form').on('submit', function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        formData.append('save_ava','');
        formData.append('newFileName', newFileName);
        formData.append('UserID', userID);
  
        $.ajax({
            url: "process-profile.php",
            method: 'POST',
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                var return_data = data.split('|');
                if(return_data[0]=="success"){
                    $('#image_name_').attr('src', "images/avatar/"+return_data[1]);
                    $('.small-ava').attr('src', "images/avatar/"+return_data[1]);
                    $('.alert').html(return_data[2]);
                }else{
                    $('.alert').text(return_data[1]);
                }
            },
            error: function(){
              alert("LỖI KHI THAY ĐỔI ẢNH!");
            }
        })
    })
    
    $('.take-roll').on("click", function(){
        takeRoll = $(this).text();
        ajaxSearch();
    })

    $('.takeClass').on("click", function(){
        takeClass = $(this).text();
        ajaxSearch();
    })

})

function ajaxSearch(){
    $.ajax({
        url: "searching.php",
        method: 'POST',
        type: "POST",
        data: {
            takeRoll: takeRoll,
            takeClass: takeClass,
            takeName: takeName,
            search: ""
        },
        success: function(data){
            $("#list-group").html(data);
        }
    })  
}