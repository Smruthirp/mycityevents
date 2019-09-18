<?php $connect = mysqli_connect("localhost", "mycidhnt_indrakant", "Indrakant23", "mycidhnt_myevents"); ?>
<?php
session_start();
include "../login/server.php";
require_once('../location/geoplugin.class.php');
$em = "";
$nm = "";
$msg = "";
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


if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === "on")
	$link = "https";
else
	$link = "http";

$link .= "://";
$link .= $_SERVER['HTTP_HOST'];
$link .= $_SERVER['REQUEST_URI'];

if(isset($_GET['sel_task']))
	$id = mysqli_real_escape_string($connect, $_GET['sel_task']);
	$sql = "SELECT * FROM image_table WHERE ID LIKE'$id'";
	$result = mysqli_query($connect, $sql);
	// if($queryResult > 0)
	while($row = mysqli_fetch_assoc($result)){
	$event = $row['event'];
	$city = $row['city'];
	$image = $row['myimage'];
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

	 <title>Event Details | My City Events</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="../img/mylogo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
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
    
    $('#contact-organiser').click(function(){
    	$('#submit-query').css('display', 'block');
    	$(this).hide();
    });
});

</script>
</head>
<style>
 .organiser{
     float: left; border-right: 1px solid #ccc; padding-right: 15px;
 }
 .mail-orgraniser{
     color: grey;
     text-decoration: none;
     text-align:center;
     border: 1px solid grey;
     padding: 3px 15px;
 }
 
 .profileimg{
	object-fit: cover;
	object-position: top left;
}
.attendee{
     float: right; 
     padding-right: 15px; 
     text-align: right;
}
.clsss{
    border-bottom: 1px solid #ccc; padding-bottom: 10px;
}
#phn{
    width: 300px;
    border-radius: 2px;
    margin-left: 3px;
    border: 1px solid #ccc;
    font-family: FontAwesome;
}
#phn:focus{
    border: 1px solid #000;
}
 .bookNow{
 	border: none;
 	outline: none;
	background: linear-gradient(to right, orange, #f5b771);
 	padding: 7px;
 	color: #FFF;
 	cursor: pointer;
 	float: left;
 	border-radius: 2px;
 	margin-top: -160px;
 	font-family: 'Roboto', sans-serif;
 	width: 264px;
 	margin-left: 3px;
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

	.dates{
	     font-size: 11px; 
	     border: 1px solid #aaa !important; 
	     color: #aaa; 
	     width: auto;
	     display: inline-block;
	     margin: 5px; 
	     padding: 3px; 
	     border-radius:2px; 
	     position: absolute; 
	     bottom: 0px; 
	     float: left;
	}
	 .ticket{
 	     font-size: 11px; 
	     border: 1px solid green !important; 
	     color: green; 
	     width: auto;
	     position: absolute; 
	     right: 0;
	     display: inline-block;
	     margin: 5px; 
	     padding: 3px; 
	     border-radius:2px; 
	     bottom: 0px; 
	     float: right;
	 }
 	.image{
		object-fit: cover;
		object-position: top;
	}
	 tr, td{border: none;}
	 .ticket .fa{color: green; float: right; padding-left: 5px;}

@media screen and (max-width: 800px) {
	section{
		width: 97%;
		margin-right: 0px;
		height: auto;
		margin-left: 0px;
		padding-right: 0px;
		margin-bottom: 20px;
	}
	.image{
		width: 100%;
		margin-bottom: 10px;
		height: 200px;
	}
	.description_para{
		padding-right: 10px;
	}
	.container2{
		display: block;
		margin-left: auto;
		margin-right: auto;
		color: grey;
		width: 98%;
		height: auto;
		border-radius: 3px;
	}
	.dates{
	    float: left;
	    position: absolute;
	    margin-top: -100px;
	    font-size: 11px;
	    margin-left: 3px;
	}
    .ticket{font-size: 11px;}

	.container2 img{
		border-radius: 3px 0px 0px 0px;
		float: left;
        background: red;
		width: 100px;
		display: inline-block;
		margin-right: 5px;
		height: 100px;
	}
	.eventtext{
	    display: inline-block;
	    float: right;
	    margin-bottom: 10px;
	    width: 66%;
	    margin: 0px;
	    font-size: 13px;
	    margin-top: -100px;
	}
	
.mydetails{
    left: 0px;
    margin: 0px;
    width: 100%;
    height: auto;
    padding: 0px;
}


.organiser, .attendee{
    padding: 0px;
    margin: 0px;
    width: 100%;
    font-size: 12px; 
}
.attendee{
    width: 100%;
    float: left;
}
	aside{
		width: 100%;
		margin-bottom: 15px;
		margin-left: 0;
		margin-right: 0;
		padding-left: 0;
		padding-right: 0;
		margin-left: 0px;
	}
	
	.text{
		margin: 0px;
		padding-top: 20px;
		width: 100%;
	}
	footer{
		padding-left: 0;
		padding-right: 0;
	}
	.neweve{
	    display: block;
	    margin-top: 8px;
	}
}
select{
    width: auto;
    min-width: 60px;
}
	.neweve{
	    text-decoration: none;
	    background: #f1f1f1;
	    padding: 3px;
	    text-transform: uppercase;
	    font-size: 13px;
	    width: 100px;
	    text-align: center;
	    border: 1px solid green;
	    color: green;
	    border-radius: 3px;
	    outline: none;
	}
#paidlink{
    display: block;
    text-decoration: none;
    color: #fff;
    padding: 10px;
    border: 2px solid #F0AA78;
    width: 300px;
    text-align: center;
    font-size: 14px;
    background: #faa732;
}
#errorEvent{display: none; width: 100%;}
   
</style>
<body>
<header>
  <a href="../index.php"><img src="../img/mylogo.png" draggable="false" style="width:85px; float: left; padding-left: 15px; height: 60px;"></a>


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
</header>

<br><br><br><br>


<div id="noevent">

<?php
ob_start();
include '../index.php';
ob_end_clean();

$OrganiserName="";
$OrganiserEmail="";
	if(isset($_GET['sel_task'])){
		$id = mysqli_real_escape_string($connect, $_GET['sel_task']);
		$sql = "SELECT * FROM image_table WHERE ID LIKE'$id'";
		
		mysqli_query($connect, "UPDATE image_table SET views=views+1 WHERE ID LIKE'$id'"); 
		
		$result = mysqli_query($connect, $sql);
		$queryResult = mysqli_num_rows($result);

	if($queryResult > 0){
		while($row = mysqli_fetch_assoc($result)){

		$eventId = $row['ID'];
		$event = $row['event'];
		$image = $row['image'];
		// $user = $_SESSION['givenName'];
		$city = $row['city'];
		$location = $row['location'];
		$paidlink = $row['paidlink'];
		// $email =  $_SESSION['email'];
		$OrganiserName = $row['user'];
		$OrganiserEmail = $row['myemail'];
		$views = $row['views'];

		$title1 = $row['title1'];
		$title2 = $row['title2'];
		$title3 = $row['title3'];
		$title4 = $row['title4'];
		$title5 = $row['title5'];
		$title6 = $row['title6'];
		$title7 = $row['title7'];
		$title8 = $row['title8'];

		$seat1 = $row['seat1'];
		$seat2 = $row['seat2'];
		$seat3 = $row['seat3'];
		$seat4 = $row['seat4'];
		$seat5 = $row['seat5'];
		$seat6 = $row['seat6'];
		$seat7 = $row['seat7'];
		$seat8 = $row['seat8'];

		$amount1 = $row['amount1'];
		$amount2 = $row['amount2'];
		$amount3 = $row['amount3'];
		$amount4 = $row['amount4'];
		$amount5 = $row['amount5'];
		$amount6 = $row['amount6'];
		$amount7 = $row['amount7'];
		$amount8 = $row['amount8'];
		
	    $avg = $amount1 + $amount2 + $amount3 + $amount4 + $amount5 + $amount6 + $amount7 + $amount8; 
			
		if($row['title8'] == ''){
		   ?> 
		   <style>
		       #mySelect8{display: none;}
		       #amount8{display: none;}
		       
		   </style>
		   <?php   
		}
		if($row['title7'] == ''){
		   ?> 
		   <style>
		       #mySelect7{display: none;}
		       #amount7{display: none;}
		   </style>
		   <?php   
		}
		if($row['title6'] == ''){
		   ?> 
		   <style>
		       #mySelect6{display: none;}
		       #amount6{display: none;}
		   </style>
		   <?php   
		}
		if($row['title5'] == ''){
		   ?> 
		   <style>
		       #mySelect5{display: none;}
		       #amount5{display: none;}
		   </style>
		   <?php   
		}
	 if($row['title4'] == ''){
		   ?> 
		   <style>
		       #mySelect4{display: none;}
		       #amount4{display: none;}
		   </style>
		   <?php   
		}
	 if($row['title3'] == ''){
		   ?> 
		   <style>
		       #mySelect3{display: none;}
		       #amount3{display: none;}
		   </style>
		   <?php   
		}
	 if($row['title2'] == ''){
		   ?> 
		   <style>
		       #mySelect2{display: none;}
		       #amount2{display: none;}
		   </style>
		   <?php   
		}
	 if($row['title1'] == ''){
		   ?> 
		   <style>
		       #mySelect1{display: none;}
		       #amount1{display: none;}
		   </style>
		   <?php   
		}
	
	
	

if(isset($_POST["submit"])){
require 'phpmailer/PHPMailerAutoload.php';
$query = $_POST['query'];

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = "premium25.web-hosting.com"; //premium25.web-hosting.com
$mail->SMTPSecure = "tls";
$mail->Port = 587; 
$mail->SMTPAuth = true;
$mail->Username = 'noreply@mycityevents.org'; //noreply@mycityevents.org
$mail->Password = 'Vijaypur1$'; //Vijaypur1$

$mail->setFrom('noreply@mycityevents.org','My City Events');
$mail->addAddress($OrganiserEmail);
$mail->addBCC('support@mycityevents.org');
$mail->Subject = "User Query to Organiser";
$mail->Body = $query;
if ($mail->send())
    $msg= "Your message has been sent to organiser.";
else
	$msg = "Message not sent, please try again!";
}

	

		$sDate = $row['startDate'];
		$stDate = date("d M Y", strtotime($sDate));

		$eDate = $row['endDate'];
		$enDate = date("d M Y", strtotime($eDate));

		$sTime = $row['startTime'];
		$stTime = date("h:i a", strtotime($sTime));

		$eTime = $row['endTime'];
		$enTime = date("h:i a", strtotime($eTime));
		
		echo' 
		<section><img class="image" src="data:image/jpeg;base64,'.base64_encode($row['myimage']).'"/>
		<div class="text"><h2>'.$row['event'].' <div style="text-transform: lowercase; display: inline-block; width: auto;"> in </div> '.$city.'</h2>
		<p style="display: inline-block;float: left; margin-right: 20px;"><button>From</button><i class="fa fa-calendar"></i>'.$stDate.'</p>

		<p><button>Till</button><i class="fa fa-calendar"></i>'.$enDate.'</p><br>

		<p style="display: inline-block;float: left; margin-right: 20px;"><button>At</button><i class="fa fa-clock-o"></i>'.$stTime.'</p>
		<p><button>/</button><i class="fa fa-clock-o"></i>'.$enTime.'</p><br>

		<p><button>Venue</button><i class="fa fa-map-marker"></i> '.$row['location'].' <a target="_blank" href="https://www.google.co.in/maps?q='.$row['location'].'" class="view_map">VIEW IN GOOGLE MAP</a></p><br>
		<p><button>Created by</button><i class="fa fa-user"></i> '.$row['user'].'</p><br>
		</div>
		
		</section>';

		if($avg > 0){

	echo "
		<section>
		<table>
			<tr>
			<th>Ticket Type</th>
			<th>Ticket Price</th>
			<th>Seat Quantity</th>
			</tr>

			
			<tr id='tr1'>
			<td>".$row['title1']."</td>
			<td id='amount1'>".$amount1."</td>
			<td><script>document.write('<select id=".'mySelect1'." onchange=".'myFunction()'.">');
			for(var a=0; a<=$seat1; a++){
				document.write('<option>'+a+'</option>');
			}
			document.write('</select>')</script></td>
			</tr> 

			<tr id='tr2'>
			<td>".$row['title2']."</td>
			<td id='amount2'>".$amount2."</td>
			<td><script>document.write('<select id=".'mySelect2'." onchange=".'myFunction()'.">');
			for(var b=0; b<=$seat2; b++){
				document.write('<option>'+b+'</option>');
			}
			document.write('</select>')</script></td>
			</tr> 

			<tr id='tr3'>
			<td>".$row['title3']."</td>
			<td id='amount3'>".$amount3."</td>
			<td><script>document.write('<select id=".'mySelect3'." onchange=".'myFunction()'.">');
			for(var c=0; c<=$seat3; c++){
				document.write('<option>'+c+'</option>');
			}
			document.write('</select>')</script></td>
			</tr> 

			<tr id='tr4'>
			<td>".$row['title4']."</td>
			<td id='amount4'>".$amount4."</td>
			<td><script>document.write('<select id=".'mySelect4'." onchange=".'myFunction()'.">');
			for(var d=0; d<=$seat4; d++){
				document.write('<option>'+d+'</option>');
			}
			document.write('</select>')</script></td>
			</tr> 

			<tr id='tr5'>
			<td>".$row['title5']."</td>
			<td id='amount5'>".$amount5."</td>
			<td><script>document.write('<select id=".'mySelect5'." onchange=".'myFunction()'.">');
			for(var e=0; e<=$seat5; e++){
				document.write('<option>'+e+'</option>');
			}
			document.write('</select>')</script></td>
			</tr> 

			<tr id='tr6'>
			<td>".$row['title6']."</td>
			<td id='amount6'>".$amount6."</td>
			<td><script>document.write('<select id=".'mySelect6'." onchange=".'myFunction()'.">');
			for(var f=0; f<=$seat6; f++){
				document.write('<option>'+f+'</option>');
			}
			document.write('</select>')</script></td>
			</tr> 

			<tr id='tr7'>
			<td>".$row['title7']."</td>
			<td id='amount7'>".$amount7."</td>
			<td><script>document.write('<select id=".'mySelect7'." onchange=".'myFunction()'.">');
			for(var g=0; g<=$seat7; g++){
				document.write('<option>'+g+'</option>');
			}
			document.write('</select>')</script></td>
			</tr> 
			
			<tr id='tr8'>
			<td>".$row['title8']."</td>
			<td id='amount8'>".$amount8."</td>
			<td><script>document.write('<select id=".'mySelect8'." onchange=".'myFunction()'.">');
			for(var h=0; h<=$seat8; h++){
				document.write('<option>'+h+'</option>');
			}
			document.write('</select>')</script></td>
			</tr>

			
			<script>
			function myFunction(){
    			var a = document.getElementById('mySelect1').value;
    			var b = document.getElementById('mySelect2').value;
    			var c = document.getElementById('mySelect3').value;
    			var d = document.getElementById('mySelect4').value;
    			var e = document.getElementById('mySelect5').value;
    			var f = document.getElementById('mySelect6').value;
    			var g = document.getElementById('mySelect7').value;
    			var h = document.getElementById('mySelect8').value;

            var count1, count2, count3, count4, count5, count6, count7, count8;
                
            if(a > 0){
                count1 = '$title1: '+ a;
            }else{
                count1 = '';
            }
            
            if(b > 0){
                count2 = '$title2: '+ b;
            }else{
                count2 = '';
            }
            
            if(c > 0){
                count3 = '$title3: '+ c;
            }else{
                count3 = '';
            }
            
            if(d > 0){
                count4 = '$title4: '+ d;
            }else{
                count4 = '';
            }
            
           if(e > 0){
                count5 = '$title5: '+ e;
            }else{
                count5 = '';
            }
            
           if(f > 0){
                count6 = '$title6: '+ f;
            }else{
                count6 = '';
            }
            
           if(g > 0){
                count7 = '$title7: '+ g;
            }else{
                count7 = '';
            }
            
           if(h > 0){
                count8 = '$title8: '+ h;
            }else{
                count8 = '';
            }

			var pent = document.getElementById('para').innerHTML = a*".$amount1." + b*".$amount2."+ c*".$amount3."+ d*".$amount4."+ e*".$amount5."+ f*".$amount6."+ g*".$amount7."+ h*".$amount8.";
			
			document.getElementById('para4').innerHTML = pent;
			document.getElementById('para2').innerHTML = count1 +' '+ count2 +' '+ count3 +' '+ count4 +' '+ count5 +' '+ count6 +' '+ count7 +' '+ count8+'';    

			document.getElementById('count1').innerHTML = a;  
			document.getElementById('count2').innerHTML = b;  
			document.getElementById('count3').innerHTML = c;  
			document.getElementById('count4').innerHTML = d;  
			document.getElementById('count5').innerHTML = e;  
			document.getElementById('count6').innerHTML = f;  
			document.getElementById('count7').innerHTML = g;  
			document.getElementById('count8').innerHTML = h;  
		}
			</script>


			</tr>
		</table>

		<form action='checkout.php' method='POST'>
			<br><textarea id='para' readonly name='ticketAmount' style='display: none;'></textarea>
			<br> <p class='ttl'>Total amount Rs.:  </p><textarea id='para4' readonly name='totalAmount'></textarea><br><hr>

			<textarea id='para2' readonly name='participant' style='display: none;'></textarea><br>
			<img src='../img/paytm.png' class='payImg'>
			<img src='../img/mastercard.png' class='payImg' style='margin-top: 10px; height: 35px;'><br><br><br><br>
			<label for='phn'>Enter your phone: </label><br>
			<input type='number'required name='phone' min='10' style='width: 250px;margin-top: 10px;' id='phn' placeholder='&#xF095;'><br><br><br>
			
			<input type='text' value='$event' name='event' style='display: none;'>
			
			<input type='text' value='$location' name='location' style='display: none;'>
			<input type='text' value='$stDate' name='sDate' style='display: none;'>
			<input type='text' value='$stTime' name='sTime' style='display: none;'>

			<input type='text' value='$eventId' name='eventId' style='display: none;'>

			<input type='text' value='$seat1' name='seat1' style='display: none;'>
			<input type='text' value='$seat2' name='seat2' style='display: none;'>
			<input type='text' value='$seat3' name='seat3' style='display: none;'>
			<input type='text' value='$seat4' name='seat4' style='display: none;'>
			<input type='text' value='$seat5' name='seat5' style='display: none;'>
			<input type='text' value='$seat6' name='seat6' style='display: none;'>
			<input type='text' value='$seat7' name='seat7' style='display: none;'>
			<input type='text' value='$seat8' name='seat8' style='display: none;'>

			<textarea id='count1' readonly name='count1' style='display: none;'></textarea><br>
			<textarea id='count2' readonly name='count2' style='display: none;'></textarea><br>
			<textarea id='count3' readonly name='count3' style='display: none;'></textarea><br>
			<textarea id='count4' readonly name='count4' style='display: none;'></textarea><br>
			<textarea id='count5' readonly name='count5' style='display: none;'></textarea><br>
			<textarea id='count6' readonly name='count6' style='display: none;'></textarea><br>
			<textarea id='count7' readonly name='count7' style='display: none;'></textarea><br>
			<textarea id='count8' readonly name='count8' style='display: none;'></textarea><br>
			


			<input type='submit' class='bookNow' value='Book Now'>
		</form>
			</section>

			";
		}
		else if($paidlink != ""){
			echo "<section><center><a href='$paidlink' target='_blank' id='paidlink' style='text-align: center; margin: 15px 0px;'>Book Tickets</a></center></section>";
		}	
		
		else{
			echo "<section><p style='margin-top: 5px; margin-bottom: 5px; padding-bottom: 0px;'>This event is Free.</p></section>";
		}

		echo' 
		<section><img class="image_banner" src="data:image/jpeg;base64,'.base64_encode($row['myimage']).'"/>

		<h3 class="description_heading" style="border-bottom: 1px solid #ccc; display: block; padding-bottom: 0px;">Event Description</h3>
		<p class="description_para" style="word-break: break-all;">'.$row['description'].'</p>
		
		</section>';

		}
		}else{
			echo "";
			?> 
			    <style>
			        #noevent{display: none;}
			        footer{position: fixed; bottom: 0; width: 100%;}
			        #errorEvent{display: block;}
			    </style>
			<?php
		}
	}
?>



<section>
	<h4>Similar events <div style='text-transform: lowercase; display: inline-block; width: auto;'> in </div><?php echo " $city"; ?></h4>
	<?php 
	$query = "SELECT * FROM image_table WHERE city = '$city' AND id <> '$id' ORDER BY id ASC LIMIT 3";
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
	
    $avg = $amount1 + $amount2 + $amount3 + $amount4 + $amount5 + $amount6 + $amount7 + $amount8; 

	if($avg > 0){
		$fees = "Rs. ". $row['adult'] . " onwards";
	}else{
		$fees = "Free";
	}
	if($paidlink != ""){
	$fees = "Paid";	
	}

	$sDate = $row['startDate'];
	$stDate = date("l, M d", strtotime($sDate));
	echo '
	<div class="container2" style="float: left; position: relative;"><a href="details.php?sel_task='.$row["ID"].'" style="text-decoration :none;">
	<img src="data:image/jpeg;base64,'.base64_encode($row['myimage'] ).'"/>
	<p class="eventtext" style="color: #333; padding: 10px; border: none;">'.$row['event'].' event in '.$row['city'].'</p>
	<p class="dates">'.$stDate.'</p>
	<p class="ticket">'.$fees.'<i class="fa fa-ticket"></i></p>
	</a></div>
	';
}
}else{
	echo "<p style='padding: 15px;'>No similar events found for $city <a href='create.php' class='neweve'>Create one</a></p>";
}
 ?>
