<?php
$connect = mysqli_connect("localhost", "mycidhnt_indrakant", "Indrakant23", "mycidhnt_myevents");
session_start();
ob_start();
include "../login/server.php";
ob_end_clean();
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

$msg = "";
if(isset($_POST["insert"]))
{
	// $organiser = $_SESSION['username']; 
	$myemail = $em;
	$user  = $nm;

	$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
	$event = $_POST['event'];
	$category = $_POST['category'];
	$city = mysqli_real_escape_string($connect, $_POST['city']);
	$location = mysqli_real_escape_string($connect, $_POST['location']);
	$startDate = $_POST['startDate'];
	$endDate = $_POST['endDate'];
	$startTime = $_POST['startTime'];
	$endTime = $_POST['endTime'];
	$description = mysqli_real_escape_string($connect, $_POST['description']);
	
// PAIDLINK
	$paidlink = $_POST['paidlink'];

// SEATS AND PAYMENT
    $title1 = $_POST['title1'];
    $title2 = $_POST['title2'];
    $title3 = $_POST['title3'];
    $title4 = $_POST['title4'];
    $title5 = $_POST['title5'];
    $title6 = $_POST['title6'];
    $title7 = $_POST['title7'];
    $title8 = $_POST['title8'];
    
    $seat1 = $_POST['seat1'];
    $seat2 = $_POST['seat2'];
    $seat3 = $_POST['seat3'];
    $seat4 = $_POST['seat4'];
    $seat5 = $_POST['seat5'];
    $seat6 = $_POST['seat6'];
    $seat7 = $_POST['seat7'];
    $seat8 = $_POST['seat8'];
    
    $amount1 = $_POST['amount1'];
    $amount2 = $_POST['amount2'];
    $amount3 = $_POST['amount3'];
    $amount4 = $_POST['amount4'];
    $amount5 = $_POST['amount5'];
    $amount6 = $_POST['amount6'];
    $amount7 = $_POST['amount7'];
    $amount8 = $_POST['amount8'];

	$query = "INSERT INTO image_table(event, myimage, message, city, location, startDate, endDate, startTime, endTime, description, myemail, user, title1, title2, title3, title4, title5, title6, title7, title8, seat1, seat2, seat3, seat4, seat5, seat6, seat7, seat8, amount1, amount2, amount3, amount4, amount5, amount6, amount7, amount8, paidlink) VALUES ('$event', '$file', '$category', '$city', '$location', '$startDate', '$endDate', '$startTime', '$endTime', '$description', '$myemail', '$user', '$title1', '$title2', '$title3', '$title4', '$title5', '$title6', '$title7', '$title8', '$seat1', '$seat2', '$seat3', '$seat4', '$seat5', '$seat6', '$seat7', '$seat8', '$amount1', '$amount2', '$amount3', '$amount4', '$amount5', '$amount6', '$amount7', '$amount8','$paidlink')";
	if(mysqli_query($connect, $query))
	{
		$msg = 'Event created Successfully. Go to main page <a href="../index.php">click here</a>';
	}else{
	    $msg = "Event Not Created, please try again! ";
	}
}
 ?>

<!DOCTYPE html>
<html>
<head>
<title>Create an Event | My City Events</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
<link rel="shortcut icon" href="../img/mylogo.png" type="image/x-icon">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/site.css">
<link rel="stylesheet" href="../src/richtext.min.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="../src/jquery.richtext.js"></script>

<style>
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
}section{
	margin-left: auto;
	margin-right: auto;
	margin-top: 30px;
	width: 80%;
	padding: 30px;
	box-shadow: 0 0 5px #ccc;
	background: #FFF;
	margin-bottom: 80px;
	border-radius: 3px;
	}
.note{
    display: inline-block;
    padding-left: 5px;
    font-size: 14px;
}
input[type="text"],[type="date"],[type="time"],[type="file"],[type="submit"],[type="number"]{
	outline: none;
	width: 400px;
	padding: 7px;
	margin-top: 8px;
	font-size: 14px;
	border: 1px solid #ccc;
	border-radius: 2px;
	}
input:focus{
	border: 1px solid #000;
	}
#insert{
	background: #3f5268;
	color: #d0dae5;
	font-size: 17px;
	width: 418px;
	}
