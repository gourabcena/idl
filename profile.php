<!DOCTYPE html>
<html>
  <body>
    <title>My Profile</title>
    <head>
      <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
      <link rel="stylesheet" type="text/css" href="style.css" media="all" />
      <link rel="stylesheet" type="text/css" href="demo.css" media="all" />
    </head>
    <div class="container">
      <div class="idl-top">
        <a href="/index.php">Home</a>
        <span><a href="/profile.php"><strong>My Profile</strong></a></span>
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
        <h1> Welcome To The World Of Drupal</h1>
      </header>       
      <div  class="form">
        <form id="contactform" action="edit.php"> 
	  <br><br>
       	  <?php
            include "db.php";
	    session_start();
            //checked whether a user logged in or not
            if (isset($_SESSION['user'])) {
	      $user = $_SESSION['user'];
	        if (isset($_SESSION['alert'])) {
	          echo "<p class='all'>".$_SESSION['alert']."<p>";
                  echo"<br>";
                  unset($_SESSION['alert']);
                }
                //If anyone's profile is updated or any new admin is added, it will show message
	        if (isset($_SESSION['update'])) {
		  echo "<p class='all'>".$_SESSION['update']."<p>";
		  echo"<br>";
		  unset($_SESSION['update']);
		}
		echo "<p class='all'> Welcome ".$user."!!</p>";
	        $query = mysqli_query($con,"SELECT * from user WHERE username='$user'");
		while ($row = mysqli_fetch_array($query)) {
		  $_SESSION['u_id']=$row['u_id'];
		  echo "<table border='1'>";
  		  echo "<tr>";
		  echo "<th>User ID</th>";
  		  echo "<td>". $row['u_id']."</td>";
		  echo "</tr><tr>";
		  echo "<th>Name</th>";
  		  echo "<td>" . $row['name'] . "</td>";
		  echo "</tr><tr>";
		  echo "<th>User Name</th>";
  		  echo "<td>" . $row['username'] . "</td>";
		  echo "</tr><tr>";
		  echo "<th>Date Of Birth</th>";
  		  echo "<td>" . $row['dob'] . "</td>";
		  echo "</tr><tr>";
		  echo "<th>Date Of Joining</th>";
  		  echo "<td>" . $row['doj'] . "</td>";
		  echo "</tr><tr>";
		  echo "<th>Phone no</th>";
  		  echo "<td>" . $row['phone'] . "</td>";
		  echo "</tr><tr>";
	          echo "<th>Gender</th>";
		  if ($row['gender'] == 'M') {
  		    echo "<td>Male</td>";
		  }
		  if ($row['gender'] == 'F') {
		    echo "<td>Female</td>";
		  }
		  echo "</tr><tr>";
		  echo "<th>City</th>";
   		  echo "<td>" . $row['city'] . "</td>";
		  echo "</tr><tr>";
		  echo "<th>Drupal Link</th>";
  		  echo "<td>" . $row['drupal'] . "</td>";
		  echo "</tr><tr>";
		  echo "<th>Email</th>";
		  echo "<td>" . $row['email'] . "</td>"; 
  		  echo "</tr>";
		}
		echo "</table>";
                //This query fetch role id of differnet users according to that different options are available for different users
	        $sql = mysqli_query($con, "SELECT r_id from roleuser WHERE u_id IN (SELECT u_id from user WHERE username = '$user')");
	        $row = mysqli_fetch_array($sql);
	        $_SESSION['role'] = $row['r_id'];
	        //Admin
	        if ($row['r_id'] == 1) {
	          echo "<br>";
		  echo "<p class='all'>Admin<p><br><br>";
	          echo "<a href='/showuser.php'class='link'>
                        <strong>Approve user</strong></a>";
	          echo "<br>";
		  echo "<a href='/adminreg.php'class='link'>
                        <strong>Add Another Admin?>> Click Here</strong></a>";
		}
	        //$user always stores the username of the current user
	        $query = mysqli_query($con, "SELECT * from user WHERE username = '$user'");
                $ro = mysqli_fetch_array($query);
                //It will check the either user is approved or not
	        if ($ro['status'] == 0 and $row['r_id']!=1) {
		  echo "<br>";
                  echo "<p class='all'>Your approval is pending!!<p>";
		  echo "<br>";
                }
		else {
		  //Manager
	          if ($row['r_id'] == 2) {
	            echo "<br>";
		    echo"<p class='all'>Manager<p><br><br>";
		    echo $_SESSION['app'];
		    unset($_SESSION['app']);
		    echo "<br>";
		    echo "<a href='/team.php' class='link'>
                          <strong>Team Management</strong></a>";
		  }
		  //contributor	
		  if ($row['r_id'] == 3) {
                    echo "<br>";
		    echo "<p class='all'>Contributor<p><br><br>";
		    echo $_SESSION['app'];
                    unset($_SESSION['app']);
                    echo "<br>";
                    echo "<a href='/history.php' class='link'>
                          <strong>USER HISTORY</strong></a>";
                  }

		  echo "<br><br>";	
	          echo "<input class='buttom' name='edit' id='edit' value='Edit Profile' type='submit'>";
		}			 
	      }
	      else {
                $_SESSION['message'] = "Please Log in to continue";
		header('location:login.php');
	      }
           ?>	 
       </form> 
     </div>      
   </div>
  </body>
</html>
