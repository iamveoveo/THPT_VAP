<?php
 include("template/header.php"); 
?>
 <?php

// trang quanlixoaph
   //lấy id là TeachID
    $id3 = $_GET['UserID'];

    //2. Create SQL Query to Delete Admin
    $sql3 = "DELETE FROM users WHERE UserID=$id3";
 
    //Execute the Query
    $result = mysqli_query($conn, $sql3);

    // Check whether the query executed successfully or not
    if ($conn->query($sql3) === TRUE) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . $conn->error;
     }
      $conn->close();
?> 