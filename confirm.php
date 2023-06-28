<?php
session_start();
?>
<html>
<head>
<title>Inver Tyre Services</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="stylesheet.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<header>
<script>
   function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
 }  
</script>
<div class="topnav" id="myTopnav">
    <a link rel="Home" href="regUser.php" class="active">Member</a>
    <a link rel="Contact Us" href="ContactUs.php">Contact Us</a>
    <a link rel="About Us" href="aboutUs.php">About Us</a> 
    <a link rel="Log out" href="logout.php">Log out</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">     
    <i class="fa fa-bars"></i></a>
</div>
<br><br>
</header>
<body>
    <br><br>
<?php
include("../../DbConnect.php"); 

session_start();
$user_id = $_SESSION['user_id'];
$Service = $_SESSION["service"];
$Tyre =    $_SESSION["tyre"];
$Make =    $_SESSION["make"];
$Model =    $_SESSION["model"];
$Datetime = $_SESSION["datetime"];


echo '<table class="w3-table w3-striped w3-bordered">';
echo '<tr><td><h2>Booking Confirmation</h2></td></tr><br>';
echo '<tr><td>User No:          '. $user_id .'</td></tr><br>';
echo '<tr><td>Service:          '. $Service .'</td></tr><br>';
echo '<tr><td>Tyre:             '. $Tyre .'</td></tr><br>';
echo '<tr><td>Make:             '. $Make .'</td></tr><br>';
echo '<tr><td>Model:            '. $Model .'</td></tr><br>';
echo '<tr><td>Service Date & Time :     '. $Datetime .'</td></tr><br>';
echo '</table>';




?>
</body><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


<div class="footer">
  &copy; Inver Tyre <?php echo date("Y");?>
  <p>We deliver excellence in tyre services.</p>
</div>



</html>