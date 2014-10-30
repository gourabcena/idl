<!DOCTYPEiiiml>
<html>
<body>
<?php
	include "db.php";
	if(!empty($_POST['cr']))
	{
		$team=$_POST['tname'];
		$u_id=$_POST['name1'];
		$sql=($con,"SELECT * from team 
