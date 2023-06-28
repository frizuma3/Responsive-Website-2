<?php
session_start();
$user_id = $_SESSION['user_id'];
 include("../../DbConnect.php");              // Add in the database connection details

  
// Get the information from  admin.php
$Service  =$_POST['service'];
$Tyre   =$_POST['tyre'];
$Make  =$_POST['make'];
$Model   =$_POST['model'];
$Datetime  =$_POST['datetime'];



// Prepare statement, bind and Insert data into the database
$sql =("INSERT INTO tyreservice (user_id, service, tyre, make, model, datetime) VALUES (?,?,?,?,?,?)");
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $user_id, $Service, $Tyre, $Make, $Model, $Datetime);
$stmt->execute();

// Redirect to confirmation page
if ($stmt->affected_rows > 0) {
 
    session_start();
    $_SESSION["valid"] = 'True';
    $_SESSION["user_id"] = $user_id;
    $_SESSION["service"] = $Service;
    $_SESSION["tyre"] = $Tyre;
    $_SESSION["make"] = $Make;
    $_SESSION["model"] = $Model;
    $_SESSION["datetime"] = $Datetime;
header("Location: confirm.php");
exit();
} else {
echo "Error: please try again! " . $sql . "<br>" . $conn->error;
}
$stmt->close();


?>