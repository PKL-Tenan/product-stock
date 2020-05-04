<?php
include 'config.php';
session_start();

$uname = $_SESSION['uname'];
$currentPassword = md5($_POST['current_password']);
$newPassword = md5($_POST['new_password']);
$confirmPassword = md5($_POST['confirm_new_password']);

$result = mysqli_query($conn, "SELECT * FROM admin WHERE uname = '$uname'");
$row = mysqli_fetch_array($result);
if ($currentPassword == $row["pass"]) {
	if ($newPassword == $confirmPassword) {
		mysqli_query($conn, "UPDATE admin set pass = '$newPassword' WHERE uname = '$uname'");
		$pesan = "Password Changed";
	} else {
		$pesan = "New Password is not match with Confirm Password";
	}
} else {
	$pesan = "Current Password is not correct";
}

header("location:ganti_pass.php?pesan=$pesan");
