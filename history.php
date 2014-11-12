<!DOCTYPE html>
<html>
  <head>
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
        <a href="/index.html"><strong>Home</strong></a>
        <span>
          <a href="/profile.php"><strong>My Profile</strong></a>
	</span>
        <span><a href="/teamdetails.php"><strong>Teams</strong></a></span>
        <span><a href="/people.php"><strong>People</strong></a></span>
	<span class="right">
          <a href="/logout.php">
            <strong>Log Out</strong>
          </a>
        </span>
        <div class="clr"></div>
      </div>
      <header>
        <h1>Your Contribution</h1>
      </header>
      <?php
        session_start();
        if (!isset($_SESSION['user'])) {
	  header('location:login.php');
          break;
        }
      ?>
      <div  class="form">
        <form id="contactform" action="modify.php" method="post">
	  <?php
	    include"db.php";
	    session_start();
	    if ($_SESSION['role'] == 3) {
	      $u = $_SESSION['u_id'];
	      //show the user history like team which he belongs, no of commits etc
	      $sql = mysqli_query($con, "select contributor.u_id,contributor.team_id,team.teamname,contributor.edit,contributor.review,contributor.commit from contributor INNER JOIN team WHERE contributor.team_id = team.team_id AND contributor.u_id = $u");
	      //$row = mysqli_fetch_array($sql);
              //$team = $row['team_id'];
	      while ($row = mysqli_fetch_array($sql)) {
		$_SESSION['team_id']=$row['team_id'];
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>User ID</th>";
                echo "<td>". $row['u_id']."</td>";
                echo "</tr><tr>";
	        echo "<th>Team Name</th>";
                echo "<td>". $row['teamname']."</td>";
                echo "</tr><tr>";
	        echo "<th>No of Edit</th>";
                echo "<td>". $row['edit']."</td>";
                echo "</tr><tr>";
	        echo "<th>No of Review</th>";
                echo "<td>". $row['review']."</td>";
                echo "</tr><tr>";
	        echo "<th>No of Commit</th>";
                echo "<td>". $row['commit']."</td>";
                echo "</tr>";
	      }
	      echo "</table>";
	      echo"<br>";
              $team = $_SESSION['team_id'];
	      //this query will show the other members of the same team
	      $sql1 = mysqli_query( $con, " select distinct user.name,contributor.edit,contributor.review,contributor.commit from contributor INNER JOIN team INNER JOIN user WHERE contributor.team_id = $team AND contributor.u_id!= $u AND contributor.u_id=user.u_id");	       
	      echo "<br>";
	      //verify user is belonged to some team
	      if (mysqli_num_rows($sql)!=0) {
		//verify other members are in the team or not
		if (mysqli_num_rows($sql1)!=0) {
                  echo "<p class='all'> My other team members' Performence</p>";
                  echo "<table border='1' align='center'>
                       <tr>
                       <th>Name</th>
                       <th>No of Edit</th>
                       <th>No of review</th>
                       <th>No of commit</th>
                       </tr>";
                  while ($row = mysqli_fetch_array($sql1)) {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['edit'] . "</td>";
                    echo "<td>" . $row['review'] . "</td>";
                    echo "<td>" . $row['commit'] . "</td>";
                    echo "</tr>";
                  }
                  echo "</table>";
		  echo"<br>";
                }
		else {
                  echo "<p class='all'> No other members are in the team</p>";
		}
		echo "<p class='contact'><label for='name'>Change your edit</label></p>
                      <input id='edit' name='edit' placeholder='no' type='number' min='1' max='100'>
                      <p class='contact'><label for='email'>Change your review</label></p>
                      <input id='review' name='review' placeholder='no' type='number' min='1' max='100'>
                      <p class='contact'><label for='username'>Change your commit</label></p>
                      <input id='commit' name='commit' placeholder='no' type='number' min='1' max='100'>
		      <br><br>
		      <input class='buttom' name='update' id='update' value='update' type='submit'>&nbsp;&nbsp;
		      <input class='buttom' name='clear' id='clear' value='clear' type='reset'>";
	      }
	      else {
		echo "<p class='all'>You are not belonged to any team<p><br>";
	      }
	    }
	    else {
              echo "<center>";
              echo "<p class='msg'> Access Denied!!<p>";
              echo "</center>";
            }
          ?>
        </form>
      </div>
    </div>
  </body>
</html>



