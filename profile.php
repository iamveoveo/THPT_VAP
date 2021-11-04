<?php 
include("template/header.php"); 
include("template/header-menu.php");  
?>

<?php
    $UserID = $_SESSION['MyID'];
    if(isset($_GET['userID'])){
        $UserID = $_GET['userID'];
    }

    $sql3 = "select * from users where UserID=$UserID;";
    $res3 = mysqli_query($conn, $sql3);
    if(mysqli_num_rows($res3)>0){
        $row3 = mysqli_fetch_assoc($res3);
        if(isset($_GET['userID'])){
            $UserRoll = $row3['UserRoll'];
        }else{
            $UserRoll = "me";
        }
    }
?>
<script>
    var userID = <?php echo $UserID;?>;
</script>

<div class="back ">
    
    <!-- profile -->
    <div class="container rounded-3 bg-white my-3 col-md-8">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" id="image_name_"style="width:150px; height:150px" src="images/avatar/<?php echo $row3['UserAva']; ?>">
                    <span> </span>
                </div>
            </div>
            <div class="col-md-6 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-uppercase text-right">Thông tin chi tiết</h4>
                    </div>
                    <?php
                        if(isset($_SESSION['change-pass'])){
                            echo $_SESSION['change-pass'];
                            unset($_SESSION['change-pass']);
                        }
                    ?>
                    <div class="infor">
                        <div class="row mt-3">
                            <div class="col-md-12 mt-2 ">
                                <label class="labels">Họ và tên</label>
                                <input name="RName" type="text" class="form-control" placeholder="Họ và tên" value="<?php echo $row3['UserRName'];?>" disabled="disabled" readonly="readonly">
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
                                                    <option value="<?php echo $row4['ClassID'];?>" <?php if($row4['ClassID']==$row3['UserClass']){echo 'selected';}?> ><?php echo $row4['ClassName'];?></option>
                                                <?php
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Số điện thoại</label>
                                <input name="Tel" type="text" class="form-control" placeholder="Số điện thoại" value="<?php echo $row3['UserTel'] ?>" disabled="disabled" readonly="readonly">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12 mt-2">
                                <label class="labels">Email</label>
                                <input name="Email" type="Email" class="form-control" placeholder="Email" value="<?php echo $row3['UserEmail'] ?>" disabled="disabled" readonly="readonly">
                            </div>
                            
                            <div class="col-md-12 mt-2">
                                <label class="labels">Địa chỉ</label>
                                <input name="Add" type="text" class="form-control" placeholder="Địa chỉ" value="<?php echo $row3['UserAdd'] ?>" disabled="disabled" readonly="readonly">
                            </div>
                        
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="labels">Giới tính</label>
                                <select class="form-control" name="Gender" id="" disabled="disabled" readonly="readonly">
                                    <option value=null <?php if($row3['UserGender']==null){echo 'selected';} ?>></option>
                                    <option value="Nữ" <?php if($row3['UserGender']=='Nữ'){echo 'selected';} ?>>Nữ</option>
                                    <option value="Nam" <?php if($row3['UserGender']=='Nam'){echo 'selected';} ?>>Nam</option>
                                    <option value="Khác" <?php if($row3['UserGender']=='Khác'){echo 'selected';} ?>>Khác</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Ngày sinh</label>
                                <input name="Birth" type="date" class="form-control" value="<?php echo $row3['UserBirth'] ?>" placeholder="state" disabled="disabled" readonly="readonly">
                            </div>
                        </div>
                    </div>
                    <!-- Button trigger modal -->
                    <div class="d-flex flex-row">
                        <?php
                            if($_SESSION['MyRoll']=="Giáo viên"){
                                if($UserRoll=="Phụ huynh"){
                                    ?>
                                    <div class="mt-4 text-center me-3">
                                        <button name="edit" type="button" class="btn" style="background: #663399; color:#fff;" data-bs-toggle="modal" data-bs-target="#edit">
                                            Sửa thông tin
                                        </button>
                                    </div>
                                    <div class="mt-4 text-center me-3">
                                        <a href="<?php echo SITEURL;?>mess.php?newMess=<?php echo $UserID?>" name="edit" type="button" class="btn" style="background: #663399; color:#fff;">
                                            Gửi tin nhắn
                                        </a>
                                    </div>
                                    <?php
                                }else if($UserRoll=="Học sinh"){
                                    ?>
                                    <div class="mt-4 text-center me-3">
                                        <button name="edit" type="button" class="btn" style="background: #663399; color:#fff;" data-bs-toggle="modal" data-bs-target="#edit">
                                            Sửa thông tin
                                        </button>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <button name="transcript"  type="button" class="btn" style="background: #663399; color:#fff;" data-bs-toggle="modal" data-bs-target="#student-transcript">
                                            Xem điểm
                                        </button>
                                    </div>
                                    <?php
                                }else if($UserRoll=="me"){
                                    ?>
                                    <div class="mt-4 text-center me-3">
                                        <button name="edit" type="button" class="btn" style="background: #663399; color:#fff;" data-bs-toggle="modal" data-bs-target="#edit">
                                            Sửa thông tin
                                        </button>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <button id="transcript" type="button" class="btn" style="background: #663399; color:#fff;">
                                            Thêm điểm
                                        </button>
                                        <script type="text/javascript">
                                            document.getElementById("transcript").onclick = function () {
                                                location.href = "<?php echo SITEURL?>transcript.php";
                                            };
                                        </script>
                                    </div>
                                    <?php
                                }
                            }else if($_SESSION['MyRoll']=="Phụ huynh"){
                                if($UserRoll=="Học sinh"){
                                    ?>
                                    <div class="mt-4 text-center">
                                        <button name="transcript"  type="button" class="btn" style="background: #663399; color:#fff;" data-bs-toggle="modal" data-bs-target="#student-transcript">
                                            Xem điểm
                                        </button>
                                    </div>
                                    <?php
                                }else if($UserRoll=="Giáo viên"){
                                    ?>
                                    <div class="mt-4 text-center me-3">
                                        <a href="<?php echo SITEURL;?>mess.php?newMess=<?php echo $UserID?>" name="edit" type="button" class="btn" style="background: #663399; color:#fff;">
                                            Gửi tin nhắn
                                        </a>
                                    </div>
                                    <?php
                                }else if($UserRoll=="me"){
                                    ?>
                                    <div class="mt-4 text-center me-3">
                                        <button name="edit" type="button" class="btn" style="background: #663399; color:#fff;" data-bs-toggle="modal" data-bs-target="#edit">
                                            Sửa thông tin
                                        </button>
                                    </div>
                                    <?php
                                }
                            }else{
                                if($UserRoll=="Học sinh"){
                                    ?>
                                    <div class="mt-4 text-center">
                                        <button name="transcript"  type="button" class="btn" style="background: #663399; color:#fff;" data-bs-toggle="modal" data-bs-target="#student-transcript">
                                            Xem điểm
                                        </button>
                                    </div>
                                    <?php
                                }else if($UserRoll=="me"){
                                    ?>
                                    <div class="mt-4 text-center me-3">
                                        <button name="edit" type="button" class="btn" style="background: #663399; color:#fff;" data-bs-toggle="modal" data-bs-target="#edit">
                                            Sửa thông tin
                                        </button>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <button name="transcript"  type="button" class="btn" style="background: #663399; color:#fff;" data-bs-toggle="modal" data-bs-target="#student-transcript">
                                            Xem điểm
                                        </button>
                                    </div>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <!-- Modal suửa thông tin -->
    <div class="modal fade " id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sửa thông tin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <!-- avatar -->
                    <div class="col-md-4 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <img class="rounded-circle mt-5" style="width:150px; height:150px" id="image_name" src="">
                            <span> </span>
                        </div>
                        <form action="#" id="profile_form">
                            <div class="input-file-container">  
                                <input name="file_image" class="input-file" id="my-file" type="file">
                                <label tabindex="0" for="my-file" class="input-file-trigger">Select a file...</label>
                            </div>
                            <p class="file-return"></p>
                            <div class="alert text-danger"></div>
                            <div class="w-100 d-flex justify-content-center mt-3">
                                <button type="submit" class="btn" name="save_ava" style="    background: #6600CC;color: #fff;">Thay đổi</button>
                            </div>
                        </form>
                    </div>

                    <!-- sửa thông tin -->
                    <div class="col-md-7 border-right">
                        <div class="p-3 py-3">
                            <div class="justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Sửa thông tin tài khoản</h4>
                            </div>
                            <form class="infor-edit" id="change_infor" name="change_infor">
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Hủy</button>
                <?php
                    if(!isset($_GET['userID'])){
                        ?>
                            <button name="transcript"  type="button" class="btn" style="background: #663399; color:#fff;" data-bs-toggle="modal" data-bs-target="#change-password">
                                Đổi mật khẩu
                            </button>
                        <?php
                    }
                ?>
                <button name="save" type="button"  data-bs-dismiss="modal" class="btn"style="background: #6600CC; color:#fff;" >Lưu thay đổi</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="student-transcript" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bảng điểm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table align-middle table-bordered table-secondary table-hover table-responsive">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Môn</th>
                                <th scope="col">Điểm giữa kì</th>
                                <th scope="col">Điểm cuối kì</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            if($UserRoll=="Học sinh"){
                                $sql19 = "select * from transcript where Student_UserID = '$UserID'";
                                $res19 = mysqli_query($conn, $sql19);
                                $i = 0;

                                if(mysqli_num_rows($res19)>0){
                                    while($row19 = mysqli_fetch_assoc($res19)){
                                        $i++
                                    ?>  
                                        <tr>
                                            <th scope="row"><?php echo $i;?></th>
                                            <td><?php echo $row19['Subject'];?></td>
                                            <td><?php echo $row19['MidTerm'];?></td>
                                            <td><?php echo $row19['FinalExam'];?></td>
                                        </tr>
                                    <?php
                                    }
                                }
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" name="export" class="btn btn-primary">Tải bảng điểm</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="change-password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ĐỔI MẬT KHÂU</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" class="change-password" name="change_infor">
                    <div class="modal-body">                   
                        <div class="row mt-3">
                            <div class="col-md-12 mt-2 ">
                                <label class="labels">Nhập mật khẩu cũ</label>
                                <input name="oldpass" type="password" class="form-control">
                            </div>                        
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12 mt-2 ">
                                <label class="labels">Nhập mật khẩu mới</label>
                                <input name="newpass1" type="password" class="form-control">
                            </div>                        
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 mt-2 ">
                                <label class="labels">Nhập lại mật khẩu mới</label>
                                <input name="newpass2" type="password" class="form-control">
                            </div>                        
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" name="change-password" data-bs-dismiss="modal" class="btn btn-primary">Đổi mật khẩu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<script>
document.querySelector("html").classList.add('js');

var fileInput  = document.querySelector( ".input-file" ),  
    button     = document.querySelector( ".input-file-trigger" ),
    the_return = document.querySelector(".file-return");
      
button.addEventListener( "keydown", function( event ) {  
    if ( event.keyCode == 13 || event.keyCode == 32 ) {  
        fileInput.focus();  
    }  
});
button.addEventListener( "click", function( event ) {
   fileInput.focus();
   return false;
});  
fileInput.addEventListener( "change", function( event ) {  
    the_return.innerHTML = this.value;  
});  
</script>

<?php
    if(isset($_POST['change-password'])){
        $oldPass = $_POST['oldpass'];
        $newPass1 = $_POST['newpass1'];
        $newPass2 = $_POST['newpass2'];

        $sql20 = "select * from users where UserID = '$UserID'";
        $res20 = mysqli_query($conn, $sql20);

        if(mysqli_num_rows($res20)>0){
            $row20 = mysqli_fetch_assoc($res20);

            if(password_verify($oldPass, $row20['UserPassword'])){
                if($newPass1 == $newPass2){
                    $newPass = password_hash($newPass2, PASSWORD_DEFAULT);
                    $sql21 = "update users set UserPassword = '$newPass' where UserID = '$UserID'";
                    $res21 = mysqli_query($conn, $sql21);

                    if($res21){
                        $_SESSION['change-pass']= "<div class='text-success'>Đổi mật khẩu thành công</div>";
                        header('location:'.SITEURL.'profile.php');
                    }else{
                        $_SESSION['change-pass']= "<div class='text-danger'>Đổi mật khẩu thất bại</div>";
                        header('location:'.SITEURL.'profile.php');
                    }
                }else{
                    $_SESSION['change-pass']= "<div class='text-danger'>Đổi mật khẩu thất bại</div>";
                    header('location:'.SITEURL.'profile.php');
                }
            }else{
                $_SESSION['change-pass']= "<div class='text-danger'>Đổi mật khẩu thất bại</div>";
                header('location:'.SITEURL.'profile.php');
            }
        }
    }
?>

<?php include("template/footer.php"); ?>

<script>
$(document).ready(function(){
    $('button[name="export"]').on('click', function(){
        var url = "<?php echo SITEURL;?>/process-profile.php?export=&UserID="+userID;
        window.location.replace(url);
    })
})
</script>
