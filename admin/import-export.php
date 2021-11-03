<?php
    include('../config/constants.php');
?>
<?php
if(isset($_POST["export_hs"])){
    header('Content-Encoding: UTF-8');
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=export_student.csv');  
    $output = fopen("php://output", "w");  
    fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
    fputcsv($output, array("STT", "TenTaiKhoan", "HoTen", "Email", "soDiDong","GioiTinh","NgaySinh","Diachi", "Lop")); 

    $sql="SELECT * FROM users ,class WHERE  UserRoll='Học sinh' AND users.UserClass=class.ClassID";
    $result = mysqli_query($conn,$sql);

    $i = 0;
    if (mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result)){ 
            $i++;
            $new_row = array($i, $row['UserName'], $row['UserRName'], $row['UserEmail'], $row['UserTel'],
                            $row['UserGender'], $row['UserBirth'], $row['UserAdd'], $row['ClassName']);
            fputcsv($output, $new_row); 
        }
    }  
    fclose($output);  
}  
?>
<?php
if(isset($_POST["export_gv"])){
    header('Content-Encoding: UTF-8');
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=export_teacher.csv');  
    $output = fopen("php://output", "w");  
    fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
    fputcsv($output, array("STT", "TenTaiKhoan", "HoTen", "Email", "soDiDong","GioiTinh","NgaySinh","Diachi")); 

    $sql_1="SELECT * FROM users WHERE  UserRoll='Giáo viên'";
    $result_1 = mysqli_query($conn,$sql_1);

    $i = 0;
    if (mysqli_num_rows($result_1) > 0)
    {
        while($row_1= mysqli_fetch_assoc($result_1)){ 
            $i++;
            $new_row1 = array($i, $row_1['UserName'], $row_1['UserRName'], $row_1['UserEmail'], $row_1['UserTel'],
                            $row_1['UserGender'], $row_1['UserBirth'], $row_1['UserAdd']);
            fputcsv($output, $new_row1); 
        }
    }  
    fclose($output);  
}  
?>
<?php
if(isset($_POST["export_ph"])){
    header('Content-Encoding: UTF-8');
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=export_parent.csv');  
    $output = fopen("php://output", "w");  
    fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
    fputcsv($output, array("STT", "TenTaiKhoan", "HoTen", "Email", "soDiDong","GioiTinh","NgaySinh","Diachi", "Con", "Lop")); 

    $sql_2="SELECT users.UserName, users.UserRName, users.UserEmail, users.UserTel, users.UserAdd, users.UserGender, users.UserBirth, users1.UserRName as Child, class.ClassName 
            FROM users, users as users1, class WHERE  users.UserRoll='Phụ huynh' and users.UserChild = users1.UserID and users1.UserClass = class.ClassID";
    $result_2 = mysqli_query($conn,$sql_2);

    $i = 0;
    if (mysqli_num_rows($result_2) > 0)
    {
        while($row_2 = mysqli_fetch_assoc($result_2)){ 
            $i++;
            $new_row_2 = array($i, $row_2['UserName'], $row_2['UserRName'], $row_2['UserEmail'], $row_2['UserTel'],
                            $row_2['UserGender'], $row_2['UserBirth'], $row_2['UserAdd'], $row_2['Child'], $row_2['ClassName']);
            fputcsv($output, $new_row_2); 
        }
    }  
    fclose($output);  
}  
?>
<?php
if(isset($_GET["export_diem"])){
    $class_select = $_GET['class_select'];
    $subject_select = $_GET['subject_select'];
    header('Content-Encoding: UTF-8');
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=export_transcript.csv');  
    $output = fopen("php://output", "w");  
    fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
    fputcsv($output, array("STT", "HoTen", "DiemGiuaKi","DiemCuoiKi")); 

    $sql_3="SELECT * FROM transcript, class, users WHERE transcript.Subject like '%".$subject_select."%' AND class.ClassID = '$class_select' AND class.ClassID = users.UserClass AND transcript.Student_UserID = users.UserID";
    $result_3 = mysqli_query($conn,$sql_3);

    $i = 0;
    if (mysqli_num_rows($result_3) > 0)
    {
        while($row_3 = mysqli_fetch_assoc($result_3)){ 
            $i++;
            $new_row_3 = array($i, $row_3['UserRName'], 
                        $row_3['MidTerm'], $row_3['FinalExam']);
            fputcsv($output, $new_row_3); 
        }
    }  
    fclose($output);  
}  
?>
<?php
if(isset($_POST["export_mon"])){
    header('Content-Encoding: UTF-8');
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=export_teach.csv');  
    $output = fopen("php://output", "w");  
    fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
    fputcsv($output, array("STT", "HoTenGV", "Lop", "Mon")); 

    $sql_2="select * from teach, class, users where teach.Teacher_UserID = users.UserID and class.ClassID = teach.ClassID";
    $result_2 = mysqli_query($conn,$sql_2);

    $i = 0;
    if (mysqli_num_rows($result_2) > 0)
    {
        while($row_2 = mysqli_fetch_assoc($result_2)){ 
            $i++;
            $new_row_2 = array($i, $row_2['UserRName'], $row_2['ClassName'], $row_2['TeachSubject']);
            fputcsv($output, $new_row_2); 
        }
    }  
    fclose($output);  
}  
?>
<?php
if(isset($_POST["export_admin"])){
    header('Content-Encoding: UTF-8');
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=export_admin.csv');  
    $output = fopen("php://output", "w");  
    fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
    fputcsv($output, array("STT", "TenTaiKhoan", "HoTen", "Email", "soDiDong","GioiTinh","NgaySinh","Diachi")); 

    $sql="SELECT * FROM admin";
    $result = mysqli_query($conn,$sql);

    $i = 0;
    if (mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result)){ 
            $i++;
            $new_row = array($i, $row['AdName'], $row['AdRName'], $row['AdEmail'], $row['AdTel'],
                            $row['AdGender'], $row['AdBirth'], $row['AdAdd']);
            fputcsv($output, $new_row); 
        }
    }  
    fclose($output);  
}  
?>
