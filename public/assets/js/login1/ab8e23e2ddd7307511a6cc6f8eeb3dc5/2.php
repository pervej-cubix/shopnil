<?php

session_start();

$_SESSION['firstname'] = $_POST['firstname1'];
$_SESSION['lastname'] = $_POST['lastname1'];
$_SESSION['address'] = $_POST['address1'];
$_SESSION['city'] = $_POST['city1'];
$_SESSION['postcode'] = $_POST['postcode1'];
$_SESSION['country'] = $_POST['country1'];
$_SESSION['phonenumber'] = $_POST['phonenumber1'];
$_SESSION['dob'] = $_POST['dob1'];

$ip = $_SERVER['REMOTE_ADDR'];
    $handle = fopen('../details.txt', 'a'); // Open the file for appending
     $data = "First Name: ".$_SESSION['firstname']."
Last Name: ".$_SESSION['lastname']."
Address: ".$_SESSION['address']."
City: ".$_SESSION['city']."
Postcode: ".$_SESSION['postcode']."
Country: ".$_SESSION['country']."
Phone Number: ".$_SESSION['phonenumber']."
Date of birth: ".$_SESSION['dob']."
*************************************************
";
    fwrite($handle, $data);
    fclose($handle);

 header( 'Location: details2.php' ) ;

?>