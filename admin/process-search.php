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
?>