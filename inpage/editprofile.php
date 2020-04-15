<?php
session_start();
$mysqli = new mysqli("localhost", "root", "root", "test");
if($mysqli->connect_error) {
  exit('Could not connect');
}
// echo $_GET['fname']. ' ' . $_GET['lname'] . ' ' . $_GET['age'] . ' ' . $_GET['gender'] . ' ' . $_SESSION['email'];
$sql = "update users set fname=?, lname=?, age=?, gender=? where email=?";
// echo $_GET['roomName'] . '    ' . $_GET['date'];
$stmt = $mysqli->prepare($sql);
if($stmt==false) {
	echo "Internal error";
}
$stmt->bind_param("sssss", $_GET['fname'], $_GET['lname'], $_GET['age'], $_GET['gender'], $_SESSION['email']);
// echo $stmt;
$stmt->execute();
$stmt->store_result();
// $stmt->bind_result($som);
$stmt->fetch();
$stmt->close();
echo "Changes made successfully";
?>