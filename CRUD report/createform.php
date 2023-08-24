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

if ($user_id !== "") {
	
  $conn = mysqli_connect('localhost','root','','demo1');
	$query = mysqli_query($conn, "SELECT username,
	department, contact  FROM users WHERE ID ='$user_id'");

	$row = mysqli_fetch_assoc($query);

    $user_name = $row['username'];
    $user_contact = $row['contact'];
    $user_department = $row['department'];

}else{
  session_destroy();
  header('location: index.php');
}
?>
<?php
    ?>
<div class="container col-4 border rounded bg-light mt-5" style='--bs-bg-opacity: .5;'>
  <h1 class="text-center"> Phiếu ghi nhận sự cố </h1>
  <hr>
  <form action="" method="post">
    <div class="mb-3">
      <label for="username" class="form-label"> Người đề xuất </label>
      <input type="text" class="form-control" name="username" placeholder="" autocomplete="off" readonly 
      value = "<?php echo($user_name) ;?>" >
    </div>
    <div class="mb-3">
      <label for="name" class="form-label"> Khoa </label>
      <input type="text" class="form-control" name="department" placeholder="" autocomplete="on" readonly 
       value = "<?php echo($user_department) ;?> 
        ">
    </div> 
    <div class="mb-3">
      <label for="field" class="form-label"> Lĩnh vực </label>
      <input type="text" class="form-control" name="field" placeholder="" autocomplete="on" required >
    </div>
    <div class="mb-3">
      <label for="problem" class="form-label"> Vấn đề gặp phải </label>
      <input type="text" class="form-control" name="problem" placeholder="Hãy nhập chi tiết vấn đề bạn gặp phải ở đây" autocomplete="off" required>
    </div>
    <div class="mb-3">
      <label for="reportdate" class="form-label"> Ngày đề xuất </label>
      <input type="date" class="form-control" name="reportdate" placeholder="" autocomplete="off" required>
    </div>
       <div class="mb-3">
      <label for="contact" class="form-label"> Liên lạc </label>
      <input type="text" class="form-control" name="contact" placeholder="" autocomplete="off" readonly value = "<?php echo($user_contact) ;?>">
    </div>
    <div class="mb-3">
      <label for="note" class="form-label"> Ghi chú </label>
      <input type="text" class="form-control" id ="note" name="note" placeholder="" autocomplete="off">
    </div>
      <td colspan="2">
        <button name="btnSend" class="btn btn-primary"><i class="fa-solid fa-floppy-disk fa-beat-fade"></i> Gửi báo cáo </button>
      </td>
      <td colspan="2">
        <button name="btnCancel" class="btn btn-secondary" button onclick="history.go(-1);"><i class="fa-solid fa-trash-can fa-bounce"></i> Hủy </button>
      </td>
  </form>
</div> 
<?php
if (isset($_POST['btnSend'])) {
  $field = $_POST['field'];
  $contact = $_POST['contact'];
  $problem = $_POST['problem'];
  $report_date = $_POST['reportdate'];
  $note = $_POST['note'];

  $query = "INSERT INTO report(department, problem, field, contact, reportdate, reporter, note) VALUES('{$user_department}', '{$problem}', '{$field}', '{$user_contact}', '{$report_date}', '{$user_name}','{$note}')";
  $addReport = mysqli_query($conn, $query);

  if (!$addReport) {
    echo "Something went wrong" . mysqli_error($conn);
  } else {
    header('location: viewform.php?user_id=' . $user_id);
    echo '<script type="text/javascript">
       window.onload = function () { alert("Sự cố đã được ghi nhận"); } 
  </script>';
  }
}
?>

