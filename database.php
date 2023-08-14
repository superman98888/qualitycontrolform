<?php

$sname= "localhost";

$unmae= "root";

$password = "";

$db_name = "demo1";

$conn = mysqli_connect('localhost','root','','demo1');
	mysqli_set_charset($conn, "utf8");

if (!$conn) {

    echo "Connection failed!";

}