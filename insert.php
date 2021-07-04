
<?php

session_start();
require_once "db_config.php";
if(isset($_POST['submit-reservation'])) {
    $_SESSION['sendEmail'];

    function rand_string($length)
    {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz@#$&*";
        $size = strlen($chars);
            $str="";
        for ($i = 0; $i < $length; $i++) {
            $str .= $chars[rand(0, $size - 1)];



        }
        return $str;
    }

    $code = rand_string(30);


    $date = $_POST['date'];
    $timeP = $_POST['vremeP'];
    $timeT = $_POST['vremeT'];
    $table = $_POST['sto'];
    $idU = $_SESSION['userUid'];

     $vremeMax=(int)$timeT+(int)$timeP;


    if (empty($date) || empty($timeP) || empty($timeT || empty($table))) {
        echo '<script language="javascript">';
        echo 'alert("Plese select all fields");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();
    }
    if($vremeMax>23){
        echo '<script language="javascript">';
        echo 'alert("Pokusali ste da rezervisete duze od naseg radnog vremena");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();
    }
    elseif (!preg_match("/^[0-9]*$/",$table)){
        echo '<script language="javascript">';
        echo 'alert("You have to enter number");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();
    }
    else{
        $query="SELECT * FROM rezervacija where idS=:idS and datum=:datum and sat=:sat ";
        $s=$connection->prepare($query);
        $s->bindParam(':idS', $table, PDO::PARAM_INT);
        $s->bindParam(':datum', $date, PDO::PARAM_STR);
        $s->bindParam(':sat', $timeP, PDO::PARAM_STR);
      /*  $s->bindParam(':vreme', $timeT, PDO::PARAM_STR);*/
        $s->execute();
        $satnica='';
        $period='';
        $tS=$s->fetchColumn(3);
        $tT=$s->fetchColumn(4);


        $objekat=$s->fetchObject();

        $row=$objekat;
        $row1=$row[0];
        $row2=$row[1];
        $row3=$row[2];

        $itS=(int)$tS;
        $itT=(int)$tT;
        $bb=$itS+$itT;


        if($bb>0
        ){

            echo '<script language="javascript">';
            echo 'alert("Zauzeto je u ovo vreme");';
            echo 'window.location.href="ls.php";';
            echo '</script>';
            exit();


            }
        else{




        echo "satnica".$satnica."<br>";
        echo "period".$period."<br>";


    $sql = "INSERT INTO rezervacija(idU,datum,sat,vremenskiPeriod,kod,idS) values (:idU,:datum,:sat,:vremenskiperiod,:kod,:idS)";
    $stmt = $connection->prepare($sql);
    if (!$stmt) {
        echo '<script language="javascript">';
        echo 'alert("Statemnt problem");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();

    } else {
        $stmt->bindParam(':idU', $idU, PDO::PARAM_INT);
        $stmt->bindParam(':datum', $date, PDO::PARAM_STR);
        $stmt->bindParam(':sat', $timeP, PDO::PARAM_INT);
        $stmt->bindParam(':vremenskiperiod', $timeT, PDO::PARAM_INT);
        $stmt->bindParam(':kod', $code, PDO::PARAM_STR);
        $stmt->bindParam(':idS', $table, PDO::PARAM_INT);
        $stmt->execute();





        echo '<script language="javascript">';
        echo 'alert("Uspesna rezervacija");';
        echo 'window.location.href="ls.php";';

        echo '</script>';
        exit();






    }}}


}

