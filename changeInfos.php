<?php
session_start();
if(isset($_POST['change-update'])){
    $idU = $_SESSION['userUid'];
    require_once "db_config.php";
    $uname=$_POST['change-name'];
    $ulastname=$_POST['change-lastname'];
    $unumber=$_POST['change-number'];
    $password=$_POST['change-pwd'];
    $passwordRepeat=$_POST['change-pwd-repeat'];
    if(empty($uname)  || empty($password) || empty($passwordRepeat
            || empty($ulastname) ||empty($unumber))){

        echo '<script language="javascript">';
        echo 'alert("Fill the fields");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();

    }

    else if(  !preg_match("/^[a-zA-Z]*$/",$uname)
        || !preg_match("/^[a-zA-Z]*$/",$ulastname) || !preg_match("/^[0-9]*$/",$unumber)
    ){
        /*!preg_match("/^[a-zA-Z0-9]*$/",$username)*/
        echo '<script language="javascript">';
        echo 'alert("Check email/name/lastname/number");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();

    }

    else if(!preg_match("/^[a-zA-Z]*$/",$uname)){
        echo '<script language="javascript">';
        echo 'alert("Name has to be a-z A-Z");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();

    }
    else if(!preg_match("/^[a-zA-Z]*$/",$ulastname)){
        echo '<script language="javascript">';
        echo 'alert("Lastname has to be a-z A-Z");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();
    }
    else if(!preg_match("/^[0-9]*$/",$unumber)){

        echo '<script language="javascript">';
        echo 'alert("Number has to be 0-9");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();
    }
    else if($password !==$passwordRepeat){
        echo '<script language="javascript">';
        echo 'alert("Both password has to be same);';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();

    }
    else{
        $sql="UPDATE korisnik SET name=:name,lastname=:lastname,number=:number, pwd=:pwd where id=$idU";
        $stmt=$connection->prepare($sql);
        if(!$stmt){
            exit();
        }


        else{
            $hashedPwd=password_hash($password,PASSWORD_DEFAULT); //bcrypt

            //   mysqli_stmt_bind_param($stmt,"sssss",$uname,$ulastname,$email,$unumber,$hashedPwd);
            $stmt->bindParam(':name',$uname,PDO::PARAM_STR);
            $stmt->bindParam(':lastname',$ulastname,PDO::PARAM_STR);

            $stmt->bindParam(':number',$unumber,PDO::PARAM_STR);
            $stmt->bindParam(':pwd',$hashedPwd,PDO::PARAM_STR);
            $stmt->execute();

            echo '<script language="javascript">';
            echo 'alert("Uspesno promenjeno);';
            echo 'window.location.href="ls.php";';
            echo '</script>';

            header("Location:ls.php");
            exit();
        }


    }



}
else{
    header("Location:../ls.php");
    exit();
}
