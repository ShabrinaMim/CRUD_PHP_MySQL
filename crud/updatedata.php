<?php

$teacher_name = $_POST['tname'];
$teacher_address = $_POST['taddress'];
$teacher_deptid = $_POST['tdeptid'];
$teacher_phone = $_POST['tphone'];
$teacher_id = $_POST['tid'];

$connection  = mysqli_connect("localhost","root","","teacherdatabase") or die("Connection Failed");
$sqlQuery = "UPDATE teachers SET Name = '{$teacher_name}',Address = '{$teacher_address}',DepartmentID = '{$teacher_deptid}',Phone = '{$teacher_phone}' WHERE ID = {$teacher_id}";
$result = mysqli_query($connection,$sqlQuery) or die("Query Failed");    
mysqli_close($connection);
?>