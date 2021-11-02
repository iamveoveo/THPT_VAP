<?php
    include("config/constants.php");
    $MyID = $_SESSION['MyID'];
    if(isset($_POST['class-select-change'])){
        $classSelect = $_POST['class-select'];
        $sql12 = "select * from teach where ClassID = '$classSelect' and Teacher_UserID = '$MyID'";
        $res12 = mysqli_query($conn, $sql12);
        
        if(mysqli_num_rows($res12)>0){
            ?>
            <label for="select-class" class="form-label">Chọn môn</label>
            <select name="subject-select" id="subject-select1" class="form-select">
                <?php
                while($row14 = mysqli_fetch_assoc($res12)){
                    ?>
                    <option value="<?php echo $row14['TeachSubject'];?>"><?php echo $row14['TeachSubject'];?></option>
                    <?php
                }
                ?>
            </select>
            <?php
        }
    }

    if(isset($_POST['RName-change'])){
        $classSelect = $_POST['class-select'];
        $RName = $_POST['RName-tran'];

        $sql13 = "select * from users, class where UserRName like '%".$RName."%' and UserClass in (select ClassID from teach where Teacher_UserID = $MyID) and UserClass = '$classSelect' and users.UserClass = class.ClassID";
        $res13 = mysqli_query($conn, $sql13);

        if(mysqli_num_rows($res13)>0){
            while($row13 = mysqli_fetch_assoc($res13)){
                ?>
                    <div class="list-group-item student-select" id="<?php echo $row13['UserID'];?>" style="cursor: pointer;">
                        <b><?php echo $row13['UserRName'];?></b> <?php echo $row13['UserBirth'];?> <?php echo $row13['ClassName'];?>
                    </div>
                <?php
            }
        }
    }
    
    if(isset($_POST['transcript-select'])){
        $subjectSelect1= $_POST['subject-select'];
        $classSelect = $_POST['class-select'];

        $sql14 = "select * from transcript, users where UserClass = '$classSelect' and Subject='$subjectSelect1' and UserClass in (select ClassID from teach where Teacher_UserID='$MyID') and transcript.Student_UserID = users.UserID";
        $res14 = mysqli_query($conn, $sql14);
        $i = 0;

        if(mysqli_num_rows($res14)>0){
            while($row14 = mysqli_fetch_assoc($res14)){
                $i++;
                ?>
                    <tr>
                        <th scope="row"><?php echo $i;?></th>
                        <td><?php echo $row14['UserRName'];?></td>
                        <td><?php echo $row14['Subject'];?></td>
                        <td><?php echo $row14['MidTerm'];?></td>
                        <td><?php echo $row14['FinalExam'];?></td>
                    </tr>
                <?php
            }
        }
    }

    if(isset($_POST['student_select'])){
        $studentSelect = $_POST['student_select'];
        $_SESSION['student_select'] = $studentSelect;
        $subjectSelect = $_POST['subject_select'];

        $sql16 = "select * from transcript where Student_UserID = '$studentSelect' and Subject = '$subjectSelect'";
        $res16 = mysqli_query($conn, $sql16);

        if(mysqli_num_rows($res16)>0){
            $row16 = mysqli_fetch_assoc($res16);
            ?>
                <div class="col-md-12 mt-2 ">
                    <label class="labels">Điểm giữa kì</label>
                    <input name="MidTerm" type="text" class="form-control" placeholder="Điểm giữa kì" value="<?php echo $row16['MidTerm'];?>">
                </div>
                <div class="col-md-12 mt-2 ">
                    <label class="labels">Điểm cuối kì</label>
                    <input name="FinalExam" type="text" class="form-control" placeholder="Điểm cuối kì" value="<?php echo $row16['FinalExam'];?>">
                </div>
            <?php
        }
    }

    if(isset($_GET['delete'])){
        $Student_UserID = $_GET['UserID'];
        $Subject = $_GET['Subject'];

        $sql17 = "delete from transcript where Student_UserID = '$Student_UserID' and Subject = '$Subject'";
        $res17 = mysqli_query($conn, $sql17) or die(mysqli_error($conn));

        if($res17){
            $_SESSION['delete'] = "<div><span class='text-success fs-3'>Xóa điểm thành công</span></div>";
            header('location:'.SITEURL.'transcript.php');
        }else{
            $_SESSION['delete'] = "<div><span class='text-danger fs-3'>Lỗi khi xóa điểm</span></div>";
            header('location:'.SITEURL.'transcript.php');
        }
    }

    if(isset($_GET["export"])){
        $subjectSelect1= $_GET['subject'];
        $classSelect = $_GET['class'];
        $a = mysqli_query($conn, "select * from Class where ClassID=$classSelect");
        $a = mysqli_fetch_assoc($a);
        $filename = $subjectSelect1.$a['ClassName'];
        header('Content-Encoding: UTF-8');
        header('Content-Type: text/csv; charset=utf-8');  
        header('Content-Disposition: attachment; filename='.$filename.'.csv');  
        $output = fopen("php://output", "w");  
        fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
        fputcsv($output, array("STT", "Tên", "Môn", "Giữa kì", "Cuối kì")); 

        $sql14 = "select * from transcript, users where UserClass = '$classSelect' and Subject='$subjectSelect1' and UserClass in (select ClassID from teach where Teacher_UserID='$MyID') and transcript.Student_UserID = users.UserID";
        $res14 = mysqli_query($conn, $sql14);
        $i = 0;

        if (mysqli_num_rows($res14) > 0)
        {
            while($row14 = mysqli_fetch_assoc($res14)){ 
                $i++;
                $new_row = array($i, $row14['UserRName'], $row14['Subject'], $row14['MidTerm'], $row14['FinalExam']);
                fputcsv($output, $new_row); 
            }
        }  
        fclose($output);  
    }  

    if(isset($_POST["display_import"])){
        $filename=$_FILES["file_import"]["tmp_name"];    
         if($_FILES["file_import"]["size"] > 0)
          {
            $file = fopen($filename, "r");?>
            <table class="table align-middle table-bordered table-secondary table-hover table-responsive">
                <thead class="table-light">
            <?php
                while (($getData = fgetcsv($file, 10000, ",")) !== FALSE){
                    $STT = $getData[0];
                    $RName = $getData[1];
                    $Subject = $getData[2];
                    $MidTerm = $getData[3];
                    $FinalExam = $getData[4];

                    if($STT=="STT"){
                    ?>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Họ và tên</th>
                                <th scope="col">Môn</th>
                                <th scope="col">Điểm giữa kì</th>
                                <th scope="col">Điểm cuối kì</th>
                            </tr>
                        </thead>
                        <tbody >
                    <?php
                    }else{
                    ?>
                        <tr>
                            <th scope="row"><?php echo $STT;?></th>
                            <td><?php echo $RName;?></td>
                            <td><?php echo $Subject;?></td>
                            <td><?php echo $MidTerm;?></td>
                            <td><?php echo $FinalExam;?></td>
                        </tr>
                    <?php
                    }
                }?>
                </tbody>
            </table><?php
            fclose($file);  
         }
      }   

    if(isset($_POST["import"])){
        $subjectSelect1= $_POST['subject'];
        $classSelect = $_POST['class'];
        
        $filename=$_FILES["file_import"]["tmp_name"];    
        if($_FILES["file_import"]["size"] > 0)
        {
            $file = fopen($filename, "r");
            while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
            {
                $sql14 = "select * from transcript, users where UserRName = '".$getData[1]."' and UserClass = '$classSelect' and Subject='$subjectSelect1' and UserClass in (select ClassID from teach where Teacher_UserID='$MyID') and transcript.Student_UserID = users.UserID";
                $res14 = mysqli_query($conn, $sql14);
                
                if(mysqli_num_rows($res14)==1){
                    $row14 = mysqli_fetch_assoc($res14);
                    
                    $sql18 = "update transcript set
                            MidTerm = '".$getData[3]."',
                            FinalExam = '".$getData[4]."'
                            where Student_UserID = '".$row14['UserID']."'and Subject = '$subjectSelect1'";
                    $res18 = mysqli_query($conn, $sql18) or die(mysqli_error($conn));
                    
                    if(!$res18){
                        continue;
                    }
                }else{
                    continue;
                }
            }
            fclose($file);  
            $sql14 = "select * from transcript, users where UserClass = '$classSelect' and Subject='$subjectSelect1' and UserClass in (select ClassID from teach where Teacher_UserID='$MyID') and transcript.Student_UserID = users.UserID";
            $res14 = mysqli_query($conn, $sql14);
            $i = 0;

            if(mysqli_num_rows($res14)>0){
                while($row14 = mysqli_fetch_assoc($res14)){
                    $i++;
            ?>
                <tr>
                    <th scope="row"><?php echo $i;?></th>
                    <td><?php echo $row14['UserRName'];?></td>
                    <td><?php echo $row14['Subject'];?></td>
                    <td><?php echo $row14['MidTerm'];?></td>
                    <td><?php echo $row14['FinalExam'];?></td>
                </tr>
            <?php 
                }
            }
        }
    }  
?>