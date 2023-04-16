<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="inscription.css">
    <title>Document</title>
</head>
<body>

    <?php
    //database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "democnx";

    try {
        $cnxdb = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $cnxdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $cnxdb->prepare("INSERT INTO COORDONNES (nom, prenom, mail, password) VALUES (:firstname, :lastname, :email, :mdp)");
        $sql->bindParam(':firstname', $firstnamedb);
        $sql->bindParam(':lastname', $lastnamedb);
        $sql->bindParam(':email', $emaildb);
        $sql->bindParam(':mdp', $pwddb);

        $verifmail = $cnxdb->prepare("SELECT mail FROM coordonnes WHERE mail = :email");
        $verifmail->bindParam(':email', $maildb);
    } catch(PDOException $e) {
        echo $sql."<br>".$e->getMessage();
    }


        $fnameErr = $lnameErr = $mailErr = $pwdErr = "";
        $fnameshow = $lnameshow = $mailshow = $pwdverif = "";
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

            if(!empty($_POST["mail"])) {
                $mailshow = test_input($_POST["mail"]);
                if(!filter_var($mailshow, FILTER_VALIDATE_EMAIL)) {
                    $mailErr = "format doit etre: ...@gmail.com";
                }
                else {
                    $maildb = $mailshow;
                    $verifmail->execute();
                    $result = $verifmail->fetch(PDO::FETCH_ASSOC);
                    if($result){
                       echo "<script>alert('Ce mail existe deja');</script>";
                    }else {
                        $mail = $mailshow;
                        $verif++;
                    }
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

        if($verif == 4) {
            $fnameshow = $lnameshow = $mailshow = $pwdverif = "";
            /*try {
            $cnxdb = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $cnxdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO COORDONNES (nom, prenom, mail, password) VALUES ('$namef', '$namel', '$mail', '$pwd')";
            $cnxdb->exec($sql);
            echo "alert('Compte créer')";
            } catch(PDOException $e) {
                echo $sql."<br>".$e->getMessage();
            }

            $cnxdb = null;*/
            $firstnamedb = $namef;
            $lastnamedb = $namel;
            $emaildb = $mail;
            $pwddb = $pwd;
            $sql->execute();
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
        if(isset($_POST['cnnx'])) {
            header('Location: connexion.php');
            exit();
        }


    $cnxdb = null;
    



    ?>
    

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="fname">Nom :</label>
        <input type="text" id="fname" name="fname" value="<?php echo $fnameshow; ?>" required> <?php echo $fnameErr;?> <br>
        <label for="lname">Prénom :</label>
        <input type="text" id="lname" name="lname" value="<?php echo $lnameshow; ?>" required> <?php echo $lnameErr;?> <br>
        <label for="mail">Mail :</label>
        <input type="text" id="mail" name="mail" value="<?php echo $mailshow; ?>" required> <?php echo $mailErr;?> <br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required> <?php echo $pwdErr;?> <br>
        <input type="submit" name="button" value="Submit">

    </form>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="submit" name="accueil" value="accueil">
        <input type="submit" name="cnnx" value="connexion">

    </form>

</body>
</html>