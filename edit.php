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
                <a href="http://idl.com"><strong>Home</strong></a>
		<span>
			<a href="http://idl.com/profile.php">
				<strong>My Profile</strong>
			</a></span>
                <span class="right">
                    <a href="http://idl.com/logout.php">
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
			if(!isset($_SESSION['user'])){
			
				header('location:login.php');
				break;
			}
		?>     

      <div  class="form">
    			<form id="contactform" action="update.php" method="post"> 
			<!--p class="contact"><label for="role">Role</label></p>
			<select class="select-style" name="role">
			<option value="default">-----</option>
                        <option value="2"> Manager </option>
                        <option value="3"> Contributor </option>
			</select--!>
			
    			<p class="contact"><label for="name">Change your Name</label></p> 
    			<input id="name" name="name" placeholder="First and last name" type="text"> 	 
    			<p class="contact"><label for="email">Change your Email</label></p> 
    			<input id="email" name="email" placeholder="example@domain.com" type="email">               
                        <p class="contact"><label for="username">Change your username</label></p> 
    			<input id="username" name="username" placeholder="username" type="text"> 
                        <p class="contact"><label for="password">change your password</label></p> 
    			<input type="password" id="password" name="password"> 
                        <p class="contact"><label for="repassword">Confirm your password</label></p> 
    			<input type="password" id="repassword" name="repassword">
			<p class="contact"><label for="drupal">Change your Drupal Profile link</label></p>
			<input type="url" id="url" name="url" placeholder="drupal.org">
			<p class="contact"><label for="city">current location</label></p>
			<select class="select-style" name="city">
			<option value="kolkata"> Kolkata </option>
			<option value="mumbai"> Mumbai </option>
			<option value="delhi"> Delhi </option>
			<option value="chennai">Chennai </option>
			</select>;
               
		<!--p class="contact"><label for="dob"> Date Of Birth</label></p>
                <input type="date" name="dob"id="dob"><br>  
		<p class="contact"><label for="doj"> Date Of Joining</label></p>
		<input type="date" name="doj"id="doj"><br>	
            <p class="contact"><label for="gen"> Gender :&nbsp;</label>
	    <input type="radio" name="gen" value="male">&nbsp;&nbsp;MALE
            <input type="radio" name="gen" value="female">&nbsp;&nbsp;FEMALE
	    </p--!>            
            <p class="contact"><label for="phone">Change your Mobile phone no</label></p> 
            <input id="phone" name="phone" placeholder="phone number" type="tel"> <br>
            <input class="buttom" name="submit" id="submit" value="Upadte" type="submit">&nbsp;&nbsp;
	    <input class="buttom" name="clear" id="clear" value="Clear" type="reset"> 	 
   </form> 
</div>      
</div>
</body>
</html>
