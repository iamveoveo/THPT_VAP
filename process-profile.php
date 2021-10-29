<?php
    include("config/constants.php");
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
?>