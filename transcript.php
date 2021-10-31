<?php 
include("template/header.php"); 
include("template/header-menu.php"); 
if($_SESSION["MyRoll"]!="Giáo viên"){
    header('location:'.SITEURL);
}else if(isset($_SESSION['MyID'])){
    $MyID = $_SESSION['MyID'];
}
?>

<div class="back">
    

    <!-- table -->
    <div class="container " style="margin-top:55px">
        <!-- select -->
        <?php
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        ?>
        <form action="" id="transcript-select-form" name="transcript-select-form" class="row">
            <div class="mb-3 col-4">
                <label for="class-select" class="form-label">Chọn lớp</label>
                <select id="class-select" class="form-select">
                <?php
                    if(isset($_SESSION['MyID'])){
                        $sql11 = "select * from class, teach where Teacher_UserID = '$MyID' and class.ClassID = teach.ClassID";
                        $res11 = mysqli_query($conn, $sql11);
                        if(mysqli_num_rows($res11)>0){
                            echo "<option value=null selected>Trống</option>";
                            while($row11 = mysqli_fetch_assoc($res11)){
                                ?>
                                    <option value="<?php echo $row11['ClassID'];?>"><?php echo $row11['ClassName'];?></option>
                                <?php
                            }
                        }
                    }  
                ?>
                </select>
                
            </div>

            <div class="mb-3 col-4 subject-select">
                <label for="select-class" class="form-label">Chọn môn</label>
                <select id="subject-select1" class="form-select">
                    <option value=null selected>Trống</option>
                </select>   
            </div>
            <div class="col-2 d-flex justify-content-center align-items-center pt-3">
                <button name="transcript-select" class="btn p-3"  type="submit" style="background: #6c119a;color: #fff;">Lọc</button>
            </div>
        </form>
        <div class="table-scroll">
            <table class="table align-middle table-bordered table-secondary table-hover table-responsive">
                <thead class="table-light">
                    <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Họ và tên</th>
                    <th scope="col">Môn</th>
                    <th scope="col">Điểm giữa kì</th>
                    <th scope="col">Điểm cuối kì</th>
                    </tr>
                </thead>
                <tbody>
                    <span class="fs-4 text-light first">Chọn lớp và mồn học để hiển thị bảng điểm</span>
                </tbody>
            </table>
        </div>

        <!-- import export -->
        <div class="center row">
            <div class="col-4">
                <a type="button" class="h-100" data-bs-toggle="modal" data-bs-target="#add-transcript">
                    <button class="button button--mimas h-100"><span>Sửa</span></button>
               </a>
            </div>
            <div class="col-4">
                <a type="button" data-bs-toggle="modal" data-bs-target="#preview-import">
                    <button class="button button--mimas"><span>Nhập tệp</span></button>
            </a>
            </div>

            <div class=" col-4">         
                <a type="button" data-mdb-ripple-color="dark">
                    <button class="button button--calypso" name="export"><span>Xuất tệp</span></button>
                </a> 
            </div>
        </div>

    </div>

    <!-- modal Update -->
    <div class="modal fade" id="add-transcript" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="" id="add_tran" method="POST" name="add_tran">
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3 col-5">
                                <label for="class-select" class="form-label">Chọn lớp</label>
                                <select id="class-select1" class="form-select">
                                <?php
                                    if(isset($_SESSION['MyID'])){
                                        $sql11 = "select * from class, teach where Teacher_UserID = '$MyID' and class.ClassID = teach.ClassID";
                                        $res11 = mysqli_query($conn, $sql11);
                                        if(mysqli_num_rows($res11)>0){
                                            echo "<option value='' selected></option>";
                                            while($row11 = mysqli_fetch_assoc($res11)){
                                                ?>
                                                    <option value="<?php echo $row11['ClassID'];?>"><?php echo $row11['ClassName'];?></option>
                                                <?php
                                            }
                                        }
                                    }  
                                ?>
                                </select>
                                
                            </div>

                            <div class="mb-3 col-5 subject-select1">
                                <label for="select-class" class="form-label">Chọn môn</label>
                                <select name="subject-select" class="form-select">

                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <label class="labels">Họ và tên học sinh</label>
                                <input name="RName-tran" type="text" class="form-control" placeholder="Họ và tên" value="">
                            </div>
                            <div id="list-student">
                                <div style="height:100%;background-color:#e4e4e4;">
                                    <div class="list-group list-student" style="background-color:#e4e4e4;">
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" id="score">
                                <div class="col-md-12 mt-2 ">
                                    <label class="labels">Điểm giữa kì</label>
                                    <input name="MidTerm" type="text" class="form-control" placeholder="Điểm giữa kì" value="">
                                </div>
                                <div class="col-md-12 mt-2 ">
                                    <label class="labels">Điểm cuối kì</label>
                                    <input name="FinalExam" type="text" class="form-control" placeholder="Điểm cuối kì" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- btn hủy và lưu -->
                    <div class="modal-footer">
                        <a class="btn" style="background-color: #a6b9c8; color: #fff;" data-bs-dismiss="modal">Hủy</a>
                        <button name="add-tran" type="submit" class="btn" style="background-color: #6a3ba2; color: #fff;" >Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal import -->
    <div class="modal fade" id="preview-import" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header text-light" style="background-color:#8f8f8f;">
                    <form id="file_import" name="file_import_form" action="export_import.php" method="POST" enctype="multipart/form-data">
                            <input type="file" name="file_import">
                            <button class="btn btn-dark" type="submit" name="display_import">Xem trước</button>
                    </form>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal_body">
                    Xem trước tệp dữ liệu được chọn
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" name="import" class="btn btn-primary" data-bs-dismiss="modal">Lưu thay đổi</button>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
    if(isset($_POST['add-tran'])){
        if(isset($_SESSION['student_select'])){
            $UserID = $_SESSION['student_select'];
            unset($_SESSION['student-select']);
            $Subject = $_POST['subject-select'];
            $MidTerm = $_POST['MidTerm'];
            $FinalExam = $_POST['FinalExam'];

            $sql15 = "update transcript set
                    MidTerm = '$MidTerm',
                    FinalExam = '$FinalExam'
                    where Student_UserID = '$UserID'and Subject = '$Subject'";
            $res15 = mysqli_query($conn, $sql15) or die(mysqli_error($conn));

            if($res15){
                $_SESSION['add'] = "<div><span class='text-success fs-3'>Sửa điểm thành công</span></div>";
                header('location:'.SITEURL.'transcript.php');
            }else{
                $_SESSION['add'] = "<div><span class='text-danger fs-3'>Lỗi khi sửa điểm</span></div>";
                header('location:'.SITEURL.'transcript.php');
            }
        }else{
            $_SESSION['add'] = "<div><span class='text-danger fs-3'>Lỗi khi sửa điểm</span></div>";
            header('location:'.SITEURL.'transcript.php');
        }
    }
?>

<?php include("template/footer.php"); ?>

<script>
$(document).ready(function(){
    $('button[name="export"]').on('click', function(){
        var url = "<?php echo SITEURL;?>/transcript-select.php?export=&class=" + $('#class-select').val() +"&subject="+$('#subject-select1').val();
        window.location.replace(url);
    })
})
</script>