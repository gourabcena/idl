<!DOCTYPE html>
<html>
<body>
<?php
$domain=$_POST['domain'];
$dbname1=$_POST['dbname1'];
$password=$_POST['password'];
$pw=md5($password);
$conn = new mysqli($_POST['domain'], $_POST['dbname1'], $_POST['password']);
if ($conn->connect_error) {

    header('Location: install.php');
}
$name=$_POST['dbname'];
$sql = "CREATE DATABASE IF NOT EXISTS`$name`";
if (mysqli_query($conn, $sql)) {
  header('Location:adreg.php');
}
$conn = mysqli_connect("idl.com", $_POST['dbname1'], $_POST['password'], $name); 
$sql5 = "CREATE TABLE user (u_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,name VARCHAR(60),username VARCHAR(30),dob VARCHAR(12),doj VARCHAR(12),phone INT(13),gender VARCHAR(5),city VARCHAR(30),password VARCHAR(40),drupal VARCHAR(60),email VARCHAR(60),status INT(2) default '0')";
mysqli_query($conn,$sql5);
$sql1 = "CREATE TABLE team (team_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,teamname VARCHAR(30),u_id INT)";
mysqli_query($conn,$sql1);
$sql2 = "CREATE TABLE role (r_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,role VARCHAR(12))";
mysqli_query($conn,$sql2);
$sql3 = "CREATE TABLE contributor(u_id INT,team_id INT,commit INT(5) default '0',edit INT(5) default '0',review INT(5) default '0')";
mysqli_query($conn,$sql3);
$sql4="CREATE TABLE roleuser(u_id INT,r_id INT)"; 
mysqli_query($conn,$sql4);
//$sql6="CREATE TABLE system(s_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,domain VARCHAR(20),dbname1 VARCHAR(20),password VARCHAR(20),dbname VARCHAR(20))";
//mysqli_query($conn,$sql6);
//$sql7="INSERT INTO system(domain,dbname1,password,dbname) VALUES('$domain','$dbname1','$pw','$name')";
//mysqli_query($conn,$sql7);
$sql8="INSERT INTO role(role) VALUES('Admin'),('Manager'),('Contributor')";
mysqli_query($conn,$sql8);
mysqli_close($conn);
?>
</body>
</html>

