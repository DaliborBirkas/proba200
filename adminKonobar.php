<?php session_start()?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin/konobar</title>
</head>
<body>

<?php

if(isset($_SESSION['idK'])  || isset($_SESSION['idA'])){

    if(isset($_SESSION['idK'])){

        echo"<h4>Uspesno ste ulogovani kao konobar</h4>";

        echo '<form method="post" action="proveraR.php" >
                                <input type="text" name="kod-rezervacije" placeholder="kod rezervacije"><br>
                                <select name="dane" ><br>
                                        <option value="">...</option>
                                        <option value="1">1</option>
                                        <option value="1">0</option>
                                        
                                        </select><br>
                                <input type="text" name="komentar" placeholder="komentar"><br><br>
                                <button type="submit" name="potvrdi-rezervaciju">Confirm</button><br>
                            </form>';

        echo '<br><br>
                    <form method="post" action="logout.php" >
                                 <button type="submit" name="logout-submit">Logout</button>
                            </form>';


    }
    if(isset($_SESSION['idA'])){

    }


}

else{

    echo '
  <form method="post"  action="login-konobar.php">
    <h1>Konobar</h1>
    <input type="text" placeholder="usernameKonobar" name="usernameK" >
    <input type="password" placeholder="passwordKonobar" name="passwordK" >
    <button type="submit" name="submit-konobar">Potvrdi</button>
</form>


<br>
<h1>ADMIN</h1>
<form method="post">

    <input type="text" placeholder="usernameAdmin" name="usernameA" >
    <input type="password" placeholder="passwordAdmin" name="passwordA" >
    <button type="submit" name="submit-admin">Potvrdi</button>
</form>';}


?>
</body>
</html>

<?php

