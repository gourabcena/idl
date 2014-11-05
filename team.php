<!DOCTYPE html>
<html>
<body>
<title>Team</title>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="style.css" media="all" />
	<!--link rel="stylesheet" href="styles.css" type="text/css" media="all" /--!>
    <link rel="stylesheet" type="text/css" href="demo.css" media="all" />
</head>
<body>
<div class="container">
            <div class="idl-top">
                <a href="http://idl.com"><strong>Home</strong></a>
		<span>
			<a href="http://idl.com/profile.php"><strong>My Profile</strong></a>
                <span class="right">
                    <a href="http://idl.com/logout.php">
                        <strong>log Out</strong>
                    </a>
                </span>
                <div class="clr"></div>

            </div>
			<header>
				<h1>Team</h1>
                        </header>
		<?php
		 session_start();
                        if(!isset($_SESSION['user'])){
                        
                                header('location:login.php');
                                break;
                        }
		?>
		
      <div  class="form">
			<form id="contactform" action="myteam.php" method="post">
			<?php
				include"db.php";
				session_start();
				if(isset($_SESSION['re'])){
					echo"<p class='all'>". $_SESSION['re']."<p>";
					unset($_SESSION['re']);
				}
        			$id=$_SESSION['u_id'];
				if($_SESSION['role']==2){
				$cena=mysqli_query($con,"SELECT * from user WHERE u_id=$id AND status=1");
				if(mysqli_num_rows($cena)==1){
	
					$sql1="SELECT * FROM team WHERE u_id='$id'";
        				$rs=mysqli_query($con,$sql1);
        				if(mysqli_num_rows($rs)==0){
		    				echo"<p class='contact'><label for='name'>Enter Your Team Name</label></p>"; 
    						echo"<input id='name' name='name' placeholder='Team Name' required='' type='text'>";
			   			echo"<p class='contact'><label for='name'>Enter Your Id</label></p>";
                        			echo"<input id='uid' name='uid' placeholder='Enter your id' required='' type='text'><br><br>";
						echo"<input class='buttom' name='create' id='create' value='create' type='submit'>&nbsp;&nbsp;
	   					<input class='buttom' name='clear' id='clear' value='Clear' type='reset'>";
						}
					else {
						echo"<p class='contact'><label for='name1'>My Availabe Team Information</label></p>";
						while($row = mysqli_fetch_array($rs)) {
                                	$_SESSION['t_id']=$row['team_id'];
                                	echo "<table border='1'>";
                                	echo "<tr>";
                                	echo"<th>Team ID</th>";
                                	echo "<td>". $row['team_id']."</td>";
                                	echo "</tr><tr>";
                                	echo"<th>Team Name</th>";
                                	echo "<td>" . $row['teamname'] . "</td>";
                                	echo"</tr><tr>";
                                	echo"<th>ManagerId</th>";
                                	echo "<td>" . $row['u_id'] . "</td>";
                                	echo"</tr>";
				}
				echo"</table>";
				$t_id=$_SESSION['t_id'];
				echo"<br><br><br>";
				$sql=mysqli_query($con,"select contributor.u_id,user.username,contributor.commit,contributor.edit,contributor.review from contributor INNER JOIN user on contributor.u_id=user.u_id where contributor.team_id=$t_id");
				$row1=mysqli_num_rows($sql); 
				if($row1>0){
				 echo"<p class='contact'><label for='name2'>Team Members' Performence</label></p>";
				/*echo "<table border='1'>
        			<tr>
        			<td>UserId</td>
        			<td>User Name</td>
        			<td>Commit</td>
        			<td>Edit</td>
				<td>Review</td>
        			</tr>";*/
				while($row = mysqli_fetch_array($sql)) {
					$d=$row['u_id'];
                			//echo "<tr>";
                			//echo "<td>". $row['u_id']."</td>";
					//echo "<tr>";
                                        //echo "<td>". $row['username']."</td>";
					//echo "<tr>";
                                        //echo "<td>". $row['commit']."</td>";
					//echo "<tr>";
                                        //echo "<td>". $row['edit']."</td>";
					//echo "<tr>";
                                        //echo "<td>". $row['review']."</td>";
					//echo"<tr>";
					echo"<div class='show'>
					<h2>Username : ".$row['username']."<h2>
						<p>No of Commit : ". $row['commit']."<p>
						 <p>No of Edit : ". $row['edit']."<p>
						 <p>No of Review : ". $row['review']."<p>
						<a href='http://idl.com/ad.php?id=$d&status=0' class='link'>Remove</a></div>";
					//echo"<br>";
					
					//echo"<span>".$row['username']."</span>";
				}
				//echo"</table>";
				
					
				}
				else{
					 echo"<p class='contact'><label for='msg'>No members in the team</label></p>";
				}
				echo"<br><br><br>";
                                echo"<input class='buttom' name='add' id='add' value='Add contributor' type='submit'>";

			}
		}
		else{
			$_SESSION['app']="Your Approval is not done";
			header('location:profile.php');
			//echo"<center>";
                	//echo"<p class='msg'> Access Denied !!<p>";
                	//echo"</center>";

		}
	}
	 else{
                //$_SESSION['alert']="You have not the permission to view the content";
                //header('location:profile.php');
                //break;
		echo"<center>";
                echo"<p class='msg'> Access Denied!!<p>";
                echo"</center>";

                       

        }
	
		?>
		
 	 
	<!--section id="content">
                                <ul class="column">
                            
                                    <li>
                                        <section class="block">
                                                <h2></h2>
                                                        <img src="images/mission.jpg" alt="not found" width=40 height=60/>                      <p> </p>
                                        </section>
                                    </li>
                                    <li>
                                        <section class="block">
                                                
                                                <h2>Our Vision</h2>
                                                <p> </p>
                                        </section>
                                    </li--!>

   </form> 
</div>
</div>        
</body>
</html>
