<?php
$connect = mysqli_connect("localhost", "mycidhnt_indrakant", "Indrakant23", "mycidhnt_myevents");
require_once('../location/geoplugin.class.php');
session_start();
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
$conn = mysqli_connect("localhost", "root", "", "registration"); 
ob_start();
include "../login/server.php";
ob_end_clean();
$em = "";
$nm = "";
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
if(isset($_GET['del_task'])){
	$id = $_GET['del_task'];
	mysqli_query($connect, "DELETE FROM image_table WHERE ID = $id");
	header('location: my-events.php');
}
$task = mysqli_query($connect, "SELECT * FROM image_table");

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>My Events | My City Events</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link rel="shortcut icon" href="../img/mylogo.png" type="image/x-icon">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">

<style type="text/css">
	*{margin: 0;}
body{
	font-family: 'Roboto', sans-serif;
	background: #f1f1f1;
	}
header{
	background: #FFF;
	position: fixed;
	width: 100%;
	height: 60px;
	z-index: 1000;
	background: /* gradient can be an image */
    linear-gradient(to left, #54aac9 0%, #54aac9 12%, #4dc170 47%, #54aac9 100%)left bottom #fff no-repeat; background-size:100% 3px ;
    box-shadow: 0 0 3px #000;
	}
header h1 a{
	text-decoration: none;
	color: #000;
	float: left;
	font-family: 'Philosopher', sans-serif;
	font-size: 24px;
	padding-left: 15px;
	line-height: 50px;
}
.mydetails{
	width: auto;
}
section{
	width: 100%;
	background: #fff;
	height: auto;
	padding: 15px 0;
	margin-top: 10px;
	border-radius: 3px;
	box-shadow: 0 0 5px #ccc;
	margin-bottom: 30px;
}
h4{
	text-align: center;
	color: #2b2e3a;
	border-bottom: 1px solid #ddd;
	padding-bottom: 10px;
	font-size: 20px;

}
.container{
	width: 292px;
	height: 310px;
	margin: 10px;
	display: inline-block;
	box-shadow: 0 0 5px #ccc;
	}
.profileimg{
	object-fit: cover;
	object-position: top left;
}
.container img{
	width: 100%;
	height: 180px;
	object-fit: cover;
	}
.banner{
	width: 100%;
	position: relative;
	object-fit: cover;
	height: 550px;
	}
a .details{
	color: #000;
	font-size: 17px;
	height: 70px;
	padding: 15px 0 0 15px;
	}
.date{
	text-transform: uppercase;
	border: 1px solid green;
	display: inline-block;
	border-radius: 3px;
	color: green;
	padding: 3px;
	font-size: 13px;
	margin-left: 5px;
}

header form{
	float: right;
	margin-top: 20px;
	margin-right: 20px;
}
.event_search{
	outline: none;
	background: #ddd;
	border: none;
	padding: 8px; 
	margin: 0px;
	border-radius: 3px 0 0 3px;
}
.event_search:focus{
	background: #fff;
	box-shadow: 0 0 3px #ccc;
}

.event_submit{
	outline: none;
	background: unset;
	border: none;
	background: #402f60;
	margin-left: -5px;
	border-radius: 0 3px 3px 0;
	padding: 8px;
	color: #fff;
	width: 70px;
}

h3{
	position: absolute;
	top: 200px;
	left: 50%;
	transform: translateX(-50%);
	color: #fff;
	font-weight: normal;
	font-size: 25px;
}
.box{
	position: absolute;
	top: 200px;
	left: 48%;
	transform: translateX(-40%);
	color: #fff;
	font-size: 19px;	
}
.box h1{
	text-shadow: 2px 2px 7px #000;
}

.box input{
	border: none;
	outline: none;
	background: #FFF;
	padding: 11px;
	margin-left: 50px;
	border-radius: 3px 0 0 3px;
	font-size: 16px;
	margin-top: 70px;
}
.box select{
	border: none;
	outline: none;
	background: #FFF;
	padding: 10px;
	font-size: 15px;
	margin-left: -5px;
	border-left: 1px solid #ddd;
	height: 40px;
}

.box button{
	background: unset;
	border: none;
	border-radius: 0 3px 3px 0;
	outline: none;
	background: linear-gradient(to right, #192547, #3a1942);
	margin-left: -5px;
	color: #fff;
	font-size: 15px;
	width: 100px;
	padding: 12px;
}
.dropbtn{
	border: none;
	background: unset;
	float: right;
	cursor: pointer;
	margin-right: 10px;
	margin-top: 20px;
	padding: 8px;
	outline: none;
	position: relative;
	border-radius: 3px;
	background: rgba(0,0,0,.1);
}
.dropdown {
  position: relative;
}

.dropdown-content {
  display: none;
  background-color: #f1f1f1;
  overflow: auto;
  float: right;
  border-radius: 0 0 3px 3px;
  position: relative;
  top: 55px;
  left: 100px;
  width: 100px;
  z-index: 1;
}
.dropdown-content a {
  color: black;
  padding: 5px;
  font-size: 14px;
  border-bottom: 1px solid #ddd;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
.fa{
	padding-left: 10px;
	font-size: 15px;
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
.google-login{
	width: auto;
	background: #FFF;
	border: none;
	outline: none;
	line-height: 20px;
	font-family: 'Roboto', sans-serif;
	box-shadow: 0 0 4px #ccc;
	border-radius: 2px;
	padding: 5px;
	margin-top: 15px;
	margin-left: 20px;
}
.google-login img{
	float: left;
	width: 23px;
	padding-right: 15px;
}
.mylocation{
	border: none;
	background: unset;
	cursor: pointer;
	margin-left: 30px;
	margin-top: 20px;
	padding: 8px;
	outline: none;
	float: left;
	position: relative;
	border-radius: 3px;
	background: rgba(0,0,0,.1);	
}
.nearby{
	position: absolute;
	background: #FFF;
	border-radius: 3px;
	width: 350px;
	left: 130px;
	display: none;
	height: auto;
	top: 60px;
	padding: 15px;
	box-shadow: 0px 2px 4px #ccc;
}
.nearby p{
	font-size: 15px;
	padding-bottom: 5px;
	border-bottom: 1px solid #ccc;
}
.nearby a{
	display: inline-block;
	float: left;
	padding: 3px;
	margin: 3px;
	font-size: 14px;
	color: #5daec6;
	text-decoration: none;
}
.profile{
	/*width: 300px;*/
	float: left;
	background: red;
	height: 60px;
}
.profileimg{
	height: 45px;
	width: 45px;
	cursor: pointer;
	margin-top: 10px;
	position: relative;
	margin-left: 20px;
	border-radius: 50px;
}
.mydetails{
	position: absolute;
	background: #fff;
	width: 300px;
	height: 200px;
	left: 240px;
	box-shadow: 0 2px 3px #ccc;
	display: none;
	border-radius: 0 0 3px 3px;
}
.mydetails p{
	padding: 10px 0 0 10px;
	font-size: 14px;
	padding-bottom: 0;
	margin: 0;
	color: #3d404c;
}
.mydetails p:last-child{
	border-bottom: 1px solid #ccc;
	padding-bottom: 15px;
}
.mydetails a{
	display: block;
	width: auto;
	color: #39bfbf;
	font-size: 14px;
	padding: 2px 0 3px 10px;
}a{
	text-decoration: none;
}
.delete_task{
	text-decoration: none;
	float: right;
	font-family: 'Roboto';
	border: 1px solid #ad343c;
	color: #ad343c;
	padding: 3px;
	margin-right: 5px;
	width: auto;
	text-transform: uppercase;
	text-align: center;
	font-size: 13px;
	border-radius: 3px;
}
.edit_task{
	text-decoration: none;
	float: left;
	position: absolute;
	margin-left: -80px;
	margin-top: -260px;
	font-family: 'Roboto';
	background: #6857a5;
	color: #fff;
	padding: 3px;
	margin-right: 5px;
	width: auto;
	padding: 6px;
	text-transform: uppercase;
	text-align: center;
	font-size: 13px;
	border-radius: 3px;
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

 <header>
  <a href="../index.php"><img src="../img/mylogo.png" draggable="false" style="width:85px; float: left; padding-left: 15px; height: 60px;"></a>

	<form method="POST">
		<input type="text" name="search" class="event_search" required placeholder="Search an Event, Organiser or Location..">
		<button type="submit" name="submit-search" class="event_submit">Search</button>
	</form>

	<div class="dropdown">
	  <button onclick="myFunction()" class="dropbtn">Organizers<i class="fa fa-angle-down"></i></button>
	  <div id="myDropdown" class="dropdown-content">
	    <a href="create.php">Create Event</a>
	    <a href="how-it-works.php">How it Works</a>
	    <a href="faq.php">FAQs</a>
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
	header('Location: ../google-login/login.php');
}

?>

</header>
<br><br><br>
<section>
	<?php $curcountry =  $geoplugin->countryName; ?>
	<h4>Events Created by You</h4>
	<?php 
	$myemail = $_SESSION['email'];
	$query = "SELECT * FROM image_table WHERE myemail LIKE '$myemail' ORDER BY id DESC";
	$result = mysqli_query($connect, $query);
	while($row = mysqli_fetch_array($result)){
	$sDate = $row['startDate'];
	$stDate = date("l, M d", strtotime($sDate));
	echo '
	<a href="details.php?sel_task='.$row["ID"].'"><div class="container">
	<img src="data:image/jpeg;base64,'.base64_encode($row['myimage'] ).'"/>
	<p class="details">'.$row['event'].' event in '.$row['city'].'</p>
	<a class="delete_task" href="my-events.php?del_task='.$row['ID'].'">Delete Event<i class="fa fa-trash"></i></a>
	<a class="date" href="edit-events.php?sel_task='.$row['ID'].'">Edit event<i class="fa fa-edit"></i></a>
	</div></a>
	';
}
 ?>
</section>



<script>
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn, .fa-angle-down')) {
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


</body>
</html>