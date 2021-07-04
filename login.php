<?php
if (isset($_POST["login-submit"])){

    require  "db_config.php";

    $mailuid=$_POST['mailuid'];
    $password=$_POST['pwd'];
    $status="verified";

    if(empty($mailuid) || empty($password)){
        echo '<script language="javascript">';
        echo 'alert("Fill the fields");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();
    }
    else{
        $sql="SELECT * FROM korisnik where  email=:email ;";
        $stmt=$connection->prepare($sql);
        if (!$stmt){
            echo '<script language="javascript">';
            echo 'alert("SQL error");';
            echo 'window.location.href="ls.php";';
            echo '</script>';
            exit();
        }
        else{
            $stmt->bindParam(":email",$mailuid,PDO::PARAM_STR);
          /*  $stmt->bindParam(":status",$status,PDO::PARAM_STR);*/
            $stmt->execute();
            $rows=$stmt->fetch();
            if($row=$rows){
                $pwdCheck=password_verify($password,$row['pwd']);
                if($pwdCheck==false){
                    echo '<script language="javascript">';
                    echo 'alert("Wrong password");';
                    echo 'window.location.href="ls.php";';
                    echo '</script>';
                    exit();
                }
                else if($pwdCheck==true){
                    session_start();
                    $_SESSION['userId']=$row['name'];
                    $_SESSION['userUid']=$row['id'];
                    $_SESSION['sendEmail']=$row['email'];
                    header("Location:ls.php?login=success");
                    exit();
                }
                else{
                    echo '<script language="javascript">';

                    echo 'window.location.href="ls.php";';
                    echo '</script>';
                    exit();
                }
            }
            else{
                echo '<script language="javascript">';
                echo 'alert("No user");';
                echo 'window.location.href="ls.php";';
                echo '</script>';
                exit();
            }
        }

    }


}
else{
    header("Location:ls.php");
    exit();
}