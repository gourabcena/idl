<!DOCTYPE html>
<html>
<body>
<?php
	session_start();
	session_destroy();
	//unset($_session['user']);
	header('location:index.php');
?>
