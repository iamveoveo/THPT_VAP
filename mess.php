<?php include("template/header.php"); ?>
<?php include("template/header-menu.php"); ?>
<?php if($_SESSION['MyRoll']=="Học sinh"){header('location:'.SITEURL);} ?>

<div class="back">
    <div class="container mess-container">
        <div class="row h-100">
            <div class="col-3 mess-list">
                <?php
                    $MyID = $_SESSION['MyID'];
                    $dupli = [];
                    if(isset($_GET['newMess'])){
                        $dupli[] = $_GET['newMess'];
                    }
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
                                    <li class="list-group-item mess-click <?php if(isset($_GET['newMess'])){if($_GET['newMess']==$row26['UserID']){echo "active";}}?>" id="<?php echo $row26['UserID'];?>">
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
            </div>
            <div class="col-9 mess">
                <div class="mess-content">
                    <?php
                    if(isset($_GET['newMess'])){
                        $ToUserID = $_GET['newMess'];
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
                        }
                    }
                    ?>
                </div>
                <div class="mess-send">
                    <form id="mess-form" action="" class="w-100">
                        <input type="hidden" name="ToUserID" value="<?php if(isset($_GET['newMess'])){echo $_GET['newMess'];}?>">
                        <input type="text" name="message-content" id="message-input" autocomplete="off" placeholder="nhập tin nhắn">
                        <button type="submit" name="message-send" id="send"><i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("template/footer.php"); ?>
<script>
    $(document).ready(function(){
        setInterval(function(){
            $.ajax({
                url: 'mess-action.php',
                type: 'POST',
                method: 'POST',
                data: {
                    ToUserID: $('[name="ToUserID"]').val(),
                    take_mess_content: ""
                },
                success: function(data){
                    data = data.split("||");
                    $('.mess-content').html(data[0]);
                    $('.mess-list').html(data[1]);
                }
            })
        }, 3000);
    })
</script>