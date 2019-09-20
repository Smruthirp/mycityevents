<?php 
session_start();
include "login/server.php";
$connect = mysqli_connect("localhost", "mycidhnt_indrakant", "Indrakant23", "mycidhnt_myevents");
?>
<?php


require_once('location/geoplugin.class.php');

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

// Getting Login Data from sign up
if (isset($_SESSION['email'])) {
$signEmail = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email='$signEmail' ";
$result = mysqli_query($connect, $query);
$queryResult = mysqli_num_rows($result);
if($queryResult > 0){
while($row = mysqli_fetch_array($result)){

$name = $row['username'];
}
}else{
	echo "";
}}
?>

<!DOCTYPE html>
<html>
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-139435553-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-139435553-1');
</script>    
	<title>My City Events</title>

<link rel="shortcut icon" href="img/mylogo.png" type="image/x-icon">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/style.css">
<style type="text/css">
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
	.nearby{
	    width: auto;
	    height: auto;
	    left: 100px;
	    border-radius: 0 0 3px 3px;
	    box-shadow: 0 2px 2px #000;
	}
	.nearby a{
	    color: #000;
	    border-radius: 3px;
	    margin-left: 0px;
	    margin-top: 10px;
	    width: 113px;
	    background: orange;
	}

    .box h1{
        text-align: center;
    }
    .mydetails{
	    width: 450px;
	}
    .mydetails p{
		font-size: 12px;
	}

	.organiser{width: 40%;}
	.container img{
		object-position: top;
	}
	.mainform{
	    margin-top: -40px;
	    margin-left: -50px;
	}
		
	@media screen and (max-width: 800px) {
	.mainsearch{
		display: none;
	}
	.dropbtn{
		margin-left: 0px;
		padding: 8px 2px;
	}
	.mainform{
	    margin-top: 0px;
	    margin-left: 0px;
	}
	.mylocation{
		margin-left: 0px;
		margin-right: 35px;
		float: right;
		padding: 8px 2px;
		position: fixed;
	}
	.loginMe{
		margin-top: 21px;
		font-size: 14px;
		padding: 7px;
		width: auto;
		float: right;
		margin-left: 100px;
		position: fixed;
}
	.profileimg{
		margin-right: 0px;
		position: fixed;
		width: 40px;
		margin-left: 100px;
		margin-top: 15px;
		height: 40px;
	}
	.box{
		position: absolute;
		top: 200px;
		left: 20px;
		transform: translateX(0%);
		color: #fff;
		margin-left: auto;
		margin-right: auto;
		font-size: 19px;	
	}
	.box h1{
		font-size: 25px;
		text-align: left;
	}
	.box input,.box select{
		border: none;
		outline: none;
		background: #FFF;
		padding: 11px;
		width: 87%;
		margin-left: 0px;
		border-radius: 3px 3px 0 0;
		font-size: 15px;
		margin-top: 20px;
	}
	.box select{
		margin-top: 1px;
		width: 93.5%;
		border-radius: 0 0 3px 3px;
	}
	.box button{
		background: unset;
		border: none;
		border-radius: 3px;
		outline: none;
		background: linear-gradient(to right, #192547, #3a1942);
		margin-left: 0px;
		color: #fff;
		margin-top: 20px;
		font-size: 15px;
		width: 93.5%;
		padding: 12px;
	}
	.container{
		display: block;
		margin-left: auto;
		margin-right: auto;
		color: grey;
		width: 95%;
		height: auto;
		border-radius: 3px;
		padding-bottom: 10px;
	}
	.container img{
		border-radius: 3px 0px 0px 0px;
		float: left;
		width: 100px;
		margin-right: 5px;
		height: 115px;
		object-position: top;
	}
	a .details{
	    font-size: 14px;
	}
	a{text-decoration: none;}
	footer a{
		font-size: 12px;
	}
	.mydetails{
		left: 0;
		width: 100%;
		padding: 0px;
	}
	
	.mydetails p{
		font-size: 11px;
	}
	.date{
	    font-size: 11px;
	    padding: 3px;
	}
	.dropdown-content {
        top: 60px;
        right: 0px;
 }

}
	
section{
	width: -webkit-fill-available;
	background: #fff;
	height: auto;
	padding: 15px 0;
	margin-top: 10px;
	border-radius: 3px;
	box-shadow: 0 0 5px #ccc;
	margin: 30px;
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
  <a href="index.php"><img src="img/mylogo.png" draggable="false" style="width:85px; float: left; padding-left: 15px; padding-right: 15px; height: 60px;"></a>

	<form method="POST" class="mainsearch" action="pages/city.php">
		<input type="text" name="search" class="event_search" required placeholder="Search Events, Organiser, City etc">
		<button type="submit" name="submit-search" class="event_submit">Search</button>
	</form>

	<div class="dropdown">
	  <button onclick="myFunction()" class="dropbtn">Organizers<i class="fa fa-angle-down"></i></button>
	  <div id="myDropdown" class="dropdown-content">
	    <a href="pages/create.php" target="_blank">Create Event</a>
	    <a href="pages/how-it-works.php" target="_blank">How it Works</a>
	    <a href="pages/faq.php" target="_blank">FAQs</a>
	  </div>
	</div>

<button class="mylocation"><?php echo $mycity;?><i class="fa fa-angle-down"></i></button>
<div class="nearby">
<p>Not in <?php echo $mycity;?>?</p>
<a href="pages/changecity.php">Change your city</a>
<br><br>
</div>
<?php

if (isset($_SESSION['access_token'])) {
    
    $username = $_SESSION['givenName'] . ' '. $_SESSION['familyName'];
    $email = $_SESSION['email']; 
    $query = "INSERT INTO users (username, email) 
					  VALUES('$username', '$email')";
    
	echo "
	<img class='profileimg' src=".$_SESSION['picture']." title=".$_SESSION['givenName'] .">
	<div class='mydetails'>
	<div class='organiser' style='float: left; border-right: 1px solid #ccc; padding-right: 45px;'>
	<p style='border-bottom: 1px solid #ccc; padding-bottom: 10px;'>Organiser Profile</p>
	<p><b>".$_SESSION['givenName']. " ".$_SESSION['familyName']. "</b></p>
	<p>".$_SESSION['email'] ."</p><br>
	<a href='pages/create.php' target='_blank'>Create Event</a>
	<a href='pages/my-events.php' target='_blank'>My Events</a>
	<a href='pages/payout-settings.php' target='_blank'>Payout Settings</a>
	</div>

	<div class='attendee' style='float: right; padding-right: 15px; text-align: right;'>
		<p style='border-bottom: 1px solid #ccc; padding-bottom: 10px;'>Attendee Profile</p>
		<p style='padding-bottom: 0px;'>".$_SESSION['givenName']." ".$_SESSION['familyName']."</p>
		<p>".$_SESSION['email']." </p><br>
		<a href='pages/booking-history.php' target='_blank'>Booking History</a>
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
	<img class='profileimg' src='img/user.png'/>
	";
}
	echo "
	<div class='mydetails'>
	<div class='organiser' style='float: left; border-right: 1px solid #ccc; padding-right: 45px;'>
	<p style='border-bottom: 1px solid #ccc; padding-bottom: 10px;'>Organiser Profile</p>
	<p><b>".$name."</b></p>
	<p>".$_SESSION['email']."</p><br>
	<a href='pages/create.php' target='_blank'>Create Event</a>
	<a href='pages/my-events.php' target='_blank'>My Events</a>
	<a href='pages/payout-settings.php' target='_blank'>Payout Settings</a>
	</div>

	<div class='attendee' style='float: right; padding-right: 15px; text-align: right;'>
		<p style='border-bottom: 1px solid #ccc; padding-bottom: 10px;'>Attendee Profile</p>
		<p style='padding-bottom: 0px;'>".$name."</p>
		<p>".$_SESSION['email']." </p><br>
		<a href='pages/booking-history.php' target='_blank'>Booking History</a>
		<a href='pages/edit-picture.php?edit=".$row['email']."'>Edit profile picture</a>
		<a href='google-login/logout.php'>Logout</a>

	</div>
</div>
";	
}}}
else{
	echo "<a href='google-login/login.php' class='loginMe'>Login</a>";
}
?>


