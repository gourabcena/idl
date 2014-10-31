<!DOCTYPE html>
<html>
<body>
<head>
<title>Approval Page</title>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="demo.css" media="all" />
</head>
<body>
<div class="container">
            <div class="idl-top">
                <a href="http://idl.com" target="_blank">Home</a>
                <span>
                    <a href="http://idl.com/profile.php">
                        <strong>My Profile</strong>
                    </a>
                </span>
		<span class="right">
			 <a href="http://idl.com/logout.php">
                        <strong>Logout</strong>
                    </a>
                </span>

                <div class="clr"></div>

            </div>
			<header>
				<h1> Approval</h1>
                        </header>       


      <div  class="form">
    			<form id="contactform" action="approval.php" method="post"> 
    			<p class="contact"><label for="name">Enter the user_ID</label></p> 
    			<input id="name" name="name" placeholder="U_ID" required="" type="text"> 
<?php
	include "db.php";
	session_start();
	if(isset($_SESSION['user'])){
	//$sql="SELECT * from user WHERE u_id IN(SELECT u_id from roleuser WHERE r_id!=1 and status IS NULL)";
	$result=mysqli_query($con,"SELECT user.u_id,roleuser.r_id, user.username,user.status from roleuser INNER JOIN user ON roleuser.u_id=user.u_id WHERE roleuser.r_id!=1");
	echo "<table border='1'>
	<tr>
	<td>UserId</td>
	<td>RoleId</td>
	<td>Username</td>
	<td>Status</td>
	</tr>";
	while($row = mysqli_fetch_array($result)) {
		
  		echo "<tr>";
  		echo "<td>". $row['u_id']."</td>";
		if($row['r_id']==2)
  		{
			echo "<td>Manager</td>";
		}
		else{
			echo"<td>Contributor</td>";
		}
  		echo "<td>" . $row['username'] . "</td>"; 
		if($row['status']==0){

  			echo "<td>Not Approved</td>";
		}
		else{
			echo"<td>Approved</td>";
		}
  		echo "</tr>";
}

echo "</table>";
echo"<br><br><br><br>";
}
else{
	header('location:login.php');
	break;}
	//$sql1="UPDATE roleuser SET status=1 WHERE status IS NULL";
	//mysqli_query($con,$sql1);
	
?>
<input class="buttom" name="approve" id="approve" value="Approve" type="submit">&nbsp;&nbsp;
<input class="buttom" name="remove" id="remove" value="Remove" type="submit">
</form>
</div>
</div>
</body>
</html>
