<?php 
$connect = mysqli_connect("localhost", "mycidhnt_indrakant", "Indrakant23", "mycidhnt_myevents");
session_start();
$msg = "";
if(isset($_GET['sel_task'])){
$id = mysqli_real_escape_string($connect, $_GET['sel_task']);

if(isset($_POST["insert"]))
{
	$event = $_POST['event'];
	$city = $_POST['city'];
	$location = $_POST['location'];
	$startDate = $_POST['startDate'];
	$endDate = $_POST['endDate'];
	$startTime = $_POST['startTime'];
	$endTime = $_POST['endTime'];
	$description = $_POST['description'];

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

	$query = mysqli_query($connect, "UPDATE image_table SET event='$event', city='$city', location='$location', startDate='$startDate', endDate='$endDate', startTime='$startTime', endTime='$endTime', description='$description', title1='$title1', title2='$title2', title3='$title3', title4='$title4', title5='$title5', title6='$title6', title7='$title7', title8='$title8', seat1='$seat1', seat2='$seat2', seat3='$seat3', seat4='$seat4', seat5='$seat5', seat6='$seat6', seat7='$seat7', seat8='$seat8', amount1='$amount1', amount2='$amount2', amount3='$amount3', amount4='$amount4', amount5='$amount5', amount6='$amount6', amount7='$amount7', amount8='$amount8' WHERE ID='$id'");

if($query)
{
    $msg ='Event updated. Go back to your events page <a href="my-events.php">click here</a>';
}

}}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Event | My City Event</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="../img/mylogo.png" type="image/x-icon">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
	border-radius: 3px;
	margin-bottom: 30px;
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
select{
	outline: none;
	width: 415px;
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
h1{
	text-transform: uppercase;
	padding-bottom: 5px;
	margin-bottom: 20px;
	font-weight: normal;
	font-size: 20px;
	border-bottom: 2px solid #000;
}
#pay{
	display: none;
}
input[type="radio"]{
	margin-right: 20px;
}
label{
	padding-right: 5px;
}
.lables{
    font-size: 13px;
    width: 110px;
    float: left;
    margin-top: 16px;
}
@media only screen and (max-width: 600px) {
 section{
 	width: 95%;
 	padding: 0px;
 	padding: 20px;
 }
}


</style>

