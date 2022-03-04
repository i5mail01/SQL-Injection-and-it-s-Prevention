<?php
session_start();
$con=mysqli_connect("localhost","root","ismail","ecommerce1") or die(mysqli_error($con));
$sql="SELECT * FROM products";
$result=mysqli_query($con,$sql);
if($result===false){  echo "<h1>There is no products database available</h1>"; }
$numrows=mysqli_num_rows($result);
 ?>

<!DOCTYPE html>
<html>
<head><title>E-Store | BEST ONLINE MOBILE SHOPPING STORE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

<style type="text/css">

</style>
</head>
<body style="font-family: Montserrat">
<?php

if(!isset($_SESSION['id'])){ 
	require 'header_logged_out.php';
	?>
  <div  class="container" style="margin-top: 60px;">
<b>
    <p>Hello &nbsp;&nbsp;guest &nbsp;&nbsp;Welcome to our E-Store,&nbsp;&nbsp;please <a data-toggle="modal" data-target="#pz" ><span></span> Login </a>/&nbsp;&nbsp;<a href="signup.php">signup</a> to access our services for you</p>
</b>
</div>
<div class="container" style="margin-top: 80px; margin-bottom: 100px">
	<div class="row row-style-login-page-pannel">
        <?php
            if($numrows>0){
                while($row=$result->fetch_assoc()){
        ?>
                <div class=" col-md-4 col-sm-6 col-xs-12">
			<div class="panel panel-default  ">
				<div class="panel-heading">Mobile <?= $row['id'] ?></div>
				<div class="panel-body">
                                       
                                        <center><img  class="img-responsive" src="images\phones\<?php echo$row['name']; ?>.jpg" width="215">
					<b> <?= $row['name'] ?> <br></b>Price:<?= $row['price'] ?>/-
                                        
                                        <a  data-toggle="modal" data-target="#pz" title="login to see full specification" ><span></span>specifications</a></center></center>
                                        
					<button class="btn btn-primary form-control" type="button" value="Submit"  name="btn" data-toggle="modal" data-target="#pz">Order Now!</button>


				</div>
			</div>
		</div>
        <?php }}else{
            echo "<h1>Unfortunately no products are avaiable</h1>";
        }
         ?>
	</div>
</div>


<div style="background-color: #333; color:white ;">
<?php require 'foot.php' ?>
</div>



<?php } else { 
	require 'header_logged_in.php'; 
?>

<div  class="container" style="margin-top: 60px;">
<b>

    <p>Hello &nbsp;&nbsp;&nbsp;<?php echo $_SESSION['name'] ?>&nbsp;&nbsp;&nbsp;welcome to our E-Store,&nbsp;&nbsp;We are here to provide you  the best services";</p>
 
</b>
</div>

<div class="container" style="margin-top: 50px; margin-bottom: 100px">
	<div class="row row-style-login-page-pannel">
    <?php
            if($numrows>0){
                while($row=$result->fetch_assoc()){
        ?>
        <div class=" col-md-4 col-sm-6 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading"># <?= $row['id'] ?></div>
				<div class="panel-body">
					<center><img  class="img-responsive" src="images\phones\<?php echo$row['name']; ?>.jpg" width="215">
                                            <b> <?= $row['name'] ?><br><br></b>
                                            <b>Price:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;₹&nbsp;&nbsp;<?= $row['price'] ?>/-<br><br></b></center>
                                        <b>specifications</b>
                                        <p>Brand &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Apple<br>
                                           Operating &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;iOS<br>
                                           Screen size &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.8 inches<br>
                                           Security &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Facial Recognition<br>
                                           Front camera &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12 MP<br>
                                           Rear camera &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12 MP</p>
					<button class="btn btn-primary form-control" title="click here to add this item in the cart" type="button" value="Submit"  name="btn" data-toggle="modal" data-target="#all">Add to Cart</button>
				</div>
			</div>
		</div>
        <?php }}else{
            echo "<h1>Unfortunately no products are avaiable</h1>";
        }
         ?>
	</div>
</div>

<?php } ?>

<?php require 'login_modal.php'; ?>
<?php require 'add_to_cart.php'; ?>


</body>
</html>