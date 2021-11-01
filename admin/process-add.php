<?php
    include("../config/constants.php");
?>
<!-- giáo viên -->
<?php
    if(isset($_POST['add-qlgv'])){
        $hoTen  = $_POST['UserRName'];
        $tenTK = $_POST['UserName'];
        $pass = $_POST['UserPassword'];
        $email = $_POST['UserEmail'];
        $sodidong = $_POST['UserTel'];
        $diachi = $_POST['UserAdd'];
        $gioitinh = $_POST['UserGender'];
        $ngaySinh = $_POST['UserBirth'];

        $pass_hash = password_hash($pass, PASSWORD_DEFAULT);

        //lệnh sql
        $sql="INSERT INTO users SET
        UserName = '$hoTen',
        UserRName = '$tenTK',
        UserPassword = '$pass_hash',
        UserEmail = '$email' , 
        UserTel = $sodidong, 
        UserAdd = '$diachi',
        UserGender = '$gioitinh', 
        UserBirth = '$ngaySinh',
        UserRoll = 'Giáo viên'

        ";

        // $sql_2=" INSERT INTO teacher SET
        // TeachSubject = '$mon' ";
        $query = mysqli_query($conn,$sql) or die(mysqli_error());

        if($query==TRUE)
        {
            $_SESSION['add_teach']="<div class='text-success'>Thêm giáo viên thành công.</div>";
            header('location:' .SITEURL. 'admin/admin-qlgv.php');
        }
        else
        {
            $_SESSION['add_teach']="<div class='text-danger'>Thêm giáo viên thất bại.</div>";
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
            $_SESSION['add_parent']="<div class='text-success'>Thêm phụ huynh thành công.</div>";
            header('location:' .SITEURL. 'admin/admin-qlph.php');
        }
        else
        {
            $_SESSION['add_parent']="<div class='text-danger'>Thêm phụ huynh thất bại.</div>";
            header('location:' .SITEURL. 'admin/admin-qlph.php');
        } 

    }
?>

<!-- học sinh -->
<?php
    if(isset($_POST['add-qlhs'])){
        $hoTen  = $_POST['txtHoTen'];
        $tenTK = $_POST['txtTaiKhoan'];
        $matkhau = $_POST['matKhau'];
        $email = $_POST['txtEmail'];
        $sodidong = $_POST['sdt'];
        $diachi = $_POST['txtDiaChi'];
        $gioitinh = $_POST['txtGioiTinh'];
        $ngaySinh = $_POST['ngaySinh'];
        $lop = $_POST['txtLop'];

        $pass_hash_2 = password_hash($matkhau, PASSWORD_DEFAULT);

        $sql_2="INSERT INTO users SET
        UserRName = '$hoTen',
        UserName = '$tenTK',
        UserPassword = '$pass_hash_2',
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
            $_SESSION['add_student']="<div class='text-success'>Thêm học sinh thành công.</div>";
            header('location:' .SITEURL. 'admin/admin-qlhs.php');
        }
        else
        {
            $_SESSION['add_student']="<div class='text-danger'>Thêm học sinh thất bại.</div>";
            header('location:' .SITEURL. 'admin/admin-qlhs.php');
        } 

    }
?>

<!-- điểm -->
<?php
    if(isset($_POST['add-qld'])){
        $Student_UserID = $_POST['Student_UserID'];
        $Subject = $_POST['txtMon'];
        $MidTerm = $_POST['diemGiua'];
        $FinalExam = $_POST['diemCuoi'];

        $sql_3="INSERT INTO transcript SET
        Student_UserID = '$Student_UserID',
        Subject = '$Subject',
        MidTerm = '$MidTerm' , 
        FinalExam = '$FinalExam'
        ";

        $query_3 = mysqli_query($conn,$sql_3) or die(mysqli_error());

        if($query_3==TRUE)
        {
            $_SESSION['add_diem']="<div class='text-success'>Thêm điểm thành công.</div>";
            header('location:' .SITEURL. 'admin/admin-qld.php');
        }
        else
        {
            $_SESSION['add_diem']="<div class='text-danger'>Thêm điểm thất bại.</div>";
            header('location:' .SITEURL. 'admin/admin-qld.php');
        } 

    }
?>

<!-- admin -->
<?php
    if(isset($_POST['add-admin'])){
        $AdName  = $_POST['txtHoTen'];
        $Adpass = $_POST['pass'];
        $AdEmail = $_POST['txtEmail'];
        $AdTel = $_POST['sdt'];
        $AdAdd = $_POST['txtDiaChi'];
        $AdGender = $_POST['txtGioiTinh'];
        $AdBirth = $_POST['ngaySinh'];

        $pass_hash1 = password_hash($pass1, PASSWORD_DEFAULT);

        //lệnh sql
        $sql_4="INSERT INTO admin SET
        AdName = '$AdName',
        AdPassword = '$pass_hash1',
        AdEmail = '$AdEmail' , 
        AdTel = $AdTel, 
        AdAdd = '$AdAdd',
        AdGender = '$AdGender', 
        AdBirth = '$AdBirth'
        ";

        $query_4 = mysqli_query($conn,$sql_4) or die(mysqli_error());
        if($query_4==TRUE)
        {
            $_SESSION['add_admin']="<div class='text-success'>Thêm Admin thành công.</div>";
            header('location:' .SITEURL. 'admin/admin-manager.php');
        }
        else
        {
            $_SESSION['add_admin']="<div class='text-danger'>Thêm Admin thất bại.</div>";
            header('location:' .SITEURL. 'admin/admin-manager.php');
        }
    }
?>
