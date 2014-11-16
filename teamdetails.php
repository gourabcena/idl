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
	<li><a href="/index.php">Home</a></li>
	<li><a href="/login.php">Members Area</a></li>
	<li class="selected"><a href="/teamdetails.php">Teams</a></li>
	<li><a href="/people.php">People</a></li--!>
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
	  $sql = mysqli_query($con, "select team.teamname, team.team_id, user.name, user.drupal from team  INNER JOIN user where team.u_id=user.u_id");
	  while ($row = mysqli_fetch_array($sql)) {
	    $url = $row['drupal'];	  
            echo "<li><section class='block'>";
	    echo "<h2>".$row['teamname']."</h2>";
	    echo "<p><b>Manager:<br><a href = '$url' class = 'cool' target = 'blank'> ".$row['name']."</a><b><p><br>";
	    $team_id = $row['team_id'];
	    $sql1 = mysqli_query($con, "select user.name, user.drupal, contributor.edit from user INNER JOIN contributor WHERE user.u_id=contributor.u_id and contributor.team_id=$team_id"); 
	    echo"<u>Team Members</u>";
	    $i = 1;
	    while ($row1 = mysqli_fetch_array($sql1)) {
	      $url = $row1['drupal'];
	      echo " <a href = '$url' class = 'cool' target = 'blank'>".$row1['name']."</a><br>";
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

