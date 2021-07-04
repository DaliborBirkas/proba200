<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create new passowrd</title>
</head>
<body>
            <?php
                $selector=$_GET["selector"];
                $validator=$_GET["validator"];
                    if (empty($selector)||empty($validator)){
                                echo "We could not validate your request";}

                    else{
                        //Checking if  it is hexadecimal format
                        if(ctype_xdigit($selector) !==false && ctype_xdigit($validator)!==false){
                            ?>

                            <form action="reset-pw.php" method="post">
                                <input type="hidden" name="selector" value="<?php echo $selector?>">
                                <input type="hidden" name="validator" value="<?php echo $validator?>">
                                <input type="password" name="pwdR" placeholder="Enter a new password">
                                <input type="password" name="pwdRR" placeholder="Repeat new password">
                                <button type="submit" name="reset-password-submit">Reset password</button>
                            </form>

                            <?php
                        }
                    }

?>
</body>
</html>
<?php
