<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="accueil.css">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_POST['insc'])) {
        header('Location: inscription.php');
        exit();
    }
    if(isset($_POST['cnx'])) {
        header('Location: connexion.php');
        exit();
    }


    ?>


    <form method="post">
        <input type="submit" name="cnx" value="Connexion"/>
        <input type="submit" name="insc" value="Inscription"/>
    </form>

    
</body>
</html>