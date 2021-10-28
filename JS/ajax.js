var takeRoll = "";
var takeName = "";
var takeClass = "";

$(document).ready(function(){
    /* $("[name='save']").on("click", function(){
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
                alert(data);
            }
        })
    }) */

    $('.take-roll').on("click", function(){
        takeRoll = $(this).text();
        ajaxSearch();    
    })

    

})

function ajaxSearch(){
    $.ajax({
        url: "searching.php",
        type: "POST",
        method: "POST",
        data: {
            takeRoll: takeRoll,
            takeClass: takeClass,
            takeName: takeName
        },
        contentType: false,
        processData: false,
        success: function(data){
            alert(data);
        }
    })
}