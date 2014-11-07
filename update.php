<!DOCTYPE html>
<html>
  <body>
    <?php
      include "db.php";
      session_start();
      $id=$_SESSION['u_id'];
      //echo $id;
      /*queries here will update the values in database*/
      if (!empty($_POST['name'])){
         $name=$_POST['name'];
	 $sql=mysqli_query($con,"UPDATE user set name='$name' WHERE u_id=$id");
      }
      /*if (!empty($_POST['email'])){
                $name=$_POST['email'];
                $sql=mysqli_query($con,"UPDATE user SET email='$name' WHERE u_id=$id");
                //$row=mysqli_fetch_array($sql);
                //$name = $row['name'];
      }*/
      if (!empty($_POST['city'])){
          $name=$_POST['city'];
          $sql=mysqli_query($con,"UPDATE user SET city='$name' WHERE u_id=$id");
               
      }
      if (!empty($_POST['phone'])){
          $name=$_POST['phone'];
          $sql=mysqli_query($con,"UPDATE user SET phone='$name' WHERE u_id=$id");
               
      }
      if (!empty($_POST['password'])){
         $name=$_POST['password'];
	 $pw = md5($password);
         $sql = mysqli_query($con,"UPDATE user SET password ='$pw' WHERE u_id=$id");
      }
      if (!empty($_POST['name'])){
         $name = $_POST['name'];
         $sql = mysqli_query($con,"UPDATE user set name='$name' WHERE u_id=$id");
      }
	/*if(!empty($_POST['username'])){
                $name=$_POST['username'];
		$sql1="SELECT * FROM user WHERE username='$name'AND u_id!=$id";
        	$rs=mysqli_query($con,$sql1);
        	if(mysqli_num_rows($rs)==0){

                	$sql=mysqli_query($con,"UPDATE user SET username ='$name' WHERE u_id=$id");
			//echo "success";
			header('location:login.php');
			break;
                }
		else{
			$_SESSION['username']="Username is already exist";
			header('location:edit.php');
			break;
		}
        }*/
	/*set the session variable value*/
	$_SESSION['update']="Profile is updated";
	header('location:profile.php');
	mysqli_close($con);
      ?>
  </body>
</html>
