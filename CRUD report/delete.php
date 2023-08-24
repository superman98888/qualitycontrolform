<?php session_start();     ?>    
<?php include "../header.php" ?>

<?php
if (!isset($_SESSION['id'])) {         
  session_destroy();
  header('location: login.php');  
}
?>
<?php
if (isset($_POST['signout'])) {
  session_destroy();
  header('location: index.php');
}
?>
<?php

$user_id = $_SESSION['id'];
?>
<?php

$reportid = $_GET['reportid'];
$sql = "DELETE FROM `report` WHERE reportID = $reportid;";
header('location: viewform.php?user_id=' . $user_id);
echo '<script type="text/javascript">
   window.onload = function () { alert("Đề xuất đã bị xóa"); } 
</script>';
$result = mysqli_query($conn, $sql);

mysqli_close($conn);