</header>
<img src="img/banner2-min.jpg" class="banner">

<div class="box">
	<h1>Explore Events in Your City</h1>
<form action="pages/city.php" method="POST" class="mainform">
	<input type="text" name="cityname" id="city_search" required placeholder="Search Events, Organiser, City etc">		
	<select id="category" name="message">
		<option value="">All Events</option>
		<option value="Concerts">Concerts</option>
		<option value="Parties">Parties</option>
		<option value="Exhibitions">Exhibitions</option>
		<option value="Sports">Sports</option>
		<option value="Arts & Theatre">Arts & Theatre</option>
		<option value="Adventures">Adventures</option>
		<option value="Food & Drinks">Food & Drinks</option>
		<option value="Health & Wellness">Health & Wellness</option>
		<option value="Festivals">Festivals</option>
		<option value="Meetups">Meetups</option>
		<option value="Business">Business</option>
	</select>
	<button type="submit" name="explore" id="explore">Search</button>
</form>
</div>



<section>
	<h4>Recently added events</h4>
<?php 
	$query = "SELECT * FROM image_table WHERE endDate >= CURDATE() ORDER BY id DESC LIMIT 4";
	$result = mysqli_query($connect, $query);
	$queryResult = mysqli_num_rows($result);
	if($queryResult > 0){
	while($row = mysqli_fetch_array($result)){

	$amount1 = $row['amount1'];
	$amount2 = $row['amount2'];
	$amount3 = $row['amount3'];
	$amount4 = $row['amount4'];
	$amount5 = $row['amount5'];
	$amount6 = $row['amount6'];
	$amount7 = $row['amount7'];
	$amount8 = $row['amount8'];

	$paidlink = $row['paidlink'];
	$avg = $amount1+$amount2+$amount3+$amount4+$amount5+$amount6+$amount7+$amount8;
	
	$array = array($row['amount1'],$row['amount2'],$row['amount3'],$row['amount4'],$row['amount5'],$row['amount6'],$row['amount7'],$row['amount8']);
	
    $array = array_diff($array, [0]);   
	$subArray = min($array);

	if($avg > 0){
		$fees = "Rs. ". $subArray . " onwards";
	}else{
		$fees = "Free";
	}
	if($paidlink != ""){
	$fees = "Paid";	
	}

	$sDate = $row['startDate'];
	$stDate = date("l, M d", strtotime($sDate));
	echo '
	<a href="pages/details.php?sel_task='.$row["ID"].'"><div class="container">
	<img src="data:image/jpeg;base64,'.base64_encode($row['myimage'] ).'"/>
	
	<p class="details">'.$row['event'].' event in '.$row['city'].'</p>
	<p class="date">'.$stDate.'</p>
	<p class="date" style="float: right; border: 1px solid green; color: green; min-width: 80px; text-align: center; margin-right: 5px;">'.$fees.'<i class="fa fa-ticket"></i></p>
	</div></a>
	';
}}
else{
	echo "<p style='padding: 15px;'>No recent event found.</p>";
	}

 ?>
 </section>
	
