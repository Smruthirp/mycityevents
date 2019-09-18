<?php $connect = mysqli_connect("localhost", "mycidhnt_indrakant", "Indrakant23", "mycidhnt_myevents"); ?>
<?php

session_start();

include "../login/server.php";
require_once('../location/geoplugin.class.php');
$em = "";
$nm = "";
// Getting Login Data from sign up
if (isset($_SESSION['email'])) {
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
}}


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


<!DOCTYPE html>
<html>
<head>
	<title>FAQs | My City Events</title>
<link rel="shortcut icon" href="../img/mylogo.png" type="image/x-icon">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css/style.css">
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

<style type="text/css">
	h2{
		text-transform: uppercase;
		font-size: 18px;
		padding: 5px;
		background-image: linear-gradient(transparent 50%, #ffdb96 50%);
		display: inline-block;
		margin-bottom: 10px;
	}p{
		padding: 15px;
		word-spacing: 2px;

	}
	ul li{
		list-style-type: lower-roman;
		padding: 5px;
	}
	.loginMe{
		text-decoration: none;
		margin-top: 21px;
		background: #ddd;
		color: #000;
		font-size: 14px;
		text-align: center;
		display: inline-block;
		padding: 7px;
		width: 100px;
		border-radius: 3px;
		margin-left: 20px;
	}
	.profileimg{
	object-fit: cover;
	object-position: top left;
}
	.mydetails{
		width: auto;
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
</head>
<body>

<!-- HEADER PART -->
 <header>
  <a href="../index.php"><img src="../img/mylogo.png" draggable="false" style="width:85px; float: left; padding-left: 15px; height: 60px;"></a>

	<form method="POST">
		<input type="text" name="search" class="event_search" required placeholder="Search an Event, Organiser or Location..">
		<button type="submit" name="submit-search" class="event_submit">Search</button>
	</form>

	<div class="dropdown">
	  <button onclick="myFunction()" class="dropbtn">Organizers<i class="fa fa-angle-down"></i></button>
	  <div id="myDropdown" class="dropdown-content">
	    <a href="create.php" target="_blank">Create Event</a>
	    <a href="how-it-works.php" target="_blank">How it Works</a>
	    <a href="faq.php" target="_blank">FAQs</a>
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
		<a href='google-login/logout.php'>Logout</a>
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
	echo "<a href='../google-login/login.php' class='loginMe'>Login</a>";
}

?>
</header><br><br><br><br>

<section>
	<h2>Frequently Asked Questions </h2><hr>
	<p><b>Qn. What is MyCityEvents Platform?</b></p>
	<p><b>Ans.</b> It’s a new age Event Promotion platform, where we support Marketing activities for your Events.</p>

	<p><b>Qn. Can I Promote Free Events?</b></p>
	<p><b>Ans.</b> Yes. You can List Free Events on our platform without any charges. </p>

		<p><b>Qn. Can I Promote Paid Events on this Platform?</b></p>
		<p><b>Ans.</b> Yes. You can List Paid Events on our platform with the Pricing terms & Conditions we have. 
		Please refer <a href="terms.php" target="_blank">Terms and Services</a> or <a href="privary-policy.php" target="_blank">Privary and Policy</a> page for further Information.
		</p>

		<p><b>Qn. Which Payment Platform do you accept payments in?</b></p>
		<p><b>Ans.</b> We accept payments via Paytm platform.</p>

		<p><b>Qn. How do you make the payments to Event Organizer?</b></p>
		<p><b>Ans.</b> We collect the bank account details of Organizer in Organizer Dashboard & Keep transferring the bulk amount frequently with order details.</p>


</section>




<script>
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

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

</div>
</body>
</html>
