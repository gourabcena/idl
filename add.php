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
                <a href="http://idl.com"><strong>Home</strong></a>
		<span><a href="http://idl.com/profile.php"><strong>My Profile</strong></a></span>
                <span><a href="http://idl.com/team.php"><strong>My Team</strong></a></span>
                <span class="right">
                    <a href="http://idl.com/logout.php">
                        <strong>Log Out</strong>
                    </a>
                </span>
                <div class="clr"></div>

            </div>
                        <header>
                                <h1>Available Contributors</h1>
                        </header>
		 <?php
                 session_start();
                        if(!isset($_SESSION['user'])){

                                header('location:login.php');
                                break;
                        }
                ?>

      <div  class="form">
                        <form id="contactform" action="ad.php" method="post">
			<!--p class="contact"><label for="add">Add or Remove User</label></p>
                        <input id="name" name="name" placeholder="user_id" required="" type="text"><br><br--!>
                        <?php
                                include"db.php";
                                session_start();
				if($_SESSION['role']==2){
                                $id=$_SESSION['u_id'];
				if(isset($_SESSION['re'])){
					   echo "<p class='all'>".$_SESSION['re']."<p>";
					unset($_SESSION['re']);
				}
				 if(isset($_SESSION['er'])){
                                        echo "<p class='all'>".$_SESSION['er']."<p>";
                                        unset($_SESSION['er']);
                                }
                                $rs=mysqli_query($con,"SELECT user.u_id,roleuser.r_id, user.username, user.name, user.email, user.drupal, user.phone from roleuser INNER JOIN user ON roleuser.u_id=user.u_id WHERE roleuser.r_id=3 AND user.status=1 AND user.u_id not IN(SELECT u_id from contributor)");
				if(mysqli_num_rows($rs)>0){
				/*echo "<table border='1'>
        			<tr>
        			<td>UserId</td>
        			<td>Role</td>
        			<td>Username</td>
        			</tr>";*/
				while($row = mysqli_fetch_array($rs)) {
				
				$i=$row['u_id'];
				echo"<div class= 'show'>
                                        <h2>User Name: ".$row['username']."<h2>
					<p> Name: ".$row['name']."<p>
					<p>Email: ".$row['email']."<p>
					<p>Drupal Link: ".$row['drupal']."<p>
					<p>Phone no: ".$row['phone']."<p>                
				<p><a href='http://idl.com/ad.php?id=$i&status=1'class='link'>Add</a><p></div>";
				echo"<br>";

                		/*echo "<tr>";
                		echo "<td>". $row['u_id']."</td>";
                		if($row['r_id']==2)
                		{
                        		echo "<td>Manager</td>";
                		}
                		else{
                        		echo"<td>Contributor</td>";
                		}
                		echo "<td>" . $row['username'] . "</td>";
                		echo "</tr>";*/
				}		

				//echo "</table>";
				}
				else{
					echo"<p class='contact'><label for='add1'>No contributor is available</label></p>";
				}
				echo"<br><br><br><br>";
				}
			 else{
                	//$_SESSION['alert']="You have not the permission to view the content";
                	//header('location:profile.php');
                	//break;
			echo"<center>";
                	echo"<p class='msg'> Access Denied !!<p>";
                	echo"</center>";

        		}

			?>
				
				<!--input class="buttom" name="add" id="add" value="Add" type="submit">&nbsp;&nbsp;
				<input class="buttom" name="remove" id="remove" value="Remove" type="submit"--!>

			</form>
		</div>
	</div>
</body>
</html>




