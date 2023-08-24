<div class="container col-4 border rounded bg-light mt-5" style='--bs-bg-opacity: .5;'>
  <h1 class="text-center">Đăng Nhập</h1>
  <hr>
  <form action="" method="post">
    <div class="mb-3">
      <label for="username" class="form-label">Tên đăng nhập </label>
      <input type="text" class="form-control" name="username" placeholder="Nhập tên đăng nhập của bạn ở đây" autocomplete="off" required>
      <small class="text-muted">Kiểm tra kĩ tên đăng nhập của bạn</small>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Mật khẩu </label>
      <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu của bạn ở đây" required>
      <small class="text-muted">Vui lòng không chia sẻ mật khẩu</small>
    </div>
    <div class="mb-3">
      <input type="submit" name="signin" value="Đăng nhập" class="btn btn-primary">
    </div>
  </form>
</div>
<?php session_start(); ?>
<?php include "../header.php" ?>
<?php

if (isset($_POST['signin'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "SELECT * from users WHERE username = '$username' AND password = '$password'";
  $user = mysqli_query($conn, $query);

  if (!$user) {
    die('query Failed' . mysqli_error($conn));
  }

  while ($row = mysqli_fetch_array($user)) {

    $user_id = $row['ID'];
    $user_name = $row['username'];
    $user_email = $row['email'];
    $user_password = $row['password'];
    $user_contact = $row['contact'];
    $user_department = $row['department'];
  }
  if ($user_name == $username  &&  $user_password == $password) {

    $_SESSION['id'] = $user_id;       
    $_SESSION['name'] = $user_name;   
    $_SESSION['email'] = $user_email; 
    $_SESSION['contact'] = $user_contact;
    $_SESSION['department'] = $user_department;
    
    header('location: ../dashboard.php?user_id=' . $user_id);
  } else {
    header('location: login.php'); 
  }
}
?>