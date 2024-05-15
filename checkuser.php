<?php 
session_start();
include "connection.php";


$username = $_POST['username'];
$password = $_POST['password'];


 echo $username;
 echo $password;
if(isset($_POST['button']))
{

	$qry = "select * from users where email='".$username."' and password='".$password."'";
	$res = mysqli_query($con,$qry);
	$res1 = mysqli_fetch_array($res);
	if ($res1!="")
	 {

	 	$_SESSION['id'] = $res1['id']; 
	 	$_SESSION['name'] = $res1['name']; 

	 	 
		echo '<script>
		alert(" Login Successfully");
		window.location="index.php"
		</script>';
	}

else
	{
	echo '<script>
		alert(" Login Unsuccessfully");
		window.location="index.php"
		</script>';


	}


}

?>