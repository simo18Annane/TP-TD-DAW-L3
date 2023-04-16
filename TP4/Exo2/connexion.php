<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="connexion.css">
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

        $verifmail = $cnxdb->prepare("SELECT mail FROM coordonnes WHERE mail = :email");
        $verifmail->bindParam(':email', $maildb);

        $verifcompte = $cnxdb->prepare("SELECT mail, password FROM coordonnes WHERE mail = :email and password = :mdp");
        $verifcompte->bindParam(':email', $maildb);
        $verifcompte->bindParam(':mdp', $pwddb);

        } catch(PDOException $e) {
        echo $verifmail."<br>".$e->getMessage();
        echo $verifcompte."<br>".$e->getMessage();
    }


    $mailErr = $pwdErr = "";
    $mailshow = $pwdverif = "";
    $verif = 0;

    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $verif = 0;

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
                       $verif++;
                    }else {
                        echo "<script>alert('mail invalide');</script>";
                    }
                }
            }

        if(!empty($_POST["password"])) {
            $pwdverif = test_input($_POST["password"]);
            $pwddb = $pwdverif;
            $maildb = $mailshow;
            $verifcompte->execute();
            $result = $verifcompte->fetch(PDO::FETCH_ASSOC);
            if($result){
                $verif++;
            }else {
                $mailErr = "mail ou mdp incorrecte";
            }

        }
    }


    if($verif == 2){
        
        //echo "<script>alert('connexion reussis');</script>";
        header('Location: modif.php');
        exit();

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
        header('Location: inscription.php');
        exit();
    }

    $cnxdb = null;




    ?>




    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="mail">Mail :</label>
        <input type="text" id="mail" name="mail" value="<?php echo $mailshow; ?>" required> <?php echo $mailErr;?> <br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required> <?php echo $pwdErr;?> <br>
        <input type="submit" name="button" value="Submit">

    </form>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="submit" name="accueil" value="accueil">
        <input type="submit" name="cnnx" value="inscription">

    </form>
    
</body>
</html>