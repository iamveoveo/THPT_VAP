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

    $('button[name="import_hs"]').on('click',function(e){ 
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

    $('button[name="import_gv"]').on('click',function(e){
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

    // phụ huynh
    $('#form_import_ph').on('submit',function(e){
        e.preventDefault();
        var data2 = new FormData(this);
        data2.append('preview_ph','');

        $.ajax({
            url: 'display.php',
            method: 'POST',
            type: 'POST',
            data: data2,
            processData: false,
            contentType: false,
            success: function(data2){
                $('.modal_body_ph').html(data2);

            }
        })
    })

    $('button[name="import_ph"]').on('click',function(e){ //lấy sự kiện cho nút
        var data2 = new FormData(form_import_ph);
        data2.append('import_ph','');
        $.ajax({
            url: 'import.php',
            method: 'POST',
            type: 'POST',
            data: data2,
            processData: false,
            contentType: false,
            success: function(data2){
               $('#table_ph').html(data2);

            }
        })
    })

    // điểm
    $('#form_import_diem').on('submit',function(e){
        e.preventDefault();
        var data3 = new FormData(this);
        data3.append('preview_diem','');

        $.ajax({
            url: 'display.php',
            method: 'POST',
            type: 'POST',
            data: data3,
            processData: false,
            contentType: false,
            success: function(data3){
                $('.modal_body_diem').html(data3);

            }
        })
    })

    $('button[name="import_ph"]').on('click',function(e){ //lấy sự kiện cho nút
        var data3 = new FormData(form_import_diem);
        data3.append('import_diem','');
        $.ajax({
            url: 'import.php',
            method: 'POST',
            type: 'POST',
            data: data3,
            processData: false,
            contentType: false,
            success: function(data3){
               $('#table_diem').html(data3);

            }
        })
    })
})

