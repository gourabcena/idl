<!doctype html>
<html lang="en">
  <head>
    <title>IDL</title>
    <link rel="stylesheet" href="styles.css" type="text/css" media="screen" />
  </head>
  <body>
    <header>
      <h1>Innoraft Drupal League</h1>
    </header>
    <nav>
      <ul>
	<li class="selected"><a href="/index.html">Home</a></li>
	<li><a href="/login.php">Members Area</a></li>
	<li><a href="/teamdetails.php">Teams</a></li>
	<li><a href="#">Contact</a></li--!>
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
	<?php
          include"db.php";
	  $sql = mysqli_query($con, "select team.teamname, team.team_id, user.name from team  INNER JOIN user where team.u_id=user.u_id");
	  while ($row = mysqli_fetch_array($sql)) {	  
            echo "<li><section class='block'>";
	    echo "<h2>".$row['teamname']."</h2>";
	    echo "<p><b>Manager: ".$row['name']."<b><p><br>";
	    $team_id = $row['team_id'];
	    $sql1 = mysqli_query($con, "select user.name, contributor.edit from user INNER JOIN contributor WHERE user.u_id=contributor.u_id and contributor.team_id=$team_id"); 
	    echo"<center><u>Team Members</u></center>";
	    $i = 1;
	    while ($row1 = mysqli_fetch_array($sql1)) {
	      echo $i.".".$row1['name']."<br>";
	      $i = $i+1;
	    }
            echo "</section></li>";
	  }
        ?>
      </ul>
    </section>
    <footer>
      <section>
        <h3>Support Us</h3>
	<div class="foot_pad">
          <div class="link1"><a href="#">Subscribe to Blog</a></div>
          <div class="link2"><a href="http://www.facebook.com">Be a fan on Facebook</a></div>
          <div class="link3"><a href="#">RSS Feed</a></div>
          <div class="link4"><a href="http://www.twitter.com">Follow us on Twitter</a></div>
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

