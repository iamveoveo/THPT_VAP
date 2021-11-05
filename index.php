<?php include("template/header.php"); ?>
<?php include("template/header-menu.php");?>

<script>var takeName="";</script>
<script>var takeRoll="Học sinh";</script>

<div id="carouselExampleCaptions" class="carousel slide banner-main" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/workbench.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <div class="container">
                <div class="carousel-caption relative" >
                <h1 class="shadow">Trường Trung học phổ thông<br> Chu Văn An</h1>
                <p style="color:balck;">Học để biết, học để làm, học để tự khẳng định mình, học để cùng chung sống. <br>
                    Thi đua Dạy tốt - Học tốt. <br>
                    Nghĩ tích cực - Học chăm ngoan - Làm việc tốt - Sống có ích. <br>
                    Thầy cô mẫu mực, học sinh tích cực.</p>
                <div class="button_section"> <a class="main_bt" href="#">Read More</a>  </div>
                
                </div>
            </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/hoc.png" class="d-block w-100" alt="">
      <div class="carousel-caption d-none d-md-block">
      <div class="relative" >
          <div class="container " style="margin-top:-100px">
              <h1 class="shadow">Trường Trung học phổ thông<br> Chu Văn An</h1>
            <h4 style="color:balck;">Xây dựng trường học thân thiện học sinh tích cực <br>
                Dân chủ - Kỷ cương – Tình thương – Trách nhiệm
            </h4>
            <div class="button_section"> <a class="main_bt" href="#">Read More</a>  </div>
            
            </div>
          </div>
            
      </div>
    </div>

    
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<style>
     h1, h2, h3, h4, h5, h6 {
     letter-spacing: 0;
     font-weight: normal;
     position: relative;
     padding: 0 0 10px 0;
     font-weight: normal;
     line-height: normal;
     color: #111111;
     margin: 0 
}
</style>

<div class="container">
    <div class="d-flex justidy-content-center">
        <h2 style="margin:50px auto;">Danh sách học sinh</h2>
    </div>
    <div class="row m-auto tree-table mb-5">
        <div class="tree col-2">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a class="btn btn-secondary h-100" data-bs-toggle="collapse" href="#collapse10" role="button" aria-expanded="false" aria-controls="collapse10">Khối 10</a>
                    <ul class="collapse" id="collapse10">
                        <?php
                            $sql1 = "select * from class where ClassGrade=10";
                            $res1 = mysqli_query($conn, $sql1);
                            if(mysqli_num_rows($res1)>0){
                                while($row1 = mysqli_fetch_assoc($res1)){
                                    ?>
                                        <li><div class="takeClass"><?php echo $row1['ClassName'];?></div></li>
                                    <?php
                                }
                            }
                        ?>
                    </ul>
                </li>
                <li class="list-group-item">
                    <a class="btn btn-secondary" data-bs-toggle="collapse" href="#collapse11" role="button" aria-expanded="false" aria-controls="collapse11">Khối 11</a>
                    <ul class="collapse" id="collapse11">
                        <?php
                            $sql1 = "select * from class where ClassGrade=11";
                            $res1 = mysqli_query($conn, $sql1);
                            if(mysqli_num_rows($res1)>0){
                                while($row1 = mysqli_fetch_assoc($res1)){
                                    ?>
                                        <li><div class="takeClass"><?php echo $row1['ClassName'];?></div></li>
                                    <?php
                                }
                            }
                        ?>
                    </ul>
                </li>
                <li class="list-group-item">
                    <a class="btn btn-secondary" data-bs-toggle="collapse" href="#collapse12" role="button" aria-expanded="false" aria-controls="collapse12">Khối 12</a>
                    <ul class="collapse" id="collapse12">
                        <?php
                            $sql1 = "select * from class where ClassGrade=12";
                            $res1 = mysqli_query($conn, $sql1);
                            if(mysqli_num_rows($res1)>0){
                                while($row1 = mysqli_fetch_assoc($res1)){
                                    ?>
                                        <li><div class="takeClass"><?php echo $row1['ClassName'];?></div></li>
                                    <?php
                                }
                            }
                        ?>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="my-table col-10">
            <ul class="list-group"  id="list-group">
                <?php
                    $sql2 = "select * from users, class where UserRoll='Học sinh' and class.ClassID=users.UserClass";
                    $res2 = mysqli_query($conn, $sql2);
                    if(mysqli_num_rows($res2)>0){
                        while($row2 = mysqli_fetch_assoc($res2)){
                            ?>
                            <li>
                                <a href="<?php echo SITEURL?>profile.php?userID=<?php echo $row2['UserID']?>">
                                    <div class="my-table-item row box-shadow">
                                        <div class="col-2"><img class="item-ava" src="images/avatar/<?php echo $row2['UserAva']; ?>" alt=""></div>
                                        <div class="item-detail col-7 flex-fill d-flex flex-column">
                                            <div class="row w-100">
                                                <div class="col-7"><b>Họ và tên: </b><?php echo $row2['UserRName']; ?></div>
                                                <div class="col-5"><b>Ngày sinh: </b><?php echo $row2['UserBirth']; ?></div>
                                            </div>
                                            <div class="row w-100">
                                                <div class="col-7"><b>Số điện thoại: </b><?php echo $row2['UserTel']; ?></div>
                                                <div class="col-5"><b>Giời tính: </b><?php echo $row2['UserGender']; ?></div>
                                            </div>
                                        </div>
                                        <div class="item-class col-2 d-flex flex-column">
                                            <div><?php echo $row2['UserRoll']; ?></div>
                                            <div><?php echo $row2['ClassName']; ?></div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <?php
                        }
                    }
                ?>         
            </ul>
        </div>
    </div>
