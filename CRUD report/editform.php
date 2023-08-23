<?php session_start();     ?>    
<?php include "../header.php" ?>

<?php
if (!isset($_SESSION['id'])) {     
    session_destroy();    
  header('location: login.php');  
}
?>
<?php
if (isset($_POST['signout'])) {
  session_destroy();
  header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật ghi nhận</title>
</head>
<?php
    
    if(isset($_GET['reportid'])){
    $reportid = $_GET['reportid'];
       }
    $sqlSelect = "SELECT * FROM `report` WHERE reportID = '$reportid'";

    $resultSelect = mysqli_query($conn, $sqlSelect);
    $reportRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC);

    if(empty($reportRow)) {
        echo "id: $reportid không tồn tại. Vui lòng kiểm tra lại.";
        die;
    }
    ?>
    
<body>
    <div class="container">
        <h1>Cập nhật Đề xuất</h1>

        <form name="frmEdit" id="frmEdit" method="post" action="" class="form">
            <table class="table">
                <tr>
                    <td>ID</td>
                    <td><input type="text" name="reportID" id="reportID" class="form-control" value="<?php echo $reportRow['reportID'] ?>" readonly /></td>
                </tr>
                <tr>
                    <td>Khoa</td>
                    <td><input type="text" name="department" id="department" class="form-control" value="<?php echo $reportRow['department'] ?>" /></td>
                </tr>
                <tr>
                    <td>Vấn đề gặp phải</td>
                    <td><input type="text" name="problem" id="problem" class="form-control" value="<?php echo $reportRow['problem'] ?>"  /></td>
                </tr>
                <tr>
                    <td>Lĩnh vực</td>
                    <td><textarea name="field" id="field" class="form-control" value="<?php echo $reportRow['field'] ?>" ></textarea></td>
                </tr>
                <tr>
                    <td>Liên lạc</td>
                    <td><input type="text" name="contact" id="contact" class="form-control" value="<?php echo $reportRow['contact'] ?>" /></td>
                </tr>
                <tr>
                    <td>Ngày đề xuất</td>
                    <td><input type="date" name="reportdate" id="reportdate" class="form-control" value="<?php echo $reportRow['reportdate'] ?>" /></td>
                </tr>
                <tr>
                    <td>Người đề xuất</td>
                    <td><input type="text" name="reporter" id="reporter" class="form-control" value="<?php echo $reportRow['reporter'] ?>" /></td>
                </tr>
                <tr>
                    <td>Người tiếp nhận</td>
                    <td><input type="text" name="executer" id="executer" class="form-control" value="<?php echo $reportRow['executer'] ?>" /></td>
                </tr>
                <tr>
                    <td>Ngày tiếp nhận</td>
                    <td><input type="date" name="executedate" id="executedate" class="form-control" value="<?php echo $reportRow['executedate'] ?>" /></td>
                </tr>
                <tr>
                    <td>Ghi chú</td>
                    <td><input type="text" name="note" id="note" class="form-control" value="<?php echo $reportRow['note'] ?>" /></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button name="btnSave" class="btn btn-primary"><i class="fas fa-save"></i> Lưu chỉnh sửa</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>



    <?php
    if (isset($_POST['btnSave'])) {
        $reporter = $_POST['reporter'];
        $department = $_POST['department'];
        $field = $_POST['field'];
        $contact = $_POST['contact'];
        $problem = $_POST['problem'];
        $report_date = $_POST['reportdate'] ;
        $note = $_POST['note'];
        $executer = $_POST['executer'];
        $executedate = $_POST['executedate'];

        $sql = "UPDATE report SET reporter='$reporter', department='$department', field='$field', contact='$contact', problem='$problem', reportdate='$reportdate', executiondate='$reportdate', executer='$executer', note='$note' WHERE  reportID='$reportID'";


        mysqli_query($conn, $sql);


        mysqli_close($conn);

        header('location:../dashboard.php?user_id=' . $user_id);
    }
    ?>
</html>