if(isset($_POST['delete-reservation'])){
    $date = $_POST['date'];
    $timeP = $_POST['vremeP'];
    $sat=date("H");
    $idUU = $_SESSION['userUid'];
    $dan=date("d");
    $dann=(int)$dan;

    $dan2=$date[8];
    $dan2.=$date[9];
    $dan22=(int)$dan2;

    $mesec=$date[5];
    $mesec.=$date[6];
    $broj=(int)$mesec;

    $mesec2=date("m");
    $mesec22=(int)$mesec2;
    $ss=$sat+4;

        if(empty($date)|| empty($timeP)){
            echo $date."datum".$timeP;
            echo "<br>";
            echo $mesec22;
            echo '<script language="javascript">';
            echo 'alert("You have to choose date and start time to delete your reservations");';
            echo 'window.location.href="ls.php";';
            echo '</script>';
            exit();
        }

        if ($broj<$mesec22){

            echo '<script language="javascript">';
            echo 'alert("Mesec je manji od trenutnog, ne moguce je obrisati rezervaciju");';
            echo 'window.location.href="ls.php";';
            echo '</script>';
            exit();
        }

        else{
                if($mesec22<$broj){
                  /*  if($dann<=$dan22){*/
           /* if($ss<$timeP){*/
                $sql2="DELETE FROM rezervacija where datum=:datum and sat=:sat and idU=:idU";
                $stmt2=$connection->prepare($sql2);
                if (!$stmt2) {
                    echo '<script language="javascript">';
                    echo 'alert("Statemnt problem");';
                    echo 'window.location.href="ls.php";';
                    echo '</script>';
                    exit();

                }
                else{
                    $stmt2->bindParam(':datum', $date, PDO::PARAM_STR);
                    $stmt2->bindParam(':sat', $timeP, PDO::PARAM_INT);
                    $stmt2->bindParam(':idU', $idUU, PDO::PARAM_INT);
                    $stmt2->execute();
                    echo '<script language="javascript">';
                    echo 'alert("Uspesno brisanje rezervacija");';
                    echo 'window.location.href="ls.php";';

                    echo '</script>';
                    exit();
                }



           /* }*//*}*/}
            else{

                if($mesec22==$broj){
                    if($dann<$dan22){
                        $sql2="DELETE FROM rezervacija where datum=:datum and sat=:sat and idU=:idU";
                        $stmt2=$connection->prepare($sql2);
                        if (!$stmt2) {
                            echo '<script language="javascript">';
                            echo 'alert("Statemnt problem");';
                            echo 'window.location.href="ls.php";';
                            echo '</script>';
                            exit();

                        }
                        else{
                            $stmt2->bindParam(':datum', $date, PDO::PARAM_STR);
                            $stmt2->bindParam(':sat', $timeP, PDO::PARAM_INT);
                            $stmt2->bindParam(':idU', $idUU, PDO::PARAM_INT);
                            $stmt2->execute();
                            echo '<script language="javascript">';
                            echo 'alert("Uspesno brisanje rezervacija");';
                            echo 'window.location.href="ls.php";';

                            echo '</script>';
                            exit();
                        }
                    }
                    else{
                        if($dann==$dan22){

                            if($ss<=$timeP){

                                $sql2="DELETE FROM rezervacija where datum=:datum and sat=:sat and idU=:idU";
                                $stmt2=$connection->prepare($sql2);
                                if (!$stmt2) {
                                    echo '<script language="javascript">';
                                    echo 'alert("Statemnt problem");';
                                    echo 'window.location.href="ls.php";';
                                    echo '</script>';
                                    exit();

                                }
                                else{
                                    $stmt2->bindParam(':datum', $date, PDO::PARAM_STR);
                                    $stmt2->bindParam(':sat', $timeP, PDO::PARAM_INT);
                                    $stmt2->bindParam(':idU', $idUU, PDO::PARAM_INT);
                                    $stmt2->execute();
                                    echo '<script language="javascript">';
                                    echo 'alert("Uspesno brisanje rezervacija");';
                                    echo 'window.location.href="ls.php";';

                                    echo '</script>';
                                    exit();
                                }

                            }
                            else{
                                echo '<script language="javascript">';
                                echo 'alert("Greska prilikom brisanje rezervacije! (Najmanje 4 sata pre)");';
                                echo 'window.location.href="ls.php";';

                                echo '</script>';
                                exit();
                            }


                        }
                    }



                }
            }
        }

}

