<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="modif.css">
    <title>Document</title>
</head>
<body>

    <?php
    $email ="";
    //database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "democnx";

    try {
        $cnxdb = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $cnxdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $edit = $cnxdb->prepare("UPDATE coordonnes SET nom = :firstname, prenom = :lastname, password = :mdp WHERE mail = :mail");
        $edit->bindParam(':firstname', $firstnamedb);
        $edit->bindParam(':lastname', $lastnamedb);
        $edit->bindParam(':mdp', $pwddb);
        $edit->bindParam(':mail', $maildb);

    } catch(PDOException $e) {
        echo $edit."<br>".$e->getMessage();
    }

   
    

        $fnameErr = $lnameErr = $pwdErr = "";
        $fnameshow = $lnameshow = $pwdverif = "";
        $verif=0;
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $verif = 0;
            if(!empty($_POST["fname"])) {
                $fnameshow = test_input($_POST["fname"]);
                if(!preg_match("/^[a-zA-Z' ]*$/",$fnameshow)) {
                    $fnameErr = "Only letters and white space allowed";
                }
                else {
                    $namef = $fnameshow;
                    $verif++;
                }
            }

            if(!empty($_POST["lname"])) {
                $lnameshow = test_input($_POST["lname"]);
                if(!preg_match("/^[a-zA-Z' ]*$/",$lnameshow)) {
                    $lnameErr = "Only letters and white space allowed";
                }
                else {
                    $namel = $lnameshow;
                    $verif++;
                }
            }

            if(!empty($_POST["password"])) {
                $pwdverif = test_input($_POST["password"]);
                if(!preg_match('/^(?=.*[A-Z])(?=.*\d).{8,}$/', $pwdverif)) {
                    $pwdErr = "mot de passe doit avoir au min une lettre maj et un chiffre";
                }
                else {
                    $pwd = $pwdverif;
                    $verif++;
                }
            }
        }

        if($verif == 3) {
            $fnameshow = $lnameshow = $pwdverif = "";
            $firstnamedb = $namef;
            $lastnamedb = $namel;
            $pwddb = $pwd;
            $maildb = "mohamed.annane01@gmail.com";
            $edit->execute();
        }



        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if(isset($_POST['accueil'])) {
            header('Location: accueil.php');
            exit();
        }

        $cnxdb = null;
    ?>
    




    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="fname">Nom :</label>
        <input type="text" id="fname" name="fname" value="<?php echo $fnameshow; ?>" required> <?php echo $fnameErr;?> <br>
        <label for="lname">Prénom :</label>
        <input type="text" id="lname" name="lname" value="<?php echo $lnameshow; ?>" required> <?php echo $lnameErr;?> <br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required> <?php echo $pwdErr;?> <br>
        <input type="submit" name="button" value="modifier"><br>


    </form>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="submit" name="accueil" value="accueil">


    </form>


</body>
</html>