<section>
	<?php $curcity =  $mycity; ?>
	<h4>Trending Events in <?php echo "$curcity"; ?></h4>
	<?php 
	$query = "SELECT * FROM image_table WHERE endDate >= CURDATE() AND city = '$curcity' ORDER BY views DESC LIMIT 4";
	$result = mysqli_query($connect, $query);
	$queryResult = mysqli_num_rows($result);
	if($queryResult > 0){

	while($row = mysqli_fetch_array($result)){

	$amount1 = $row['amount1'];
	$amount2 = $row['amount2'];
	$amount3 = $row['amount3'];
	$amount4 = $row['amount4'];
	$amount5 = $row['amount5'];
	$amount6 = $row['amount6'];
	$amount7 = $row['amount7'];
	$amount8 = $row['amount8'];

	$paidlink = $row['paidlink'];
	$avg = $amount1+$amount2+$amount3+$amount4+$amount5+$amount6+$amount7+$amount8;

	$array = array($row['amount1'],$row['amount2'],$row['amount3'],$row['amount4'],$row['amount5'],$row['amount6'],$row['amount7'],$row['amount8']);
	
    $array = array_diff($array, [0]);   
	$subArray = min($array);

	if($avg > 0){
		$fees = "Rs. ". $subArray . " onwards";
	}else{
		$fees = "Free";
	}
	if($paidlink != ""){
	$fees = "Paid";	
	}

	$sDate = $row['startDate'];
	$stDate = date("l, M d", strtotime($sDate));
	echo '
	<a href="pages/details.php?sel_task='.$row["ID"].'"><div class="container">
	<img src="data:image/jpeg;base64,'.base64_encode($row['myimage'] ).'"/>
	
	<p class="details">'.$row['event'].' event in '.$row['city'].'</p>
	<p class="date">'.$stDate.'</p>
	<p class="date" style="float: right; border: 1px solid green; color: green; min-width: 80px; text-align: center; margin-right: 5px;">'.$fees.'<i class="fa fa-ticket"></i></p>
	</div></a>
	';
}
}else{
	echo "<p style='padding: 15px;'>No events created yet in $curcity</p>";
}

