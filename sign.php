<?php
function inputvalid($x){
	if(str_contains($x, '\'') || str_contains($x, ';') || str_contains($x, '-')) {
		return 1;}}
$dbh = new mysqli("localhost", "root", "ismail", "ecommerce1") or die(mysqli_error($con));
session_start();
 if (isset($_POST['button'])) {
//method both parameterzied queries without PDO and input validation is carried out to detect any form of escape sequences
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$contact=$_POST['contact'];
$city=$_POST['city'];
$address=$_POST['address'];
$pass=$password;
$check=0;
		if(inputvalid($name)==1 || inputvalid($email)==1 || inputvalid($password)==1 || inputvalid($contact)==1 || inputvalid($city)==1 || inputvalid($address)==1){
			$check=1;
		}
		if($check==0){
		$stmt = $dbh->prepare("insert into users(name,email,password,contact,city,address) values(?,?,?,?,?,?)");
	    $stmt->bind_param("ssssss", $_POST['name'], $_POST['email'],$_POST['password'],$_POST['contact'],$_POST['city'],$_POST['address']);
	    $result=$stmt->execute();
		}
		else if($check==1){
			echo "<h1>Unable to signup</h1>";
		    echo "<a href='index.php'><b>Go To Home</b></a>";
			exit();
		}

	if($result===true)
	{
		$_SESSION['email']=$email;
		$_SESSION['name']=$name;
		$_SESSION['password']=$pass;
		$_SESSION['contact']=$contact;
		$_SESSION['id']=mysqli_insert_id($dbh);
		header("location:index.php");
	}
	else if($result===false){
		echo "<h1>Unable to signup</h1>";
		echo "<a href='index.php'><b>Go To Home</b></a>";
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

<style type="text/css">
	

</style>
</head>
<body>

		<div align="center">
			<a href="signup.php" class="btn btn-primary" type="submit" name="button">Try Signing Up again</a>						
		</div>
</body>
</html>
<?php
		//header('location: signup.php?exist_error=This email exists, Please login.');
	





}
?>

	
