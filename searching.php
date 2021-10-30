<?php
    include("config/constants.php");

    if(isset($_POST['search'])){
        $takeRoll = $_POST['takeRoll'];
        $takeName = $_POST['takeName'];
        $takeClass = $_POST['takeClass'];

        if($takeClass==""){
            if($takeRoll=="Giáo viên"){
                $sql6 = "select UserID, UserName, UserRName, UserPassword, UserEmail, UserTel, UserAdd, UserGender, UserBirth, UserAva, UserCode, UserRoll, UserParent, ClassName from users, class, teach where UserRoll='Giáo viên' AND users.UserID = teach.Teacher_UserID and teach.ClassID = class.ClassID and UserRName like '%".$takeName."%'";
            }
            else if($takeRoll=="Học sinh"){
                $sql6 = "select UserID, UserName, UserRName, UserPassword, UserEmail, UserTel, UserAdd, UserGender, UserBirth, UserAva, UserCode, UserRoll, UserParent, ClassName from users, class where UserRoll='Học sinh' AND users.UserClass = class.ClassID and UserRName like '%".$takeName."%'";
            }
            else if($takeRoll=="Phụ huynh"){
                $sql6 = "select users.UserID, users.UserName, users.UserRName, users.UserPassword, users.UserEmail, users.UserTel, users.UserAdd, users.UserGender, users.UserBirth, users.UserAva, users.UserCode, users.UserRoll, users.UserParent, ClassName from users, class, users as users1 where users.UserRoll='Phụ huynh' AND users.UserID = users1.UserParent and users1.UserClass = class.ClassID and users.UserRName like '%".$takeName."%'";
            }
            else{
                $sql6 = "select UserID, UserName, UserRName, UserPassword, UserEmail, UserTel, UserAdd, UserGender, UserBirth, UserAva, UserCode, UserRoll, UserParent, ClassName from users, class where UserRoll='Học sinh' AND users.UserClass = class.ClassID and UserRName like '%".$takeName."%'
                UNION
                select UserID, UserName, UserRName, UserPassword, UserEmail, UserTel, UserAdd, UserGender, UserBirth, UserAva, UserCode, UserRoll, UserParent, ClassName from users, class, teach where UserRoll='Giáo viên' AND users.UserID = teach.Teacher_UserID and teach.ClassID = class.ClassID and UserRName like '%".$takeName."%'
                UNION
                select users.UserID, users.UserName, users.UserRName, users.UserPassword, users.UserEmail, users.UserTel, users.UserAdd, users.UserGender, users.UserBirth, users.UserAva, users.UserCode, users.UserRoll, users.UserParent, ClassName from users, class, users as users1 where users.UserRoll='Phụ huynh' AND users.UserID = users1.UserParent and users1.UserClass = class.ClassID and users.UserRName like '%".$takeName."%'";
            }
        }else{
            if($takeRoll=="Giáo viên"){
                $sql6 = "select UserID, UserName, UserRName, UserPassword, UserEmail, UserTel, UserAdd, UserGender, UserBirth, UserAva, UserCode, UserRoll, UserParent, ClassName from users, class, teach where UserRoll='Giáo viên' AND users.UserID = teach.Teacher_UserID and teach.ClassID = class.ClassID and UserRName like '%".$takeName."%' and ClassName = '$takeClass'";
            }
            else if($takeRoll=="Học sinh"){
                $sql6 = "select UserID, UserName, UserRName, UserPassword, UserEmail, UserTel, UserAdd, UserGender, UserBirth, UserAva, UserCode, UserRoll, UserParent, ClassName from users, class where UserRoll='Học sinh' AND users.UserClass = class.ClassID and UserRName like '%".$takeName."%' and ClassName = '$takeClass'";
            }
            else if($takeRoll=="Phụ huynh"){
                $sql6 = "select users.UserID, users.UserName, users.UserRName, users.UserPassword, users.UserEmail, users.UserTel, users.UserAdd, users.UserGender, users.UserBirth, users.UserAva, users.UserCode, users.UserRoll, users.UserParent, ClassName from users, class, users as users1 where users.UserRoll='Phụ huynh' AND users.UserID = users1.UserParent and users1.UserClass = class.ClassID and users.UserRName like '%".$takeName."%' and ClassName = '$takeClass'";
            }
            else{
                $sql6 = "select UserID, UserName, UserRName, UserPassword, UserEmail, UserTel, UserAdd, UserGender, UserBirth, UserAva, UserCode, UserRoll, UserParent, ClassName from users, class where UserRoll='Học sinh' AND users.UserClass = class.ClassID and UserRName like '%".$takeName."%' and ClassName = '$takeClass'
                UNION
                select UserID, UserName, UserRName, UserPassword, UserEmail, UserTel, UserAdd, UserGender, UserBirth, UserAva, UserCode, UserRoll, UserParent, ClassName from users, class, teach where UserRoll='Giáo viên' AND users.UserID = teach.Teacher_UserID and teach.ClassID = class.ClassID and UserRName like '%".$takeName."%' and ClassName = '$takeClass'
                UNION
                select users.UserID, users.UserName, users.UserRName, users.UserPassword, users.UserEmail, users.UserTel, users.UserAdd, users.UserGender, users.UserBirth, users.UserAva, users.UserCode, users.UserRoll, users.UserParent, ClassName from users, class, users as users1 where users.UserRoll='Phụ huynh' AND users.UserID = users1.UserParent and users1.UserClass = class.ClassID and users.UserRName like '%".$takeName."%' and ClassName = '$takeClass'";
            }
        }
        $res6 = mysqli_query($conn, $sql6);

        if(mysqli_num_rows($res6)>0){
            while($row6 = mysqli_fetch_assoc($res6)){
                ?>
                <li>
                    <a href="<?php echo SITEURL?>profile.php?userID=<?php echo $row6['UserID'];?>">
                        <div class="my-table-item row box-shadow">
                            <div class="col-2"><img class="item-ava" src="images/<?php echo $row6['UserAva']; ?>" alt=""></div>
                            <div class="item-detail col-7 flex-fill d-flex flex-column">
                                <div class="row w-100">
                                    <div class="col-7"><b>Họ và tên: </b><?php echo $row6['UserRName']; ?></div>
                                    <div class="col-5"><b>Ngày sinh: </b><?php echo $row6['UserBirth']; ?></div>
                                </div>
                                <div class="row w-100">
                                    <div class="col-7"><b>Số điện thoại: </b><?php echo $row6['UserTel']; ?></div>
                                    <div class="col-5"><b>Giời tính: </b><?php echo $row6['UserGender']; ?></div>
                                </div>
                            </div>
                            <div class="item-class col-2 d-flex flex-column">
                                <div><?php echo $row6['UserRoll']; ?></div>
                                <div><?php echo $row6['ClassName']; ?></div>
                            </div>
                        </div>
                    </a>
                </li>
            <?php
            }
        }else{
            echo "
            <div class='my-table-item row box-shadow d-flex justify-content-center'>
                Không tìm thấy kêt quả nào
            </div>";
        }
    }
?>