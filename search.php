<?php
include("template/header.php");
include("template/header-menu.php");
?>
<div class="back">
    <div class="container">
        <div class="search mb-4 justify-content-center">
            <div class="w-50 d-flex">
                <input type="text" class="searchTerm" placeholder="Bạn đang tìm kiếm học sinh nào?">
                <button type="submit" class="searchButton">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
        <div class="row m-auto">
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
                                        <li><a href="#"><?php echo $row1['ClassName'];?></a></li>
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
                                        <li><a href="#"><?php echo $row1['ClassName'];?></a></li>
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
                                        <li><a href="#"><?php echo $row1['ClassName'];?></a></li>
                                    <?php
                                }
                            }
                        ?>
                        </ul>
                    </li>
                </ul>
                <ul class="list-roll">
                    <li class="list-roll-item col-5"><div class="take-roll text-light">Học sinh</div></li>
                    <li class="list-roll-item col-6"><div class="take-roll text-light">Giáo Viên</div></li>
                    <li class="list-roll-item col-7"><div class="take-roll text-light">Phụ huynh</div></li>
                </ul>
            </div>
            <div class="my-table col-10">
                <ul class="list-group">
                    <?php
                        $sql2 = "select * from users, class where UserRoll='Học sinh' and class.ClassID=users.UserClass";
                        $res2 = mysqli_query($conn, $sql2);
                        if(mysqli_num_rows($res2)>0){
                            while($row2 = mysqli_fetch_assoc($res2)){
                                ?>
                                <li>
                                    <a href="<?php echo SITEURL?>profile.php?userID=<?php echo $row2['UserID'];?>&userRoll=<?php echo $row2['UserRoll'] ?>">
                                        <div class="my-table-item row box-shadow">
                                            <div class="col-2"><img class="item-ava" src="images/<?php echo $row2['UserAva']; ?>" alt=""></div>
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
</div>
<?php include("template/footer.php"); ?>