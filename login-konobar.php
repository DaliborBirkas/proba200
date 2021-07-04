<?php
if(isset($_POST['submit-konobar'])){
    require "db_config.php";
    $username=trim($_POST['usernameK']);
    $password=trim($_POST['passwordK']);
    if(!empty($username) || !empty($password)){
    $sql="SELECT * FROM radnik where username=:username and password=:password";
    $stmt=$connection->prepare($sql);
    if(!$stmt){
        echo "error";
    }

    else{
        $stmt->bindParam(':username',$username,PDO::PARAM_STR);
        $stmt->bindParam(':password',$password,PDO::PARAM_STR);
        $stmt->execute();

        $result=$stmt->fetch();
        if($row=$result){
            session_start();
            $_SESSION['idK']=$row['id'];

            header("Location: adminKonobar.php");
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Ne postoji ovaj konobar");';
            echo 'window.location.href="adminKonobar.php";';
            echo '</script>';
            exit();
        }

    }}
    else{
        echo '<script language="javascript">';
        echo 'alert("Polja ne mogu biti prazna");';
        echo 'window.location.href="adminKonobar.php";';
        echo '</script>';
        exit();
    }

}