</head>
<script>
$(document).ready(function() {
    $('.content').richText();
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

<body>
<header>
	<a href="../index.php"><img src="../img/mylogo.png" draggable="false" style="width:85px; float: left; padding-left: 15px; height: 60px;"></a>
</header>
<br>
<br>
<br>
<br>

	<?php

		$sql = "SELECT * FROM image_table WHERE ID LIKE'$id'";
		$result = mysqli_query($connect, $sql);
		$queryResult = mysqli_num_rows($result);

	if($queryResult > 0){
		while($row = mysqli_fetch_assoc($result)){
		
		echo' 
		<section>
		<h1>Update <b>'.$row['event'].'</b> Event</h1>
		<p id="event_created">'.$msg.'</p>

		<form method="post" enctype="multipart/form-data">
		
			<label for="event">Event Name</label><br>
			<input type="text" value="'.$row['event'].'" name="event" id="event"><br><br>

			<label for="city">City Name</label><br>
			<input type="text" value="'.$row['city'].'" name="city" id="city"><br><br>

			<label for="pac-input">Enter full address: </label><br>
			<div id="map"></div>
		    <input id="pac-input" value="'.$row['location'].'" name="location" class="controls" type="text"><br><br>

			<label for="startDate">Start Date</label><br>
			<input type="date" value="'.$row['startDate'].'" name="startDate" id="startDate"><br><br>

			<label for="endDate">End Date</label><br>
			<input type="date" value="'.$row['endDate'].'" name="endDate" id="endDate"><br><br>

			<label for="startTime">Start Time</label><br>
			<input type="time" value="'.$row['startTime'].'" name="startTime" id="startTime"><br><br>

			<label for="endTime">End Time</label><br>
			<input type="time" value="'.$row['endTime'].'" name="endTime" id="endTime"><br><br>

			<label for="description">Description</label><br>
			<textarea class="content" name="description" id="description">'.$row['description'].'</textarea><br><br>



    
			 <div id="one">
    		<p>Ticket 1</p>
    		<label class="lables">Ticket name</label>
    		<input type="text" id="title1" name="title1" onclick="this.select()" value="'.$row['title1'].'"><br>
    		
    		<label class="lables">Total seats</label>
    		<input type="text" name="seat1" onclick="this.select()" value="'.$row['seat1'].'"><br>
    		
    		<label class="lables">Ticket amount</label>
    		<input type="text" name="amount1" onclick="this.select()" value="'.$row['amount1'].'"><br><br>
         </div>
         <div id="two">
    		<p>Ticket 2</p>
    		<label class="lables">Ticket name</label>
    		<input type="text" id="title2" name="title2"  onclick="this.select()" value="'.$row['title2'].'"><br>
    		
    		<label class="lables">Total seats</label>
    		<input type="text" name="seat2" onclick="this.select()" value="'.$row['seat2'].'"><br>
    		
    		<label class="lables">Ticket amount</label>
    		<input type="text" name="amount2" onclick="this.select()" value="'.$row['amount2'].'"><br><br>
        </div>
        <div id="three">
    
    		<p>Ticket 3</p>
    		<label class="lables">Ticket name</label>
    		<input type="text" id="title3" name="title3"  onclick="this.select()" value="'.$row['title3'].'"><br>
    		
    		<label class="lables">Total seats</label>
    		<input type="text" name="seat3" onclick="this.select()" value="'.$row['seat3'].'"><br>
    		
    		<label class="lables">Ticket amount</label>
    		<input type="text" name="amount3" onclick="this.select()" value="'.$row['amount3'].'"><br><br>
    	</div>
        <div id="four">
    	
    		<p>Ticket 4</p>
    		<label class="lables">Ticket name</label>
    		<input type="text" id="title4" name="title4"  onclick="this.select()" value="'.$row['title4'].'"><br>
    		
    		<label class="lables">Total seats</label>
    		<input type="text" name="seat4" onclick="this.select()" value="'.$row['seat4'].'"><br>
    		
    		<label class="lables">Ticket amount</label>
    		<input type="text" name="amount4" onclick="this.select()" value="'.$row['amount4'].'"><br><br>
    	</div>
        <div id="five">
    	
    		<p>Ticket 5</p>
    		<label class="lables">Ticket name</label>
    		<input type="text" id="title5" name="title5"  onclick="this.select()" value="'.$row['title5'].'"><br>
    		
    		<label class="lables">Total seats</label>
    		<input type="text" name="seat5" onclick="this.select()" value="'.$row['seat5'].'"><br>
    		
    		<label class="lables">Ticket amount</label>
    		<input type="text" name="amount5" onclick="this.select()" value="'.$row['amount5'].'"><br><br>
    	</div>
        <div id="six">
    	
    		<p>Ticket 6</p>
    		<label class="lables">Ticket name</label>
    		<input type="text" id="title6" name="title6"  onclick="this.select()" value="'.$row['title6'].'"><br>
    		
    		<label class="lables">Total seats</label>
    		<input type="text" name="seat6" onclick="this.select()" value="'.$row['seat6'].'"><br>
    		
    		<label class="lables">Ticket amount</label>
    		<input type="text" name="amount6" onclick="this.select()" value="'.$row['amount6'].'"><br><br>
    	</div>
        <div id="seven">
    	
    		<p>Ticket 7</p>
    		<label class="lables">Ticket name</label>
    		<input type="text" id="title7" name="title7"  onclick="this.select()" value="'.$row['title7'].'"><br>
    		
    		<label class="lables">Total seats</label>
    		<input type="text" name="seat7" onclick="this.select()" value="'.$row['seat7'].'"><br>
    		
    		<label class="lables">Ticket amount</label>
    		<input type="text" name="amount7" onclick="this.select()" value="'.$row['amount7'].'"><br><br>
    	
    	</div>
        <div id="eight">
        	<p>Ticket 8</p>
    		<label class="lables">Ticket name</label>
    		<input type="text" id="title8" name="title8"  onclick="this.select()" value="'.$row['title8'].'"><br>
    		
    		<label class="lables">Total seats</label>
    		<input type="text" name="seat8" onclick="this.select()" value="'.$row['seat8'].'"><br>
    		
    		<label class="lables">Ticket amount</label>
    		<input type="text" name="amount8" onclick="this.select()" value="'.$row['amount8'].'"><br><br>
        </div> 

			<input type="submit" name="insert" id="insert" value="Update Event" class="btn">
		</form>

		</section>';
		}
		}else{
			echo "";
		}
	

?>
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

</body>
</html>