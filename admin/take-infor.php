<?php
    include('../config/constants.php');

    if(isset($_POST['take_infor'])){        
        $UserID = $_POST['UserID'];
        $sql = "select * from users where UserID = $UserID";
        $res = mysqli_query($conn, $sql);
        if(mysqli_num_rows($res)==1){
            $row = mysqli_fetch_assoc($res);
            if($row['UserRoll']=="Phụ huynh" or $row['UserRoll']=="Giáo viên"){
                ?>
                <div class=" col-12">
                    <div class="card h-100" style="background:rgb(88 116 149 / 19%)">
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-3 text-primary fs-5 text">Thông tin tài khoản</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="fullName">Họ và tên</label>
                                        <input type="text" class="form-control" name="txtHoTen" value="<?php echo $row['UserRName'];?>">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="phone">Số điện thoại</label>
                                        <input type="tel" class="form-control" value="<?php echo $row['UserTel'];?>" name="sdt" placeholder="09x xxx xxxx">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="phone">Email</label>
                                        <input type="email" class="form-control" value="<?php echo $row['UserEmail'];?>" name="txtEmail" placeholder="acb@gmail.com">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="phone">Địa chỉ</label>
                                        <input type="text" class="form-control" value="<?php echo $row['UserAdd'];?>" name="txtDiachi" placeholder="Xã,phường/huyện/tỉnh">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="website">Ngày sinh</label>
                                        <input type="date" class="form-control" value="<?php echo $row['UserBirth'];?>" name="ngaySinh" >
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                    <label class="labels">Giới tính</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option value=null <?php if($row['UserGender']==""){echo 'selected';};?>>Chọn giới tính</option>
                                        <option value="Nam" <?php if($row['UserGender']=="Nam"){echo 'selected';};?>>Nam</option>
                                        <option value="Nữ" <?php if($row['UserGender']=="Nữ"){echo 'selected';};?>>Nữ</option>
                                        <option value="Khác" <?php if($row['UserGender']=="Khác"){echo 'selected';};?>>Khác</option>
                                    </select>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
                <?php
            }else if($row['UserRoll']=="Học sinh"){
                ?>
                <div class=" col-12">
                    <div class="card h-100" style="background:rgb(88 116 149 / 19%)">
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-3 text-primary fs-5 text">Thông tin tài khoản</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="fullName">Họ và tên</label>
                                        <input type="text" class="form-control" name="txtHoTen" value="<?php echo $row['UserRName'];?>">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="phone">Số điện thoại</label>
                                        <input type="tel" class="form-control" value="<?php echo $row['UserTel'];?>" name="sdt" placeholder="09x xxx xxxx">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="phone">Email</label>
                                        <input type="email" class="form-control" value="<?php echo $row['UserEmail'];?>" name="txtEmail" placeholder="acb@gmail.com">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="phone">Địa chỉ</label>
                                        <input type="text" class="form-control" value="<?php echo $row['UserAdd'];?>" name="txtDiachi" placeholder="Xã,phường/huyện/tỉnh">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="website">Ngày sinh</label>
                                        <input type="date" class="form-control" value="<?php echo $row['UserBirth'];?>" name="ngaySinh" >
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                    <label class="labels">Giới tính</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option value=null <?php if($row['UserGender']==""){echo 'selected';};?>>Chọn giới tính</option>
                                        <option value="Nam" <?php if($row['UserGender']=="Nam"){echo 'selected';};?>>Nam</option>
                                        <option value="Nữ" <?php if($row['UserGender']=="Nữ"){echo 'selected';};?>>Nữ</option>
                                        <option value="Khác" <?php if($row['UserGender']=="Khác"){echo 'selected';};?>>Khác</option>
                                    </select>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="Street">Lớp</label>
                                        <select class="form-select" name="txtLop" aria-label="Default select example">
                                            <option value="">Chọn lớp</option>
                                            <?php
                                            $sql_1 = "SELECT * FROM class";
                                            $result_1 = mysqli_query($conn,$sql_1);
            
                                            if(mysqli_num_rows($result_1)>0){
                                                while($row_1 = mysqli_fetch_assoc($result_1)){
                                                    ?>
                                                        <option value="<?php echo $row_1['ClassID'];?>" <?php if($row_1['ClassID']==$row['UserClass']){echo "selected";}?>><?php echo $row_1['ClassName'];?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>                                                                
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
                <?php
            }
        }
    }

    if(isset($_POST['take_manager_infor'])){
        $AdID = $_POST['AdID'];
        $sql = "select * from admin where AdID = $AdID";
        $res = mysqli_query($conn, $sql);
        if(mysqli_num_rows($res)==1){
            $row = mysqli_fetch_assoc($res);
            ?>
            <div class=" col-12">
                <div class="card h-100" style="background:rgb(88 116 149 / 19%)">
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-3 text-primary fs-5 text">Thông tin tài khoản</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                <div class="form-group">
                                    <label for="fullName">Họ và tên</label>
                                    <input type="text" class="form-control" name="txtHoTen" value="<?php echo $row['AdRName'];?>">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                <div class="form-group">
                                    <label for="phone">Số điện thoại</label>
                                    <input type="tel" class="form-control" value="<?php echo $row['AdTel'];?>" name="sdt" placeholder="09x xxx xxxx">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                <div class="form-group">
                                    <label for="phone">Email</label>
                                    <input type="email" class="form-control" value="<?php echo $row['AdEmail'];?>" name="txtEmail" placeholder="acb@gmail.com">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                <div class="form-group">
                                    <label for="phone">Địa chỉ</label>
                                    <input type="text" class="form-control" value="<?php echo $row['AdAdd'];?>" name="txtDiachi" placeholder="Xã,phường/huyện/tỉnh">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                <div class="form-group">
                                    <label for="website">Ngày sinh</label>
                                    <input type="date" class="form-control" value="<?php echo $row['AdBirth'];?>" name="ngaySinh" >
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                <label class="labels">Giới tính</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value=null <?php if($row['AdGender']==""){echo 'selected';};?>>Chọn giới tính</option>
                                    <option value="Nam" <?php if($row['AdGender']=="Nam"){echo 'selected';};?>>Nam</option>
                                    <option value="Nữ" <?php if($row['AdGender']=="Nữ"){echo 'selected';};?>>Nữ</option>
                                    <option value="Khác" <?php if($row['AdGender']=="Khác"){echo 'selected';};?>>Khác</option>
                                </select>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            <?php
        }
    }

    if(isset($_POST['take_transcript_infor'])){
        $UserID = $_POST['UserID'];
        $Subject = $_POST['Subject'];
        $sql2 = "select * from transcript where Student_UserID = '$UserID' and Subject = '$Subject'";
        $res2 = mysqli_query($conn, $sql2);

        if(mysqli_num_rows($res2)>0){
            $row2 = mysqli_fetch_assoc($res2);
            ?>
            <div class=" col-12">
                <div class="card h-100" style="background:rgb(88 116 149 / 19%)">
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-3 text-primary fs-5 text">Thông tin điểm</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                <div class="form-group">
                                    <label for="phone">Điểm giữa kì</label>
                                    <input type="text" class="form-control" value="<?php echo $row2['MidTerm'];?>" name="MidTerm">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                <div class="form-group">
                                    <label for="phone">Điểm cuối kì</label>
                                    <input type="text" class="form-control" value="<?php echo $row2['FinalExam'];?>" name="FinalExam">
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            <?php
        }
    }
?>