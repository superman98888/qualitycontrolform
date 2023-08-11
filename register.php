<form action="" method="post">
<div class="col-md-6 col-md-offset-3">
	<div class="alert alert-info">
	  <strong>Trang Đăng Kí</strong>
	</div>

	<div class="panel panel-primary">
	    <div class="panel-body">
	    	<div class="form-group">
				<label for="user">Tài khoản:</label>
				<input type="text" class="form-control" name="user_name" placeholder="Nhập tên đăng ki...">
			</div>

			<div class="form-group">
				<label for="pwd">Mật khẩu:</label>
				<input type="password" class="form-control" name="pass1" placeholder="Nhập mật khẩu..." required>
			</div>

			<div class="form-group">
				<label for="pwd">Nhập lại mật khẩu:</label>
				<input type="password" class="form-control" name="pass2" placeholder="Nhập lại mật khẩu..." required>
			</div>

			<div class="form-group">
				<label for="full">Họ tên:</label>
				<input type="text" class="form-control" name="full_name" placeholder="Nhập họ và tên..." required>
			</div>

			<button type="submit" class="btn btn-default" name="register">Đăng kí</button>
	    </div>
	</div>
</div>
</form>