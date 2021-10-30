<?php include("../config/constants.php");?>
<?php
    if(isset($_POST['hs_search'])){
        $key_search=$_POST['inp_search'];
        $sql= " SELECT * From users, class where UserRoll='Học sinh' AND UserRName like '%".$key_search."%' AND class.ClassID=users.UserClass";
        $query= mysqli_query($conn,$sql);
        if(mysqli_num_rows($query)>0 ){
            while($row=mysqli_fetch_assoc($query)){
                ?>
                <div class="row select_hs">
                    <div class="UserID" style="display:none;"><?php echo $row['UserID']; ?></div>
                    <div class="col-6"><?php echo $row['UserRName']; ?></div>
                    <div class="col-3"><?php echo $row['UserBirth']; ?></div>
                    <div class="col-3"><?php echo $row['ClassName']; ?></div>
                </div>
                <?php
            }
        }
    }
?>