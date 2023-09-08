<?php session_start();     ?>    
<?php include "../header.php" ?>
<?php $user_id = $_SESSION['id']; ?>
<?php
// if (isset($_POST['signout'])) {
//   session_destroy();
//   header('location: index.php');
// }
// if (!isset($_SESSION['id'])) {
//     session_destroy();
//     header('location: ../index.php');
// }else {
// 	if (isset($_SESSION['id'])) {
// 		$roleid = $_SESSION['role_ID'];
// 		if ($roleid != '15') {
// 			header('location: ../dashboard.php?user_id=' . $user_id);
//     echo '<script type="text/javascript">
//        window.onload = function () { alert("Bạn không đủ quyền truy cập website này"); } 
//   </script>';
// 		}
// 	} 
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View permission</title>
</head>

<body>

    <div class="container">
        <h1>Danh sách quyền cho user</h1>

        <?php

        $sql = "SELECT users.username, permission.permission_desc, users-permissions.userID
        FROM users
        INNER JOIN Customers ON Orders.CustomerID = Customers.CustomerID
        INNER JOIN Shippers ON Orders.ShipperID = Shippers.ShipperID";

        $result = mysqli_query($conn, $sql);

        $data = [];
        $rowNum = 1;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[] = array(
                'rowNum' => $rowNum,
                'username' => $row['username'],
                'permission_desc' => $row['permission_desc'],
            );
            $rowNum++;
        }
        ?>

        <table class="table table-borderd">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Người dùng</th>
                    <th>Quyền truy cập</th>
                    <th>Thao tác</th>
                    <td><input type="checkbox"></td>
                        <td>hoge</td>
                        <td>hoge@hoge.com</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>foo</td>
                        <td>foo@foo.com</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" disabled></td>
                        <td>bar</td>
                        <td>bar@bar.com</td>
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