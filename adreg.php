<!DOCTYPE html>
<html>
<head>
<title>WebMaster Registration Form</title>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="demo.css" media="all" />
</head>
<body>
<?php session_start(); ?>
<div class="container">
            <div class="idl-top">
                <a href="http://idl.com">Home</a>
                <span>
                    <a href="http://idl.com/profile.php">
                        <strong>My Profile</strong>
                    </a>
                </span>
		<span class="right">
                    <a href="http://idl.com/logout.php">
                        <strong>Log Out</strong>
                    </a>
                </span>
                <div class="clr"></div>
		<div class="idl-demos">
			 <?php if(!empty($_SESSION['error'])) { echo $_SESSION['error']; } ?>
                </div>
                <?php unset($_SESSION['error']); ?>
		<div class="clr"></div>


            </div>
			<header>
				<h1> Webmaster Registration Form</h1>
                        </header>       

      <div  class="form">
    			<form id="contactform"action="adminentry.php"method="post"> 
			<!--p class="contact"><label for="role">Role</label></p>
			<select class="select-style" name="role">
			<option value="default">-----</option>
                        <option value="1"> Webmaster </option>
			</select--!>
			<?php
			 if($_SESSION['role']!=1){
                 echo"<center>";
                echo"<p class='msg'> Access Denied<p>";
                echo"</center>";
		break;
		}

			?>
    			<p class="contact"><label for="name">Name</label></p> 
    			<input id="name" name="name" placeholder="First and last name" required="" type="text"> 	 
    			<p class="contact"><label for="email">Email</label></p> 
    			<input id="email" name="email" placeholder="example@domain.com" required="" type="email">               
                        <p class="contact"><label for="username">Create a username</label></p> 
    			<input id="username" name="username" placeholder="username" required="" type="text">
			 <?php session_start();
                        echo"<br>";
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                        ?>
		        <p class="contact"><label for="password">Create a password</label></p> 
    			<input type="password" id="password" name="password" onchange="form.repassword.pattern=this.value"; required=""> 
                        <p class="contact"><label for="repassword">Confirm your password</label></p> 
    			<input type="password" id="repassword" name="repassword" required="">
			<p class="contact"><label for="drupal">Drupal Profile link</label></p>
			<input type="url" id="url" name="url" placeholder="drupal.org" required="">
			<p class="contact"><label for="city">City</label></p>
			<select class="select-style" name="city">
			<option value="kolkata"> Kolkata </option>
			<option value="mumbai"> Mumbai </option>
			<option value="delhi"> Delhi </option>
			<option value="chennai">Chennai </option>
			</select>
               
		<p class="contact"><label for="dob"> Date Of Birth</label></p>
                <input type="date" name="dob"id="dob"><br>  
		<p class="contact"><label for="doj"> Date Of Joining</label></p>
		<input type="date" name="doj"id="doj"><br>	
            <p class="contact"><label for="gen"> Gender :&nbsp;</label>
	    <input type="radio" name="gen" value="M">&nbsp;&nbsp;MALE
            <input type="radio" name="gen" value="F">&nbsp;&nbsp;FEMALE
	    </p>            
            <p class="contact"><label for="phone">Mobile phone</label></p> 
            <input id="phone" name="phone" placeholder="phone number" required="" type="tel"> <br>
            <input class="buttom" name="submit" id="submit" tabindex="5" value="Add Admin!" type="submit">&nbsp;&nbsp;
            <input class="buttom" name="clear" id="clear"  value="Clear" type="reset"> 	 
   </form> 
</div>      
</div>
</body>
</html>
