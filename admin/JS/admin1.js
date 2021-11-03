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
})