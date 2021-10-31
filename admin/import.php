<?php include("../config/constants.php");?>

<!-- học sinh  -->
<?php
    if(isset($_POST["import_hs"])){       
        $filename=$_FILES["file_import"]["tmp_name"];    
        if($_FILES["file_import"]["size"] > 0)
        {      
            $file = fopen($filename, "r");
            while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
            {
                $sql = "SELECT * from class where ClassName='$getData[8]' ";
                $res1 = mysqli_query($conn, $sql);
                $row = [];
                if(mysqli_num_rows($res1)>0){
                    $row = mysqli_fetch_assoc($res1);
                }
                $sql2 = "SELECT * from users where UserName='$getData[2]'";//ktra email đã tồn tại trên DB hay chưa
                $res2 = mysqli_query($conn, $sql2);
                if(mysqli_num_rows($res2)==0){
                    
                    $sql_1="INSERT INTO users SET
                    UserRName = '".$getData[1]."',
                    UserName ='".$getData[2]."',
                    UserEmail = '".$getData[3]."',
                    UserTel = '".$getData[4]."',
                    UserGender = '".$getData[5]."',
                    UserBirth ='".$getData[6]."',
                    UserAdd = '".$getData[7]."',
                    UserClass = '".$row['ClassID']."',
                    UserRoll ='".$getData[9]."'
                    ";

                    $res3 = mysqli_query($conn, $sql_1);
                    if(!isset($res3))
                    {
                        echo "<script type=\"text/javascript\">
                        alert(\"Invalid File:Please Upload CSV File.\");
                        window.location = \"index.php\"
                        </script>"; 
                    }
                    else {
                        echo "đúng";
                    
                    }
                }
            }
            ?>
                <table class="table table-hover table-secondary ">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Tên tài khoản</th>
                            <th scope="col">Email</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Lớp </th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                            <th scope="col">Xem chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql1="SELECT UserID, UserName, UserRName, UserEmail, UserTel, UserAdd, UserGender, UserBirth, UserRoll, UserClass, ClassName, ClassID
                            FROM users ,class WHERE  UserRoll='Học sinh' AND UserClass=ClassID";
                            
                        $res4 = mysqli_query($conn,$sql1);

                        if(mysqli_num_rows($res4)>0){
                        $i=1;                                            
                        while($row = mysqli_fetch_assoc($res4)){
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $row['UserRName']; ?></td>
                            <td><?php echo $row['UserName']; ?></td>
                            <td><?php echo $row['UserEmail']; ?></td>
                            <td><?php echo $row['UserTel']; ?></td>
                            <td><?php echo $row['ClassName']; ?></td>
                            <td><button type="button" class="btn icon-admin" data-bs-toggle="modal" data-bs-target="#add" ><i class="fas fa-edit " ></i></button></td>
                            <td><button type="button" class="btn btn-danger" ><i class="fas fa-trash-alt "></i></button></td>
                            <td><button type="button" class=" btn" data-bs-toggle="modal" data-bs-target="#detail"> <i class="fas fa-info-circle" style="font-size:25px"></i></button></td>
                        </tr>
                        <?php
                            $i++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            <?php
        
            fclose($file);  
        }
    }   
?>

<!-- giáo viên -->
<?php
    if(isset($_POST["import_gv"])){       
        $filename=$_FILES["file_import_gv"]["tmp_name"];    
        if($_FILES["file_import_gv"]["size"] > 0)
        {      
            $file = fopen($filename, "r");
            while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
            {
               
                $sql_gv = "SELECT * from users where UserName='$getData[2]'";//ktra email đã tồn tại trên DB hay chưa
                $res_gv= mysqli_query($conn, $sql_gv);
                if(mysqli_num_rows($res_gv)==0){
                    
                    $sql_gv1="INSERT INTO users SET
                    UserRName = '".$getData[1]."',
                    UserName ='".$getData[2]."',
                    UserEmail = '".$getData[3]."',
                    UserTel = '".$getData[4]."',
                    UserGender = '".$getData[5]."',
                    UserBirth ='".$getData[6]."',
                    UserAdd = '".$getData[7]."',
                    UserRoll ='".$getData[8]."'
                    ";

                    $res_gv1 = mysqli_query($conn, $sql_gv1);
                    if(!isset($res_gv1))
                    {
                        echo "<script type=\"text/javascript\">
                        alert(\"Invalid File:Please Upload CSV File.\");
                        window.location = \"index.php\"
                        </script>"; 
                    }
                    else {
                    
                    }
                }
            }
            ?>
                <table class="table table-hover table-secondary ">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Tên tài khoản</th>
                            <th scope="col">Email</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                            <th scope="col">Xem chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql="SELECT UserID, UserName, UserRName, UserEmail, UserTel, UserAdd, UserGender,UserStatus, UserBirth, UserRoll, UserClass
                        FROM users  WHERE  UserRoll='Giáo viên' ";
                            
                            $result = mysqli_query($conn,$sql);

                            if(mysqli_num_rows($result)>0){
                            $i=1;                                            
                            while($row = mysqli_fetch_assoc($result)){
                        ?>

                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $row['UserName']; ?></td>
                            <td><?php echo $row['UserRName']; ?></td>
                            <td><?php echo $row['UserEmail']; ?></td>
                            <td><?php echo $row['UserTel']; ?></td>
                            <td><?php echo $row['UserStatus']; ?></td>
                            <td><button type="button" class="btn icon-admin" data-bs-toggle="modal" data-bs-target="#add" ><i class="fas fa-edit " ></i></button></td>
                            <td><button type="button" class="btn btn-danger" ><i class="fas fa-trash-alt "></i></button></td>
                            <td><button type="button" class=" btn" data-bs-toggle="modal" data-bs-target="#detail"> <i class="fas fa-info-circle" style="font-size:25px"></i></button></td>

                        </tr>
                        <?php
                                $i++;
                                }
                            }
                        ?>
                    </tbody>

                    </tbody>
                </table>
            <?php
        
            fclose($file);  
        }
    }   
?>

<!-- Phụ huynh -->
<?php
    if(isset($_POST["import_ph"])){       
        $filename=$_FILES["file_import_ph"]["tmp_name"];    
        if($_FILES["file_import_ph"]["size"] > 0)
        {      
            $file = fopen($filename, "r");
            while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
            {              
                $sql_ph = "SELECT * from users where UserName='$getData[2]'";//ktra email đã tồn tại trên DB hay chưa
                $res_ph= mysqli_query($conn, $sql_ph);
                if(mysqli_num_rows($res_ph)==0){
                    
                    $sql_ph1="INSERT INTO users SET
                    UserRName = '".$getData[1]."',
                    UserName ='".$getData[2]."',
                    UserEmail = '".$getData[3]."',
                    UserTel = '".$getData[4]."',
                    UserGender = '".$getData[5]."',
                    UserBirth ='".$getData[6]."',
                    UserAdd = '".$getData[7]."',
                    UserRoll ='".$getData[8]."'
                    ";

                    $res_ph1 = mysqli_query($conn, $sql_ph1);
                    if(!isset($res_ph1))
                    {
                        echo "<script type=\"text/javascript\">
                        alert(\"Invalid File:Please Upload CSV File.\");
                        window.location = \"index.php\"
                        </script>"; 
                    }
                    else {
                    
                    }
                }
            }
            ?>
                <table class="table table-hover table-secondary ">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">Tên tài khoản</th>
                        <th scope="col">Email</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Học sinh </th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>
                        <th scope="col">Xem chi tiết</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                        $sql="SELECT UserId, UserName,UserRName, UserEmail, UserTel, UserAdd, UserGender, UserBirth, UserRoll,UserClass  FROM users  
                            WHERE UserRoll='Phụ huynh'";
                        $result = mysqli_query($conn,$sql);

                        if(mysqli_num_rows($result)>0){
                        $i=1;                                            
                        while($row = mysqli_fetch_assoc($result)){
                        ?>     
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $row['UserRName']; ?></td>
                            <td><?php echo $row['UserName']; ?></td>
                            <td><?php echo $row['UserEmail']; ?></td>
                            <td><?php echo $row['UserTel']; ?></td>
                            <td><?php echo $row['UserClass']; ?></td>
                            <td><button type="button" class="btn icon-admin" data-bs-toggle="modal" data-bs-target="#add" ><i class="fas fa-edit " ></i></button></td>
                            <td><button type="button" class="btn btn-danger" ><i class="fas fa-trash-alt "></i></button></td>
                            <td><button type="button" class=" btn" data-bs-toggle="modal" data-bs-target="#detail"> <i class="fas fa-info-circle" style="font-size:25px"></i></button></td>

                        </tr>
                        <?php
                            $i++;
                            }
                        }
                        ?>

                    </tbody>
                </table>
            <?php
        
            fclose($file);  
        }
    }   
?>

<!-- điểm -->
<?php
    if(isset($_POST["import_diem"])){       
        $filename=$_FILES["file_import_diem"]["tmp_name"];    
        if($_FILES["file_import_diem"]["size"] > 0)
        {      
            $file = fopen($filename, "r");
            while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
            {
                $sql_diem = "SELECT * from users,class where UserName='$getData[1]' AND UserRoll='Học sinh' ";
                $res_diem = mysqli_query($conn, $sql_diem);
                $row_diem = [];
                if(mysqli_num_rows($res_diem)>0){
                    $row_diem = mysqli_fetch_assoc($res_diem);
                }
                $sql_diem1 = "SELECT * from users where UserName='$getData[1]'";//ktra email đã tồn tại trên DB hay chưa
                $res_diem1 = mysqli_query($conn, $sql_diem1);
                if(mysqli_num_rows($res_diem1)==0){
                    
                    $sql_diem2="INSERT INTO transcript SET
                    UserName = '".$getData[1]."',
                    Subject = '".$getData[2]."',
                    MidTerm = '".$getData[3]."',
                    FinalExam = '".$getData[4]."',
                   
                    ";

                    $res_diem3 = mysqli_query($conn, $sql_diem2);
                    if(!isset($res_diem3))
                    {
                        echo "<script type=\"text/javascript\">
                        alert(\"Invalid File:Please Upload CSV File.\");
                        window.location = \"index.php\"
                        </script>"; 
                    }
                    else {                    
                    }
                }
            }
            ?>
                <table class="table table-hover table-secondary ">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">Lớp</th>
                        <th scope="col"> Môn học</th>
                        <th scope="col">Điểm giữa kì</th>
                        <th scope="col">Điểm cuối kì</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql="SELECT Student_UserID, Subject, MidTerm, FinalExam, UserID, UserRName, UserClass, ClassID, ClassName
                            FROM users, transcript ,class WHERE Student_UserID=UserID  AND UserClass=ClassID";
                            
                        $result = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)>0){
                        $i=1;                                            
                        while($row = mysqli_fetch_assoc($result)){
                        ?>

                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $row['UserRName']; ?></td>
                            <td><?php echo $row['ClassName']; ?></td>
                            <td><?php echo $row['Subject']; ?></td>
                            <td><?php echo $row['MidTerm']; ?></td>
                            <td><?php echo $row['FinalExam']; ?></td>
                            <td><button type="button" class="btn icon-admin" data-bs-toggle="modal" data-bs-target="#add" ><i class="fas fa-edit " ></i></button></td>
                            <td><button type="button" class="btn btn-danger" ><i class="fas fa-trash-alt "></i></button></td>

                        </tr>
                        <?php
                            $i++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            <?php
        
            fclose($file);  
        }
    }   
?>