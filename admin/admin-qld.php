<?php include("template/header.php"); ?>

<div class='dashboard'>
    <?php include("template/admin.php");?>

    <!-- bảng -->
    <div class='dashboard-app'>
        <div class='dashboard-toolbar row'>
            <div class="col-5"><a href="#!" class="menu-toggle "><i class="fas fa-bars"></i></a></div>
            <div class="row height d-flex justify-content-center align-items-center col-7">
                <div class="form"> 
                    <i class="fa fa-search"></i> <input type="text" class="form-control form-input" placeholder="Tìm kiếm mọi thứ..."> <span class="left-pan"><i class="fa fa-microphone "></i></span> 
                </div>
            </div>
        </div>
        <div class='dashboard-content'>
            <div class='container'>
                <div class='card'>
                    <div class='card-header'>
                        <h2>Quản lý điểm</h2>
                        <?php
                            
                            if(isset($_SESSION['update'])){
                                echo $_SESSION['update'];
                                unset($_SESSION['update']);
                            }
                        ?>
                    </div>
                    <?php
                        if(isset($_SESSION['add_diem'])){
                            echo $_SESSION['add_diem'];
                            unset($_SESSION['add_diem']);
                        }
                    ?>
                    <div class='card-body'>     
                        <div class="d-flex flex-row">
                             <div class="col-md-4">
                                <a class="btn m-3 btn-lg " data-bs-toggle="modal" data-bs-target="#add" href="#" style="    background-color: #7d9fb9;color: #fff;" role="button">Thêm mới</a>
                            </div>
                            <div class="col-md-3"  style="margin:15px">
                                <select id="class-select" class="form-select" aria-label="Default select example">
                                    <option selected>Chọn theo lớp</option>
                                    <?php
                                        $sql2 = "select * from class";
                                        $res2 = mysqli_query($conn, $sql2);

                                        if(mysqli_num_rows($res2)>0){
                                            while($row2 = mysqli_fetch_assoc($res2)){
                                                ?>
                                                <option value="<?php echo $row2['ClassID'];?>"><?php echo $row2['ClassName'];?></option>
                                                <?php
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3" style="margin:15px">
                                <select id="subject-select" class="form-select " aria-label="Default select example">
                                    <option value="" selected>Chọn theo môn</option>
                                    <!-- option chọn môn -->
                                </select>
                            </div>
                            <div class="col-md-1" style="margin:15px">
                                <a id="selected" class="btn btn-lg " style="background-color: #7d9fb9;color: #fff;padding:3px;" role="button">Chọn</a>
                            </div>
                        </div> 
                       
                        
                        <div class="col-md-12">
                            <div id="table_diem" style="max-height:50vh;overflow-y:scroll;">
                                <table class="table table-hover table-secondary ">
                                    <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Họ và tên</th>
                                        <th scope="col">Lớp</th>
                                        <th scope="col">Môn học</th>
                                        <th scope="col">Điểm giữa kì</th>
                                        <th scope="col">Điểm cuối kì</th>
                                        <th scope="col">Sửa</th>
                                        <th scope="col">Xóa</th>
                                        <th scope="col">Chi tiết</th>

                                    </tr>
                                    </thead>
                                    <tbody id="d-table">
                                    <?php
                                        $sql="SELECT * FROM users, transcript ,class WHERE Student_UserID=UserID  AND UserClass=ClassID";
                                            
                                        $result = mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($result)>0){
                                        $i=1;                                            
                                        while($row = mysqli_fetch_assoc($result)){
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $i; ?></th>
                                            <td><?php echo $row['UserRName']; ?></td>
                                            <td><?php echo $row['ClassName']; ?></td>
                                            <td><?php echo $row['Subject']; ?></td>
                                            <td><?php echo $row['MidTerm']; ?></td>
                                            <td><?php echo $row['FinalExam']; ?></td>
                                            <td><button id="<?php echo $row['UserID'];?>" subject="<?php echo $row['Subject'];?>" type="button" class="btn icon-admin icon-score" data-bs-toggle="modal" data-bs-target="#editor" ><i class="fas fa-edit " ></i></button></td>
                                            <td><button type="button" class="btn btn-danger" ><i class="fas fa-trash-alt "></i></button></td>
                                            <td><button type="button" class=" btn" data-bs-toggle="modal" data-bs-target="#detail"> <i class="fas fa-info-circle" style="font-size:25px"></i></button></td>
                                        </tr>
                                        <?php
                                            $i++;
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                    
                        </div>

                        <!-- modal add -->
                        <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">

                                    <!--form add -->
                                    <h5 class="modal-title">Thêm điểm</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="process-add.php" method="POST">
                                        <div class="modal-body">
                                            <div class=" col-12">
                                                <div class="card h-100" style="background:rgb(88 116 149 / 19%)">
                                                    <div class="card-body">
                                                        <div class="row gutters">
                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                <h6 class="mb-3 text-primary fs-5 text">Thêm điểm</h6>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                                <div class="form-group">
                                                                    <label for="fullName">Môn</label>
                                                                    <input type="text" class="form-control" name="txtMon" >
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                                <div class="form-group">
                                                                    <label for="eMail">Lớp học</label>
                                                                    <select id="class-student" class="form-select" name="txtLop" aria-label="Default select example">
                                                                        <option value="">Chọn lớp</option>
                                                                        <?php
                                                                        $sql_1 = "SELECT * FROM class";
                                                                        $result_1 = mysqli_query($conn,$sql_1);
                                            
                                                                        //xử lý kết quả
                                                                        if(mysqli_num_rows($result_1)>0){
                                                                            while($row_1 = mysqli_fetch_assoc($result_1)){
                                                                                echo '<option value = "'.$row_1['ClassID'].'">'.$row_1['ClassName'].'</option>';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>    
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                                                                <div class="form-group">
                                                                    <label for="fullName">Họ và tên</label>
                                                                    <input id="RName-student" type="text" class="form-control" name="txtHoTen" >
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-3" style="max-height:25vh; overflow-y:scroll;">
                                                                <ul class="list-group student-select bg-light">
                                                                    
                                                                </ul>
                                                                <input type="hidden" name="Student_UserID">
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                                <div class="form-group">
                                                                    <label for="phone">Điểm giữa kì</label>
                                                                    <input type="number" class="form-control " name="diemGiua">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                                <div class="form-group">
                                                                    <label for="phone">Điểm cuối kì</label>
                                                                    <input type="number" class="form-control " name="diemCuoi">
                                                                </div>
                                                            </div>                                                          
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- btn hủy và lưu -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" style="background-color: #937da9" data-bs-dismiss="modal">Hủy</button>
                                            <button type="submit" class="btn" name="add-qld" style="background-color: #3D56B2; color:#fff;" data-bs-dismiss="modal" >Lưu</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                         <!-- modal edit -->
                         <div class="modal fade" id="editor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">

                                    <!--form edit -->
                                    <h5 class="modal-title">Sửa thông tin</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                     <form action="" method="POST">                                  
                                        <div class="modal-body editor-body">
                                            
                                        </div>

                                        <!-- btn hủy và lưu -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" style="background-color: #937da9" data-bs-dismiss="modal">Hủy</button>
                                            <button type="submit" class="btn" name="update-quanlidiem" style="background-color: #3D56B2; color:#fff;" data-bs-dismiss="modal" >Lưu</button>
                                        </div>
                                    </form>  
                                </div>
                            </div>
                        </div>
                      
                        <!-- btn import và export -->
                        <div class="center row">
                            <div class="btn-1 col-5">
                                <a href="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <span>Nhập file</span></a>
                                
                            </div>
                
                            <div class="btn-2 col-5">
                                <form action="import-export.php" method="POST" id="form_hs" enctype="multipart/form-data" >     
                                    <input type="hidden" name="export_diem" value="">
                                    <a name="btn_export_diem" type="submit" role="button" data-mdb-ripple-color="dark">
                                    <span style="color:#fff;">Xuất file</span></a> 
                                </form>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">

                                    <!--up file  -->
                                    <form action="" method="POST" enctype="multipart/form-data" id="form_import_diem" name="form_import_diem">             
                                        <input type="file" name="file_import_diem" >   
                                        <button type="submit" class="btn btn-outline-primary mt-2 btn-rounded rounded-pill" data-mdb-ripple-color="dark" name = "preview_diem">Xem trước tệp</button>
                                    </form>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body modal_body_diem">
                                    </div>

                                    <!-- btn hủy và lưu -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" style="background-color:#A6ABAF" data-bs-dismiss="modal">Hủy</button>
                                        <button type="button" class="btn" name="import_diem" style="background-color: #855DBD; color:#fff;" data-bs-dismiss="modal" >Lưu</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

if(isset($_POST['update-quanlidiem']))
   {    $_SESSION['update']="<div class='text-success'>sửa thành công.</div>";
        $ID= $_POST['ID'];
        $Subject = $_POST['Subject'];
        $MidTerm = $_POST['MidTerm'];
        $FinalExam = $_POST['FinalExam'];
        
        $sql = "UPDATE transcript set
        MidTerm = '$MidTerm',
        FinalExam = '$FinalExam'
         WHERE Student_UserID= '$ID' and Subject = '$Subject' ";
        //thưc hiện truy vấn 
        $query = mysqli_query($conn, $sql); 

        if($query==TRUE)
        {
            $_SESSION['update']="<div class='text-success'>sửa thành công.</div>";
            header('location: '.SITEURL.'admin/admin-qld.php');
        }
        else
        {
            $_SESSION['update']="<div class='text-danger'>Sửa thất bại.</div>";
            header('location: '.SITEURL.'admin/admin-qld.php');
       
        }

   }

?>
<?php include("template/footer.php"); ?>
<script>var siteurl = "<?php echo SITEURL;?>";</script>
<!-- đoạn xử lý menu toogle -->
<script src="JS/admin.js"></script>