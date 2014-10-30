<!DOCTYPE html>
<html>
<body>
<title>Add</title>
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
                <span class="right">
                    <a href="http://idl.com">
                        <strong>Back to the Login page</strong>
                    </a>
                </span>
                <div class="clr"></div>

            </div>
                        <header>
                                <h1>Available Contributor</h1>
                        </header>

      <div  class="form">
                        <form id="contactform" action="ad.php" method="post">
			<p class="contact"><label for="add">Add User</label></p>
                        <input id="name" name="name" placeholder="user_id" required="" type="text">
                        <?php
                                include"db.php";
                                session_start();
                                $id=$_SESSION['u_id'];
                                $rs=mysqli_query($con,"SELECT user.u_id,roleuser.r_id, user.username from roleuser INNER JOIN user ON roleuser.u_id=user.u_id WHERE roleuser.r_id=3 AND user.status=1 AND user.u_id not IN(SELECT u_id from contributor)");
				echo "<table border='1'>
        			<tr>
        			<td>UserId</td>
        			<td>Role</td>
        			<td>Username</td>
        			</tr>";
				while($row = mysqli_fetch_array($rs)) {

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
                /*if($row['status']==0){

                        echo "<td>Not Approved</td>";
                }
                else{
                        echo"<td>Approved</td>";
                }*/
                		echo "</tr>";
				}		

				echo "</table>";
				echo"<br><br><br><br>";
				?>
				<input class="buttom" name="add" id="add" value="Add" type="submit">&nbsp;&nbsp;
				<input class="buttom" name="remove" id="remove" value="Remove" type="submit">

			</form>
		</div>
	</div>
</body>
</html>




