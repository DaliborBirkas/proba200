<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
</head>
<body>
<h1>Reset you password</h1>
<p>An e-mail will be send to you with instructions</p>
<form method="post" action="reset-password-request.php">

    <input type="text" name="helperino" placeholder="Enter your e-mail address"><br>
    <button type="submit" name="reset-request-email">Receive new password by email</button>

</form>
<?php
if(isset($_GET["reset"])){
    if($_GET["reset"]=="success"){
        echo '<p> Check your email</p>';
    }
}
?>

</body>
</html>

<?php
