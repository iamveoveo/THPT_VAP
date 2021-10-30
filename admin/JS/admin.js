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

});

