<?php
	$connect = mysqli_connect('localhost','root','','Demo1');
	mysqli_set_charset($connect, "utf8");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BVND2 manager</title>
</head>
<body>
<?php
		if(isset($_POST["register"])){
			$user_name = $_POST["user_name"];
			$pass1 = $_POST["pass1"];
			$pass2 = $_POST["pass2"];
			$name = $_POST["full_name"];
			if($pass1!=$pass2){
				header("location:index.php?page=register");
				setcookie("error", "Đăng ký không thành công!", time()+1, "/","", 0);
			}
			else{
				$pass = md5($pass1);
				mysqli_query($connect,"
					insert into user (user_name,password,full_name)
					values ('$user_name','$pass','$name')
				");
				header("location:index.php?page=register");
				setcookie("success", "Đăng ký thành công!", time()+1, "/","", 0);
			}
		}

	?>
	<?php
		if(isset($_POST["dangnhap"])){
			$tk = $_POST["user_name_lg"];
			$mk = md5($_POST["passlg"]);
			$rows = mysqli_query($connect,"
				select * from user where user_name = '$tk' and password = '$mk'
			");
			$count = mysqli_num_rows($rows);
			if($count==1){
				$_SESSION["loged"] = true;
				header("location:index.php");
				setcookie("success", "Đăng nhập thành công!", time()+1, "/","", 0);
			}
			else{
				header("location:index.php");
				setcookie("error", "Đăng nhập không thành công!", time()+1, "/","", 0);
			}
			
		}
	?>



	

	<div class="container">
		<div class="row">
			<a href="index.php?page=register" class="btn btn-success">'Đăng ký'</a>
			<a href="index.php" class="btn btn-info">'Trang chủ'</a>
			<?php if(isset($_SESSION["loged"])) echo "<a href='index.php?act=logout' class='btn btn-danger'>Đăng xuất</a>"; ?>
		</div>

		<div class="row">
			<?php
				if(isset($_COOKIE["error"])){
			?>
			<div class="alert alert-danger">
			  	<strong>'Có lỗi!'</strong> <?php echo $_COOKIE["error"]; ?>
			</div>
			<?php } ?>


			<?php
				if(isset($_COOKIE["success"])){
			?>
			<div class="alert alert-success">
			  	<strong>'Chúc mừng!'</strong> <?php echo $_COOKIE["success"]; ?>
			</div>
			<?php } ?>




			
			<?php
			if(isset($_GET["page"])&&$_GET["page"]=="register")
				include "register.php";


			if(!isset($_GET["page"])){
				if(isset($_SESSION["loged"]))
					include "admin.php";
				else
					include "login.php";
			}
			?>
		</div>

	</div>
</body>
</html>