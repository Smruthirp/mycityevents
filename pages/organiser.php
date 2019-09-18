<?php 
include "../login/server.php";
$connect = mysqli_connect("localhost", "mycidhnt_indrakant", "Indrakant23", "mycidhnt_myevents");
$conn = mysqli_connect("localhost", "mycidhnt_indrakant", "Indrakant23", "mycidhnt_myevents");
?>
<?php
require_once('../location/geoplugin.class.php');
$em = "";
$nm = "";

$geoplugin = new geoPlugin();
$geoplugin->locate();

$mycity = "";
$mystate = "";
$userimg = "";

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

if(isset($_GET['user']))
	$user = mysqli_real_escape_string($connect, $_GET['user']);
	$sql = "SELECT * FROM users WHERE email LIKE'$user'";
	$result = mysqli_query($connect, $sql);
	if($result > 0){
	while($row = mysqli_fetch_assoc($result)){
	$nm = $row['username'];
	$em = $row['email'];
	
	$userimg = $row['profile'];
}}
else{
    echo "Organiser not found.";
}


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
<link rel="stylesheet" type="text/css" href="../css/style.css">
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
	.container{
	    width: 23.5%;
	    box-shadow: 0 0 2px #ccc;
	    margin: 5px;
	}
	.container:hover{
	    box-shadow: 0 0 1px #000;
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
	.event-status{
        display: inline-block;
        width: 140px;
        height: 80px;
        background: #FFF;
        box-shadow: 0 0 1px #000;
}
		
	@media screen and (max-width: 800px) {
	.mainsearch{
		display: none;
	}
	.dropbtn{
		margin-left: 0px;
		padding: 8px 2px;
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
  <a href="../index.php"><img src="../img/mylogo.png" draggable="false" style="width:85px; float: left; padding-left: 15px; height: 60px;"></a>

	<form method="POST" class="mainsearch">
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
<a href="changecity.php">Change your city</a>
<br><br>
</div>
<?php

if (isset($_SESSION['access_token'])) {
	echo "
	<img class='profileimg' src=".$_SESSION['picture']." title=".$_SESSION['givenName'] .">
	<div class='mydetails'>
	<div class='organiser' style='float: left; border-right: 1px solid #ccc; padding-right: 45px;'>
	<p style='border-bottom: 1px solid #ccc; padding-bottom: 10px;'>Organiser Profile</p>
	<p><b>".$_SESSION['givenName']. " ".$_SESSION['familyName']. "</b></p>
	<p>".$_SESSION['email'] ."</p><br>
	<a href='create.php' target='_blank'>Create Event</a>
	<a href='my-events.php' target='_blank'>My Events</a>
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
	<div class='organiser' style='float: left; border-right: 1px solid #ccc; padding-right: 45px;'>
	<p style='border-bottom: 1px solid #ccc; padding-bottom: 10px;'>Organiser Profile</p>
	<p><b>".$name."</b></p>
	<p>".$_SESSION['email']."</p><br>
	<a href='create.php' target='_blank'>Create Event</a>
	<a href='my-events.php' target='_blank'>My Events</a>
	<a href='payout-settings.php' target='_blank'>Payout Settings</a>
	</div>

	<div class='attendee' style='float: right; padding-right: 15px; text-align: right;'>
		<p style='border-bottom: 1px solid #ccc; padding-bottom: 10px;'>Attendee Profile</p>
		<p style='padding-bottom: 0px;'>".$name."</p>
		<p>".$_SESSION['email']." </p><br>
		<a href='booking-history.php' target='_blank'>Booking History</a>
		<a href='edit-picture.php?edit=".$row['email']."'>Edit profile picture</a>
		<a href='../google-login/logout.php'>Logout</a>

	</div>
</div>
";	
}}}
else{
	echo "<a href='../google-login/login.php' class='loginMe'>Login</a>";
}
?>
</header>
<br><br><br>
<body style="background: white;">
<style type="text/css">
.title{
	text-align: center;font-size: 14px;margin-top: 1px;
}	
.upcoming{height: 55px;text-align: center;font-size: 40px;margin: 0px; margin-left: 0px;margin-top: 0px;color: green;line-height: 56px;
}
.past{height: 55px;text-align: center;font-size: 40px;margin: 0px; margin-left: 0px;margin-top: 0px;color: grey;line-height: 56px;}
.view-event{font-size: 10px;float: right;margin-top: -7px;margin-right: 3px;text-decoration: none;color: steelblue;}
/*.passed{color: grey;}*/
section{overflow: hidden;margin-top: 4px;box-shadow: 0px 1px 4px #CCC;padding-bottom: 40px;}
h4{border-bottom: 1px solid #ddd;text-align:left;padding-left:20px;font-weight:normal; }
.userimg{
    width: 150px;
    height: 140px;
    margin-left: 20px;
    border-radius: 4px;
    float: left;
    object-fit: cover;
    object-position: top;
    margin-right: 20px;
}
@media screen and (max-width: 700px){
	.event-status{
		width: 43%;
		margin-left: auto;
		margin-right: auto;
		margin-left: 15px;
		margin-top: 10px;
		/*margin-bottom: 25px;*/
		border: 1px solid #f1f1f1;
	}
	.upcoming, .past{
		/*margin-left: 130px;*/
	}
	.userimg{
	    width: 89%;
	    margin: 0 20px 10px 20px;
}
	h2{float: left;margin-right: 8px;}
}


</style>	



<section style="overflow: hidden; border-bottom: 1px solid #ccc;">
	
	<?php 
	
if(isset($_GET['user']))
	$user = mysqli_real_escape_string($connect, $_GET['user']);
	$sql = "SELECT * FROM users WHERE email LIKE'$user'";
	$result = mysqli_query($connect, $sql);
	while($row = mysqli_fetch_assoc($result)){
	$nm = $row['username'];
	$em = $row['email'];
	$userimg = $row['profile'];

    if($userimg != ""){
    echo "
	<img src='data:image/jpeg;base64,".base64_encode($userimg)."' class='userimg'/>";    
    }else{
        echo "
	<img src='../img/user.png' class='userimg'/>";
    }
	    
	}

    echo "<h2 style='font-weight: normal; font-size: 20px; margin-bottom: 5px; margin-left: 20px;'> $nm </h2> 
	<button style='display: block;margin-bottom: 10px;background: wheat;border: none; border-radius: 50px;padding: 3px 12px;font-size: 12px;'>Organizer</button>";
	
		// PAST EVENTS
		$result = mysqli_query($conn, "SELECT * FROM image_table WHERE myemail LIKE '$user' AND endDate < CURDATE()");
		$rows = mysqli_num_rows($result);
		echo "
		<div class='event-status'>
		<p class='title'>Past events </p>
		<h5 class='past'>" . $rows. "</h5> 
		<a href='#' class='view-event passed'>View events →</a>
		</div>";

		// FUTURE EVENTS
		$result = mysqli_query($conn, "SELECT * FROM image_table WHERE myemail LIKE '$user' AND endDate >= CURDATE()");
		$rows = mysqli_num_rows($result);
		echo "
		<div class='event-status'>
		<p class='title'>Upcoming events </p>
		<h5 class='upcoming'>" . $rows. "</h5> 
		<a href='#' class='view-event future'>View events →</a>
		</div>";

	 	?>
		
</section>

<section style="overflow: hidden;" id="ongoing">
<h4 style="font-size: 16px; font-weight: bold; text-transform: capitalize;"><?php echo $nm;?>'s ongoing events</h4>
<?php 
	$query = "SELECT * FROM image_table WHERE myemail LIKE '$user' AND endDate >= CURDATE() ";
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

	if($avg > 0){
		$fees = "Rs. ". $row['amount1'] . " onwards";
	}else{
		$fees = "Free";
	}
	if($paidlink != ""){
	$fees = "Paid";	
	}

	$sDate = $row['startDate'];
	$stDate = date("l, M d", strtotime($sDate));
	echo '
	<a href="details.php?sel_task='.$row["ID"].'"><div class="container">
	<img src="data:image/jpeg;base64,'.base64_encode($row['myimage'] ).'"/>
	
	<p class="details">'.$row['event'].' event in '.$row['city'].'</p>
	<p class="date">'.$stDate.'</p>
	<p class="date" style="float: right; border: 1px solid green; color: green; min-width: 80px; text-align: center; margin-right: 5px;">'.$fees.'<i class="fa fa-ticket"></i></p>
	</div></a>
	';
}}
else{
	echo "<p style='padding: 15px;'>No ongoing events found.</p>";
	}

 ?>
</section>


<section style="overflow: hidden; display: none;" id="past" >
<h4 style="font-size: 16px; font-weight: bold; text-transform: capitalize;"><?php echo $nm;?>'s past events</h4>
<?php 
	$query = "SELECT * FROM image_table WHERE myemail LIKE '$user' AND endDate < CURDATE() ";
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

	if($avg > 0){
		$fees = "Rs. ". $row['amount1'] . " onwards";
	}else{
		$fees = "Free";
	}
	if($paidlink != ""){
	$fees = "Paid";	
	}

	$sDate = $row['startDate'];
	$stDate = date("l, M d", strtotime($sDate));
	echo '
	<a href="details.php?sel_task='.$row["ID"].'"><div class="container">
	<img src="data:image/jpeg;base64,'.base64_encode($row['myimage'] ).'"/>
	
	<p class="details">'.$row['event'].' event in '.$row['city'].'</p>
	<p class="date">'.$stDate.'</p>
	<p class="date" style="float: right; border: 1px solid green; color: green; min-width: 80px; text-align: center; margin-right: 5px;">'.$fees.'<i class="fa fa-ticket"></i></p>
	</div></a>
	';
}}
else{
	echo "<p style='padding: 15px;'>No past events found.</p>";
	}

 ?>
