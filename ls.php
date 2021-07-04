<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="stranica.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Restaraunt<span style="color: red">.</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ls.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="adminKonobar.php">Admin/konobar</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>

        </ul>

    </div>
</nav>
<main class="container-fluid">



    <section class="singup">

        <br>


            <?php
            if(isset($_SESSION['userUid'])){
                $name=$_SESSION['userId'];
                $dateee=date("Y-m-d");




                echo '<p class="login-status " style="color: yellowgreen"> Welcome '.$name.'</p>';
                echo '   <form method="post" action="insert.php" >
                                <label style="color:#f00;">Make your reservation</label><br><br> 
                                <label for="start" style="color:red;">Select date if you are creating reservation</label>&nbsp;&nbsp;&nbsp;

                            <input type="date" id="start" name="date" min='.$dateee.'  max="2021-12-31"><br>
                            
                              <label for="start1" style="color:red;">Select date if you are updating reservation</label>&nbsp;&nbsp;&nbsp;

                            <input type="date" id="start1" name="date2" min='.$dateee.' max="2021-12-31"><br>
                            
                            
                             <label for="vremeP" style="color: red">Start hour(if you are creating reservation)</label>  
                              <select name="vremeP" id="vremeP"><br>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
 
                                </select><br>
                                 <label for="vremeP" style="color: red">New Start hour (if you are updating reservation)</label>  
                                    <select name="newStartTime" ><br>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
 
                                </select>
                                <br>
                        <label   style="color: red">How long do you want to be in the restaraunt?  ( min 1h, max 6h ) </label><br>
                                <select name="vremeT" id="vremeT">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                </select><br>
                              
                                
                                
                              <br>   <label for="sto" style="color: red" >Choose table</label><br>
                                 <input type="text" name="sto" id="sto">
                                    <br>
                                    
                                    
                                    
                                    
                                <button type="submit" name="submit-reservation"> Create reservation</button>
                                <button type="submit" name="delete-reservation">Delete reservation </button>
                                <button type="submit" name="update-reservation">Update reservation </button>
                                <button type="submit" name="show-reservations">Show reservations</button>
                                <div id="total">aaaaaaaa</div>
                                
                                
                                
                                <br>
                                <br><br>
                               
                            </form>
                            <form method="post" action="changeInfos.php" >
                                                

                                            <input type="text" name="change-name" placeholder="Name"><br><br>
                                            <input type="text" name="change-lastname" placeholder="Lastname"><br><br>
                                             
                                            <input type="text" name="change-number" placeholder="Mobile Phone"><br><br>
                                            <input type="password" name="change-pwd" placeholder="Password"><br><br>
                                             <input type="password" name="change-pwd-repeat" placeholder="Repeat Password"><br>
                                             <button type="submit" name="change-update">Update informations</button>
                                             
                                            </form>
                            
                            <span id="so" style="color: red">NEUSPESNO</span>
                            
                            
                            <br><br>
                            <form method="post" action="logout.php">
                                 <button type="submit" name="logout-submit">Logout</button>
                            </form>';



                            require_once "db_config.php";

            }
            else{
                echo '
  <div class="container">
        <div class="row">
        <div CLASS=".col-sm-4  perica" style="background-color: red">
 <h1 class="singup1" >Log in</h1> <form method="post" action="login.php" class="singup2">
            <input type="text" name="mailuid" placeholder="Username/Email"><br><br>
            <input type="password" name="pwd" placeholder="Password"><br>
            <button type="submit" name="login-submit" class="btn2" >Login</button>
        </form>';
                if(isset($_GET['newpwd'])){
                    if($_GET['newpwd']=="passwordupdated"){
                        echo'<p style="color: #0f0"> Your password has been reset!</p>';
                    }
                }
        
    echo'    <a href="resetpw.php">Forgot your password?</a>
        ';
                    echo'
        <br>
        <h1 class="singup1">Sign up</h1>
          <form method="post" action="signup.php" class="singup2">';



                    echo '
                    <br>
                <input type="text" name="uid" placeholder="Name"><br><br>
                <input type="text" name="ulastname" placeholder="Lastname"><br><br>
                <input type="text" name="mail" placeholder="Email"><br><br>
                <input type="text" name="unumber" placeholder="Mobile Phone"><br><br>
                <input type="password" name="pwd" placeholder="Password"><br><br>
                <input type="password" name="pwd-repeat" placeholder="Repeat Password"><br>

                <button type="submit" name="signup-submit" class="btn2">
                    Sign up
                </button>

            </form>
               </div>

        </div></div>
        '

                ;
            }
            ?>




    </section>




    </section>

    <section class="login">
        <?php
        if(isset($_SESSION['userId'])){
            $name=$_SESSION['userId'];
            echo '<p class="login-status"> </p>';
        }
        else{
            echo '<p class="login-status"> You are logged out</p>';
        }
        ?>


    </section>
</main>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>
