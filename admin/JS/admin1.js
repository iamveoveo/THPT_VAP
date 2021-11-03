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
        userID = userID.split(' ');

        $.ajax({
            url: 'take-infor.php',
            type: 'POST',
            method: 'POST',
            data: {
                UserID: userID[1],
                Subject: userID[0],
                take_transcript_infor: ""
            },
            success: function(data){
                $('.editor-body').html(data);
            }
        })
    })
})