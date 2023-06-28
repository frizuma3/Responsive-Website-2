<?php
session_start();
?>
 <!DOCTYPE html>
<html>
<head>
<title>Inver Tyre Services</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="stylesheet.css">
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
   echo '<td>Admin No: '.$details['user_id'].'</td><br>';
   echo '<td>Admin: '.$details['surname'].'</td><br>';
   $user_id = $details['user_id'];
?>
</header>
<body>
<div class="header">
        <h1>Inver Tyre Services</h1>

        <h2>Your one-stop spot for Tyre Services.</h2>

        <h2 id="summary"> Live the experience</h2>
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

 </div> 

 <div class="col-3 right">
    <div class="aside">
      <h2>What?</h2>
      <p>Inver Tyre is a tyre fitting company.</p>
      <h2>Where?</h2>
      <p>The comapany is in the Highlands of Scotland.</p>
      <h2>How?</h2>
      <p>We are known for our excellent services across the country.</p>
    </div> <br><br>
    <br><br>

	<?php
		// Connect to database
    include("../../DbConnect.php"); 

		// Query database table
		$sql = "SELECT * FROM tyre_users";
		$result = mysqli_query($conn, $sql); 
	?>
  
  <style>
		form {
			text-align: center;
      border: 8px solid black;
      padding: 30px;
		}
	</style>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?> ">
		<label for="tyre_users"><h4>Remove a user:</h4></label>
		<select name="tyre_users" id="tyre_users">
			<option value="">Choose a person</option>
			<?php
				// Display database table data as option select
				while ($row = mysqli_fetch_assoc($result)) {
					// echo "<option value='" . $row['user_id'] . "'>" . $row['surname'] . "</option>";
          echo "<option value='" . $row['user_id'] . "'>" . $row['user_id'] ." - ". $row['forename'] ." - ". $row['surname'] . "</option>";
        }
			?>
		</select><br><br>
		<input type="submit" name="submit" value="Remove">
	</form>
 
	<?php
		if (isset($_POST['submit'])) {
			$id = $_POST['tyre_users'];

			// Retrieve details of selected person
			$sql = "DELETE FROM tyre_users WHERE user_id = $id";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);

			// Display details
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<h3> REMOVED:</h3>";
      }
		}

		mysqli_close($conn);
	?>
 </div>

 

</div>


<div class="footer">
  &copy; Inver Tyre <?php echo date("Y");?>
  <p>We deliver excellence in tyre services.</p>
</div>


</body>
</html>
