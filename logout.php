<?php

session_start();

session_destroy();

echo "<script>window.open('Login.php','_self')</script>";


?>