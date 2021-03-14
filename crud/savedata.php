<?php
$teacher_name = $_POST['sname'];
$teacher_address = $_POST['saddress'];
$teacher_deptid = $_POST['sdeptid'];
$teacher_phone = $_POST['sphone'];

$connection  = mysqli_connect("localhost","root","","teacherdatabase") or die("Connection Failed");
$sqlQuery = "INSERT INTO teachers(Name,Address,DepartmentID,Phone) VALUES ('{$teacher_name}','{$teacher_address}',{$teacher_deptid},'{$teacher_phone}')";
$result = mysqli_query($connection,$sqlQuery) or die("Query Failed");    
mysqli_close($connection);
header("Location:http://localhost/crud_html/index.html");
?>
