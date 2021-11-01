const mobileScreen = window.matchMedia("(max-width: 990px )");
var class_select = "";
var subject_select = "";

$(document).ready(function () {
    $(".dashboard-nav-dropdown-toggle").click(function () {
        $(this).closest(".dashboard-nav-dropdown")
            .toggleClass("show")
            .find(".dashboard-nav-dropdown")
            .removeClass("show");
        $(this).parent()
            .siblings()
            .removeClass("show");
    });
    $(".menu-toggle").click(function () {
        if (mobileScreen.matches) {
            $(".dashboard-nav").toggleClass("mobile-show");
        } else {
            $(".dashboard").toggleClass("dashboard-compact");
        }
    });

    $('[name="export"]').on('click', function(){
        $('#form_hs').submit();
    })

    /* ajax chọn lớp, môn */
    $('#class-select').on('change', function(){
        $.ajax({
            url: 'process-search.php',
            type: 'POST',
            methos: 'POST',
            data: {classselect: $(this).val(),},
            success: function(data){
                $('#subject-select').html(data);
            }
        })
    })

    $('#selected').on('click', function(){
        class_select = $('#class-select').val();
        subject_select = $('#subject-select').val();
        
        $.ajax({
            url: 'process-search.php',
            type: 'POST',
            methos: 'POST',
            data: { class_select: class_select,
                    subject_select: subject_select,
                    selected: ""},
            success: function(data){
                $('#d-table').html(data);
            }
        })
    })

    $('[name="btn_export_diem"]').on('click', function(){
        if(class_select == ""){
            alert("Bạn cần chọn lớp cần xuất tệp điểm trước.");
        }else{
            var url = siteurl+"admin/import-export.php?export_diem=&class_select="+class_select+"&subject_select="+subject_select;
            window.location.replace(url);
        }
    })
});