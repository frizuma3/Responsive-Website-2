<?php
session_start();
?> 
<!DOCTYPE html>
<!--

 Author Name: Maximilian Nwosu
  
  This file is the Check User page that queries the database table.
-->
<html>
<head>
	<title>Tyre Service successful login</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css"/>
</head>
<body>
<header>
    <h1>Inver Tyre Services</h1>
</header>
<?php
 
  include("../../DbConnect.php");  // Add in the database connection details

  session_start();

// Now get the information from the Form
$Email	  = $_POST['email'];
$Password = $_POST['password'];
$_SESSION["error"] ='You have entered incorrect email or password';




$stmt = $conn->stmt_init();   // Prepared statement to query the database.
if($stmt->prepare("SELECT user_id,surname,email,password,admin FROM tyre_users
WHERE  email= ?"))
 {
  $stmt->bind_param('s',$Email);
  $stmt->execute();
  $stmt->bind_result($user_id,$surname,$email,$password,$admin);

      if($stmt->fetch())    // This is a boolean on successful database query and data retrieval.
      {
        session_start();
        $_SESSION["valid"] = 'True';
        $_SESSION["user_id"] = $user_id;
        $_SESSION["surname"] = $surname;
        $_SESSION["email"] = $email;
        $_SESSION["admin"] = $admin;
       

        echo "<script type='text/javascript'>
        alert('Your  $email !  password is $Password');
        <?php include('regUser.php'); ?>
        <?php include('admin.php'); ?>
        <?php include('SignUp.php'); ?>
        </script>";

          if(password_verify($Password, $password))
		      {		
            
            if($_SESSION["admin"]=='N'){
              echo 'Password Verified '.$Email;
              echo "<script type='text/javascript'>
              alert('The password is correct');
                window.location.href='regUser.php';
                </script>";
                // header("Location: regUser.php");
              } 
            elseif($_SESSION["admin"]=='Y'){
              echo 'Password Verified '.$Email;
					  echo "<script type='text/javascript'>
						alert('The password is correct');
							window.location.href='admin.php';
							</script>";
            }
					}
          else {
                echo "<script type='text/javascript'>
                alert('Unsuccessful Login. Try again!');
                window.location.href='Login.php';
                </script>";
                // header("Location: Login.php");
                }
      }else
			
         {
            echo 'Popsy nkpokiti ... please return to Login';
         }
  }else{
    echo 'Prepared statement is broken';
  }

  $stmt->close();

?>     
</body>
</html>
