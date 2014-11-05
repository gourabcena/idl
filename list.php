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
                <a href="http://idl.com">Home</a>
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
    			<form action="approval.php" method="post"> 
    			<!--p class="contact"><label for="name">Enter the user_ID</label></p--!> 
    			<!--input id="name" name="name" placeholder="U_ID" required="" type="text"--!> 
			<br>
<?php
	include "db.php";
	session_start();
	if(isset($_SESSION['user'])){
	if(isset($_SESSION['msg'])){
		//echo $_SESSION['msg'];
		
		echo"<p class='all'>".$_SESSION['msg']."<p><br>";
		unset($_SESSION['msg']);
		echo"<br>";
	}
	if($_SESSION['role']==1){
	//$sql="SELECT * from user WHERE u_id IN(SELECT u_id from roleuser WHERE r_id!=1 and status IS NULL)";
		$result=mysqli_query($con,"SELECT user.u_id,roleuser.r_id, user.username,user.status from roleuser INNER JOIN user ON roleuser.u_id=user.u_id WHERE roleuser.r_id!=1");
		echo "<table border='1' align='center'>
		<tr>
		<th>Role</th>
		<th>Username</th>
		<th>Status</th>
		<th>Action</th>
		</tr>";
		while($row = mysqli_fetch_array($result)) {
		
  		echo "<tr>";
  		//echo "<td>". $row['u_id']."</td>";
		$i=$row['u_id'];
		if($row['r_id']==2)
  		{
			echo "<td>Manager</td>";
		}
		else{
			echo"<td>Contributor</td>";
		}
  		echo "<td>" . $row['username'] . "</td>"; 
		$s=$row['status'];
		if($row['status']==0){

  			echo "<td>Pending</td>";
		}
		if($row['status']==1){
			echo"<td>Approved</td>";
		}
		if($row['status']==2){
                        echo"<td>Rejected</td>";
                }
		/*if($row['status']==0){
		echo "<td><a href='http://idl.com/approval.php?u_id=$i&status=$s'>Add</a></td>";
		}*/
		if($row['status']==1){
			echo "<td><a href='http://idl.com/approval.php?u_id=$i&status=$s' class='link'>Remove</a></td>";
		}
		if($row['status']==0){
                echo "<td><a href='http://idl.com/approval.php?u_id=$i&status=$s' class='link'>Add</a></td>";
                }
                if($row['status']==2){
                        echo "<td>No Action is Required</td>";
                }

  		echo "</tr>";
	}

	echo "</table>";
	echo"<br><br><br><br>";
	}
	else{
		 echo"<center>";
        	echo"<p class='msg'> Access Denied<p>";
        	echo"</center>";
	
		//$_SESSION['alert']="You have not the permission to view the content";
		//header('location:profile.php');
		//break;
	}
}
else{
	header('location:login.php');
                break;
	}
	//$sql1="UPDATE roleuser SET status=1 WHERE status IS NULL";
	//mysqli_query($con,$sql1);
	
?>
<!--input class="buttom" name="approve" id="approve" value="Approve" type="submit">&nbsp;&nbsp;
<input class="buttom" name="remove" id="remove" value="Remove" type="submit"--!>
</form>
</div>
</div>
</body>
</html>
