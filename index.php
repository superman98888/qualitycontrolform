<?php include "header.php" ?>

<h2 class="text-center mt-3">QUẢN LÍ SỰ CỐ</h2>
<hr>

<div class="container">
  <div class="row">

    <div class="col">
      <div class="card text-center">
        <div class="card-header">
          <h3 class="card-title"> Đăng Nhập </h3>
        </div>
        <div class="card-body">
          <a href="Validate function/login.php"> <input type="image" img src="Image/loginava.gif" alt="login image" width="53%" height="53%"></a>
          <p class="card-text text-muted">Đừng chia sẻ mật khẩu với bất kì ai</p>
          <a href="Validate function/login.php" class="btn btn-primary">Đăng nhập</a>                                    
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card text-center">
        <div class="card-header">
          <h3 class="card-title">Đăng Kí</h3>
        </div>
        <div class="card-body">
          <a href="Validate function/register.php"><img src="Image/registerava.png" alt="register image" width="54%" height="54%"></a>
          <p class="card-text text-muted">Luôn tạo mới mật khẩu cho mọi thứ</p>
          <a href="Validate function/register.php" class="btn btn-primary"> Đăng kí </a>
        </div>
      </div>
    </div>

  </div>
</div>

<?php include "footer.php" ?>