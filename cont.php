<?php
    function manualescape($str) {
        $res=str_replace(array( '\'','"',',',';','<','>','-','='),'',$str);
        return $res;
	}

	$con=mysqli_connect("localhost","root","ismail","ecommerce1") or die(mysqli_error($con));
	session_start();
 
	$name=manualescape($_POST['name']);
	$email=manualescape($_POST['email']);
	$message=manualescape($_POST['message']);

	$user_reg="insert into query(name,email,message) values('$name','$email','$message')";

	$result=mysqli_multi_query($con, $user_reg) or die(mysqli_error($con));
	$result=false;
	if($result===false){
		echo "<h1>Error in sending the query. Retry later</h1>";
		echo "<a href='index.php'><b>Go To Home</b></a>";
		exit();
	}else if ($result=== true){
		echo "<center>Thankyou for contacting us.<br>Our Representative will contact you soon. <br>";
	}
?>


<a href="index.php"> <?php echo "<br>Continue Shopping..!!</center>"; ?> </a>


 