<?php include("../config/constants.php");?>
<?php
    if(isset($_POST['hs_search'])){
        $key_search=$_POST['inp_search'];
        $sql= " SELECT * From users, class where UserRoll='Học sinh' AND UserRName like '%".$key_search."%' AND class.ClassID=users.UserClass";
        $query= mysqli_query($conn,$sql);
        if(mysqli_num_rows($query)>0 ){
            while($row=mysqli_fetch_assoc($query)){
                ?>
                <div class="row select_hs">
                    <div class="UserID" style="display:none;"><?php echo $row['UserID']; ?></div>
                    <div class="col-6"><?php echo $row['UserRName']; ?></div>
                    <div class="col-3"><?php echo $row['UserBirth']; ?></div>
                    <div class="col-3"><?php echo $row['ClassName']; ?></div>
                </div>
                <?php
            }
        }
    }

    if(isset($_POST['classselect1'])){
        $class_select = $_POST['classselect1'];

        $sql1 = "SELECT * FROM teach WHERE ClassID=$class_select";
        $res1 = mysqli_query($conn, $sql1);
        ?><option value="" selected>Chọn theo môn</option><?php

        if(mysqli_num_rows($res1)){
            while($row1 = mysqli_fetch_assoc($res1)){
                ?>
                <option value="<?php echo $row1['TeachSubject'];?>"><?php echo $row1['TeachSubject'];?></option>
                <?php
            }
        }
    }

    if(isset($_POST['classselect'])){
        $class_select = $_POST['classselect'];

        $sql1 = "SELECT * FROM transcript, class, users WHERE ClassID = '$class_select' and users.UserClass = class.ClassID and users.UserID = transcript.Student_UserID group by Subject";
        $res1 = mysqli_query($conn, $sql1);
        ?><option value="" selected>Chọn theo môn</option><?php

        if(mysqli_num_rows($res1)){
            while($row1 = mysqli_fetch_assoc($res1)){
                ?>
                <option value="<?php echo $row1['Subject'];?>"><?php echo $row1['Subject'];?></option>
                <?php
            }
        }
    }

    if(isset($_POST['selected'])){
        $class_select = $_POST['class_select'];
        $subject_select = $_POST['subject_select'];

        $sql2 = "SELECT * FROM transcript, class, users WHERE transcript.Subject like '%".$subject_select."%' AND class.ClassID = '$class_select' AND class.ClassID = users.UserClass AND transcript.Student_UserID = users.UserID";
        $res2 = mysqli_query($conn, $sql2);
        $i = 0;

        if(mysqli_num_rows($res2)>0){
            while($row2 = mysqli_fetch_assoc($res2)){
                $i++
                ?>
                <tr>
                    <th scope="row"><?php echo $i; ?></th>
                    <td><?php echo $row2['UserRName']; ?></td>
                    <td><?php echo $row2['ClassName']; ?></td>
                    <td><?php echo $row2['Subject']; ?></td>
                    <td><?php echo $row2['MidTerm']; ?></td>
                    <td><?php echo $row2['FinalExam']; ?></td>
                    <td><button id="<?php echo $row2['UserID'];?>" subject="<?php echo $row2['Subject'];?>" type="button" class="btn icon-admin icon-score" data-bs-toggle="modal" data-bs-target="#editor" ><i class="fas fa-edit " ></i></button></td>
                    <td><a href="<?php echo SITEURL;?>admin/admin_delete.php?Delete_diem=&Student_UserID=<?php echo $row2['Student_UserID'];?>&Subject=<?php echo $row2['Subject'];?>"><button type="button" class="btn btn-danger" ><i class="fas fa-trash-alt "></i></button></a></td>
                </tr>
                <?php
            }
        }
    }

    if(isset($_POST['selected1'])){
        $class_select = $_POST['class_select'];
        $subject_select = $_POST['subject_select'];

        $sql2 = "SELECT * FROM teach, class, users WHERE teach.TeachSubject like '%".$subject_select."%' AND class.ClassID = '$class_select' AND teach.ClassID = class.ClassID AND teach.Teacher_UserID = users.UserID";
        $res2 = mysqli_query($conn, $sql2);
        $i = 0;

        if(mysqli_num_rows($res2)>0){
            while($row2 = mysqli_fetch_assoc($res2)){
                $i++
                ?>
                <tr>
                    <th scope="row"><?php echo $i; ?></th>
                    <td><?php echo $row2['ClassGrade']; ?></td>
                    <td><?php echo $row2['ClassName']; ?></td>
                    <td><?php echo $row2['UserRName']; ?></td>
                    <td><?php echo $row2['TeachSubject']; ?></td>
                    <td><button id="<?php echo $row2['TeachID'];?>" type="button" class="btn icon-admin icon-class" data-bs-toggle="modal" data-bs-target="#editor" ><i class="fas fa-edit " ></i></button></td>
                    <td><a href="<?php echo SITEURL;?>admin/admin_delete.php?Delete_mon=&TeachID=<?php echo $row2['TeachID'];?>"><button type="button" class="btn btn-danger" ><i class="fas fa-trash-alt "></i></button></a></td>
                </tr>
                <?php
            }
        }
    }

    if(isset($_POST['student_select'])){
        $UserRName = $_POST['UserRName'];
        $UserClass = $_POST['UserClass'];

        $sql3 = "select * from users where UserClass = '$UserClass' and UserRName like '%".$UserRName."%' and UserRoll='Học sinh'";
        $res3 = mysqli_query($conn, $sql3);

        if(mysqli_num_rows($res3)>0){
            while($row3 = mysqli_fetch_assoc($res3)){
                ?>
                    <li id="<?php echo $row3['UserID'];?>" style="cursor:pointer;" class="list-group-item student-item"><b><?php echo $row3['UserRName'];?></b> <?php echo $row3['UserBirth'];?></li>
                <?php
            }
        }
    }

    if(isset($_POST['teacher_select'])){
        $UserRName = $_POST['UserRName'];

        $sql3 = "select * from users where UserRName like '%".$UserRName."%' and UserRoll='Giáo viên'";
        $res3 = mysqli_query($conn, $sql3);

        if(mysqli_num_rows($res3)>0){
            while($row3 = mysqli_fetch_assoc($res3)){
                ?>
                    <li id="<?php echo $row3['UserID'];?>" style="cursor:pointer;" class="list-group-item teacher-item"><b><?php echo $row3['UserRName'];?></b> <?php echo $row3['UserBirth'];?></li>
                <?php
            }
        }
    }

    if(isset($_POST['validate_userName'])){
        if(isset($_POST['UserName'])){
            $UserName = $_POST['UserName'];

            $sql4 = "select * from users where UserName='$UserName'";
            $res4 = mysqli_query($conn, $sql4);

            if(mysqli_num_rows($res4)>0){
                echo "<span class='text-danger'>Tên tài khoản đã tồn tại</span>";
            }else{
                echo "<span class='text-success'>Tên tài khoản chưa tồn tại</span>";
            }
        }else{
            $AdName = $_POST['AdName'];

            $sql4 = "select * from admin where AdName='$AdName'";
            $res4 = mysqli_query($conn, $sql4);

            if(mysqli_num_rows($res4)>0){
                echo "<span class='text-danger'>Tên tài khoản đã tồn tại</span>";
            }else{
                echo "<span class='text-success'>Tên tài khoản chưa tồn tại</span>";
            }
        }
    }

    if(isset($_POST['search'])){
        $key = $_POST['key'];
        $region = $_POST['region'];

        if($region == "manager"){
            $sql="SELECT * FROM admin where AdRName like '%".$key."%'";
                                            
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result)>0){
                $i=1;                                            
                while($row = mysqli_fetch_assoc($result)){
                    ?>

                    <tr>
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $row['AdName']; ?></td>
                        <td><?php echo $row['AdRName']; ?></td>
                        <td><?php echo $row['AdEmail']; ?></td>
                        <td><?php echo $row['AdTel']; ?></td>
                        <td><?php echo $row['AdStatus']; ?></td>
                        <td><button id="<?php echo $row['AdID'];?>" type="button" class="btn icon-admin icon-manager" data-bs-toggle="modal" data-bs-target="#editor" ><i class="fas fa-edit " ></i></button></td>
                        <td><a href="<?php echo SITEURL;?>admin/admin_delete.php?Delete_admin=&AdID=<?php echo $row['AdID'];?>"><button type="button" class="btn btn-danger" ><i class="fas fa-trash-alt "></i></button></a></td>
                        <td><button id="<?php echo $row['AdID'];?>" type="button" class="btn icon-manager-detail" data-bs-toggle="modal" data-bs-target="#detail"> <i class="fas fa-info-circle" style="font-size:25px"></i></button></td>

                    </tr>
                    <?php
                    $i++;
                }
            }
        }else if($region == "student"){
            $sql="SELECT * FROM users ,class WHERE UserRName like '%".$key."%' and UserRoll='Học sinh' AND UserClass=ClassID";
                
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
                            <td><?php echo $row['UserStatus']; ?></td>
                            <td><?php echo $row['UserTel']; ?></td>
                            <td><?php echo $row['ClassName']; ?></td>
                            <td><button id="<?php echo $row['UserID'];?>" type="button" class="btn icon-admin" data-bs-toggle="modal" data-bs-target="#editor" ><i class="fas fa-edit " ></i></button></td>
                            <td><a href="<?php echo SITEURL;?>admin/admin_delete.php?Delete_hs=&UserID=<?php echo $row['UserID'];?>"><button type="button" class="btn btn-danger" ><i class="fas fa-trash-alt "></i></button></a></td>
                            <td><button id="<?php echo $row['UserID'];?>" type="button" class="btn icon-detail" data-bs-toggle="modal" data-bs-target="#detail"> <i class="fas fa-info-circle" style="font-size:25px"></i></button></td>

                        </tr>
                    <?php
                    $i++;
                }
            }
        }else if($region == "teacher"){
            $sql="SELECT UserID, UserName, UserRName, UserEmail, UserTel, UserAdd, UserGender,UserStatus, UserBirth, UserRoll, UserClass
                FROM users  WHERE UserRName like '%".$key."%' and UserRoll='Giáo viên' ";
                    
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
                        <td><button id="<?php echo $row['UserID'];?>" type="button" class="btn icon-admin" data-bs-toggle="modal" data-bs-target="#editor" ><i class="fas fa-edit " ></i></button></td>
                        <td><a href="<?php echo SITEURL;?>admin/admin_delete.php?Delete_gv=&UserID=<?php echo $row['UserID'];?>"><button type="button" class="btn btn-danger" ><i class="fas fa-trash-alt "></i></button></a></td>
                        <td><button id="<?php echo $row['UserID'];?>" type="button" class="btn icon-detail" data-bs-toggle="modal" data-bs-target="#detail"> <i class="fas fa-info-circle" style="font-size:25px"></i></button></td>
                    </tr>
                <?php
                $i++;
                }
            }
        }else if($region == "parent"){
            $sql="SELECT * FROM users  
                WHERE UserRName like '%".$key."%' and UserRoll='Phụ huynh'";
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
                            <td><button id="<?php echo $row['UserID'];?>" type="button" class="btn icon-admin" data-bs-toggle="modal" data-bs-target="#editor" ><i class="fas fa-edit " ></i></button></td>
                            <td><a href="<?php echo SITEURL;?>admin/admin_delete.php?Delete_ph=&UserID=<?php echo $row['UserID'];?>"><button type="button" class="btn btn-danger" ><i class="fas fa-trash-alt "></i></button></a></td>
                            <td><button id="<?php echo $row['UserID'];?>" type="button" class="btn icon-detail" data-bs-toggle="modal" data-bs-target="#detail"> <i class="fas fa-info-circle" style="font-size:25px"></i></button></td>

                        </tr>
                    <?php
                    $i++;
                }
            }
        }
    }
?>