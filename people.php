<!doctype html>
<html lang="en">
  <head>
    <title>IDL</title>
    <link rel="stylesheet" href="styles.css" type="text/css" media="screen" />
  </head>
  <body>
    <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>
    <!--script src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script--!>
    <script src="index.js"></script>
    <header>
      <h1>Innoraft Drupal League</h1>
    </header>
    <nav>
      <ul>
	<li><a href="/index.php">Home</a></li>
	<li><a href="/login.php">Members Area</a></li>
	<li><a href="/teamdetails.php">Teams</a></li>
	<li class="selected"><a href="/people.php">People</a></li--!>
      </ul>
    </nav>
    <section id="intro">
      <header>
	<h2>The Game is on</h2>
      </header>
      <img src="images/drupal.png" alt="lime" />
    </section>
    <marquee behavior="scroll" direction="left" color="yellow"> Recent Updates: Drupal.org is the home of the Drupal project. In addition to keeping track of all the Drupal code and contributed projects, Drupal.org publishes news, organization information, training resources, case studies and community spotlights. Drupal.org is run mostly by volunteers; learn how you can get involved. Read more about how we organize ourselves on Drupa org.</marquee>
    <section id="content">
      <ul class="column">
	<div id="slider">
          <a href="#" class="control_next">>></a>
          <a href="#" class="control_prev">>></a>
          <ul>
	    <?php
	      include "db.php";
	      $sql = mysqli_query($con, "select name from user where status!=2;");
	      while($row = mysqli_fetch_array($sql)) {
                echo"<li style='background:#48ee2f'>Name:".$row['name']."</li>";
                /*<li style="background: #aaa;">SLIDE 2</li>
            <li>SLIDE 3</li>
            <li style="background: #aaa;">SLIDE 4</li>*/
	      }
            ?>
          </ul>  
        </div>
        <div class="slider_option">
          <input type="checkbox" id="checkbox">
          <label for="checkbox">Autoplay Slider</label>
        </div>
      </ul>
    </section>
    <footer>
      <section>
        <h3>Support Us</h3>
	<div class="foot_pad">
          <div class="link1"><a href="#">Subscribe to Blog</a></div>
          <div class="link2"><a href="http://www.facebook.com" target = "blank">Be a fan on Facebook</a></div>
          <div class="link3"><a href="#">RSS Feed</a></div>
          <div class="link4"><a href="http://www.twitter.com" target = "blank">Follow us on Twitter</a></div>
        </div>
      </section>
      <section>
        <h3></h3>
	
      </section>    
      <section>
        <h3>Designer team</h3>   
      </section>
    </footer>
  </body>
</html>