</section>


<section style="overflow: hidden; display: none;" id="future">
<h4 style="font-size: 16px; font-weight: bold; text-transform: capitalize;"><?php echo $nm;?>'s upcoming events</h4>
<?php 
	$query = "SELECT * FROM image_table WHERE myemail LIKE '$user' AND endDate >= CURDATE() ";
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

	if($avg > 0){
		$fees = "Rs. ". $row['amount1'] . " onwards";
	}else{
		$fees = "Free";
	}
	if($paidlink != ""){
	$fees = "Paid";	
	}

	$sDate = $row['startDate'];
	$stDate = date("l, M d", strtotime($sDate));
	echo '
	<a href="details.php?sel_task='.$row["ID"].'"><div class="container">
	<img src="data:image/jpeg;base64,'.base64_encode($row['myimage'] ).'"/>
	
	<p class="details">'.$row['event'].' event in '.$row['city'].'</p>
	<p class="date">'.$stDate.'</p>
	<p class="date" style="float: right; border: 1px solid green; color: green; min-width: 80px; text-align: center; margin-right: 5px;">'.$fees.'<i class="fa fa-ticket"></i></p>
	</div></a>
	';
}}
else{
	echo "<p style='padding: 15px;'>No upcoming events found.</p>";
	}

 ?>
