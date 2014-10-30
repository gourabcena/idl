<!DOCTYPE html>
<html>
<body>
<title>Team</title>
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
				<h1>Team</h1>
                        </header>
		
      <div  class="form">
			<form id="contactform" action="myteam.php" method="post">
			<?php
				include"db.php";
				session_start();
        			$id=$_SESSION['u_id'];
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
                                	echo"<td>Team ID</td>";
                                	echo "<td>". $row['team_id']."</td>";
                                	echo "</tr><tr>";
                                	echo"<td>Team Name</td>";
                                	echo "<td>" . $row['teamname'] . "</td>";
                                	echo"</tr><tr>";
                                	echo"<td>ManagerId</td>";
                                	echo "<td>" . $row['u_id'] . "</td>";
                                	echo"</tr>";
				}
				echo"</table>";
				echo"<br><br><br>";
                                echo"<input class='buttom' name='add' id='add' value='Add contributor' type='submit'>";

			}
		?>
 	 
   </form> 
</div>
</div>        
</body>
</html>
