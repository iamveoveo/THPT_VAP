if (typeof takeRoll == 'undefined') {
    var takeRoll = "";
}
var takeClass = "";

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
            }
        })
    })

    $("form[name='confirm-code-form']").on("submit", function(e){
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("confirm-code", "");
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

    $('#transcript-select-form').on('submit', function(e){
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("transcript-select", "");

        $.ajax({
            url: "transcript-select.php",
            type: "POST",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data){
                alert(data);
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