</section>

<script>
    $(document).ready(function(){
        $('.passed').click(function(){
            $('#ongoing').css('display', 'none');
            $('#future').css('display', 'none');
            $('#past').css('display', 'block');
        })
        
        $('.future').click(function(){
            $('#ongoing').css('display', 'none');
            $('#past').css('display', 'none');
            $('#future').css('display', 'block');
        })
    })
</script>




<script>
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}
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
<footer style="margin-top: 200px;">
	<a href="about.php" target="_blank">About</a>
	<a href="terms.php" target="_blank">Terms of service</a>
	<a href="privary-policy.php" target="_blank">Privacy Policy</a>
	<a href="pricing.php" target="_blank">Pricing</a>
	<a href="contact.php" target="_blank">Contact us</a>
	<img src="../img/mylogo.png" draggable="false" style="width:130px; float: right; padding-right: 30px;">
	<br/><a href="https://www.facebook.com/MyCityEvents2019/" target="_blank"><i class="fa fa-facebook" style="font-size: 18px"></i></a>
	<a href="https://www.linkedin.com/company/my-city-events" target="_blank"><i class="fa fa-linkedin" style="font-size: 18px"></i></a>
	<div class="copyright" style="margin-top: 25px">
		© Copyright 2019. All Rights Reserved.
	</div>
</footer>

</div>
</body>
</html>