</section>

<!-- ASIDE -->
<aside>
	<h4>Share Event</h4>
	<input type="text" name="myUrl" style="width: 90%; margin-left: 10px;" value="<?php echo $link; ?>" onclick="this.select()"><br><br><br>
  <center>
  <button onclick="facebook()" style="outline: none;border: none;padding: 6px 8px;background: #3b5998;margin-left: 10px; color: #fff;cursor: pointer;">Share on Facebook</button>
  
   <button onclick="twitter()" style="outline: none;border: none;padding: 6px 8px;background: #00acee;color: #fff; margin-left: 10px; cursor: pointer;">Share on Twitter</button>
   </center>
    <!--<br/><br/><hr/><br/>-->
    
    <!--<span style="text-align:center; display: block; background: lightgrey;font-size: 14px; width: 150px; padding: 5px; border-radius: 50px; margin-left: 125px;margin-top: 30px;">-->
    <!--    <?php echo $views ?> Views-->
    <!--</span>-->


</aside>
<script>
    
<?php 
    $fblink = "https://www.facebook.com/sharer.php?u=$link";
    $twlink = "https://twitter.com/intent/tweet?text=$link";
?>
function facebook(){
    window.open("<?php echo $fblink?>", "_blank")
}
function twitter(){
    window.open("<?php echo $twlink?>", "_blank")
}
</script>

