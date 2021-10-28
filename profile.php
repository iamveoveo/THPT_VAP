<?php 
include("template/header.php"); 
include("template/header-menu.php");  
?>

<?php
    /* $userID = $_SESSION['UserName']; */
    if(isset($_GET['userID'])){
        $userID = $_GET['userID'];
    }

    $sql3 = "select * from users, );";
    $res3 = mysqli_query($conn, $sql3);
    if(mysqli_num_rows($res3)>0){
        $row3 = mysqli_fetch_assoc($res3);
    }
?>
<script>
    var userID = <?php echo $userID;?>;
</script>

<div class="back ">
    
    <!-- profile -->
    <div class="container rounded-3 bg-white my-3 col-md-8">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="images/<?php echo $row3['UserAva']; ?>">
                    <span class="font-weight-bold"><?php echo $row3['UserRName'];?></span>
                    <span class="text-black-50"><?php echo $row3['UserEmail'];?></span>
                    <span> </span>
                </div>
            </div>
            <div class="col-md-6 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-uppercase text-right">Thông tin chi tiết</h4>
                    </div>
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
                                        $sql4 = "select TeachClass from Teach group by TeachClass";
                                        $res4 = mysqli_query($conn, $sql4);
                                        if(mysqli_num_rows($res4)>0){
                                            while($row4 = mysqli_fetch_assoc($res4)){
                                                ?>
                                                    <option value="<?php echo $row4['TeachClass'];?>" <?php if($row4['TeachClass']==$row3['TeachClass']){echo 'selected';}?> ><?php echo $row4['TeachClass'];?></option>
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
                        <div class="mt-4 text-center me-3">
                            <button name="edit" type="button" class="btn" style="background: #663399; color:#fff;" data-bs-toggle="modal" data-bs-target="#edit">
                                Sửa thông tin
                            </button>
                        </div>
                        <div class="mt-4 text-center">
                            <button name="transcript"  type="button" class="btn" style="background: #663399; color:#fff;" data-bs-toggle="modal" data-bs-target="#transcript">
                                Xem điểm
                            </button>
                        </div>
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
                            <img class="rounded-circle mt-5" width="150px" src="images/<?php echo $row3['UserAva']; ?>">
                            <span class="font-weight-bold"><?php echo $row3['UserRName'];?></span>
                            <span class="text-black-50"><?php echo $row3['UserEmail'];?></span>
                            <span> </span>
                        </div>
                        <form action="#">
                            <div class="input-file-container">  
                                <input class="input-file" id="my-file" type="file">
                                <label tabindex="0" for="my-file" class="input-file-trigger">Select a file...</label>
                            </div>
                            <p class="file-return"></p>
                        </form>
                    </div>

                    <!-- sửa thông tin -->
                    <div class="col-md-7 border-right">
                        <div class="p-3 py-3">
                            <div class="justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Sửa thông tin tài khoản</h4>
                            </div>
                            <form class="infor-edit" name="change_infor">
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Hủy</button>
                <button name="save" type="button" class="btn"style="background: #6600CC; color:#fff;" >Lưu thay đổi</button>
            </div>
            </div>
        </div>
    </div>

    <!-- model transcripc -->

</div>


<?php include("template/footer.php"); ?>
