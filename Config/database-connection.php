<?php 

// Defining database connection
$connection = mysqli_connect("localhost", "root", "lastborn231", "transaction");

if (mysqli_connect_errno()) {
    echo "Databse connection failed: " .mysqli_connect_errno();
    
    die();
}

?>