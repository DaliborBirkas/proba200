<?php
include('db_config.php');


$email = mysqli_real_escape_string($connection,$_POST['email']);
$password= mysqli_real_escape_string($connection,$_POST['password']);

$errors = [];


if (!filter_var($email, FILTER_VALIDATE_EMAIL)  || $email == ''){
    $errors[] = "The email address is considered invalid.";
}

if($education == '') {
    $errors[] = 'Education field is empty';
}

if($education == 'college' && $college == '') {
    $errors[] = 'College field is empty';
}

if(!$errors) {
    $sql = "INSERT INTO user_data (first_name, last_name, email, education, college) 
VALUES ('$firstName','$lastName','$email', '$education', '$college')";

    if (!mysqli_query($connection, $sql)) {
        die('Error: ' . mysqli_error($connection));
    }

    exit('success');
} else {
    foreach($errors as $error) {
        echo $error . '<br>';
    }
}
?>
