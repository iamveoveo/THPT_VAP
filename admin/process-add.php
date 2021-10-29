<?php
    include("../config/constants.php");
?>
<!-- giáo viên -->
<?php
    if(isset($_POST['add-qlgv'])){
        $hoTen  = $_POST['txtHoTen'];
        $tenTK = $_POST['txtTaiKhoan'];
        $email = $_POST['txtEmail'];
        $sodidong = $_POST['sdt'];
        $diachi = $_POST['txtDiaChi'];
        $gioitinh = $_POST['txtGioiTinh'];
        $ngaySinh = $_POST['ngaySinh'];
        $mon = $_POST['txtMon'];
        $lop = $_POST['txtLop'];

        //lệnh sql
        $sql="INSERT INTO users SET
        UserName = '$hoTen',
        UserRName = '$tenTK',
        UserEmail = '$email' , 
        UserTel = $sodidong, 
        UserAdd = '$diachi',
        UserGender = '$gioitinh', 
        UserBirth = '$ngaySinh',
        UserClass = '$lop',
        UserRoll = 'Giáo viên'

        ";
      $query = mysqli_query($conn,$sql) or die(mysqli_error());

        // $sql_2=" INSERT INTO teacher SET
        // TeachSubject = '$mon' ";
        // $query_2 = mysqli_query($conn,$sql_2) or die(mysqli_error());

        if($query==TRUE)
        {
            $_SESSION['add']="<div class='text-success'>Thêm nhân viên thành công.</div>";
            header('location:' .SITEURL. 'admin/admin-qlgv.php');
        }
        else
        {
            $_SESSION['add']="<div class='text-danger'>Thêm nhân viên thất bại.</div>";
            header('location:' .SITEURL. 'admin/admin-qlgv.php');
        }
    }
?>

<!-- phụ huynh -->
<?php
    if(isset($_POST['add-qlph'])){
        $hoTen  = $_POST['txtHoTen'];
        $tenTK = $_POST['txtTaiKhoan'];
        $email = $_POST['txtEmail'];
        $sodidong = $_POST['sdt'];
        $diachi = $_POST['txtDiaChi'];
        $gioitinh = $_POST['txtGioiTinh'];
        $ngaySinh = $_POST['ngaySinh'];

        $sql_1="INSERT INTO users SET
        UserName = '$hoTen',
        UserRName = '$tenTK',
        UserEmail = '$email' , 
        UserTel = $sodidong, 
        UserAdd = '$diachi',
        UserGender = '$gioitinh', 
        UserBirth = $ngaySinh,
        UserRoll = 'Phụ huynh'
        ";

        $query_1 = mysqli_query($conn,$sql_1) or die(mysqli_error());

        if($query_1==TRUE)
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

<!-- học sinh -->
<?php
    if(isset($_POST['add-qlhs'])){
        $hoTen  = $_POST['txtHoTen'];
        $tenTK = $_POST['txtTaiKhoan'];
        $email = $_POST['txtEmail'];
        $sodidong = $_POST['sdt'];
        $diachi = $_POST['txtDiaChi'];
        $gioitinh = $_POST['txtGioiTinh'];
        $ngaySinh = $_POST['ngaySinh'];
        $lop = $_POST['txtLop'];

        $sql_2="INSERT INTO users SET
        UserName = '$hoTen',
        UserRName = '$tenTK',
        UserEmail = '$email' , 
        UserTel = $sodidong, 
        UserAdd = '$diachi',
        UserGender = '$gioitinh', 
        UserBirth = $ngaySinh,
        UserClass = '$lop',
        UserRoll = 'Học sinh'
        ";

        $query_2 = mysqli_query($conn,$sql_2) or die(mysqli_error());

        if($query_2==TRUE)
        {
            $_SESSION['add']="<div class='text-success'>Thêm nhân viên thành công.</div>";
            header('location:' .SITEURL. 'admin/admin-qlhs.php');
        }
        else
        {
            $_SESSION['add']="<div class='text-danger'>Thêm nhân viên thất bại.</div>";
            header('location:' .SITEURL. 'admin/admin-qlhs.php');
        } 

    }
?>

<!-- điểm -->
<?php
    if(isset($_POST['add-qld'])){
        $hoTen  = $_POST['txtHoTen'];
        $mon = $_POST['txtMon'];
        $giuaki = $_POST['diemGiuaKi'];
        $cuoiki = $_POST['diemCuoiKi'];
        $lop = $_POST['txtLop'];

        $sql_2="INSERT INTO transcript SET
        UserName = '$hoTen',
        UserRName = '$tenTK',
        UserEmail = '$email' , 
        UserTel = $sodidong, 
        UserAdd = '$diachi',
        UserGender = '$gioitinh', 
        ";

        $query_3 = mysqli_query($conn,$sql_3) or die(mysqli_error());

        if($query_3==TRUE)
        {
            $_SESSION['add']="<div class='text-success'>Thêm điểm thành công.</div>";
            header('location:' .SITEURL. 'admin/admin-qld.php');
        }
        else
        {
            $_SESSION['add']="<div class='text-danger'>Thêm điểm thất bại.</div>";
            header('location:' .SITEURL. 'admin/admin-qld.php');
        } 

    }
?>