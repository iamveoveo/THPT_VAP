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