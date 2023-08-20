<?php session_start();     ?>    
<?php include "../header.php" ?>

<?php
if (!isset($_SESSION['id'])) {         
  header('location: login.php');  
}
?>
<?php
if (isset($_POST['signout'])) {
  session_destroy();
  header('location: index.php');
}
?>
<?php

$user_id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View report list</title>

</head>

<body>

    <div class="container">
        <h1>Xem danh sách ghi nhận</h1>

        <?php

        $sql = "select * from `report`";

        $result = mysqli_query($conn, $sql);

        $data = [];
        $rowNum = 1;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[] = array(
                'rowNum' => $rowNum,
                'reportID' => $row['reportID'],
                'reporter' => $row['reporter'],
                'department' => $row['department'],
                'problem' => $row['problem'],
                'field' => $row['field'],
                'contact' => $row['contact'],
                'reportdate' => $row['reportdate'],
                'executer' => $row['executer'],
                'executedate' => $row['executedate'],
                'delaysummary' => $row['delaysummary'],
                'note' => $row['note'],
            );
            $rowNum++;
        }
        ?>

        <a href="createform.php" class="btn btn-primary">
            <i class="fas fa-plus"></i> Ghi nhận sự cố
        </a>

        <table class="table table-borderd">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Người đề xuất</th>
                    <th>Khoa</th>
                    <th>Vấn đề gặp phải</th>
                    <th>Lĩnh vực</th>
                    <th>Liên lạc</th>
                    <th>Ngày đề xuất</th>
                    <th>Người tiếp nhận</th>
                    <th>Ngày tiếp nhận</th>
                    <th>Số ngày chờ</th>
                    <th>Ghi chú</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) : ?>
                    <tr>
                        <td><?php echo $row['rowNum']; ?></td>
                        <td><?php echo $row['reportID']; ?></td>
                        <td><?php echo $row['reporter']; ?></td>
                        <td><?php echo $row['department']; ?></td>
                        <td><?php echo $row['problem']; ?></td>
                        <td><?php echo $row['field']; ?></td>
                        <td><?php echo $row['contact']; ?></td>
                        <td><?php echo $row['reportdate'];?></td>
                        <td><?php echo $row['executer'];?></td>
                        <td><?php echo $row['executedate'];?></td>
                        <td><?php echo $row['delaysummary'];?></td>
                        <td><?php echo $row['note'];?></td>
                        <td>
                            <a href="editform.php?reportid=<?php echo $row['reportID'] ?>" id="btnUpdate" class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="delete.php?reportid=<?php echo $row['reportID'] ?>" id="btnDelete" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>