<!DOCTYPE html>
<html>
  <head>
    <title>RESET</title>
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
        <div class="clr"></div>
      </div>
      <header>
        <h1>Reset password</h1>
      </header>
      <div class="form">
        <?php
   	  include "db.php";
          session_start();
          $_SESSION['otp1'] = $_GET['otp'];
          $_SESSION['email'] = $_GET['email'];
          //echo $email;
	  $otp1 = $_SESSION['otp'];
	  //echo $otp1;
          if (isset($_SESSION['otp'])) {
	    //echo "gourab";
            /*if (isset($_GET['reset'])) {
              //echo "dutta";
	      echo $_GET['password'];
	      if (isset($_GET['password'])) {
		 //echo $_GET['password'];
                 $password = md5($_GET['password']);
		 //echo $password;
                 $sql = mysqli_query($con, "upadte user set password = '$password' where email = '$email'");
                 //header('location:login.php');
              }
            }
            else {
             // echo "Deny";
              //break;
            }*/
	    //unset($_SESSION['otp']);
	  } 
          else {
             $_SESSION['reset'] = "please enter your email first to reset your password";
             header('location:forgot.php');
             break;
          }
        ?>
        <form id="contactform" action="resetback.php" method="post">
          <p class="contact"><label for="password">Create a New password</label></p>
          <input type="password" id="password" name="password" onchange="form.repassword.pattern=this.value"; required="">
          <p class="contact"><label for="repassword">Confirm your password</label></p>
          <input type="password" id="repassword" name="repassword" required="">
          <br><br>
          <input class="buttom" name="reset" id="reset" value="Reset" type="submit">&nbsp;&nbsp;
          <input class="buttom" name="cancel" id="cancel" value="Clear" type="reset">
        </form>
      </div>
    </div>
  </body>
<html>

      
      
            
