<!DOCTYPE html>
<html>
  <head>
    <title>SIGN</title>
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
        <span><a href="/profile.php"><strong>Profile</strong></a></span>
        <span><a href="/teamdetails.php"><strong>Teams</strong></a></span>
	<span><a href="/people.php"><strong>People</strong></a></span>
        <div class="clr"></div>
      </div>                        
      <header>
        <h1> SIGN IN</h1>
      </header>
      <center><img src="images/images.png" alt="Not found"width="100" height="100"></center>
      <br>			
      <div class ="form">	
        <?php
          session_start();
	  //if user has already logged in redirected to his profile
	  if (isset($_SESSION['user'])) {
	    header('location:profile.php');
	    break;
	  }
	  //It will show please login to continue if anyone tries to access his profile page without doing log in
          if (isset($_SESSION['message'])) {
            echo "<p class='all'>".$_SESSION['message']."</p>";
            unset ($_SESSION['message']);
          }
	  //Throw error message for wrong username/password
          if (isset($_SESSION['error'])) {
            echo "<div class='show'><p class='all'>".$_SESSION['error']."</p></div>";
            unset ($_SESSION['error']);
          }
          ?>
	  <form id="contactform" action="check.php" method="GET">
	    <p class="contact"><label for="username">UserName</label></p>
            <input id="username" name="username" placeholder="username" required="" type="text">
            <p class="contact"><label for="password">Password</label></p>
            <input id="password" name="password" placeholder="Enter your password" required="" type="password">
            <br>
            <a href="/forgot.php">Forgot Password?</a><br><br>
            <input class="buttom" name="signin" id="signin" value="Sign in" type="submit">&nbsp;&nbsp;
	    <input class="buttom" name="cancel" id="cancel" value="Clear" type="reset">&nbsp;&nbsp;
	    <a href="/reg.php" class="link"><strong>New User?</strong></a>
          </form>
        </div>
      </div>
    </body>
</html>     

       

