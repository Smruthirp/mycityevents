<?php
require_once('../location/geoplugin.class.php');

$geoplugin = new geoPlugin();
$geoplugin->locate();

$mycity = "";
$mystate = "";
if (empty($_COOKIE["city"])){
	$mycity = $geoplugin->city;
}else{
	$mycity = $_COOKIE["city"];
}

if (empty($_COOKIE["state"])){
	$mystate = $geoplugin->region;
}else{
	$mystate = $_COOKIE["state"];
}
?>
<?php
$connect = mysqli_connect("localhost", "mycidhnt_indrakant", "Indrakant23", "mycidhnt_myevents");
ob_start();
include "../login/server.php";
ob_end_clean();
$em = "";
$nm = "";
$msg = "";
// Getting Login Data from sign up
$signEmail = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email='$signEmail'";
$result = mysqli_query($connect, $query);
$queryResult = mysqli_num_rows($result);
if($queryResult > 0){
while($row = mysqli_fetch_array($result)){

$name = $row['username'];
}
}else{
	echo "";
}

if (isset($_SESSION['email'])){
	$em = $_SESSION['email'];
	$nm = $name;
}else if (isset($_SESSION['access_token'])){
	$em = $_SESSION['email'];
	$nm = $_SESSION['givenName'];
}else{
	header('Location: ../google-login/login.php');
 	exit();
}
?>