</div>

<div class="about">
    <div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="aboutheading">
                <h2>Giới Thiệu<strong class="black"></strong></h2>
                <span>Trường THCS Chu Văn An toạ lạc tại số 115 Cống Quỳnh, P.Nguyễn Cư Trinh, Quận 1, Tp.HCM chịu sự quản lý của UBND Quận 1 trực tiếp là Phòng Giáo dục và Đào tạo Quận 1. Trường có diện tích 1.300m2,</span>
            </div>
        </div>
    </div>
    <div class="row border">
        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">
            <div class="about-box">
                <p> 
                Chức năng nhiệm vụ chính trị được giao : nâng cao chất lượng đào tạo, ứng dụng tốt công nghệ thông tin, thực hiện đổi mới công tác quản lý và giảng dạy. <br>

                Hiện nay, nhà trường có 86 cán bộ, giáo viên, công nhân viên và 1220 học sinh; có 07 tổ bộ môn. Ngoài ra, trường có 2 phòng máy vi tính, 1 phòng Lab, 2 phòng thí nghiệm Lý – Hoá – Sinh, 1 phòng ứng dụng công nghệ thông tin,  phòng bộ môn dinh dưỡng, 12 phòng học tiếng anh nâng cao, … <br>
                Tập thể sư phạm nhà trường gồm đội ngũ cán bộ quản lý, giáo viên, nhân viên yêu trẻ và tâm huyết với nghề. Trong những năm qua, nhà trường đã có các Thầy Cô giáo đạt giải thưởng cao trong các hội thi cấp Quận và Thành Phố như hội thi: “Cô giáo tài năng” (1994), “Người mẹ duyên dáng” (1995), “Viên phấn vàng”, “Trái tim người thầy”, “Giáo viên giỏi”. Là đơn vị dẫn đầu trong các hội thi về ĐDDH trong việc đổi mới phương pháp dạy và học bằng việc ứng dụng Công nghệ thông tin.</p>

                <a href="#">Đọc thêm</a>
            </div>
        </div>
        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
            <div class="about-box">
                <figure><img src="images/about.png" alt="img" /></figure>
            </div>
        </div>
    </div>
    </div>
</div>

<div class="container mt-5 ">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-8 col-lg-6">
            <!-- Section Heading-->
            <div class="section_heading text-center wow fadeInUp bold"  data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
              <h2 class="fw-bold mb-3" style="color:red;">Một số giáo viên tiêu biểu </h2>
              
              <div class="line"></div>
            </div>
          </div>
        </div>
        <div class="row">
          <?php 
            $sql28 = "select * from users where UserRoll ='Giáo viên' limit 4";
            $res28 = mysqli_query($conn, $sql28);

            if(mysqli_num_rows($res28)>0){
              while($row28 = mysqli_fetch_assoc($res28)){
                ?>
                <!-- Single Advisor-->
                <a class="col-12 col-sm-6 col-lg-3" href="<?php echo SITEURL?>profile.php?userID=<?php echo $row28['UserID'];?>">
                  <div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <!-- Team Thumb-->
                    <div class="advisor_thumb"><img src="images/avatar/<?php echo $row28['UserAva'];?>" alt="">
                    </div>
                    <!-- Team Details-->
                    <div class="single_advisor_details_info">
                      <h6><?php echo $row28['UserRName'];?></h6>
                      <p class="designation"><?php echo $row28['UserRoll'];?></p>
                    </div>
                  </div>
                </a>
                <?php
              }
            }
          ?>
        </div>
      </div>

<?php include("template/footer.php"); ?>
    
