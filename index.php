<!--
Topic: Graded Unit 
  Student No: 21013159
  Student Name: Maximilian Nwosu
  School: UHI Inverness 
  Date: 31 01 23
  This file is the landing page of the website.
-->
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="stylesheet.css">
<!-- <script src="validate.js"></script> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<header>

  <div class="topnav" id="myTopnav">
    <a link rel="About Us" href="aboutUs.php" class="active">About Us</a>
    <a link rel="Contact Us" href="ContactUs.php">Contact Us</a>
    <a link rel="Sign Up" href="SignUp.php">Sign Up</a> 
    <a link rel="Login"  href="Login.php">Login</a>      <!-- style="float:right"  -->
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">     
    <i class="fa fa-bars"></i></a>
</div>

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
<br><br>
</header>
<body>

<div class="header">
  <h1>Inver Tyre Services</h1>
</div>

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


  <h2>Tyres in the Service Department</h2> 
  <br>
  <table class="products" border="1">
  <tr>
  <tr>
  <th>Tyre No</th>
  <th>Description</th>
  <th>Image</th>
  </tr>
  </tr>
  <?php	
    include("../../DbConnect.php");    // connect to the database.
    
   $sql = "SELECT * FROM tyreimg";  // 	 Query the database
   
	$Result = mysqli_query($conn,$sql) or die(mysqli_error($conn));  // Store the resulting data in the $Result array.   


  while ($Row = mysqli_fetch_assoc($Result))  // while loop as associated data is retrieved from the database table.
  { 
   $stock_no =  $Row['stock_no'];  
    echo "<tr>";
    echo '<td>'.$stock_no.'</td>';
    echo '<td>'.$Row['description'].'</td>';
    echo '<td><img height="100px" width="100px" src="'.$Row['imagetable'].'"/></td>';
    echo '</tr>';
  }
?>
</table><br><br>
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


