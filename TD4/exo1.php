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
        //exo1
        /*
        echo "<h1>".date("d/m/y")."</h1>";
        echo PHP_VERSION."<br>";
        echo PHP_OS."<br>";

        $x = "Postgresql";
        $y = "MySQL";
        $z = "Utilisez $x et $y" ;
        $t = "Utilisez $x et $y";
        echo $x."<br>";
        echo $y."<br>";
        echo $z."<br>";
        echo $t;
        */

        //exo2
        /*
        echo "Ceci est un exercice Php<br>";
        echo "Un exercice pour introduire le langage<br>";
        echo "<a href='https://www.u-bourgogne.fr/'>www.u-bourgogne.fr</a>";
        */

        //exo3
        /*
        $nom = "Annane";
        $prenom = "Simo";

        echo $nom." ";
        echo $prenom."<br>";

        echo "$nom $prenom<br>";

        echo $nom." ".$prenom;
        */

        //exo4
        /*
        echo "<h1>Calcul sur les variables</h1>";
        $TVA = 0.206;
        $prix = 150;
        $Nombre = 10;
        $HT = $prix * $Nombre;
        $TTC = ($TVA * $prix * $Nombre) + $HT;
        echo "le prix hors taxe est: ".$HT."<br>";
        echo "le prix TTC est: ".$TTC."<br>";

        echo var_dump($TVA);
        echo var_dump($prix);
        echo var_dump($Nombre);
        echo var_dump($HT);
        echo var_dump($TTC);
        */

        //echo 6
        /*
        for($i=1; $i<1500; $i+=2){
            echo $i." ";
        }
        */
        /*
        for($i=0; $i<500; $i++){
            echo "Je dois faire des sauvegardes régulières de mes fichiers<br>";
        }
        */

        $val=1;
        for($i=1; $i<=30; $i++){
            $val = $val * $i;
        }
        echo $val;


    ?>

</body>
</html>