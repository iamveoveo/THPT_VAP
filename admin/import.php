<?php include("../config/constants.php");

/* <!-- học sinh  --> */
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
                $sql2 = "SELECT * from users where UserName='".$getData[2]."'";//ktra email đã tồn tại trên DB hay chưa
                $res2 = mysqli_query($conn, $sql2);
                if(mysqli_num_rows($res2)==0){
                    
                    $UserPassword = password_hash($getData[1], PASSWORD_DEFAULT);
                    $UserCode = rand(10000000, 99999999);

                    $sql_1="INSERT INTO users SET
                    UserName = '".$getData[1]."',
                    UserRName ='".$getData[2]."',
                    UserPassword = '".$UserPassword."',
                    UserEmail = '".$getData[3]."',
                    UserTel = '".$getData[4]."',
                    UserGender = '".$getData[5]."',
                    UserBirth ='".$getData[6]."',
                    UserAdd = '".$getData[7]."',
                    UserCode = '".$UserCode."',
                    UserClass = '".$row['ClassID']."',
                    UserRoll ='Học sinh'
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

/* <!-- giáo viên --> */
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

                    $UserPassword = password_hash($getData[1], PASSWORD_DEFAULT);
                    $UserCode = rand(10000000, 99999999);
                    
                    $sql_gv1="INSERT INTO users SET
                    UserName = '".$getData[1]."',
                    UserRName ='".$getData[2]."',
                    UserPassword = '".$UserPassword."',
                    UserEmail = '".$getData[3]."',
                    UserTel = '".$getData[4]."',
                    UserGender = '".$getData[5]."',
                    UserBirth ='".$getData[6]."',
                    UserAdd = '".$getData[7]."',
                    UserCode = '".$UserCode."',
                    UserRoll ='Giáo viên'
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

/* <!-- Phụ huynh --> */
    if(isset($_POST["import_ph"])){       
        $filename=$_FILES["file_import_ph"]["tmp_name"];    
        if($_FILES["file_import_ph"]["size"] > 0)
        {      
            $file = fopen($filename, "r");
            while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
            {              
                $sql_ph1 = "select * from users, class where UserRName = '".$getData[8]."' and UserRoll = 'Học sinh' and ClassName = '".$getData[9]."' and users.UserClass = class.ClassID";
                $res_ph1 = mysqli_query($conn, $sql_ph1);

                if(mysqli_num_rows($res_ph1)==1){
                    $row_ph1 = mysqli_fetch_assoc($res_ph1);
                }else{
                    continue;
                }

                $sql_ph = "SELECT * from users where UserName='".$getData[1]."' or UserChild='".$row_ph1['UserID']."'";
                $res_ph= mysqli_query($conn, $sql_ph);
                if(mysqli_num_rows($res_ph)==0){
                    $UserPassword = password_hash($getData[1], PASSWORD_DEFAULT);
                    $UserCode = rand(10000000, 99999999);
                    
                    $sql_ph1="INSERT INTO users SET
                    UserName = '".$getData[1]."',
                    UserRName ='".$getData[2]."',
                    UserPassword ='".$UserPassword."',
                    UserEmail = '".$getData[3]."',
                    UserTel = '".$getData[4]."',
                    UserGender = '".$getData[5]."',
                    UserBirth ='".$getData[6]."',
                    UserAdd = '".$getData[7]."',
                    UserCode = '".$UserCode."',
                    UserRoll ='Phụ huynh'
                    ";

                    $res_ph1 = mysqli_query($conn, $sql_ph1);
                    if(!$res_ph1){
                        continue;
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

/* <!-- điểm --> */
    if(isset($_POST["import_diem"])){
        $class_select = $_POST['class_select'];
        $subject_select = $_POST['subject_select'];
        
        $filename=$_FILES["file_import_diem"]["tmp_name"];    
        if($_FILES["file_import_diem"]["size"] > 0)
        {      
            $file = fopen($filename, "r");
            while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
            {
                $sql_diem1 = "SELECT * from users where UserRName='".$getData[1]."' and UserClass = $class_select";
                $res_diem1 = mysqli_query($conn, $sql_diem1);
                if(mysqli_num_rows($res_diem1)==1){
                    $row_diem1 = mysqli_fetch_assoc($res_diem1);
                    
                    $sql_diem3 = "select * from transcript where Student_UserID = '".$row_diem1['UserID']."' and Subject = '".$subject_select."'";
                    $res_diem3 = mysqli_query($conn, $sql_diem3);
                    
                    if(mysqli_num_rows($res_diem3)==1){
                        $sql_diem4 = "update transcript set MidTerm = '".$getData[2]."', FinalExam = '".$getData[3]."' where Student_UserID = '".$row_diem1['UserID']."' and Subject = '".$subject_select."'" ;
                        $res_diem4 = mysqli_query($conn, $sql_diem4);

                        if(!$res_diem4){
                            continue;
                        }
                    }else{
                        $sql_diem2="INSERT INTO transcript SET
                                    Student_UserID = '".$row_diem1['UserID']."',
                                    Subject = '".$subject_select."',
                                    MidTerm = '".$getData[2]."',
                                    FinalExam = '".$getData[3]."'
                                    ";
                        $res_diem2 = mysqli_query($conn, $sql_diem2);

                        if(!$res_diem2){
                            continue;
                        }
                    }
                }else{
                    continue;
                }
            }
            ?>
                <table class="table table-hover table-secondary ">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">Lớp</th>
                        <th scope="col">Môn học</th>
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

    /* <!-- môn --> */
    if(isset($_POST["import_mon"])){       
        $filename=$_FILES["file_import_mon"]["tmp_name"];    
        if($_FILES["file_import_mon"]["size"] > 0)
        {
            $file = fopen($filename, "r");
            while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
            {
                $sql_mon1 = "select * from users where UserRName = '".$getData[1]."' and UserRoll = 'Giáo viên'";
                $res_mon1 = mysqli_query($conn, $sql_mon1);

                if(mysqli_num_rows($res_mon1)==1){
                    $row_mon1 = mysqli_fetch_assoc($res_mon1);
                }else{
                    continue;
                }

                $sql_mon2 = "select * from class where ClassName = '".$getData[2]."'";
                $res_mon2 = mysqli_query($conn, $sql_mon2);

                if(mysqli_num_rows($res_mon2)==1){
                    $row_mon2 = mysqli_fetch_assoc($res_mon2);
                }else{
                    continue;
                }

                $sql_mon = "select * from teach where ClassID='".$row_mon2['ClassID']."' and Teacher_UserID = '".$row_mon1['UserID']."' and TeachSubject = '".$getData[3]."'";
                $res_mon = mysqli_query($conn, $sql_mon);
                if(mysqli_num_rows($res_mon)>0){
                    continue;
                }else{
                    $sql_mon3 = "insert into teach set
                                Teacher_UserID = '".$row_mon1['UserID']."',
                                ClassID = '".$row_mon2['ClassID']."',
                                TeachSubject = '".$getData[3]."'
                                ";  
                    $res_mon3 = mysqli_query($conn, $sql_mon3);

                    if(!$res_mon3){
                        continue;
                    }
                }
                
            }
            ?>
                <table class="table table-hover table-secondary ">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Khối</th>
                            <th scope="col">Tên lớp</th>
                            <th scope="col">Tên giáo viên</th>
                            <th scope="col">Môn học</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody id="d-table">
                        <?php

                        $sql="SELECT * FROM users, class, teach  WHERE teach.Teacher_UserID=users.UserID AND class.ClassID=teach.ClassID ";
                            
                            $result = mysqli_query($conn,$sql);

                            if(mysqli_num_rows($result)>0){
                            $i=1;                                            
                            while($row = mysqli_fetch_assoc($result)){
                        ?>

                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $row['ClassGrade']; ?></td>
                            <td><?php echo $row['ClassName']; ?></td>
                            <td><?php echo $row['UserRName']; ?></td>
                            <td><?php echo $row['TeachSubject']; ?></td>
                            <td><button type="button" class="btn icon-admin" data-bs-toggle="modal" data-bs-target="#add" ><i class="fas fa-edit " ></i></button></td>
                            <td><button type="button" class="btn btn-danger" ><i class="fas fa-trash-alt "></i></button></td>

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