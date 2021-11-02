<?php
    include("config/constants.php");

    if(isset($_POST['save_ava'])){
        $UserID = $_POST['UserID'];
        if(is_uploaded_file($_FILES["file_image"]["tmp_name"])){
            $target_dir = "images/avatar/";
            $target_file = $target_dir . basename($_FILES["file_image"]["name"]);
            $image_name = basename($_FILES["file_image"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $newFileName = $_POST['newFileName'];
            $fullNewFileName = $target_dir . $newFileName;

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["file_image"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                echo "error|Tệp không phải là một ảnh";
                $uploadOk = 0;
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "error|Xin lỗi, tệp của bạn đã tồn tại";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["file_image"]["size"] > 5000000) {
                echo "error|Xin lỗi, tệp của bạn quá lớn";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                echo "error|Xin lỗi, chỉ tệp JPG, JPEG, PNG & GIF mới được cho phép";
                $uploadOk = 0;
            }
                // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "error|Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["file_image"]["tmp_name"], $fullNewFileName)) {
                    $sql20 = "update users set 
                            UserAva='$newFileName'
                            where UserID = '$UserID' ";
                    $res20 = mysqli_query($conn, $sql20);
                    if($res20 != TRUE){
                        echo "error|Đã xảy ra lỗi khi cập nhật ảnh";
                    }else{
                        echo "success|$newFileName|<span style='color: #22bb33 !important;'>Thay đổi ảnh thành công</span>";
                    }
                } else {
                    echo "error|Đã xảy ra lỗi khi cập nhật ảnh";
                }
            }
            
        }
    }

    if(isset($_POST['save'])){
        $UserID = $_POST['UserID'];
        $UserRName = $_POST['RName'];
        $UserClass = $_POST['Class'];
        $UserTel = $_POST['Tel'];
        $UserEmail = $_POST['Email'];
        $UserAdd = $_POST['Add'];
        $UserGender = $_POST['Gender'];
        $UserBirth = $_POST['Birth'];

        $sql5 = "update users set
                UserRName = '$UserRName',
                UserClass = '$UserClass',
                UserTel = '$UserTel',
                UserEmail = '$UserEmail',
                UserAdd = '$UserAdd',
                UserGender = '$UserGender',
                UserBirth = '$UserBirth'
                where UserID=$UserID;";
        $res5 = mysqli_query($conn, $sql5);
        if($res5==TRUE){
            ?>
            <div class="row mt-3">
                <div class="col-md-12 mt-2 ">
                    <label class="labels">Họ và tên</label>
                    <input name="RName" type="text" class="form-control" placeholder="Họ và tên" value="<?php echo $UserRName;?>" disabled="disabled" readonly="readonly">
                </div>                        
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                    <label class="labels">Lớp</label>
                    <select disabled="disabled" readonly="readonly" name="Class" id="class" class='form-control'>
                        <?php
                            $sql4 = "select * from Class";
                            $res4 = mysqli_query($conn, $sql4);
                            if(mysqli_num_rows($res4)>0){
                                while($row4 = mysqli_fetch_assoc($res4)){
                                    ?>
                                        <option value="<?php echo $row4['ClassID'];?>" <?php if($row4['ClassID']==$UserClass){echo 'selected';}?> ><?php echo $row4['ClassName'];?></option>
                                    <?php
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="labels">Số điện thoại</label>
                    <input name="Tel" type="text" class="form-control" placeholder="Số điện thoại" value="<?php echo $UserTel;?>" disabled="disabled" readonly="readonly">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12 mt-2">
                    <label class="labels">Email</label>
                    <input name="Email" type="Email" class="form-control" placeholder="Email" value="<?php echo $UserEmail;?>" disabled="disabled" readonly="readonly">
                </div>
                
                <div class="col-md-12 mt-2">
                    <label class="labels">Địa chỉ</label>
                    <input name="Add" type="text" class="form-control" placeholder="Địa chỉ" value="<?php echo $UserAdd;?>" disabled="disabled" readonly="readonly">
                </div>
            
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <label class="labels">Giới tính</label>
                    <select class="form-control" name="Gender" id="" disabled="disabled" readonly="readonly">
                        <option value=null <?php if($UserGender==null){echo 'selected';} ?>></option>
                        <option value="Nữ" <?php if($UserGender=='Nữ'){echo 'selected';} ?>>Nữ</option>
                        <option value="Nam" <?php if($UserGender=='Nam'){echo 'selected';} ?>>Nam</option>
                        <option value="Khác" <?php if($UserGender=='Khác'){echo 'selected';} ?>>Khác</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="labels">Ngày sinh</label>
                    <input name="Birth" type="date" class="form-control" value="<?php echo $UserBirth;?>" placeholder="state" disabled="disabled" readonly="readonly">
                </div>
            </div>
            <?php
        }
    }

    if(isset($_GET["export"])){
        $UserID = $_GET['UserID'];

        $a = mysqli_query($conn, "select * from users where UserID=$UserID");
        $a = mysqli_fetch_assoc($a);
        $filename = $a['UserRName'];
        header('Content-Encoding: UTF-8');
        header('Content-Type: text/csv; charset=utf-8');  
        header('Content-Disposition: attachment; filename='.$filename.'.csv');  
        $output = fopen("php://output", "w");  
        fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
        fputcsv($output, array("STT","Môn", "Giữa kì", "Cuối kì")); 

        $sql14 = "select * from transcript where Student_UserID = $UserID";
        $res14 = mysqli_query($conn, $sql14);
        $i = 0;

        if (mysqli_num_rows($res14) > 0)
        {
            while($row14 = mysqli_fetch_assoc($res14)){ 
                $i++;
                $new_row = array($i, $row14['Subject'], $row14['MidTerm'], $row14['FinalExam']);
                fputcsv($output, $new_row); 
            }
        }  
        fclose($output);  
    }  

    
?>