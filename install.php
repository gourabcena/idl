<!DOCTYPE html>
<html>
  <head>
   <title>INSTALL</title>
     <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
     <link rel="stylesheet" type="text/css" href="style.css" media="all" />
     <link rel="stylesheet" type="text/css" href="demo.css" media="all" />
  </head>
  <body>
    <div class="container">
      <div class="idl-top">
        <a href="http://idl.com">Home</a>
        <span class="right">
          <!--a href="http://idl.com">
            <strong>Back to the Login page</strong>
          </a--!>
         </span>
         <div class="clr"></div>
       </div>
       <header>
         <h1> WELCOME TO THE INNORAFT DRUPAL LEAGUE</h1>
       </header>
         <div class ="form">
           <form id="contactform" action="create.php" method="post">
             <p class="contact"><label for="dbname">IDL DataBase Name</label></p>
             <input id="dbname" name="dbname" placeholder="Enter your Database name" required="" type="text">
	     <p class="contact"><label for="domain">Domain Name</label></p>
             <input id="domain" name="domain" placeholder="Enter your Domain name" required="" type="text">
	     <p class="contact"><label for="dbname1">System DataBase Login</label></p>
             <input id="dbname1" name="dbname1" placeholder="Enter your Login id" required="" type="text">
             <p class="contact"><label for="password">DataBase Password</label></p>
             <input id="password" name="password" placeholder="Enter your password" required="" type="password">
             <br><br><br>
             <input class="buttom" name="create" id="create" value="Create" type="submit">
	     <?php
	       session_start();
	       $_SESSION['install'] = "done";/*it indictaes that request for webmaster registration is coming from installation page*/
             ?>
             <br><br><br>
           </form>
         </div>
    </div>
  </body>
</html>

