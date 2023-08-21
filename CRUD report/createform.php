<?php session_start();     ?>    
<?php include "../header.php" ?>

<?php
if (!isset($_SESSION['id'])) {         
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

// if ($user_id !== "") {
	
//   $conn = mysqli_connect('localhost','root','','demo1');
// 	$query = mysqli_query($conn, "SELECT username,
// 	department, field, contact  FROM users WHERE ID ='$user_id'");

// 	$row = mysqli_fetch_assoc($query);

//     $user_name = $row['username'];
//     $user_contact = $row['contact'];
//     $user_department = $row['department'];
//     $user_field = $row['field'];

// }else{
//   session_destroy();
//   header('location: index.php');
// }
?>
<?php
    if(false){
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
      <input type="text" class="form-control" name="field" placeholder="" autocomplete="on" readonly value = "<?php echo($user_field) ;?>">
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
    <div class="mb-3">
      <input type="submit" name="send" value="Gửi báo cáo" class="btn btn-primary">
    </div>
    <div class="mb-3">
      <input type="reset" name="cancel" value="Hủy" class="btn btn-secondary">
    </div>
  </form>
</div> 
<?php
    }
    ?>
    <div class="container col-4 border rounded bg-light mt-5" style='--bs-bg-opacity: .5;'>
  <h1 class="text-center"> Phiếu ghi nhận sự cố </h1>
  <hr>
  <form action="" method="post">
    <div class="mb-3">
      <label for="department" class="form-label"> Khoa </label>
      <input type="text" class="form-control" name="department" placeholder="" autocomplete="on" required >
    </div> 
    <div class="mb-3">
      <label for="problem" class="form-label"> Vấn đề gặp phải </label>
      <input type="text" class="form-control" name="problem" placeholder="Hãy nhập chi tiết vấn đề bạn gặp phải ở đây" autocomplete="off" required>
    </div>
    <div class="mb-3">
      <label for="field" class="form-label"> Lĩnh vực </label>
      <input type="text" class="form-control" name="field" placeholder="" autocomplete="on" required >
    </div> 
    <div class="mb-3">
      <label for="contact" class="form-label"> Liên lạc </label>
      <input type="text" class="form-control" name="contact" placeholder="" autocomplete="off" required >
    </div>
    <div class="mb-3">
      <label for="reportdate" class="form-label"> Ngày đề xuất </label>
      <input type="date" class="form-control" name="reportdate" placeholder="" autocomplete="on" required>
    </div>
    <div class="mb-3">
      <label for="reporter" class="form-label"> Người đề xuất </label>
      <input type="text" class="form-control" name="reporter" placeholder="" autocomplete="off" required >
    </div> 
    <div class="mb-3">
      <label for="executer" class="form-label"> Người tiếp nhận </label>
      <input type="text" class="form-control" name="executer" placeholder="" autocomplete="off" >
    </div> 
    <div class="mb-3">
      <label for="executedate" class="form-label"> Ngày tiếp nhận </label>
      <input type="date" class="form-control" name="executedate" placeholder="" autocomplete="off">
    </div>
    <div class="mb-3">
      <label for="delaysummary" class="form-label"> Số ngày chờ </label>
      <input type="number" class="form-control" name="delaysummary" placeholder="" autocomplete="off">
    </div>
    <div class="mb-3">
      <label for="note" class="form-label"> Ghi chú </label>
      <input type="text" class="form-control" id ="note" name="note" placeholder="" autocomplete="off">
    </div>
    <div class="mb-3">
      <input type="submit" name="send" value="Đề xuất" class="btn btn-primary">
    </div>
    <div class="mb-3">
      <input type="reset" name="cancel" value="Hủy" class="btn btn-secondary">
    </div>
  </form>
</div> 
<?php
if (isset($_POST['send'])) {
  $reporter = $_POST['reporter'];
  $department = $_POST['department'];
  $field = $_POST['field'];
  $contact = $_POST['contact'];
  $problem = $_POST['problem'];
  $report_date = $_POST['reportdate'] ;
  $note = $_POST['note'];
  $executer = $_POST['executer'];
  $executedate = $_POST['executedate'];
  $delaysummary = $executedate->diff($report_date);

  $query = "INSERT INTO report(department, problem, field, contact, reportdate, reporter, executer, executedate, delaysummary, note) VALUES('{$department}', '{$problem}', '{$field}', '{$contact}', '{$report_date}', '{$reporter}', '{$executer}','{$executedate}','{$delaysummary}', '{$note}')";
  $addReport = mysqli_query($conn, $query);

  if (!$addReport) {
    echo "Something went wrong" . mysqli_error($conn);
  } else {
    header('location: ../dashboard.php?user_id=' . $user_id);
    echo '<script type="text/javascript">
       window.onload = function () { alert("Sự cố đã được ghi nhận"); } 
  </script>';
  }
}
?>

