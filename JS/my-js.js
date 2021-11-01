var student_select = "";
var validExt = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
var newFileName ="";

$(function () {
    $(document).scroll(function () {
      var $nav = $(".navbar-fixed-top");
      $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    });
});

$(document).ready(function(){
  $("[name='edit']").on('click', function(){
    $(".infor-edit").html($(".infor").html());
    $('#image_name').attr('src', $('#image_name_').attr('src'));
    $(".infor-edit :input").removeAttr("disabled");
    $(".infor-edit :input").removeAttr("readonly");
  })

  $('[name="file_image"]').on('change',function(){
    $('.alert').text("");
    if(this.files[0].size>5000000 || jQuery.inArray(this.files[0].type, validExt) == -1){
      $('.alert').text("Tệp tải lên không hợp lệ!");
    }else{
      $("#image_name").attr("src", URL.createObjectURL(this.files[0]));

      var dt = new Date();
      newFileName = userID + String(dt.getFullYear()) + String(dt.getMonth()+1) + String(dt.getDate()) + String(dt.getHours()) + String(dt.getMinutes()) + String(dt.getSeconds()) + "." + this.files[0].name.split('.').pop().toLowerCase();
    }
  })
})

