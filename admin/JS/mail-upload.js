$(document).ready(function(){
    $("form[name='send-mail-form']").on("submit", function(e){
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("send-mail", "");
        formData.append("AdID", adID);

        $.ajax({
            url: "process-send-mail.php",
            type: "POST",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data){
                $('.send-alert').html(data);
                mail_sent = 1;
                email_add = $('input[name="email"]').val() ;
            }
        })
    })

    $("form[name='confirm-code-form']").on("submit", function(e){
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("confirm-code", "");
        if(mail_sent==1){
            formData.append("AdEmail", email_add);
        }
        formData.append("AdID", adID);

        $.ajax({
            url: "process-send-mail.php",
            type: "POST",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data){
                var confirm = data.split('|');
                if(confirm[0]=="updated"){
                    window.location.replace(confirm[1]);
                }else{
                    $('.confirm-alert').html(confirm[1]);
                }
            }
        })
    })

    var newFileName = '';//biến để đổi tên
    var id = $('#AdID').text();
    $('#form_avatar').on('submit',function(e){
        e.preventDefault();
  
        //khởi tạo biến để đổi tên file 
        var dt = new Date();
        var filename = new FormData(this);

        newFileName = id + String(dt.getFullYear()) + String(dt.getMonth()+1) + String(dt.getDate()) + String(dt.getHours()) + String(dt.getMinutes()) + String(dt.getSeconds()) + "." + filename.get('file_image').name.split('.').pop().toLowerCase();
       
        filename.append('up-avatar','');
        //để thêm dữ liệu gửi đi
        filename.append('newFileName',newFileName);
  
        $.ajax({
           url: 'update-profile.php',
           method: 'POST',
           type: 'POST',
           data: filename,
           processData: false,
           contentType: false,
           success: function(){
              $('#ava').attr('src','../images/avatar/'+newFileName);
           }
        })
    })
    
  
     //sửa profile
     $('#form_edit').on('submit',function(e){
        e.preventDefault();
        var dt = new FormData(this);
        dt.append('up-profile','');
  
        $.ajax({
           url: 'update-profile.php',
           method:'POST',
           type: 'POST',
           data: dt,
           cache:false,
           processData: false,
           contentType: false,
           
           success: function(){
              alert('Đã lưu thay đổi');
              $('#txtHoTen').text(dt.get('txthoten'));
              $('#txtTK').text(dt.get('txtTK'));
              $('#txtEmail').text(dt.get('txtEmail'));
              $('#sdt').text(dt.get('sdt'));
              $('#txtDiaChi').text(dt.get('txtDiaChi'));
              $('#ngaySinh').text(dt.get('ngaySinh'));
              $('#txtGioiTinh').text(dt.get('txtGioiTinh'));
              
           }   
        })
    })
})

