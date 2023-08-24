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
    <title>Cập nhật đề xuất</title>
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
                    <td><input type="text" name="department" id="department" class="form-control" value="<?php echo $reportRow['department'] ?>" readonly /></td>
                </tr>
                <tr>
                    <td>Vấn đề gặp phải</td>
                    <td><textarea name="problem" id="problem" class="form-control" value="<?php echo $reportRow['problem'] ?>"  ></textarea></td>
                </tr>
                <tr>
                    <td>Lĩnh vực</td>
                    <td><input type="text" name="field" id="field" class="form-control" value="<?php echo $reportRow['field'] ?>" ></td>
                </tr>
                <tr>
                    <td>Liên lạc</td>
                    <td><input type="text" name="contact" id="contact" class="form-control" value="<?php echo $reportRow['contact'] ?>"  readonly /></td>
                </tr>
                <tr>
                    <td>Ngày đề xuất</td>
                    <td><input type="date" name="reportdate" id="reportdate" class="form-control" value="<?php echo $reportRow['reportdate'] ?>" /></td>
                </tr>
                <tr>
                    <td>Người đề xuất</td>
                    <td><input type="text" name="reporter" id="reporter" class="form-control" value="<?php echo $reportRow['reporter'] ?>" readonly /></td>
                </tr>
                <tr>
                    <td>Ghi chú</td>
                    <td><input type="text" name="note" id="note" class="form-control" value="<?php echo $reportRow['note'] ?>" /></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button name="btnSave" class="btn btn-primary"><i class="fa-solid fa-floppy-disk fa-beat-fade"></i> Lưu chỉnh sửa </button>
                    </td>
                    <td colspan="2">
                        <button name="btnCancel" class="btn btn-secondary" button onclick="history.go(-1);"><i class="fa-solid fa-trash-can fa-bounce"></i> Hủy </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>



    <?php
    if (isset($_POST['btnSave'])) {
        $field = $_POST['field'];
        $problem = $_POST['problem'];
        $report_date = $_POST['reportdate'] ;
        $note = $_POST['note'];

        $sql = "UPDATE report SET field = '$field', problem = '$problem', reportdate = '$reportdate', note = '$note' WHERE  reportID = '$reportID'";


        mysqli_query($conn, $sql);


        mysqli_close($conn);

        header('location:../dashboard.php?user_id=' . $user_id);
    }
    ?>
</html>