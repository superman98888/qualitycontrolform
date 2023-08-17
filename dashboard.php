<?php session_start();       // Start the session ?>    
<?php include "header.php" ?>

<?php
if (!isset($_SESSION['id'])) {         // condition Check: if session is not set. 
  header('location: login.php');   // if not set the user is send back to login page. login.php
}
?>
<?php
if (isset($_POST['signout'])) {
  session_destroy();
  header('location: index.php');
}
?>
<div class="container col-12 border rounded mt-3">
  <h1 class=" mt-3 text-center">Xin chào,
                <strong>
                    <?php echo $_SESSION['name']; ?>
                </strong> </h1>
  <hr>
  

  <form action="" method="post">
    <button type="submit" name='signout' class=" btn btn-warning mb-3"> Đăng xuất </button>
  </form>
</div>