<?php include("template/header.php"); ?>

<div class='dashboard'>
    <?php include("template/admin.php");?>

    <!-- bảng -->
    <div class='dashboard-app'>
        <div class='dashboard-toolbar row'>
            <div class="col-5"><a href="#!" class="menu-toggle "><i class="fas fa-bars"></i></a></div>
            <div class="row height d-flex justify-content-center align-items-center col-7">
            </div>
        </div>
        <div class='dashboard-content'>
            <div class='container'>
                <div class='card'>
                    <div class='card-header'>
                        <h2>Quản lý lớp</h2>
                    </div>
                    <?php
                        if(isset($_SESSION['add']))
                        {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                        }      
                        if(isset($_SESSION['delete']))
                        {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                        }      
                        if(isset($_SESSION['update']))
                        {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                        }      
                    ?>
                    <div class='card-body'>      
                        <div class="d-flex">
                            <div>
                                <a class="btn m-3 btn-lg " data-bs-toggle="modal" data-bs-target="#add" href="#" style="    background-color: #7d9fb9;color: #fff;" role="button">Thêm lớp</a>
                            </div>
                            <div>
                                <a class="btn m-3 btn-lg " data-bs-toggle="modal" data-bs-target="#add1" href="#" style="    background-color: #7d9fb9;color: #fff;" role="button">Thêm Môn</a>
                            </div>
                            <div class="col-md-3"  style="margin:15px">
                                <select id="class-select1" class="form-select" aria-label="Default select example">
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
                                <select id="subject-select1" class="form-select " aria-label="Default select example">
                                    <option value="" selected>Chọn theo môn</option>
                                    <!-- option chọn môn -->
                                </select>
                            </div>
                            <div class="col-md-1" style="margin:15px">
                                <a id="selected1" class="btn btn-lg " style="background-color: #7d9fb9;color: #fff;padding:3px;" role="button">Chọn</a>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div id="table" style="max-height:90vh;overflow-y:scroll;">
                                <table class="table table-hover table-secondary ">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Khối</th>
                                            <th scope="col">Tên lớp</th>
                                            <th scope="col">Tên giáo viên</th>
                                            <th scope="col">Môn học</th>
                                            <th scope="col">Sửa</th>
                                            <th scope="col">Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody id="d-table">
                                        <?php

                                        $sql="SELECT * FROM users, class, teach  WHERE teach.Teacher_UserID=users.UserID AND class.ClassID=teach.ClassID ";
                                            
                                         $result = mysqli_query($conn,$sql);

                                         if(mysqli_num_rows($result)>0){
                                         $i=1;                                            
                                         while($row = mysqli_fetch_assoc($result)){
                                        ?>

                                        <tr>
                                            <th scope="row"><?php echo $i; ?></th>
                                            <td><?php echo $row['ClassGrade']; ?></td>
                                            <td><?php echo $row['ClassName']; ?></td>
                                            <td><?php echo $row['UserRName']; ?></td>
                                            <td><?php echo $row['TeachSubject']; ?></td>
                                            <td><button id="<?php echo $row['TeachID'];?>" type="button" class="btn icon-admin icon-class" data-bs-toggle="modal" data-bs-target="#editor" ><i class="fas fa-edit " ></i></button></td>
                                            <td><a href="<?php echo SITEURL;?>admin/admin_delete.php?Delete_mon=&TeachID=<?php echo $row['TeachID'];?>"><button type="button" class="btn btn-danger" ><i class="fas fa-trash-alt "></i></button></a></td>

                                        </tr>
                                        <?php
                                             $i++;
                                             }
                                         }
                                        ?>
                                    </tbody>

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
                                    <h5 class="modal-title">Thêm thông tin</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="process-add.php" method="POST">
                                        <div class="modal-body">
                                            <div class=" col-12">
                                                <div class="card h-100" style="background:rgb(88 116 149 / 19%)">
                                                    <div class="card-body">
                                                        <div class="row gutters">
                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                <h6 class="mb-3 text-primary fs-5 text">Thông tin tài khoản</h6>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-3">
                                                                <div class="form-group">
                                                                    <label for="fullName">Khối</label>
                                                                    <select class="form-select" name="txtKhoi" aria-label="Default select example">
                                                                        <option value="10">10</option>
                                                                        <option value="11">11</option>
                                                                        <option value="12">12</option>
                                                                    </select>     
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                                <div class="form-group">
                                                                    <label for="Street">Lớp dạy</label>
                                                                    <input type="text" class="form-control" name="txtNewLop">      
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
                                            <button type="submit" class="btn" name="add-qll" style="background-color: #3D56B2; color:#fff;" data-bs-dismiss="modal" >Lưu</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- modal add1 -->
                        <div class="modal fade" id="add1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">

                                    <!--form add1 -->
                                    <h5 class="modal-title">Thêm thông tin</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="process-add.php" method="POST">
                                        <div class="modal-body">
                                            <div class=" col-12">
                                                <div class="card h-100" style="background:rgb(88 116 149 / 19%)">
                                                    <div class="card-body">
                                                        <div class="row gutters">
                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                <h6 class="mb-3 text-primary fs-5 text">Thông tin tài khoản</h6>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                                <div class="form-group">
                                                                    <label for="eMail">Lớp học</label>
                                                                    <select id="class-teacher" class="form-select" name="txtLop" aria-label="Default select example">
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
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                                <div class="form-group">
                                                                    <label for="Street">Môn dạy</label>
                                                                    <input type="text" class="form-control" name="txtMon">      
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                                                                <div class="form-group">
                                                                    <label for="fullName">Họ và tên</label>
                                                                    <input id="RName-Teacher" type="text" class="form-control" name="txtHoTen" >
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-3" style="max-height:25vh; overflow-y:scroll;">
                                                                <ul class="list-group teacher-select bg-light">
                                                                    
                                                                </ul>
                                                                <input type="hidden" name="Teacher_UserID">
                                                            </div>

                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- btn hủy và lưu -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" style="background-color: #937da9" data-bs-dismiss="modal">Hủy</button>
                                            <button type="submit" class="btn" name="add-qll1" style="background-color: #3D56B2; color:#fff;" data-bs-dismiss="modal" >Lưu</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                         <!-- modal edit -->
                        <div class="modal fade" id="editor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
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
                                            <button type="submit" class="btn" name="edit_mon1" style="background-color: #3D56B2; color:#fff;">Lưu</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                      
                        <!-- btn import và export -->
                        <div class="center row mt-4">
                            <div class="btn-1 col-5">
                                <a href="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <span>Nhập file</span></a>
                                
                            </div>
                
                            <div class="btn-2 col-5">
                                <form action="import-export.php" method="POST" id="form_hs" enctype="multipart/form-data" >     
                                    <input type="hidden" name="export_mon" value="">
                                    <a name="export" type="submit" role="button" data-mdb-ripple-color="dark">
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
                                    <form action="" method="POST" enctype="multipart/form-data" id="form_import_mon" name="form_import_mon">             
                                        <input type="file" name="file_import_mon" >   
                                        <button type="submit" class="btn btn-outline-primary mt-2 btn-rounded rounded-pill" data-mdb-ripple-color="dark" name = "preview_mon">Xem trước tệp</button>
                                    </form>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body modal_body_mon">
                                    </div>

                                    <!-- btn hủy và lưu -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" style="background-color:#A6ABAF" data-bs-dismiss="modal">Hủy</button>
                                        <button type="button" class="btn" name="import_mon" style="background-color: #855DBD; color:#fff;" data-bs-dismiss="modal" >Lưu</button>
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
    if(isset($_POST['edit_mon1'])){
        $TeachID = $_POST['TeachID'];
        $TeachSubject = $_POST['txtMon'];

        $sql3 = "select * from teach where TeachID = '$TeachID'";
        $res3 = mysqli_query($conn, $sql3);

        if(mysqli_num_rows($res3)>0){
            $row3 = mysqli_fetch_assoc($res3);
            $sql4 = "select * from teach where Teacher_UserID ='".$row3['Teacher_UserID']."' and TeachSubject = '".$TeachSubject."' and ClassID = '".$row3['ClassID']."'";
            $res4 = mysqli_query($conn, $sql4);

            if(mysqli_num_rows($res4)>0){
                header('location:'.SITEURL.'admin/admin-qll.php');
            }else{
                $sql5 = "update teach set TeachSubject = '$TeachSubject' where TeachID = '$TeachID'";
                $res5 = mysqli_query($conn, $sql5);
                
                if($res5){
                    $_SESSION['update'] = "<span class='text-success'>Sửa thành công</span>";
                    header('location:'.SITEURL.'admin/admin-qll.php');
                }else{
                    $_SESSION['update'] = "<span class='text-danger'>Lỗi khi sửa</span>";
                    header('location:'.SITEURL.'admin/admin-qll.php');
                }
            }
        }else{
            $_SESSION['update'] = "<span class='text-danger'>Lỗi khi sửa</span>";
            header('location:'.SITEURL.'admin/admin-qll.php');
        }
    }
?>

<?php include("template/footer.php"); ?>

<!-- đoạn xử lý menu toogle -->
<script src="JS/admin.js"></script>