<?php 
if(isset($_POST["submit"]))
{

	$name = $_POST['name'];
	$account = $_POST['account'];
	$ifsc = $_POST['ifsc'];
	$bank = $_POST['bank'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];

	$query = "INSERT INTO bankdetails(name, account, ifsc, bank, email, phone) VALUES ('$name', '$account', '$ifsc', '$bank', '$email', '$phone')";
	if(mysqli_query($connect, $query))
	{
		$msg = '<span>Account details added. Go to main page <a href="../index.php">click here</a></span>';
	}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Payout Settings | My City Events</title>
	<link rel="shortcut icon" href="../img/mylogo.png" type="image/x-icon">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/style.css">

<style type="text/css">
section{
	margin-top: 40px;
}
.para{
	background: linear-gradient(to left, #306e7f, skyblue);
	color: #FFF;
	display: inline-block;
	position: relative;
	left: 50%;
	padding: 13px;
	margin-bottom: 10px;
	border-radius: 3px;
	transform: translateX(-50%);
}

table{
	margin-top: 60px;
	margin-left: auto;
	margin-right: auto;
}
h3{
	float: left;
	color: #000;
	font-size: 18px;
	font-weight: bold;
	margin-top: -20px;
	text-transform: uppercase;
}
input[type="number"]::-webkit-inner-spin-button,input[type="number"]::-webkit-outer-spin-button{
	-webkit-appearance: none; 
}
label{
	float: right;
	padding-right: 20px;
	padding-top: 10px;
}

input{
	outline: none;
	border-radius: 2px;
	border: 1px solid #ccc;
	padding: 6px;
	width: 300px;
	font-size: 14px;
	padding-top: 10px;
	padding-left: 20px;
	margin-top: 10px;
}
input[type="submit"]{
	background: #eaa40e;
	outline: none;
	color: #FFF;
	margin-top: 15px;
	cursor: pointer;
	font-weight: bold;
	text-transform: uppercase;
	width: 100px;
	border: none;
	padding: 5px;
	float: right;
}
.profileimg{
	object-fit: cover;
	object-position: top left;
}
footer{
	background: #251830;
	height: 150px;
	padding: 30px 0 0 0;
	border-top: 2px solid #333;
}
footer a{
	text-decoration: none;
	color: #f1f1f1;
	display: inline-block;
	margin: 5px;
	font-family: 'Raleway', sans-serif;
	font-weight: normal;
	padding: 5px;
	font-size: 14px;
}
footer a:hover{
	text-decoration: underline;
}
.copyright{
	background: #130a1c;
	padding: 15px;
	margin-top: 70px;
	color: #aaa;
	font-size: 13px;
}
.nearby{
	position: absolute;
	background: #FFF;
	border-radius: 0 0 3px 3px;
	width: auto;
	left: 130px;
	display: none;
	height: auto;
	top: 60px;
	padding: 15px;
	box-shadow: 0px 0px 2px #000;
}
.nearby p{
	font-size: 15px;
	padding-bottom: 5px;
	border-bottom: none;
}
.nearby a{
	display: inline-block;
	float: left;
	padding: 3px 10px;
	margin: 5px 0px;
	font-size: 13px;
	background: #f48f42;
	color: #fff;
	border-radius: 3px;
	text-transform: uppercase;
	text-decoration: none;
}

</style>
<script type="text/javascript">
$(document).ready(function(){
    
    $('.mylocation').click( function(e) {
        e.preventDefault();
        e.stopPropagation();
        $('.nearby').toggle();
    });
    $('.nearby').click( function(e) {
        e.stopPropagation();
    });
    $('body').click( function() {
        $('.nearby').hide();
    });

// FOR PROFILE
    $('.profileimg').click( function(e) {
    e.preventDefault();
    e.stopPropagation();
    $('.mydetails').toggle();

    });
    $('.mydetails').click( function(e) {
        e.stopPropagation();
    });
    $('body').click( function() {
        $('.mydetails').hide();
    });
    
});

</script>
</head>
<body>

<!-- HEADER PART -->
 <header>
  <a href="index.php"><img src="../img/mylogo.png" draggable="false" style="width:85px; float: left; padding-left: 15px; height: 60px;"></a>
	<form method="POST">
		<input type="text" name="search" class="event_search" required placeholder="Search an Event, Organiser or Location..">
		<button type="submit" name="submit-search" class="event_submit">Search</button>
	</form>

	<div class="dropdown">
	  <button onclick="myFunction()" class="dropbtn">Organizers<i class="fa fa-angle-down"></i></button>
	  <div id="myDropdown" class="dropdown-content">
	    <a href="create.php">Create Event</a>
	    <a href="#about">How it Works</a>
	    <a href="#contact">FAQs</a>
	  </div>
	</div>

<button class="mylocation"><?php echo $mycity;?><i class="fa fa-angle-down"></i></button>
	<div class="nearby">
	<p>Not in <?php echo $mycity;?>?</p>
	<a href="changecity.php">Change your city</a><br>
</div>

<?php

if (isset($_SESSION['access_token'])) {
	
	$em = $_SESSION['email'];
	$nm = $_SESSION['givenName'];
	echo "
	<img class='profileimg' src=".$_SESSION['picture']." title=".$_SESSION['givenName'] .">
	<div class='mydetails'>
	<div class='organiser' style='float: left; border-right: 1px solid #ccc; padding-right: 15px;'>
	<p style='border-bottom: 1px solid #ccc; padding-bottom: 10px;'>Organiser Profile</p>
	<p><b>".$_SESSION['givenName']. " ".$_SESSION['familyName']. "</b></p>
	<p>".$_SESSION['email'] ."</p><br>
	<a href='create.php' target='_blank'>Create Event</a>
	<a href='my-events.php' target='_blank'>My Events</a>
	<a href='organiser.php' target='_blank'>My Profile</a>
	<a href='payout-settings.php' target='_blank'>Payout Settings</a>
	</div>

	<div class='attendee' style='float: right; padding-right: 15px; text-align: right;'>
		<p style='border-bottom: 1px solid #ccc; padding-bottom: 10px;'>Attendee Profile</p>
		<p style='padding-bottom: 0px;'>".$_SESSION['givenName']." ".$_SESSION['familyName']."</p>
		<p>".$_SESSION['email']." </p><br>
		<a href='booking-history.php' target='_blank'>Booking History</a>
		<a href='../google-login/logout.php'>Logout</a>
	</div>
</div>
";	
}else if (isset($_SESSION['email'])) {
$query = "SELECT * FROM users WHERE email='$signEmail'";
$result = mysqli_query($connect, $query);
$queryResult = mysqli_num_rows($result);
if($queryResult > 0){
while($row = mysqli_fetch_array($result)){
	if ($row['profile'] !=""){
	echo "
	<img class='profileimg' src='data:image/jpeg;base64,".base64_encode($row["profile"] )."'/>
	";
}else{
	echo "
	<img class='profileimg' src='../img/user.png'/>
	";
}
	echo "
	<div class='mydetails'>
	<div class='organiser' style='float: left; border-right: 1px solid #ccc; padding-right: 15px;'>
	<p style='border-bottom: 1px solid #ccc; padding-bottom: 10px;'>Organiser Profile</p>
	<p><b>".$name."</b></p>
	<p>".$_SESSION['email']."</p><br>
	<a href='create.php' target='_blank'>Create Event</a>
	<a href='my-events.php' target='_blank'>My Events</a>
	<a href='organiser.php' target='_blank'>My Profile</a>
	<a href='payout-settings.php' target='_blank'>Payout Settings</a>
	</div>

	<div class='attendee' style='float: right; padding-right: 15px; text-align: right;'>
		<p style='border-bottom: 1px solid #ccc; padding-bottom: 10px;'>Attendee Profile</p>
		<p style='padding-bottom: 0px;'>".$name."</p>
		<p>".$_SESSION['email']." </p><br>
		<a href='booking-history.php' target='_blank'>Booking History</a>
		<a href='../google-login/logout.php'>Logout</a>
	</div>
</div>
";	
}}}
else{
	echo "<a href='../google-login/login.php'>Login</a>";
}

?>
</header><br><br><br>

<section>
	<p class="para">Please add a bank account where you want to receive your ticketing Payments.</p>
	
	<h3>Add bank account</h3>
	<form method="POST" action="payout-settings.php">
	  <table>
		<tr><?php echo "$msg"; ?></tr>
		<tr>
		  <td><label for="name">Account Holder Name</label></td>
		  <td><input type="text" name="name" placeholder="e.g. Santosh Koraddi" id="name" required></td>
		</tr>

		<tr>
		  <td><label for="account">Account Number</label></td>
		  <td><input type="text" name="account" placeholder="e.g. 40569803214598" id="account" required><br></td>
		</tr>

		<tr>
		  <td><label for="ifsc">IFSC Code</label></td>
		  <td><input type="text" name="ifsc" placeholder="e.g. SBI0000123" id="ifsc" required><br></td>
		</tr>

		<tr>
		  <td><label for="bank">Bank Name</label></td>
		  <td><input type="text" name="bank" placeholder="e.g. State Bank of India" id="bank" required><br></td>
		</tr>

		<tr>
		  <td><label for="email">Email</label></td>
		  <td><input type="email" name="email" placeholder="e.g. santosh@Koraddi.com" id="email" required><br></td>
		</tr>

		<tr>
		  <td><label for="phone">Phone Number</label></td>
		  <td><input type="number" name="phone" placeholder="e.g. 9876543210" id="phone" required><br></td>
		</tr>
		
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Add"></td>
		</tr>

</table>
	</form>
</section>

<!-- FOOTER PART -->
<footer>
	<a href="about.php" target="_blank">About</a>
	<a href="terms.php" target="_blank">Terms of service</a>
	<a href="privary-policy.php" target="_blank">Privacy Policy</a>
	<a href="pricing.php" target="_blank">Pricing</a>
	<a href="contact.php" target="_blank">Contact us</a>
	<img src="../img/mylogo.png" draggable="false" style="width:130px; float: right; padding-right: 30px;">
	<br/><a href="https://www.facebook.com/MyCityEvents2019/" target="_blank"><i class="fa fa-facebook-square" style="font-size: 18px"></i></a>
	<a href="https://www.linkedin.com/company/my-city-events" target="_blank"><i class="fa fa-linkedin" style="font-size: 18px"></i></a>
	<div class="copyright">
		© Copyright 2019. All Rights Reserved.
	</div>
</footer>

</body>
</html>