<div class="container col-4 border rounded bg-light mt-5" style='--bs-bg-opacity: .5;'>
  <h1 class="text-center">Đăng Kí</h1>
  <hr>
  <form action="" method="post">
    <div class="mb-3">
      <label for="name" class="form-label">Tên</label>
      <input type="text" class="form-control" name="name" placeholder="Nhập tên bạn ở đây" autocomplete="off" required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email </label>
      <input type="email" class="form-control" name="email" placeholder="Nhập Email của bạn ở dây" autocomplete="off" required>
      <small class="text-muted">Email của bạn an toàn với chúng tôi</small>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Mật khẩu </label>
      <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu của bạn ở đây" required>
      <small class="text-muted">Vui lòng không chia sẻ mật khẩu</small>
    </div>
    <div class="mb-3">
      <input type="submit" name="signup" value="Đăng kí" class="btn btn-primary">
    </div>
  </form>
</div>
<?php include "../header.php" ?>
<?php
if (isset($_POST['signup'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = "INSERT INTO users(username,email,password) VALUES('{$name}','{$email}','{$password}')";
  $addUser = mysqli_query($conn, $query);

  if (!$addUser) {
    echo "Something went wrong" . mysqli_error($conn);
  } else {
    header('location: login.php');
  }
}
?>