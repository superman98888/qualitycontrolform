<?php
	$connect = mysqli_connect('localhost','root','','Demo1');
	mysqli_set_charset($connect,"utf8");
?>
<form action="" method="post">
<div class="col-md-6 col-md-offset-3">
	<div class="alert alert-info">
	  <strong>'Trang dang ki'</strong>
	</div>

	<div class="panel panel-primary">
	    <div class="panel-body">
	    	<div class="form-group">
				<label for="email">Tài khoản:</label>
				<input type="text" class="form-control" name="user_name_lg" placeholder="Nhập tên đăng ki...">
			</div>

			<div class="form-group">
				<label for="pwd">Mật khẩu:</label>
				<input type="password" class="form-control" name="passlg" placeholder="Nhập mật khẩu..." required>
			</div>

			<button type="submit" class="btn btn-default" name="dangnhap">'Đăng ki'</button>
	    </div>
	</div>
</div>
</form>