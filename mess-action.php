<?php 
    include("config/constants.php"); 
    
    if(isset($_POST['take_mess_content'])){
        if(isset($_POST['message-send'])){
            $ToUserID = $_POST['ToUserID'];
            $me = $_SESSION['MyID'];
            $MessContent = str_replace("||", "", $_POST['message-content']);

            $sql28 = "insert into mess set FromUserID='$me', ToUserID='$ToUserID', MessContent='$MessContent'";
            $res28 = mysqli_query($conn, $sql28);
        }

        $ToUserID = $_POST['ToUserID'];
        $me = $_SESSION['MyID'];

        $sql27 = "select * from mess where (ToUserID = '$ToUserID' or FromUserID = '$ToUserID') and (ToUserID='$me' or FromUserID='$me') order by MessTime desc limit 100;";
        $res27 = mysqli_query($conn, $sql27);
        
        if(mysqli_num_rows($res27)>0){
            while($row27 = mysqli_fetch_assoc($res27)){
                $MessContent = str_replace("||", "", $row27['MessContent']);
                if($row27['ToUserID']==$me){
                ?>
                    <div class="ur-mess">
                        <div class="mess-cell">
                            <?php echo $MessContent;?>
                        </div>
                    </div>
                <?php
                }else{
                ?>
                    <div class="my-mess">
                        <div class="mess-cell">
                            <?php echo $MessContent;?>
                        </div>
                    </div>
                <?php
                }
            }
            echo "||";
            $MyID = $_SESSION['MyID'];
            $dupli = [];
            $sql25 = "select * from mess where ToUserID = '$MyID' or FromUserID = '$MyID' order by MessTime desc;";
            $res25 = mysqli_query($conn, $sql25);

            if(mysqli_num_rows($res25)>0){
                while($row25 = mysqli_fetch_assoc($res25)){
                    if($row25['FromUserID']==$MyID){
                        if(!in_array($row25['ToUserID'], $dupli)){
                            $dupli[] = $row25['ToUserID'];
                        }
                    }else{ 
                        if(!in_array($row25['FromUserID'], $dupli)){
                            $dupli[] = $row25['FromUserID'];
                        }
                    }
                }
            }
            ?>
            <ul class="list-group">
                <?php
                    foreach($dupli as $x){
                        $sql26 = "select * from users where UserID='$x'";
                        $res26 = mysqli_query($conn, $sql26);

                        if(mysqli_num_rows($res26)>0){
                            $row26 = mysqli_fetch_assoc($res26);
                            ?>
                                <li class="list-group-item mess-click <?php if($ToUserID==$row26['UserID']){echo "active";}?>" id="<?php echo $row26['UserID'];?>">
                                    <div class="mess-item">
                                        <div class="mess-ava">
                                            <img src="images/avatar/<?php echo $row26['UserAva'];?>" alt="">
                                        </div>
                                        <div class="mess-name">
                                            <?php echo $row26['UserRName'];?>
                                        </div>
                                    </div>
                                </li>
                            <?php
                        }
                    }
                ?>
                
            </ul>
        <?php
        }
    }
?>