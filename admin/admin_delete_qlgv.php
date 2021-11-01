<?php
 include("template/header.php"); 
?>
 <?php

// trang quanlixoagv
   //lấy id là TeachID
    $id = $_GET['UserID'];

    //2. Create SQL Query to Delete Admin
    $sql = "ALTER TABLE `users`
    ADD CONSTRAINT `mess` 
    FOREIGN KEY (`FromUserID`) 
    REFERENCES `users` (`UserID`)
    ON DELETE CASCADE;";
    
    //Execute the Query
    $result = mysqli_query($conn, $sql);

    // Check whether the query executed successfully or not
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . $conn->error;
     }
      $conn->close();
?> 