<?php $connect = mysqli_connect("localhost", "mycidhnt_indrakant", "Indrakant23", "mycidhnt_myevents"); 
$conn = mysqli_connect("localhost", "mycidhnt_indrakant", "Indrakant23", "mycidhnt_myevents"); 
include "../login/server.php";

// Getting Login Data from sign up
if (!isset($_SESSION['username'])) {
	header('Location: login.php');
}else{

$signusername = $_SESSION['username'];
$query = "SELECT * FROM admin WHERE username='$signusername'";
$result = mysqli_query($conn, $query);
$queryResult = mysqli_num_rows($result);
if($queryResult > 0){
while($row = mysqli_fetch_array($result)){

$name = $row['name'];
}

}}
?>



<!DOCTYPE html>
<html>
<head>
<title>Admin | My City Events</title>
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
	width: 100%;
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
	margin-bottom: 30px;
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
	font-size: 17px;
	padding-bottom: 20px;
}
.email{
	float: right;
}
header h4{
	float: right;
	margin-right: 50px;
	margin-top: 30px;
}
header h4 a{
	text-decoration: none;
	color: #FFF;
	padding: 4px 10px;
	background: #000;
	border-radius: 3px;
	text-transform: uppercase;
	font-size: 13px;
}
</style>

</head>
<body>

<header>
	<a href="index.php"><img src="../img/mylogo.png" style="float: left;"></a>
	<h4>Welcome, <?php echo "$name"; ?> <a href='logout.php'>Logout</a></h4>
</header>

<section>
	<h4>Booking History</h4>
<?php 
$query = "SELECT id, userName, userEmail FROM bookingdetails GROUP BY userName";
$result = mysqli_query($connect, $query);
$count = 1;
while($row = mysqli_fetch_array($result)){

echo '
<a href="ticketdetails.php?view='.$row['userEmail'].'" target="_blank" class="user">'.$count . ") ".$row['userName'].' <div class="email">'.$row['userEmail'].'</div></a>

 ';
$count++;
}?>
</section>

<section>
	<h4>Organizer's Bank details</h4>
<?php 
$query = "SELECT id, name, email FROM bankdetails GROUP BY name";
$result = mysqli_query($connect, $query);
$count = 1;
while($row = mysqli_fetch_array($result)){

echo '
<a href="bankdetails.php?view='.$row['email'].'" target="_blank" class="user">'.$count . ") ".$row['name'].' <div class="email">'.$row['email'].'</div></a>

 ';
$count++;
}?>
</section>


</body>
</html>