<?php
 include("template/header.php"); 
?>
 <?php

// trang quanlixoaph
   //lấy id là TeachID
    $id2 = $_GET['UserID'];

    //2. Create SQL Query to Delete Admin
    $sql2 = "DELETE FROM users WHERE UserID=$id2";
 
    //Execute the Query
    $result = mysqli_query($conn, $sql2);

    // Check whether the query executed successfully or not
    if ($conn->query($sql2) === TRUE) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . $conn->error;
     }
      $conn->close();
?> 