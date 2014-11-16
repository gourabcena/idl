<!DOCTYPE html>
<html>
  <head>
    <title>Add Team Member</title>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="demo.css" media="all" />
  </head>
  <body>
    <div class="container">
      <div class="idl-top">
        <a href="/index.php"><strong>Home</strong></a>
	<span>
          <a href="/profile.php"><strong>My Profile</strong>
          </a>
        </span>
        <span>
          <a href="/team.php"><strong>My Team</strong>
          </a>
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
        <h1>Available Contributors</h1>
      </header>
      <?php
        session_start();
        if (!isset($_SESSION['user'])) {
          header('location:login.php');
          break;
        }
      ?>
      <div class = "form">
        <form id = "contactform" action = "addrem.php" method = "post">
          <?php
            include"db.php";
            session_start();
	    if ($_SESSION['role'] == 2) {
              $id = $_SESSION['u_id'];
              if (isset($_SESSION['remove'])) {
	        echo "<p class='all'>".$_SESSION['remove']."<p>";
		unset($_SESSION['remove']);
	      }
	      if (isset($_SESSION['max'])) {
                echo "<p class='all'>".$_SESSION['max']."<p>";
                unset($_SESSION['max']);
              }
	      //Show the available users to add into the team
              $rs = mysqli_query($con, "SELECT user.u_id,roleuser.r_id, user.username, user.name, user.email, user.drupal, user.phone from roleuser INNER JOIN user ON roleuser.u_id=user.u_id WHERE roleuser.r_id=3 AND user.status=1 AND user.u_id not IN(SELECT u_id from contributor)");
              if (mysqli_num_rows($rs)>0) {
		while ($row = mysqli_fetch_array($rs)) {	
	          $i = $row['u_id'];
	          echo"<div class= 'show'>
                       <h2>User Name: ".$row['username']."<h2>
		       <p> Name: ".$row['name']."<p>
		       <p>Email: ".$row['email']."<p>
		       <p>Drupal Link: ".$row['drupal']."<p>
		       <p>Phone no: ".$row['phone']."<p>                
		       <p><a href='/addrem.php?id=$i&status=1'class='link'>Add</a><p></div>";//send the id & status through url
		  //status =1 means user is available to add
	          echo"<br>";
                }
              } 
	      else {
		echo "<p class='contact'><label for='add1'>No contributor is available</label></p>";
	      }
	      echo "<br><br><br><br>";
	    }
	    else {
	      echo "<center>";
              echo "<p class='msg'> Access Denied !!<p>";
              echo "</center>";
            }
          ?>			
	</form>
      </div>
    </div>
  </body>
</html>
