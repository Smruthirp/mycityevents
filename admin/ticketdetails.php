<!DOCTYPE html>
<html>
<head>
	<title>Ticket Details | My City Events</title>
<link rel="shortcut icon" href="../img/mylogo.png" type="image/x-icon">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

<style type="text/css">
*{margin: 0;}
body{
	font-family: 'Roboto', sans-serif;
	scroll-behavior: smooth;
}	

header{
	background: #fff;
	height: 80px;
	box-shadow: 0 0 3px #000;
}
header img{
	width: 100px;
	padding-top: 10px;
	padding-left: 20px;
}
section{
	width: 90%;
	margin-left: auto;
	margin-right: auto;
	box-shadow: 0 0 5px #ccc;
	border-radius: 3px;
	padding: 15px;
	margin-top: 20px;
}
.user{
	display: block;
	padding: 12px 20px;
	text-decoration: none;
	border: 1px solid #ddd;
	margin: 5px;
	color: #933b51;
	border-radius: 3px;
}
h4{
	font-weight: normal;
	padding-bottom: 5px;
}
.email{
	float: right;
}
.heading{
	text-align: center;
}
table{
	border-collapse: collapse;
	margin: 20px;
}
tr, td, th{
	border: 1px solid #ccc;
	padding: 5px;
	word-wrap: break-word;
	width: 10%;
}
tr:hover{
	background: #f1f1f1;
}
th{
	padding: 10px;
	background: #ad5369;
	font-weight: normal;
	color: #fff;
}

</style>

</head>
<body>
<header>
	<a href="index.php"><img src="../img/mylogo.png"></a>
</header><br>
<?php
$connect = mysqli_connect("localhost", "mycidhnt_indrakant", "Indrakant23", "mycidhnt_myevents");
	if(isset($_GET['view'])){
		$email = mysqli_real_escape_string($connect, $_GET['view']);
echo '<table>
	<tr>
	<th>Phone</th>
	<th>Event</th>
	<th>Location</th>
	<th>Total Amount</th>
	<th>No. of Attendees</th>
	<th>Booking ID</th>
	<th>Event Date</th>
	<th>Booking Date</th>
	</tr>';
		$sql = "SELECT * FROM bookingdetails WHERE userEmail  = '$email'";
		$result = mysqli_query($connect, $sql);
		$queryResult = mysqli_num_rows($result);

	if($queryResult > 0){
		echo "<p class='heading'>Events booked by <b>".$email."</b></p>";	
		while($row = mysqli_fetch_assoc($result)){

		echo'
	<tr>
	<td>'.$row['userPhone'].'</td>
	<td>'.$row['eventName'].'</td>
	<td>'.$row['eventLocation'].'</td>
	<td>'.$row['ticketAmount'].'</td>
	<td>'.$row['attendees'].'</td>
	<td>'.$row['bookingId'].'</td>
	<td>'.$row['eventDate'].'</td>
	<td>'.$row['bookingDate'].'</td>
	</tr>
	';
}
echo "</table>";
}}?>

</body>
</html>