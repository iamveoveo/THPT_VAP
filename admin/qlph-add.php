
<?php
//ktra là người dùng nhấn nút chưa
    if(isset($_POST['sbm-qlph'])){
        //lấy  gtri form lưu vào biến
        $hoTen  = $_POST['txtHoTen'];
        $email = $_POST['txtEmail'];
        $sodidong = $_POST['sdt'];
        $diachi = $_POST['txtDiaChi'];
        $gioitinh = $_POST['txtGioiTinh'];
        $ngaySinh = $_POST['NgaySinh'];

        //kết nối database
        require("../config/constants.php");

        //lệnh sql
        $sql_1="INSERT INTO users SET
        UserName = '$hoTen',
        UserEmail = '$email' , 
        UserTel = $sodidong, 
        UserAdd = '$diachi',
        UserGender = '$gioitinh', 
        UserBirth = $ngaySinh,
        UserRoll = 'Phụ huynh'
        ";

 
        $query = mysqli_query($conn,$sql_1) or die(mysqli_error());

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if($query==TRUE)
        {
            $_SESSION['add']="<div class='text-success'>Thêm nhân viên thành công.</div>";

            header('location:' .SITEURL. 'admin/admin-qlph.php');
        }
        else
        {
            $_SESSION['add']="<div class='text-danger'>Thêm nhân viên thất bại.</div>";
            header('location:' .SITEURL. 'admin/admin-qlph.php');

        } 

    }
?>