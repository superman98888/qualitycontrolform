<?php

use JetBrains\PhpStorm\Language;

 include "../header.php" ?>
<div class="container col-4 border rounded bg-light mt-5" style='--bs-bg-opacity: .5;'>
  <h1 class="text-center">Đăng Kí</h1>
  <hr>
  <form action="" method="post">
    <!-- <div id="warningModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">THÔNG BÁO</h4>
      </div>
      <div class="modal-body">
        <p>Tên hoặc email của bạn đã có người sử dụng. Vui lòng chọn tên hoặc email khác</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div> -->
    <div class="mb-3">
      <label for="username" class="form-label">Tên</label>
      <input type="text" class="form-control" name="username" placeholder="Nhập tên bạn ở đây" autocomplete="off" required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label"> Email </label>
      <input type="email" class="form-control" name="email" placeholder="Nhập Email của bạn ở dây" autocomplete="off" required>
      <small class="text-muted">Mỗi tài khoản có 1 email riêng biệt và dộc nhất</small>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Mật khẩu </label>
      <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu của bạn ở đây" required>
      <small class="text-muted">Vui lòng không chia sẻ mật khẩu</small>
    </div>
    <div class="mb-3">
      <label for="contact" class="form-label"> Liên lạc </label>
      <input type="text" class="form-control" name="contact" placeholder="Nhập chi tiết phương thức liên lạc của bạn ở dây" autocomplete="off" required>
    </div>
    <div class="mb-3">
      <label for="department" class="form-label"> Khoa </label>
      <input type="text" class="form-control" name="department" placeholder="Nhập tên Khoa của bạn ở dây" autocomplete="off" required>
    </div>
    <div class="mb-3">
      <label for="field" class="form-label"> Lĩnh vực </label>
      <input type="text" class="form-control" name="field" placeholder="Nhập lĩnh vực của bạn ở dây" autocomplete="off" required>
    </div>
    <div class="mb-3">
      <input type="submit" name="signup" value="Đăng kí" class="btn btn-primary">
    </div>
  </form>
</div>
<!-- <script type="application/javascript">
  $('#warningModal').modal({ show: false});
    if($warningModal == true){
      $('#warningModal').modal({ show: true});
      location.href = location.href;
      $warningModal = false;
    }
</script> -->
<?php
if (isset($_POST['signup'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $department = $_POST['department'];
  $field = $_POST['field'];
  $contact = $_POST['contact'];

  $check = "SELECT * FROM users WHERE email = '$email' OR username = '$username'";
  $rs = mysqli_query($conn,$check);
  $data = mysqli_fetch_array($rs, MYSQLI_NUM);

if($data[0] > 1) {

      $warningModal = true;

}else{

  $query = "INSERT INTO users(username, email, password, contact, department, field) VALUES('{$name}','{$email}','{$password}','{$contact}','{$department}','{$field}')";
  $addUser = mysqli_query($conn, $query);

  if (!$addUser) {
    echo "Something went wrong" . mysqli_error($conn);
  } else {
    header('location: login.php');
  }
}
}
?>