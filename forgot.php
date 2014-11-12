<!DOCTYPE html>
<html>
  <head>
    <title>FORGOT</title>
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
        <h1>Forgot password</h1>
      </header>
      <div class="form">
        <?php
          include "db.php";
	  session_start();
	  // if anyone without giving his email trying to access reset.php it will show this message
          if (isset($_SESSION['reset'])) {
            echo "<p class='all'>".$_SESSION['reset']."</p>";
            unset($_SESSION['reset']);
          }
          if (isset($_POST['email'])) {
	    $email = $_POST['email'];
            $selectuser = "Select * from user where email = '$email'";
            $result = mysqli_query($con, $selectuser);
            if (mysqli_num_rows($result) == 1) {
              $row = mysqli_fetch_array($result);
              $validusername=$row['username'];
              for ($i = 7; $i > 0; $i--) {
                //$randomstring .= chr(mt_rand(1,126));
		$str = $str.chr(rand(97,122)); 
              }
              $verifystring = $str;
              $verifyemail = $_POST['email'];
	      $_SESSION['otp'] = $str;
              //echo $_SESSION['otp'];
              //$updateuser="Update USER SET forgotpassword='".addslashes($randomstring)."' WHERE emailid='".addslashes($_POST['email'])."'";
              //mysql_query($updateuser);
              $message = "Your password reset link send to your e-mail address.";
              $to = $verifyemail;
              $subject = "Forgot Password";
              $from = "info@idl.com";
              $body = "Hi, <br/> <br/>Your username is ".$row['username']."  <br><br>Click here to reset your password http://idl.com/reset.php?email=$to&otp=$verifystring   <br/> <br/>--<br>idl.com<br>Solve your problems.";
              $headers = "From: " . strip_tags($from) . "\r\n";
              $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
              $headers .= "MIME-Version: 1.0\r\n";
              $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	      //$xHeaders = "From: gourab.dutta@innoraft.com X-Mailer: PHP/" . phpversion();
              if (mail($to, $subject, $body, $headers)) {
		echo "<p class='contact'>A link has been
                      emailed to the address you entered below.
                      Please follow the link in the email to reset the passwod for 
                      your account.</p><br>";
	      }
              /*require("class.phpmailer.php");
 	      $mailer = new PHPMailer();
 	      $mailer->IsSMTP();
 	      $mailer->Host = ""; //Add smtp details
  	      $mailer->SMTPAuth = TRUE;
 	      $mailer->Username = "";  // Change this to your gmail adress
              $mailer->Password = "";  // Change this to your gmail password
              $mailer->From = "";  // This HAVE TO be your gmail adress
              $mailer->FromName = ""; // This is the from name in the email, you can put anything you like here
              $mailer->Body = $mail_body;
              $mailer->Subject = "User Verification";
              $mailer->AddAddress($_POST['email']);*/  // This is where you put the email adress of the person you want to mail
              //if (!$mailer->Send()) {
              //echo "Message was not sent<br/ >";
              //echo "Mailer Error: " . $mailer->ErrorInfo;
              //}
              /*else {
                echo "<center>A link has been
                      emailed to the address you entered below.
                      Please follow the link in the email to reset the passwod for 
                      your account.</center><br>";
              }*/
            }	
            else {
              echo "<p class='contact'>We could not find any registered user with the email id as ".addslashes($_POST['email'])."<br>
                    Please Enter the correct mail id & try again</p>";
            }
          }
        ?>   
        <form id="contactform" action="forgot.php" method="POST">
          <p class="contact"><label for="username">Enter your valid Email</label></p>
          <input id="email" name="email" placeholder="email" required="" type="email">
          <br><br>
          <input class="buttom" name="Send" id="send" value="Send Link" type="submit">&nbsp;&nbsp;
          <input class="buttom" name="cancel" id="cancel" value="Clear" type="reset">
        </form>  
      </div>
    </div>
  </body>
</html>      