#pac-input{
    word-spacing: auto;
}
select{
	outline: none;
	width: 400px;
	padding: 7px;
	margin-top: 8px;
	font-size: 14px;
	border: 1px solid #ccc;
	border-radius: 2px;
	}
textarea{
	outline: none;
	resize: none;
	width: 400px;
	padding: 7px;
	border-right: 2px;
	height: 200px;
	border: 1px solid #ccc;
	font-size: 16px;
	margin-top: 5px;
	font-family: 'Roboto', sans-serif;
	}
textarea:focus{
	border: 1px solid #000;
	}
input[type='date'], input[type='time']{
	font-family: sans-serif;
	}
input[type="number"]::-webkit-inner-spin-button,input[type="number"]::-webkit-outer-spin-button{
	-webkit-appearance: none; 
}
#event_created{
	margin-bottom: 20px;
	padding-bottom: 10px;
	color: green;
	border-bottom: 1px solid #ddd;
	}
.inormation{
	margin-bottom: 15px;
	width: 120px;
	margin-left: -30px;
	padding: 5px;
	color: #fff;
	font-size: 14px;
	background: linear-gradient(to right, #533e59, #fff);
}
#pay, #paidevent, .confirmation{
	display: none;
}
input[type="radio"]{
	margin-right: 20px;
}
label{
	padding-right: 5px;
}
#insert{cursor: pointer;}

.showbtn{
	border: none;
	background: linear-gradient(45deg, purple, darkslateblue);
	color: ghostwhite;
	padding: 7px 10px;
	border-radius: 2px;
	width: 170px;
	cursor: pointer;
	font-size: 14px;
	box-shadow: 0 0 6px slateblue;
}
.lables{
    font-size: 13px;
    width: 110px;
    float: left;
    margin-top: 16px;
}

</style>
<script type="text/javascript">
	$(document).ready(function(){
		$("#no").click(function(){
			$("#pay").css("display", "none");
			$(".confirmation").css("display", "block");

		});
		$("#yes").click(function(){
			$("#pay").css("display", "none");
			$(".confirmation").css("display", "none");
			$("#paidevent").css("display", "none");

		})
		$("#paid").click(function(){
			$("#paidevent").css("display", "block");
			$("#pay").css("display", "none");

		});
		$("#yes-i-want").click(function(){
			$("#paidevent").css("display", "none");
			$("#pay").css("display", "block");

		})
	})
</script>

<script>
$(document).ready(function() {
    $('.content').richText();
});
</script>

<script type="text/javascript">
	function textareaReplaceLineBreaks(textareaID) {
    (function($) {        
        if (!textareaID) var textareaID = "#description";
        var textarea = $(textareaID);
        
        textarea.val(
            $(textarea).val().replace(/(\r\n|\n)/g, "<br/>")
        );
        
    })(jQuery);        
}
</script>
<script type="text/javascript">
$(document).ready(function(){
	$('.showbtn').click(function(){
		$(this).parent().next().show();
		$(this).hide();
	});
});
</script>
<script>
	function getISODate(){
	  var d = new Date();
	  return d.getFullYear() + '-' + 
          ('0' + (d.getMonth()+1)).slice(-2) + '-' +
          ('0' + d.getDate()).slice(-2);
		}
	  window.onload = function() {
	  document.getElementById('startDate').setAttribute('min',getISODate());
	  document.getElementById('endTimeDate').setAttribute('min',getISODate());
	}
</script>
</head>
<body>

<header>
	<a href="../index.php"><img src="../img/mylogo.png" draggable="false" style="width:85px; float: left; padding-left: 15px; height: 60px;"></a>
</header>
<br>
<br>
<br>
<br>
<section>
	<p id="event_created"><?php echo $msg; ?></p>

<form method="post" enctype="multipart/form-data">
<div class="inormation">
	Event Details
</div>
	<label for="event">Enter event name: </label><br>
	<input type="text" name="event" placeholder="Event" id="event"/><br><br>

	<label for="category">Select a category: </label><br>
	<select id="category" name="category">
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
	<br><br>
