<!DOCTYPE html>
<html>
  <head>
    <title>Edit Profile</title>
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
	  <a href="/profile.php">
	    <strong>My Profile</strong>
	  </a>
        </span>
        <span><a href="/teamdetails.php"><strong>Teams</strong></a></span>
        <span><a href="/people.php"><strong>People</strong></a></span>
        <span class="right">
          <a href="/logout.php">
            <strong>Logout</strong>
          </a>
        </span>
        <div class="clr"></div>
      </div>
      <header>
	<h1>Edit</h1>
      </header>  
      <?php
	session_start();
	//checked whether the user logged in or not
	if (!isset($_SESSION['user'])) {
          header('location:login.php');
          break;
	}
	include"db.php";
	$uid = $_SESSION['u_id'];
	//fetech information from user table for the logged in user
	$sql = mysqli_query($con, "SELECT * from user WHERE u_id = $uid");
	$row = mysqli_fetch_array($sql);
	//store the values of different field in different variables
	$name = $row['name'];
	$username = $row['username'];
	$city = $row['city'];
	$email = $row['email'];
	$phone = $row['phone'];
	$drupal = $row['drupal'];
      ?>    
      <div  class="form">
    	<form id="contactform" action="update.php" method="post"> 
	  <p class="contact"><label for="name">Change your Name</label></p> 
	  <!--Php tags in between put the values in batabase in the input field--!>
    	  <input id="name" name="name" value="<?php echo $name;?>" type="text"> 	 
          <p class="contact"><label for="password">change your password</label></p> 
	  <input type="password" id="password" name="password" onchange="form.repassword.pattern=this.value";> 
          <p class="contact"><label for="repassword">Confirm your password</label></p> 
    	  <input type="password" id="repassword" name="repassword">
	  <p class="contact"><label for="drupal">Change your Drupal Profile link</label></p>
	  <input type="url" id="url" name="url"value="<?php echo $drupal;?>">
	  <p class="contact"><label for="city">current location</label></p>
	  <select class="select-style" name="city">
	    <option value="<?php echo $city;?>"></option>
	    <option value="kolkata"> Kolkata </option>
	    <option value="mumbai"> Mumbai </option>
	    <option value="delhi"> Delhi </option>
	    <option value="chennai">Chennai </option>
	  </select>            
          <p class="contact"><label for="phone">Change your Mobile phone no</label></p> 
          <input id="phone" name="phone"value="<?php echo $phone;?>" type="tel" pattern="^\d{10}$"> <br>
          <input class="buttom" name="submit" id="submit" value="Upadte" type="submit">&nbsp;&nbsp;
	</form> 
      </div>      
    </div>
  </body>
</html>