?>
</section>

<section>
	<?php $curregion =  $mystate; ?>
	<h4>Trending Events in <?php echo "$curregion"; ?></h4>
	<?php 
	$query = "SELECT * FROM image_table WHERE location LIKE '%$curregion%' AND endDate >= CURDATE() ORDER BY views DESC LIMIT 4";
	$result = mysqli_query($connect, $query);
	$queryResult = mysqli_num_rows($result);
	if($queryResult > 0){

	while($row = mysqli_fetch_array($result)){

	$amount1 = $row['amount1'];
	$amount2 = $row['amount2'];
	$amount3 = $row['amount3'];
	$amount4 = $row['amount4'];
	$amount5 = $row['amount5'];
	$amount6 = $row['amount6'];
	$amount7 = $row['amount7'];
	$amount8 = $row['amount8'];

	$paidlink = $row['paidlink'];
	$avg = $amount1+$amount2+$amount3+$amount4+$amount5+$amount6+$amount7+$amount8;
	
    $array = array($row['amount1'],$row['amount2'],$row['amount3'],$row['amount4'],$row['amount5'],$row['amount6'],$row['amount7'],$row['amount8']);
	
    $array = array_diff($array, [0]);   
	$subArray = min($array);

	if($avg > 0){
		$fees = "Rs. ". $subArray . " onwards";
	}else{
		$fees = "Free";
	}
	if($paidlink != ""){
	$fees = "Paid";	
	}

	$sDate = $row['startDate'];
	$stDate = date("l, M d", strtotime($sDate));
	echo '
	<a href="pages/details.php?sel_task='.$row["ID"].'"><div class="container">
	<img src="data:image/jpeg;base64,'.base64_encode($row['myimage'] ).'"/>
	
	<p class="details">'.$row['event'].' event in '.$row['city'].'</p>
	<p class="date">'.$stDate.'</p>
	<p class="date" style="float: right; border: 1px solid green; color: green; min-width: 80px; text-align: center; margin-right: 5px;">'.$fees.'<i class="fa fa-ticket"></i></p>
	</div></a>
	';
}
}else{
	echo "<p style='padding: 15px;'>No events created yet in $curregion</p>";
}