<!-- 	<label for="organiser">Enter organiser name: </label><br>
	<input type="text" name="user" placeholder="Organiser" id="organiser" /><br><br> -->
		
	<label for="city">Enter city name: </label><br>
	<input type="text" name="city" placeholder="City" id="city" /><br><br>

	<label for="pac-input">Enter full address: </label><br>

	<div id="map"></div>
    <input id="pac-input" name="location" class="controls" type="text" placeholder="Address" maxlength="auto"><br><br><br>

    <label for="startDate">Select event start date: </label><br>
    <input type="date" name="startDate" id="startDate"><br><br>

	    <label for="endDate">Select event end date: </label><br>
    <input type="date" name="endDate" id="endDate"><br><br>

    <label for="startTime">Select event start time: </label><br>
    <input type="time" name="startTime" id="startTime"><br><br>

    <label for="endTime">Select event end time: </label><br>
    <input type="time" name="endTime" id="endTime"><br><br>

	<label for="image">Select an image: [File Size Limit: 5 MB] </label><br>
	<input type="file" name="image" id="image" /><div class="note">Supported File Types :  JPG, PNG, TIFF, JPEG.</div><br><br>

	<label for="description">Describe your event: </label><br>
		<div class="page-wrapper box-content">
		<textarea name="description" id="description" class="content" placeholder="Tell people more about your event.." /></textarea><br><br>
	</div>
	<!--<span class="text-muted pull-right" id="count1">0/4000</span>-->
	<!--<br><br>-->

	<div class="inormation">
	Payment Details
	</div>
	
	<p>Is the event for free?</p><br>
	<label for="yes">Yes</label><input type="radio" name="payment" id="yes" onclick="myCheck()">
	<label for="no">No</label><input type="radio" name="payment" id="no" onclick="myCheck()">
	<div class="confirmation"><br>
	<p>Do you want to sell tickets through our platform?</p><br>
		<label for="yes-i-want">Yes</label><input type="radio" name="confirm" id="yes-i-want" onclick="myCheck()">
	<label for="paid">No, I have an external payment link</label><input type="radio" name="confirm" id="paid" onclick="myCheck()">
	</div>
	<br>

<div id="paidevent">
	<label for="paidlink">Enter link for your event</label><br>
	<input type="text" name="paidlink" id="paidlink" placeholder="Ex: https://mycityevents.org/">
