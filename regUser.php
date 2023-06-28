<?php
session_start();
?>
<!--
Topic: Graded Unit 
  Student No: 21013159
  Student Name: Maximilian Nwosu
  School: UHI Inverness 
  Date: 31 01 23
  This file is the Registered User page that opens after a successful user login.
-->
<html>
<head>
<title>Inver Tyre Services</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="stylesheet.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
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
    <a link rel="Home" href="index.php" class="active">Home</a>
    <a link rel="Admin" href="Login.php">Admin</a>
    <a link rel="Contact Us" href="ContactUs.php">Contact Us</a>
    <a link rel="About Us" href="aboutUs.php">About Us</a>
    <a link rel="confirm" href="confirm.php">Booking Confirmation</a> 
    <a link rel="Log out" href="logout.php">Log out</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">     
    <i class="fa fa-bars"></i></a>
</div>
<br><br>
<?php
session_start();	
$user_id = $_SESSION['user_id'];
$surname = $_SESSION['surname'];
 

include("../../DbConnect.php"); 


  $sql = "SELECT user_id,surname FROM tyre_users WHERE user_id='$user_id' AND surname='$surname'";  
	$Result = mysqli_query($conn,$sql);    
  $details = mysqli_fetch_array($Result);
   //while ($details = mysqli_fetch_array($Result))
   echo '<tr>';
   echo '<td>Member No: '.$details['user_id'].'</td><br>';
   echo '<td>Member: '.$details['surname'].'</td><br>';
   
?>
<div class="header">
      <h1>Inver Tyre Services</h1>

      <h2>Your one-stop spot for Tyre Services.</h2>

      <h2 id="summary"> Live the experience.</h2>
</div>
</header>

<div class="row">
  <div class="col-3 menu">
    <ul>
      <li>The City</li>
      <li>The Road</li>
      <li>The Car</li>
      <li>The Tyre</li>
    </ul>
  </div>

  <div class="col-6">
    <h1>Tyre Services</h1>
    <p>The Inver Tyre is always poised to deliver tyre fittings  with exciting and scintillating services of the moment.</p>
    <p>We also bring you vintage, modern and historical services that not only excel in the market but optimises your vehicle for excellent performance and experiences.</p>

    <style>  /* css style for the form only on this webpage */
		form {
			text-align: center;
		}
	  </style>

    <h3>Book your service</h3>
  <form method="post" action="tyreservice.php">  <!--The form offers the registered user to select the choice of service and register the service on submission  -->
    <label for="service">Service Type:</label><br>
    <select id="service" name="service">
      <option value="">Choose a Category</option>
      <option value="Replacement">Replacement</option>
      <option value="Repair">Repair</option>
    </select><br><br>

    <label for="tyre">Type of tyre:</label><br>
    <select id="tyre" name="tyre">
      <option value="">Choose a Category</option>
      <option value="Summer tyre">Summer tyre</option>
      <option value="Winter tyre">Winter tyre</option>
      <option value="Caravan">Caravan</option>
      <option value="Electric vehicle tyre">Electric vehicle tyre</option>
      <option value="Hybrid tyre">Hybrid tyre</option>
      <option value="Homologated tyre">Homologated tyre</option>
    </select><br><br>

    <label for="make">Vehicle Make:</label><br>
    <select id="make" name="make">
      <option value="">Choose a Category</option>
      <option value="Volvo">Volvo</option>
      <option value="Saab">Saab</option>
      <option value="Fiat">Fiat</option>
      <option value="Audi">Audi</option>
      <option value="A/cura">Acura</option>
      <option value="BMW">BMW</option>
      <option value="Bentley">Bentley</option>
      <option value="Ford">Ford</option>
      <option value="Fiat">Fiat</option>
      <option value="Honda">Honda</option>
      <option value="Hyundai">Hyundai</option>
      <option value="Jaguar">Jaguar</option>
      <option value="KIA">KIA</option>
      <option value="Land Rover">Land Rover</option>
      <option value="Lexus">Lexus</option>
      <option value="Mazda">Mazda</option>
      <option value="Mercedes-Benz">Mercedes-Benz</option>
      <option value="Mini">Mini</option>
      <option value="Nissan">Nissan</option>
      <option value="Rolls-Royce">Rolls-Royce</option>
      <option value="Tesla">Tesla</option>
      <option value="Toyota">Toyota</option>
      <option value="Volks Wagen">Volks Wagen</option>
    </select><br><br>

    <label for="model">Vehicle Type/Model:</label><br>
    <select id="model" name="model">
      <option value="">Choose a Category</option>
      <option value="Hatchback">Hatchback</option>
      <option value="Convertible">Convertible</option>
      <option value="SUV">SUV</option>
      <option value="Minivan">Minivan</option>
      <option value="Station Wagon">Station Wagon</option>
      <option value="Pickup Truck">Pickup Truck</option>
    </select><br><br>

    <label for="datetime">Service (Date and Time):</label><br>
    <input type="datetime-local" id="datetime" name="datetime"><br><br>

    <input type="reset"  value="Reset"/>  <!--A reset button to clear the entered value and re-enter -->
    <input type="submit" value="Register Booking"/>   <!-- A submit button to register the selected values of the service -->
  </form>
  </div>


  <div class="col-3 right">
    <div class="aside">
      <h2>What?</h2>
      <p>Inver Tyre is a tyre fitting company.</p>
      <h2>Where?</h2>
      <p>The comapany is in the Highlands of Scotland.</p>
      <h2>How?</h2>
      <p>We are known for our excellent services across the country.</p>
    </div>
  </div>
</div>


<div class="footer">
  &copy; Inver Tyre <?php echo date("Y");?>
  <p>We deliver excellence in tyre services.</p>
</div>

</body>
</html>