if(isset($_POST['update-reservation'])){

    $dateO = $_POST['date'];
    $dateN = $_POST['date2'];
    $timeP = $_POST['vremeP'];
    $timeN=$_POST['newStartTime'];
    $timeT = $_POST['vremeT'];
    $table = $_POST['sto'];
    $idUUU = $_SESSION['userUid'];

   /* if(empty($date0)|| empty($dateN) || empty($timeP) || empty($timeN) ||empty($timeT)|| empty($table)){
        echo "<br>".$dateO;
        echo "<br>".$dateN;
        echo "<br>".$timeP;
        echo "<br>".$timeT;
        echo "<br> novo vreme".$timeN;
        echo "<br>".$table;
        echo "<br>".$idU;
        echo '<script language="javascript">';
        echo 'alert("Greska prilikom updatejtovanje rezervacije! (Neko polje je prazno)");';
        echo 'window.location.href="ls.php";';
        echo '</script>';


        exit();
    }*/
    if(empty($dateN)){

        echo '<script language="javascript">';
        echo 'alert("Greska prilikom updatejtovanje rezervacije!DATEN");';
        echo 'window.location.href="ls.php";';
        echo '</script>';

    }

    elseif (empty($dateO)){
        echo '<script language="javascript">';
        echo 'alert("Greska prilikom updatejtovanje rezervacije! DATE0);';
        echo 'window.location.href="ls.php";';
        echo '</script>';
    }
    elseif (empty($timeP)){
        echo '<script language="javascript">';
        echo 'alert("Greska prilikom updatejtovanje rezervacije! (TIMEP)");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
    }
    elseif (empty($timeN)){
        echo '<script language="javascript">';
        echo 'alert("Greska prilikom updatejtovanje rezervacije! (TIMMEN)");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
    }
    elseif (empty($timeT)){
        echo '<script language="javascript">';
        echo 'alert("Greska prilikom updatejtovanje rezervacije! (TIMET)");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
    }
     elseif (empty($table)){
         echo '<script language="javascript">';
         echo 'alert("Greska prilikom updatejtovanje rezervacije! TABLE");';
         echo 'window.location.href="ls.php";';
         echo '</script>';
    }
    else{
        $sql3="UPDATE rezervacija SET datum=:datum,sat=:sat,vremenskiPeriod=:vremenskiP,idS=:idS WHERE idU=:idUUU and datum=:datumS and sat=:satS";
        $stmt3=$connection->prepare($sql3);
        if(!$stmt3){
            echo "greska";
        }
        else{

        $stmt3->bindParam(':datumS', $dateO, PDO::PARAM_STR);
        $stmt3->bindParam(':satS', $timeP, PDO::PARAM_INT);
            $stmt3->bindParam(':idUUU', $idUUU, PDO::PARAM_INT);

        $stmt3->bindParam(':datum', $dateN, PDO::PARAM_STR);
        $stmt3->bindParam(':sat', $timeN, PDO::PARAM_INT);

        $stmt3->bindParam(':vremenskiP', $timeT, PDO::PARAM_INT);

        $stmt3->bindParam(':idS', $table, PDO::PARAM_INT);
        $stmt3->execute();
        echo '<script language="javascript">';
        echo 'alert("Uspesna promena rezervacije");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();
        }

    }


}

if(isset($_POST['show-reservations'])){


header("Location: show_reservations.php");
}




/*
if(isset($_POST['show-reservations'])) {

//Connect to our MySQL database using the PDO extension.
    $idU = $_SESSION['userUid'];

//Our select statement. This will retrieve the data that we want.
    $sql = "SELECT id FROM rezervacija where idU=$idU";

//Prepare the select statement.
    $stmt = $connection->prepare($sql);

//Execute the statement.
    $stmt->execute();

//Retrieve the rows using fetchAll.
    $users = $stmt->fetchAll();
}
?>

<select>
    <?php foreach($users as $user): ?>
        <option value="<?= $user['id']; ?>"><?= $user['id']; ?></option>
    <?php endforeach; ?>
</select>*/










?>