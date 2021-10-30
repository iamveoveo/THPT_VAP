const mobileScreen = window.matchMedia("(max-width: 990px )");
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

    // tìm kiếm học sinh cho phụ huynh
    $('[name="student_search"]').on('submit',function(e){
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('hs_search','');
        $.ajax({
            url:'process-search.php' ,
            method: 'post',
            type: 'post',
            contentType: false,
            processData: false,
            data: formData,
            success: function(data){
                $('.search_content').html(data);

            }
        })
    })

    // học sinh
    $('#form_import').on('submit',function(e){
        e.preventDefault();
        var data = new FormData(this);
        data.append('preview','');

        $.ajax({
            url: 'display.php',
            method: 'POST',
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            success: function(data){
                $('.modal_body_hs').html(data);

            }
        })
    })

    $('button[name="import_hs"]').on('click',function(e){ //lấy sự kiện cho nút
        var data = new FormData(form_import);
        data.append('import_hs','');
        $.ajax({
            url: 'import.php',
            method: 'POST',
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            success: function(data){
               $('#table').html(data);

            }
        })
    })

    // giáo viên
    $('#form_import_gv').on('submit',function(e){
        e.preventDefault();
        var data1 = new FormData(this);
        data1.append('preview_gv','');

        $.ajax({
            url: 'display.php',
            method: 'POST',
            type: 'POST',
            data: data1,
            processData: false,
            contentType: false,
            success: function(data1){
                $('.modal_body_gv').html(data1);

            }
        })
    })

    $('button[name="import_gv"]').on('click',function(e){ //lấy sự kiện cho nút
        var data1 = new FormData(form_import_gv);
        data1.append('import_gv','');
        $.ajax({
            url: 'import.php',
            method: 'POST',
            type: 'POST',
            data: data1,
            processData: false,
            contentType: false,
            success: function(data1){
               $('#table_gv').html(data1);

            }
        })
    })
})

