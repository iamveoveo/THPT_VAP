$(document).ready(function(){
    $('.icon-admin').on('click', function(){
        $.ajax({
            url: 'take-infor.php',
            type: 'POST',
            method: 'POST',
            data: {
                UserID: $(this).attr('id'),
                take_infor: "",
            },
            success: function(data){
                $('.editor-body').html(data);
            }
        })
    })

    $('.icon-class').on('click', function(){
        $.ajax({
            url: 'take-infor.php',
            type: 'POST',
            method: 'POST',
            data: {
                teachID: $(this).attr('id'),
                take_teach_infor: "",
            },
            success: function(data){
                $('.editor-body').html(data);
            }
        })
    })

    $('.icon-manager').on('click', function(){
        $.ajax({
            url: 'take-infor.php',
            type: 'POST',
            method: 'POST',
            data: {
                AdID: $(this).attr('id'),
                take_manager_infor: "",
            },
            success: function(data){
                $('.editor-body').html(data);
            }
        })
    })

    $('.icon-score').on('click', function(){
        var userID = $(this).attr('id');
        var subject = $(this).attr('subject');

        $.ajax({
            url: 'take-infor.php',
            type: 'POST',
            method: 'POST',
            data: {
                UserID: userID,
                Subject: subject,
                take_transcript_infor: ""
            },
            success: function(data){
                $('.editor-body').html(data);
            }
        })
    })

/* detail */

    $('.icon-detail').on('click', function(){
        $.ajax({
            url: 'take-infor.php',
            type: 'POST',
            method: 'POST',
            data: {
                UserID: $(this).attr('id'),
                take_infor: "",
            },
            success: function(data){
                $('.detail-body').html(data);
                $('.detail-body :input').attr("disabled", "disabled");
            }
        })
    })
    
    $('.icon-detail').on('click', function(){
        $.ajax({
            url: 'take-infor.php',
            type: 'POST',
            method: 'POST',
            data: {
                UserID: $(this).attr('id'),
                take_infor: "",
            },
            success: function(data){
                $('.detail-body').html(data);
                $('.detail-body :input').attr("disabled", "disabled");
            }
        })
    })

    $('.icon-manager-detail').on('click', function(){
        $.ajax({
            url: 'take-infor.php',
            type: 'POST',
            method: 'POST',
            data: {
                AdID: $(this).attr('id'),
                take_manager_infor: "",
            },
            success: function(data){
                $('.detail-body').html(data);
                $('.detail-body :input').attr("disabled", "disabled");
            }
        })
    })

    $('#header-search').on('submit', function(e){
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("region", region);
        formData.append("search", "");

        $.ajax({
            url: 'process-search.php',
            type: 'POST',
            method: 'POST',
            contentType: false,
            processData: false,
            data: formData,
            success: function(data){
                $('#main-tbody').html(data);
            }
        })
    })
    
    $('input[name="newpass2"]').focusout(function() {
        if($('[name="newpass1"]').val() == $('[name="newpass2"]').val()){
            $('[name="newpass2"]').css('border', "2px solid #8cff93ab");
        }else{
            $('[name="newpass2"]').css('border', "2px solid #e68e8ec4");
        }
    })
})