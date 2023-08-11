<form action="" method="post">
<div class="col-md-6 col-md-offset-3">
	<div class="alert alert-info">
	  <strong>Trang admin</strong>
	</div>

	<div class="container">
		<div class="row">
			<a href="index.php?page=register" class="btn btn-success">Đăng kí</a>
			<a href="index.php" class="btn btn-info">Trang chủ</a>
			<?php if(isset($_SESSION["loged"])) echo "<a href='index.php?act=logout' class='btn btn-danger'>Đăng xuất</a>"; ?>
		</div>
	