<aside>
	<h4>Organizer Details</h4>
	<?php echo "<p style='padding-left: 10px;'><b>Name:</b> <a href='organiser.php?user=$OrganiserEmail' style='color: black;'>". $OrganiserName."</p></a>";?><br>
	
	<div style="display: none;" id="submit-query">
	<form method="post" action="<?php $link ?>">
		<textarea name="query" style="border: 1px solid #aaa;margin-left: 10px;width: 91%;height: 140px;font-weight: normal;padding: 5px;" placeholder="Write your query to <?php echo $OrganiserName ?>.." required></textarea><br>
		<button type="submit" name="submit" style="margin-left: 10px;border: none;cursor: pointer; padding: 6px 10px; background: black;color: wheat;">Submit your query</button>
	</form>
	</div>	

	<button style="margin-left: 10px;cursor: pointer; border: none; padding: 6px 10px; background: black;color: wheat;" id="contact-organiser" type="submit" name="submit">
		<i class="fa fa-envelope" style="color: wheat;"></i> Contact organiser</button>
	<p style="font-size: 13px;margin-left: 10px; margin-top: 12px;color: green;"><?php echo $msg?></p>
</aside>
</div>















<center>
<div id="errorEvent" style="padding: 70px 0px; text-align: justify; box-shadow: 0 0 1px blueviolet; background: #FFF; height: auto; overflow: hidden; ">
        
    <br><br>
    
	<?php 
	$query = "SELECT * FROM image_table ORDER BY rand() LIMIT 5";
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
	
    $avg = $amount1 + $amount2 + $amount3 + $amount4 + $amount5 + $amount6 + $amount7 + $amount8; 

	if($avg > 0){
		$fees = "Rs. ". $row['adult'] . " onwards";
	}else{
		$fees = "Free";
	}
	if($paidlink != ""){
	$fees = "Paid";	
	}

	$sDate = $row['startDate'];
	$stDate = date("l, M d", strtotime($sDate));
	echo '
	<div class="container2" style="float: left; position: relative;"><a href="details.php?sel_task='.$row["ID"].'" style="text-decoration :none;">
	<img src="data:image/jpeg;base64,'.base64_encode($row['myimage'] ).'"/>
	<p class="eventtext" style="color: #333; padding: 10px; border: none;">'.$row['event'].' event in '.$row['city'].'</p>
	<p class="dates">'.$stDate.'</p>
	<p class="ticket">'.$fees.'<i class="fa fa-ticket"></i></p>
	</a></div>
	';
}
    
     ?>
    
</div>
</center>

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
	<div class="copyright" style="margin-top: 30px;">
		© Copyright 2019. All Rights Reserved.
	</div>
</footer>


</body>
</html>