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

    $('[name="export"]').on('click', function(){
        $('#form_hs').submit();
    })

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

    $('#class-select1').on('change', function(){
        $.ajax({
            url: 'process-search.php',
            type: 'POST',
            methos: 'POST',
            data: {classselect1: $(this).val(),},
            success: function(data){
                $('#subject-select1').html(data);
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
            success: function(data){
                $('.modal_body_diem').html(data);
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

    $('#selected1').on('click', function(){
        class_select = $('#class-select1').val();
        subject_select = $('#subject-select1').val();
        
        $.ajax({
            url: 'process-search.php',
            type: 'POST',
            methos: 'POST',
            data: { class_select: class_select,
                    subject_select: subject_select,
                    selected1: ""},
            success: function(data){
                $('#d-table').html(data);
            }
        })
    })

    $('button[name="import_diem"]').on('click',function(e){
        if(class_select=="" && subject_select==""){
            alert('Bạn cần chọn lớp, môn cần thêm điểm trước.');
        }else{
            var data3 = new FormData(form_import_diem);
            data3.append('import_diem','');
            data3.append('class_select', class_select);
            data3.append('subject_select', subject_select);

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
        }
    })

    $('#RName-student').on('input', function(){
        if($('#class-student').val()==""){
            alert("Bạn cần chọn lớp trước");
        }else{
            $.ajax({
                url: 'process-search.php',
                method: 'POST',
                type: 'POST',
                data: {
                    UserRName: $('#RName-student').val(),
                    UserClass: $('#class-student').val(),
                    student_select: ""
                },
                success: function(data){
                   $('.student-select').html(data);
                }
            })
        }
    })

    $('#RName-Teacher').on('input', function(){
        $.ajax({
            url: 'process-search.php',
            method: 'POST',
            type: 'POST',
            data: {
                UserRName: $('#RName-Teacher').val(),
                teacher_select: ""
            },
            success: function(data){
                $('.teacher-select').html(data);
            }
        })
    })

    $('[name="txtTaiKhoan"]').on('change', function(){
        $.ajax({
            url: 'process-search.php',
            method: 'POST',
            type: 'POST',
            data: {
                UserName: $('[name="txtTaiKhoan"]').val(),
                validate_userName: ""
            },
            success: function(data){
                $('.modal-title').html(data);
            }
        })
    })

    $('#admin-txtTaiKhoan').on('change', function(){
        $.ajax({
            url: 'process-search.php',
            method: 'POST',
            type: 'POST',
            data: {
                AdName: $('#admin-txtTaiKhoan').val(),
                validate_userName: ""
            },
            success: function(data){
                $('.modal-title').html(data);
            }
        })
    })

    $('#form_import_mon').on('submit',function(e){
        e.preventDefault();
        var data3 = new FormData(this);
        data3.append('preview_mon','');

        $.ajax({
            url: 'display.php',
            method: 'POST',
            type: 'POST',
            data: data3,
            processData: false,
            contentType: false,
            success: function(data){
                $('.modal_body_mon').html(data);
            }
        })
    })

    $('button[name="import_mon"]').on('click',function(e){ //lấy sự kiện cho nút
        alert("data2");
        var data2 = new FormData(form_import_mon);
        data2.append('import_mon','');
        $.ajax({
            url: 'import.php',
            method: 'POST',
            type: 'POST',
            data: data2,
            processData: false,
            contentType: false,
            success: function(data2){
               $('#table_mon').html(data2);
            }
        })
    })

    $('body').on('click', '.student-item', function(){
        $('[name="Student_UserID"]').val($(this).attr('id'));
        $('.student-item').css('border', 'solid 1px #000');
        $(this).css('border', 'solid 2px #20c2f388');
    })

    $('body').on('click', '.teacher-item', function(){
        $('[name="Teacher_UserID"]').val($(this).attr('id'));
        $('.teacher-item').css('border', 'solid 1px #000');
        $(this).css('border', 'solid 2px #20c2f388');
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