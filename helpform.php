<?php
/* Attempt MySQL server connection. I am running my MySQL without password on XAMPP for windows 
so my line should go with an empty space for password (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", " ", "help");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

 
 //Escape user inputs for security
$date = mysqli_real_escape_string($link, $_GET['date']);
$location = mysqli_real_escape_string($link, $_GET['location']);
$firstname = mysqli_real_escape_string($link, $_GET['firstname']);
$lastname = mysqli_real_escape_string($link, $_GET['lastname']);
$item= mysqli_real_escape_string($link, $_GET['item']);


// attempt insert query execution
$sql = "INSERT INTO donation (date, location, firstname, lastname, item) VALUES ('$date', '$location','$firstname', '$lastname','$item')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 

// close connection
mysqli_close($link);


?>
