<!doctype html>
<html lang="en">
<head>
	<title>IDL</title>
	<link rel="stylesheet" href="styles.css" type="text/css" media="screen" />
</head>
<body>
<?php
  session_start();
  include "db.php"; 
?>
	<header>
		<h1>Innoraft Drupal League</h1>
	</header>
	<nav>
		<ul>
			<li class="selected"><a href="/index.php">Home</a></li>
			<li><a href="/login.php">Members Area</a></li>
			<li><a href="/teamdetails.php">Teams</a>
                           <!--ul> <li><a href="/teamdetails.php">kkr</a></li>
				<li><a href="/teamdetails.php">RCB</a></li><ul--!>
                        </li>
			<li><a href="/people.php">People</a></li>
                         <?php
                           if (isset($_SESSION['user'])) {
			     echo "<li><a href='/logout.php'>Log Out</a></li>";
			   }
                         ?>
		</ul>
	</nav>
	<section id="intro">
		<header>
		  <?php
		    if (isset($_SESSION['user'])) {
		      $user = $_SESSION['user'];
		      $sql = mysqli_query($con, "select * from user where username = '$user'");
		      $row = mysqli_fetch_array($sql);
		      $name = $row['name'];
		      echo "<p>Welcome ".$row['name']."</p>";
		    }
		  ?>
			<h2>The Game is on</h2>
		</header>
		<img src="images/drupal.png" alt="lime" />
	</section>
	<marquee behavior="scroll" direction="left"> Recent Updates: Drupal.org is the home of the Drupal project. In addition to keeping track of all the Drupal code and contributed projects, Drupal.org publishes news, organization information, training resources, case studies and community spotlights. Drupal.org is run mostly by volunteers; learn how you can get involved. Read more about how we organize ourselves on Drupa org.</marquee>
	<section id="content">
				<ul class="column">
				    <!--eqblock-->
				    <li>
				        <section class="block">
						<h2>Our Mission</h2> 
							<p>Drupal is Open Source
Drupal is open source software maintained and developed by a community of over 1,000,000 users and developers. It's distributed under the terms of the GNU General Public License (or "GPL"), which means anyone is free to download it and share it with others.<!--/marquee--!><p>
 
				        </section>
				    </li>
				  
				    <li>
				        <section class="block">
						 
						<h2>Our Vision</h2> 
						 <p>The passionate volunteer Drupal community is on hand to give support via various vibrant IRC channels, in the forums, and face to face at Drupal events. The community has also created Documentation for Drupal.<p> 
				        </section>
				    </li>

				    <!--eqblock-->
				    <li>
				        <section class="block">
						<!--img src="images/3-thumb.jpg" alt=""  /--!> 
						<h2>Rules</h2> 
						<p>As well as the community, there are many dedicated companies in the Marketplace to help with your Drupal project. Providing expertise and a deeper understanding, they can help with design, development, hosting, spam blocking, theming, training, and more<p>
				        </section>
				    </li>
					<li>				
				        <section class="block">
						<marquee behavior="scroll" direction="down">
<img src="images/dr.png" width="100" height="100" alt="Arrow pointing down" /><br>
<img src="images/dr.png" width="100" height="100" alt="Arrow pointing down" /><br>
<img src="images/dr.png" width="100" height="100" alt="Arrow pointing down" /><br>
<img src="images/dr.png" width="100" height="100" alt="Arrow pointing down" />

</marquee></li>
						
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
