<?php
    include("config/constants.php");
    if(isset($_POST['class-select-change'])){
        $classSelect = $_POST['class-select'];
        $MyID = $_SESSION['MyID'];
        $sql12 = "select * from teach where ClassID = '$classSelect' and Teacher_UserID = '$MyID'";
        $res12 = mysqli_query($conn, $sql12);
        
        if(mysqli_num_rows($res12)>0){
            ?>
            <label for="select-class" class="form-label">Chọn môn</label>
            <select class="form-select">
                <option value="" selected></option>
                <?php
                while($row12 = mysqli_fetch_assoc($res12)){
                    ?>
                    <option value="<?php echo $row12['TeachSubject'];?>"><?php echo $row12['TeachSubject'];?></option>
                    <?php
                }
                ?>
            </select>
            <?php
        }
    }
?>