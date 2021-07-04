
<?php
    session_start();
    if(isset($_POST['potvrdi-rezervaciju'])){
        require "db_config.php";
        $idKorisnika=$_SESSION['idK'];
        $kodRezervacije=trim($_POST['kod-rezervacije']);
        $kodd=trim($_POST['kod-rezervacije']);
        $komentar=$_POST['komentar'];
        $dane=$_POST['dane'];
        if(empty($kodRezervacije)){
            echo '<script language="javascript">';
            echo 'alert("Kod Rezervacije ne moze biti prazan");';
            echo 'window.location.href="adminKonobar.php";';
            echo '</script>';
            exit();
        }
        else{




            $sql="SELECT * FROM rezervacija where kod=:kod";
            $stmt=$connection->prepare($sql);
            if(!$stmt){
                echo "Greska pri konekciji sa bazon";
            }
            else{
                $stmt->bindParam(':kod',$kodRezervacije,PDO::PARAM_STR);
                $stmt->execute();

                $result=$stmt->fetch();
                if($row=$result){

                    $idRezervacije=$row['id'];

                    $query1="SELECT * FROM radnikprovera where kodd=:kodd";
                    $st=$connection->prepare($query1);
                    $st->bindParam(':kodd',$kodd,PDO::PARAM_STR);
                    $st->execute();
                    $res=$st->rowCount();

                    if($res>0){
                        echo '<script language="javascript">';
                        echo 'alert("Evidencija za ovu rezervaciju postoji");';
                        echo 'window.location.href="adminKonobar.php";';
                        echo '</script>';
                        exit();

                    }
                        else{
                    if(empty($dane)){
                        echo '<script language="javascript">';
                        echo 'alert("Status mora imati vrednost 1 ili 0");';
                        echo 'window.location.href="adminKonobar.php";';
                        echo '</script>';
                        exit();
                    }
                        else {
                            $query = "INSERT INTO radnikprovera(idRadnik,idRezervacija,komentar,status,kodd) values (:radnik,:rezervacija,:komentar,:status,:kod1)";
                            $statement = $connection->prepare($query);
                            if (!$statement) {
                                echo "greska";
                            } else {
                                $statement->bindParam(':radnik', $idKorisnika, PDO::PARAM_INT);
                                $statement->bindParam(':rezervacija', $idRezervacije, PDO::PARAM_INT);
                                $statement->bindParam('status', $dane, PDO::PARAM_STR);
                                $statement->bindParam('kod1', $kodRezervacije, PDO::PARAM_STR);
                                $statement->bindParam(':komentar', $komentar, PDO::PARAM_STR);
                                $statement->execute();

                                echo "Uspesno uneto";


                            }
                        }}

                }
                else{
                    echo '<script>';
                    echo 'alert("Ne postoji rezervacija pod ovim kodom");';
                    echo 'window.location.href="adminKonobar.php";';
                    echo '</script>';
                    exit();
                }

            }

        }
    }
