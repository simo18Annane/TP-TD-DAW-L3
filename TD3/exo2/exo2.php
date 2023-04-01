<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <?php
        $sexe = "féminin";
        $age = 20;
        if($sexe == "féminin"){
            if($age > "21" && $age < "40"){
                echo "<script>alert('bienvenue dans le groupe');</script>";
            }
            else{
                echo "<script>alert('erreur, age du sexe feminin doit etre entre 21 et 40 ans');</script>";
            }
            
        }
        else{
            echo "<script>alert('bienvenue dans le groupe');</script>";
        }
        ?>
</body>
</html>