?>
</section>

<section>
    <?php $curcountry =  $geoplugin->countryName; ?>
	<h4>Trending Events in <?php echo "$curcountry"; ?></h4>
<?php 
	$query = "SELECT * FROM image_table WHERE location LIKE '%$curcountry%' AND endDate >= CURDATE() ORDER BY views DESC LIMIT 4";
	$result = mysqli_query($connect, $query);
	$queryResult = mysqli_num_rows($result);
	if($queryResult > 0){
	while($row = mysqli_fetch_array($result)){

	$amount1 = $row['amount1'];
	$amount2 = $row['amount2'];
	$amount3 = $row['amount3'];
	$amount4 = $row['amount4'];
	$amount5 = $row['amount5'];
	$amount6 = $row['amount6'];
	$amount7 = $row['amount7'];
	$amount8 = $row['amount8'];

	$paidlink = $row['paidlink'];
	$avg = $amount1+$amount2+$amount3+$amount4+$amount5+$amount6+$amount7+$amount8;

$array = array($row['amount1'],$row['amount2'],$row['amount3'],$row['amount4'],$row['amount5'],$row['amount6'],$row['amount7'],$row['amount8']);
	
    $array = array_diff($array, [0]);   
	$subArray = min($array);

	if($avg > 0){
		$fees = "Rs. ". $subArray . " onwards";
	}else{
		$fees = "Free";
	}
	if($paidlink != ""){
	$fees = "Paid";	
	}

	$sDate = $row['startDate'];
	$stDate = date("l, M d", strtotime($sDate));
	echo '
	<a href="pages/details.php?sel_task='.$row["ID"].'"><div class="container">
	<img src="data:image/jpeg;base64,'.base64_encode($row['myimage'] ).'"/>
	
	<p class="details">'.$row['event'].' event in '.$row['city'].'</p>
	<p class="date">'.$stDate.'</p>
	<p class="date" style="float: right; border: 1px solid green; color: green; min-width: 80px; text-align: center; margin-right: 5px;">'.$fees.'<i class="fa fa-ticket"></i></p>
	</div></a>
	';
}}
else{
	echo "<p style='padding: 15px;'>No events created yet in $curcountry</p>";
	}

 ?>
 </section>