</div>	
	
	<div id="pay">
		<div id="one">
		<input type="button" class="showbtn" value="Add ticket" onclick="first()">
	</div>	

	<div id="one" style="display: none;">
		<p>Ticket 1</p>
		<label class="lables">Ticket name</label>
		<input type="text" id="title1" name="title1" placeholder="What is this ticket for?"><br>
		
		<label class="lables">Total seats</label>
		<input type="number" name="seat1" value="0" onclick="this.select()" placeholder="Total seats"><br>
		
		<label class="lables">Ticket amount</label>
		<input type="number" name="amount1" value="0" onclick="this.select()" placeholder="Ticket amount"><br><br>
		<input type="button" class="showbtn" value="Add more tickets">
	</div>

	<div id="two" style="display: none;">
		<p>Ticket 2</p>
		<label class="lables">Ticket name</label>
		<input type="text" id="title2" name="title2" placeholder="What is this ticket for?"><br>
		
		<label class="lables">Total seats</label>
		<input type="number" name="seat2" value="0" onclick="this.select()" placeholder="Total seats"><br>
		
		<label class="lables">Ticket amount</label>
		<input type="number" name="amount2" value="0" onclick="this.select()" placeholder="Ticket amount"><br><br>
		<input type="button" class="showbtn" value="Add more tickets">
	</div>

	<div id="three" style="display: none;">
		<p>Ticket 3</p>
		<label class="lables">Ticket name</label>
		<input type="text" id="title3" name="title3" placeholder="What is this ticket for?"><br>
		
		<label class="lables">Total seats</label>
		<input type="number" name="seat3" value="0" onclick="this.select()" placeholder="Total seats"><br>
		
		<label class="lables">Ticket amount</label>
		<input type="number" name="amount3" value="0" onclick="this.select()" placeholder="Ticket amount"><br><br>
		<input type="button" class="showbtn" value="Add more tickets">
	</div>

	<div id="four" style="display: none;">
		<p>Ticket 4</p>
		<label class="lables">Ticket name</label>
		<input type="text" id="title4" name="title4" placeholder="What is this ticket for?"><br>
		
		<label class="lables">Total seats</label>
		<input type="number" name="seat4" value="0" onclick="this.select()" placeholder="Total seats"><br>
		
		<label class="lables">Ticket amount</label>
		<input type="number" name="amount4" value="0" onclick="this.select()" placeholder="Ticket amount"><br><br>
		<input type="button" class="showbtn" value="Add more tickets">
	</div>

	<div id="five" style="display: none;">
		<p>Ticket 5</p>
		<label class="lables">Ticket name</label>
		<input type="text" id="title5" name="title5" placeholder="What is this ticket for?"><br>
		
		<label class="lables">Total seats</label>
		<input type="number" name="seat5" value="0" onclick="this.select()" placeholder="Total seats"><br>
		
		<label class="lables">Ticket amount</label>
		<input type="number" name="amount5" value="0" onclick="this.select()" placeholder="Ticket amount"><br><br>
		<input type="button" class="showbtn" value="Add more tickets">
	</div>

	<div id="six" style="display: none;">
		<p>Ticket 6</p>
		<label class="lables">Ticket name</label>
		<input type="text" id="title6" name="title6" placeholder="What is this ticket for?"><br>
		
		<label class="lables">Total seats</label>
		<input type="number" name="seat6" value="0" onclick="this.select()" placeholder="Total seats"><br>
		
		<label class="lables">Ticket amount</label>
		<input type="number" name="amount6" value="0" onclick="this.select()" placeholder="Ticket amount"><br><br>
		<input type="button" class="showbtn" value="Add more tickets">
	</div>

	<div id="seven" style="display: none;">
		<p>Ticket 7</p>
		<label class="lables">Ticket name</label>
		<input type="text" id="title7" name="title7" placeholder="What is this ticket for?"><br>
		
		<label class="lables">Total seats</label>
		<input type="number" name="seat7" value="0" onclick="this.select()" placeholder="Total seats"><br>
		
		<label class="lables">Ticket amount</label>
		<input type="number" name="amount7" value="0" onclick="this.select()" placeholder="Ticket amount"><br><br>
		<input type="button" class="showbtn" value="Add more tickets">
	</div>

	<div id="eight" style="display: none;">
		<p>Ticket 8</p>
		<label class="lables">Ticket name</label>
		<input type="text" id="title8" name="title8" placeholder="What is this ticket for?"><br>
		
		<label class="lables">Total seats</label>
		<input type="number" name="seat8" value="0" onclick="this.select()" placeholder="Total seats"><br>
		
		<label class="lables">Ticket amount</label>
		<input type="number" name="amount8" value="0" onclick="this.select()" placeholder="Ticket amount"><br><br>
	</div>

	<br><br><br>
	<p>Did you include 2% of convenience fees & 2% of payment gateway fees in your final ticket amount?</p><br>
	<input type="checkbox" id="agree" style="margin-left: 20px;" onclick="myCheck()">
	<label for="agree">Yes, i agree to <a href="../pages/pricing.php" target="_blank">Pricing</a> terms and conditions.</label>
<br><br>

	</div>
	<input type="submit" name="insert" id="insert" value="Post Event" class="btn" style="display: none;" onclick="textareaReplaceLineBreaks('#description');">

</form>
</section>
</body>
</html>

<script type="text/javascript">
		function count_up(obj){
			document.getElementById('count1').innerHTML = obj.value.length + "/4000";
			if(obj.value.length > 3999){
			    document.getElementById('count1').style.color = "red";
				document.getElementById('count1').innerHTML = "You are out of characters limit";
			}else{
			    document.getElementById('count1').style.color = "green";
			}
		}
</script>

<script>
function myCheck(){
    var checkBox = document.getElementById("agree");
    var button = document.getElementById("insert");
    var radio = document.getElementById("yes");
    var paid = document.getElementById("paid");
    if(checkBox.checked == true || radio.checked == true || paid.checked == true){
        button.style.display = "block";
    }else{
        button.style.display = "none";
    }}
    

</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDU5mKV4oCZcxKQfOka5Mz5LlcqS3eB2YU&libraries=places&signed_in=true&callback=initMap"></script>
<script src="../js/index.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#insert').click(function(){
		var image_name = $('#image').val();
		if(image_name == ''){
			alert("Please select image");
			return false;
		}
		else {
			var extension = $('#image').val().split('.').pop().toLowerCase();
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
			{
				alert('Invalid image file');
				$('#image').val('');

				return false;
			}
		}
	});
});
</script>