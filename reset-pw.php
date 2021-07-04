<?php
if (isset($_POST['reset-password-submit'])){
    $selector=$_POST['selector'];
    $validator=$_POST['validator'];
    $password=$_POST['pwdR'];
    $passwordRepeat=$_POST['pwdRR'];
    echo "$selector<br>";
    echo  "$validator<br>";
    echo  "$password<br>";
    echo  "$passwordRepeat<br>";

    if(empty($password) || empty($passwordRepeat)){
        echo "lozinka je prazna";
        exit();
    }
    elseif ($password!=$passwordRepeat){
        echo "lozinke nisu iste";
        exit();
    }
    else{
        $currentDate=date("U");

        require "db_config.php";
        $sql="SELECT * FROM pwdreset where pwdResetSelector=:selector and pwdResetExperis>=:experi";
        echo"$sql";

        $stmt=$connection->prepare($sql);
        if(!$stmt){
            echo "There was an error";
            exit();
        }
        else{
            echo"<br>$selector selector";
            echo "<br>$currentDate current date <br>";
            $stmt->bindParam(':selector', $selector, PDO::PARAM_STR);
            $stmt->bindParam(':experi', $currentDate, PDO::PARAM_STR);
            $stmt->execute();


            $result= $stmt->fetch();
            $rezultat=$stmt->rowCount();
            $broj=0;
            foreach ($result as $value) {
                $broj++;
                echo "$value brojac $broj<br>";
            }

            if($row=$result){
                echo "ovde sam";
                $tokenBin=hex2bin($validator);
                $tokenCheck=password_verify($tokenBin,$row['pwdResetToken']);

                if($tokenCheck===false){
                    echo "You need to re-submit your reset request";
                    exit();
                }
                elseif ($tokenCheck===true){
                    $tokenEmail=$row['pwdResetEmail'];

                    $query="SELECT * FROM korisnik where email=:email";
                    $st=$connection->prepare($query);
                    if(!$st){
                        echo "there was an error";
                        exit();
                    }
                    else{
                        $st->bindParam(':email', $tokenEmail, PDO::PARAM_STR);
                        $st->execute();

                        $res=$st->fetch();
                        if($ro=$res){
                            $sql2="UPDATE korisnik  SET pwd=:pwd where email=:email";
                            $s=$connection->prepare($sql2);
                            if(!$s){
                                echo "error";
                            }
                            else{
                                $newPwdHash=password_hash($password,PASSWORD_DEFAULT);

                                $s->bindParam(':email', $tokenEmail, PDO::PARAM_STR);
                                $s->bindParam(':pwd', $newPwdHash, PDO::PARAM_STR);
                                $s->execute();

                                $sql33="DELETE FROM pwdreset WHERE pwdResetEmail=:pre";
                                $stmt33=$connection->prepare($sql33);
                                if(!$stmt33){
                                    echo "There was an error";
                                    exit();
                                }
                                else{

                                    $stmt33->bindParam(':pre', $tokenEmail, PDO::PARAM_STR);
                                    $stmt33->execute();
                                    header("Location:ls.php?newpwd=passwordupdated");
                                }



                            }
                        }
                        else{
                            echo "row res error";
                        }

                    }
                }
                else{

                }

            }
            else{
                echo "You need to re-submit your reset request";
                exit();
            }


        }

    }}
else{
    header("Location: ls.php");
}