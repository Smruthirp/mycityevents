<?php
    require_once "config.php";

	if (isset($_SESSION['access_token'])) {
		header('Location: ../index.php');
		exit();
	}

	$loginURL = $gClient->createAuthUrl();
?>
<?php
    // require_once "../FacebookLogin/config.php";

    if (isset($_SESSION['access_token2'])) {
        header('Location: ../index.php');
        exit();
    }

    $redirectURL = "https://mycityevents.org/FacebookLogin/fb-callback.php";
    $permissions = ['email'];
    $loginURL2 = $helper->getLoginUrl($redirectURL, $permissions);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="../img/mylogo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User sign in | My City Events</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,500italic|Google+Sans:400,500" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<style type="text/css">
*{margin: 0; font-family: 'Google Sans',Roboto,Arial,sans-serif;}
    
header{
    height: 70px;
    box-shadow: 0 0 5px #ccc;
}
header img{
    float: left;
    width: 100px;
    box-shadow: none;
    padding-left: 20px;
}

h4{
    font-size: 18px;
    color: #425168;
    padding: 10px;
    font-weight: normal;
    margin-bottom: 90px;
    background: #f1f1f1;
}

.btn-info{
    background: unset;
    border-radius: 3px;
    border: none;
    width: 230px;
    box-shadow: 0 0 3px #ccc;
    margin: 10px;
    color: #000;
}
.fa{
    float: left;
    color: #000;
    color: orange;
    font-size: 20px;
    /*padding-left: 10px;*/
}
a img{
    float: left;
    
}
.btn-info:hover{
    background: #f1f1f1;
    color: #000;
}
.container{
    box-shadow: 0 0 3px #ccc; 
    margin-top: 60px;
    padding: 0px;
    height: 300px;
    border-radius: 3px;
    border-bottom: 5px solid #504c84;
}
@media screen and (max-width: 800px){
.btn-info{
    display: block;
}
.container{
    width: 95%;
    padding-bottom: 300px;
    margin-left: auto;
    margin-right: auto;
}
}
</style>

</head>
<body>
<header>
    <a href="../index.php" class="logo"><img src="../img/mylogo.png"></a>
</header>

<div class="container">
    <h4>Welcome to My City Events. Please Sign in to continue..</h4>
    <center>
    <!-- <a onclick="window.location = '<?php echo $loginURL ?>';" class="btn"><img src="../img/google-sign.png"></a> -->
    <a onclick="window.location = '<?php echo $loginURL ?>';" class="btn btn-info" style=" padding: 6px;line-height: 25px;"><img src="../img/google.png" style="width: 25px;"> Sign in with Google</a> 
     OR
    <a href="../login/login.php" class="btn btn-info"><i class="fa fa-envelope"></i> Sign in with Email</a>
    </center>
</div>
    
</body>
</html>