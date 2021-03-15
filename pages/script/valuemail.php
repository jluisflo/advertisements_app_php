<?php
// The code bellow demonstrates a simple back-end written in PHP
// Determine which field you want to check its existence
include '../../script/conexion.php';
$con = conexion();
$isAvailable = true;

 
        $email = $_POST['email'];
        // Check the email existence ...
        $result = mysqli_query($con,"Select * from anunciante Where email_usu = '$email'");
        
        if (mysqli_num_rows($result) > 0) {
        
         $isAvailable = false;

        }else{

         $isAvailable = true;

        }

       
 

// Finally, return a JSON
echo json_encode(array(
    'valid' => $isAvailable,
));

?>

