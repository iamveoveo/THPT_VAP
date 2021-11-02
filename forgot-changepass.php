<?php include("template/header.php"); 
  if(isset($_SESSION['MyID'])){
    header('location:'.SITEURL);
  }
?>

<?php include("template/footer.php"); ?>