<section>
	<?php $curcountry =  $geoplugin->countryName; ?>
	<h4>Popular Events Worldwide</h4>
	<?php 
	$query = "SELECT * FROM image_table WHERE location LIKE '%China%' OR location LIKE '%United States%' OR location LIKE '%Nepal%' OR location LIKE '%Pakistan%' OR location LIKE '%USA%' OR location LIKE '%Australia%' OR location LIKE '%United Kingdom%' OR location LIKE '%UK%' OR location LIKE '%Nigeria%' OR location LIKE '%Ivory Coast%' OR location LIKE '%Japan%' OR location LIKE '%Russia%' OR location LIKE '%Afghanistan%' OR location LIKE '%Albania%' OR location LIKE '%Algeria%' OR location LIKE '%Andorra%' OR location LIKE '%Angola%' OR location LIKE '%Antigua and Barbuda%' OR location LIKE '%Argentina%' OR location LIKE '%Armenia%' OR location LIKE '%Austria%' OR location LIKE '%Azerbaijan%' OR location LIKE '%Bahamas%' OR location LIKE '%Bahrain%' OR location LIKE '%Bangladesh%' OR location LIKE '%Barbados%' OR location LIKE '%Belarus%' OR location LIKE '%Belgium%' OR location LIKE '%Belize%' OR location LIKE '%Benin%' OR location LIKE '%Bhutan%' OR location LIKE '%Bolivia%' OR location LIKE '%Bosnia and Herzegovina%' OR location LIKE '%Botswana%' OR location LIKE '%Brazil%' OR location LIKE '%Brunei%' OR location LIKE '%Bulgaria%' OR location LIKE '%Canada%' OR location LIKE '%Colombia%' OR location LIKE '%Fiji%' OR location LIKE '%Finland%' OR location LIKE '%France%' OR location LIKE '%Germany%' OR location LIKE '%Norway%' OR location LIKE '%New Zealand%' OR location LIKE '%Netherlands%' OR location LIKE '%Myanmar%' OR location LIKE '%Mongolia%' OR location LIKE '%Morocco%' OR location LIKE '%Malaysia%' OR location LIKE '%Kuwait%' OR location LIKE '%Kenya%' OR location LIKE '%Italy%' OR location LIKE '%Dubai%' OR location LIKE '%Switzerland%' OR location LIKE '%Manila%' OR location LIKE '%Philippines%' OR city LIKE '%Hongkong%' OR city LIKE '%Johannesburg%' AND endDate >= CURDATE() ORDER BY id DESC LIMIT 4";
	$result = mysqli_query($connect, $query);
	while($row = mysqli_fetch_array($result)){
	
	$amount1 = $row['amount1'];
	$amount2 = $row['amount2'];
	$amount3 = $row['amount3'];
	$amount4 = $row['amount4'];
	$amount5 = $row['amount5'];
	$amount6 = $row['amount6'];
	$amount7 = $row['amount7'];
	$amount8 = $row['amount8'];

	$paidlink = $row['paidlink'];
	$avg = $amount1+$amount2+$amount3+$amount4+$amount5+$amount6+$amount7+$amount8;

	$array = array($row['amount1'],$row['amount2'],$row['amount3'],$row['amount4'],$row['amount5'],$row['amount6'],$row['amount7'],$row['amount8']);
	
    $array = array_diff($array, [0]);   
	$subArray = min($array);

	if($avg > 0){
		$fees = "Rs. ". $subArray . " onwards";
	}else{
		$fees = "Free";
	}
	if($paidlink != ""){
	$fees = "Paid";	
	}
	
	$sDate = $row['startDate'];
	$stDate = date("l, M d", strtotime($sDate));
	echo '
	<a href="pages/details.php?sel_task='.$row["ID"].'"><div class="container">
	<img src="data:image/jpeg;base64,'.base64_encode($row['myimage'] ).'"/>
	
	<p class="details">'.$row['event'].' event in '.$row['city'].'</p>
	<p class="date">'.$stDate.'</p>
	<p class="date" style="float: right; border: 1px solid green; color: green; min-width: 80px; text-align: center; margin-right: 5px;">'.$fees.'<i class="fa fa-ticket"></i></p>
	</div></a>
	';
}
 ?>
</section>

<!--NOT TO MISS EVENTS-->


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
	<a href="pages/about.php" target="_blank">About</a>
	<!--<a href="pages/team.php" target="_blank">Team</a>-->
	<a href="pages/terms.php" target="_blank">Terms of service</a>
	<a href="pages/privary-policy.php" target="_blank">Privacy Policy</a>
	<a href="pages/pricing.php" target="_blank">Pricing</a>
	<a href="pages/contact.php" target="_blank">Contact us</a>
	<img src="img/mylogo.png" draggable="false" style="width:130px; float: right; padding-right: 30px;">
	<br/><a href="https://www.facebook.com/MyCityEvents2019/" target="_blank"><i class="fa fa-facebook" style="font-size: 18px"></i></a>
	<a href="https://www.linkedin.com/company/my-city-events" target="_blank"><i class="fa fa-linkedin" style="font-size: 18px"></i></a>
	<div class="copyright" style="margin-top: 25px">
		© Copyright 2019. All Rights Reserved.
	</div>
</footer>


<!-- AUTOMATICALLY DELETE EXPIRED EVENTS -->


</div>
</body>
</html>
