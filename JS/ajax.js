var takeRoll = "";
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
                data;
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