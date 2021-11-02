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
                    <td><button type="button" class="btn icon-admin" data-bs-toggle="modal" data-bs-target="#add" ><i class="fas fa-edit " ></i></button></td>
                    <td><button type="button" class="btn btn-danger" ><i class="fas fa-trash-alt "></i></button></td>
                    <td><button type="button" class=" btn" data-bs-toggle="modal" data-bs-target="#detail"> <i class="fas fa-info-circle" style="font-size:25px"></i></button></td>
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
                    <td><button type="button" class="btn icon-admin" data-bs-toggle="modal" data-bs-target="#add" ><i class="fas fa-edit " ></i></button></td>
                    <td><button type="button" class="btn btn-danger" ><i class="fas fa-trash-alt "></i></button></td>
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
        $UserName = $_POST['UserName'];

        $sql4 = "select * from users where UserName='$UserName'";
        $res4 = mysqli_query($conn, $sql4);

        if(mysqli_num_rows($res4)>0){
            echo "<span class='text-danger'>Tên tài khoản đã tồn tại</span>";
        }else{
            echo "<span class='text-success'>Tên tài khoản chưa tồn tại</span>";
        }
    }
?>