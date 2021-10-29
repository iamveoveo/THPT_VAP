$(function () {
    $(document).scroll(function () {
      var $nav = $(".navbar-fixed-top");
      $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    });
});

$(document).ready(function(){
  $("[name='edit']").on('click', function(){
    $(".infor-edit").html($(".infor").html());
    $(".infor-edit :input").removeAttr("disabled");
    $(".infor-edit :input").removeAttr("readonly");
  })
})