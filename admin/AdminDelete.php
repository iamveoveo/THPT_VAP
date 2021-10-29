<?php
include('config/constants.php');
?>
<?php
// trang quanlihocsinh
   //lấy id là manv
    $id = $_GET['TeachID'];

    //2. Create SQL Query to Delete Admin
    $sql = "DELETE FROM teach WHERE TeachID=$id";
 
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

<?php
include('footer.php');
?>