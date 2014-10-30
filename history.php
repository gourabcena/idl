<!DOCTYPE html>
<html>
<body>
<title>contributor</title>
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
                                <h1>Your Contribution</h1>
                        </header>
		<div  class="form">
                        <form id="contactform" action="his.php" method="post">
			<?php
				include"db.php";
				session_start();
				$u=$_SESSION['u_id'];
				$sql=mysqli_query($con,"select contributor.u_id,team.teamname,contributor.edit,contributor.review,contributor.commit from contributor INNER JOIN team WHERE contributor.team_id=team.team_id AND contributor.u_id=$u");
				while($row = mysqli_fetch_array($sql)) {
                                //$_SESSION['u_id']=$row['u_id'];
                                echo "<table border='1'>";
                                echo "<tr>";
                                echo"<td>User ID</td>";
                                echo "<td>". $row['u_id']."</td>";
                                echo "</tr><tr>";
				echo"<td>Team Name</td>";
                                echo "<td>". $row['teamname']."</td>";
                                echo "</tr><tr>";
				echo"<td>No of Edit</td>";
                                echo "<td>". $row['edit']."</td>";
                                echo "</tr><tr>";
				echo"<td>No of Review</td>";
                                echo "<td>". $row['review']."</td>";
                                echo "</tr><tr>";
				echo"<td>No of Commit</td>";
                                echo "<td>". $row['commit']."</td>";
                                echo "</tr>";
				}
				echo"</table>";
				echo"<br><br><br>";
			?>
			<p class="contact"><label for="name">Change your edit</label></p>
                        <input id="edit" name="edit" placeholder="no" type="number" min="1" max="100">
                        <p class="contact"><label for="email">Change your review</label></p>
                        <input id="review" name="review" placeholder="no" type="number" min="1" max="100">
                        <p class="contact"><label for="username">Change your commit</label></p>
                        <input id="commit" name="commit" placeholder="no" type="number" min="1" max="100">
			<br><br>
			<input class="buttom" name="update" id="update" value="update" type="submit">&nbsp;&nbsp;
			<input class="buttom" name="clear" id="clear" value="clear" type="reset">


		</form>
	</div>
	</div>
	</body>
</html>



