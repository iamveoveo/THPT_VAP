<?php
    include("../config/constants.php");
?>
<!-- giáo viên -->
<?php
    if(isset($_POST['add-qlgv'])){
        $hoTen  = $_POST['txtHoTen'];
        $tenTK = $_POST['txtTaiKhoan'];
        $pass = $_POST['UserPassword'];
        $email = $_POST['UserEmail'];
        $sodidong = $_POST['UserTel'];
        $diachi = $_POST['UserAdd'];
        $gioitinh = $_POST['UserGender'];
        $ngaySinh = $_POST['UserBirth'];
        if($ngaySinh==""){$ngaySinh="0000-00-00";}

        $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
        $UserCode = rand(10000000, 99999999);

        //lệnh sql
        $sql="INSERT INTO users SET
        UserRName = '$hoTen',
        UserName = '$tenTK',
        UserPassword = '$pass_hash',
        UserEmail = '$email' , 
        UserTel = '$sodidong', 
        UserAdd = '$diachi',
        UserGender = '$gioitinh', 
        UserBirth = '$ngaySinh',
        UserCode = '$UserCode',
        UserRoll = 'Giáo viên'
        ";

        // $sql_2=" INSERT INTO teacher SET
        // TeachSubject = '$mon' ";
        $query = mysqli_query($conn,$sql);

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
        $pass = $_POST['UserPassword'];
        $sodidong = $_POST['sdt'];
        $diachi = $_POST['txtDiaChi'];
        $gioitinh = $_POST['txtGioiTinh'];
        $ngaySinh = $_POST['ngaySinh'];
        if($ngaySinh==""){$ngaySinh="0000-00-00";}
        $Student_UserID = $_POST['Student_UserID'];

        if($_POST['Student_UserID']!=""){

            $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
            $UserCode = rand(10000000, 99999999);

            $sql5 = "select * from users where UserRoll='Phụ huynh' and UserChild=$Student_UserID";
            $res5 = mysqli_query($conn, $sql5);

            if(mysqli_num_rows($res5)>0){
                $_SESSION['add_parent']="<div class='text-danger'>Học sinh mà bạn đang muốn theo dõi đã được theo dõi bởi tải khoản khác.</div>";
                header('location:' .SITEURL. 'admin/admin-qlph.php');
            }else{
                $sql_1="INSERT INTO users SET
                UserRName = '$hoTen',
                UserName = '$tenTK',
                UserPassword = '$pass_hash',
                UserTel = '$sodidong', 
                UserAdd = '$diachi',
                UserGender = '$gioitinh', 
                UserBirth = '$ngaySinh',
                UserCode = '$UserCode',
                UserRoll = 'Phụ huynh'
                ";

                $query_1 = mysqli_query($conn,$sql_1);

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
        }else{
            $_SESSION['add_parent']="<div class='text-danger'>Hãy chọn học sinh cần theo dõi trước khi thêm.</div>";
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
        if($ngaySinh==""){$ngaySinh="0000-00-00";}
        $lop = $_POST['txtLop'];

        $pass_hash_2 = password_hash($matkhau, PASSWORD_DEFAULT);
        $UserCode = rand(10000000, 99999999);

        $sql_2="INSERT INTO users SET
        UserRName = '$hoTen',
        UserName = '$tenTK',
        UserPassword = '$pass_hash_2',
        UserEmail = '$email' , 
        UserTel = '$sodidong', 
        UserAdd = '$diachi',
        UserGender = '$gioitinh', 
        UserBirth = '$ngaySinh',
        UserClass = '$lop',
        UserCode = '$UserCode',
        UserRoll = 'Học sinh'
        ";

        $query_2 = mysqli_query($conn,$sql_2);

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

        $query_3 = mysqli_query($conn,$sql_3);

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
        $AdRName  = $_POST['txtHoTen'];
        $AdName  = $_POST['txtTaiKhoan'];
        $Adpass = $_POST['adpass'];
        $AdTel = $_POST['sdt'];
        $AdAdd = $_POST['txtDiaChi'];
        $AdGender = $_POST['txtGioiTinh'];
        $AdBirth = $_POST['ngaySinh'];
        if($AdBirth==""){$AdBirth="0000-00-00";}

        $pass_hash1 = password_hash($Adpass, PASSWORD_DEFAULT);
        $UserCode = rand(10000000, 99999999);

        //lệnh sql
        $sql_4="INSERT INTO admin SET
        AdName = '$AdName',
        AdRName = '$AdRName',
        AdPassword = '$pass_hash1',
        AdTel = '$AdTel', 
        AdAdd = '$AdAdd',
        AdGender = '$AdGender', 
        AdCode = '$UserCode',
        AdBirth = '$AdBirth'
        ";

        $query_4 = mysqli_query($conn,$sql_4);
        if($query_4==TRUE)
        {
            $_SESSION['add_admin']="<div class='text-success'>Thêm Admin thành công.</div>";
            header('location:' .SITEURL. 'admin/admin-manager.php');
        }
        else
        {
            $_SESSION['add_admin']="".$AdBirth."<div class='text-danger'>Thêm Admin thất bại.</div>";
            header('location:' .SITEURL. 'admin/admin-manager.php');
        }
    }
?>

<!-- Lớp -->
<?php
    if(isset($_POST['add-qll'])){
        $ClassGrade = $_POST['txtKhoi'];
        $ClassName = $_POST['txtNewLop'];

        $sql6 = "INSERT INTO class SET
        ClassGrade = '$ClassGrade',
        ClassName = '$ClassName'";
        $res6 = mysqli_query($conn, $sql6);

        if($res6){
            $_SESSION['add']="<div class='text-success'>Thêm Lớp thành công.</div>";
            header('location:' .SITEURL. 'admin/admin-qll.php');
        }else{
            $_SESSION['add']="<div class='text-danger'>Lỗi khi thêm lớp.</div>";
            header('location:' .SITEURL. 'admin/admin-qll.php');
        }
    }
?>

<!-- Môn -->
<?php
    if(isset($_POST['add-qll1'])){
        $ClassID = $_POST['txtLop'];
        $TeachSubject = $_POST['txtMon'];
        $Teacher_UserID = $_POST['Teacher_UserID'];

        $sql7 = "select * from teach where Teacher_UserID = '$Teacher_UserID' and ClassID = '$ClassID' and TeachSubject = '$TeachSubject'";
        $res7 = mysqli_query($conn, $sql7);
    
        if(mysqli_num_rows($res7)>0){
            $_SESSION['add']="<div class='text-danger'>Môn bạn vừa thêm đã tồn tại.</div>";
            header('location:' .SITEURL. 'admin/admin-qll.php');
        }else{
            $sql6 = "INSERT INTO teach SET
            Teacher_UserID = '$Teacher_UserID',
            ClassID = '$ClassID',
            TeachSubject = '$TeachSubject'";
            $res6 = mysqli_query($conn, $sql6);

            if($res6){
                $_SESSION['add']="<div class='text-success'>Thêm môn thành công.</div>";
                header('location:' .SITEURL. 'admin/admin-qll.php');
            }else{
                $_SESSION['add']="<div class='text-danger'>Lỗi khi thêm môn.</div>";
                header('location:' .SITEURL. 'admin/admin-qll.php');
            }
        }
    }
?>