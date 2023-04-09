<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="exo1qst3.css">
    <title>Document</title>
</head>
<body>
    <?php
        //$file = fopen("liste_groupes_projet.csv", "r") or die("erreur d'ouverture!!");
        //question1
        /*
        while(!feof($file)) {
            echo fgets($file)."<br>";
        }
        fclose($file);
        */

        //question2
        /*
        $tab = array();
        while(!feof($file)) {
            array_push($tab, fgets($file));
        }
        fclose($file);
        
        for( $i=0; $i < count($tab); $i++){
            echo $tab[$i]. "<br>";
        }
        foreach($tab as $elm){
            echo $elm. "<br>";
        }
        */

        //question3
        /*
        $tab = array();
        while(!feof($file)) {
            array_push($tab, explode(";", fgets($file)));
        }
        fclose($file);

        
        for($i=0; $i < count($tab); $i++){
            for($j=0; $j < count($tab[$i]); $j++){
                echo $tab[$i][$j]."//";
            }
            echo "<br>";
        }
        

        echo "<table>";
        for($i=0; $i < count($tab); $i++){
            echo "<tr";
            if($i % 2 != 0){
                echo " class='color'";
            }
            echo ">";
            for($j=0; $j < count($tab[$i]); $j++){
                echo "<td>".$tab[$i][$j]."</td>";
            }
            echo "</tr>";
        }

        echo "</table>";
        */

        
        //question4
        require 'config.php';
        $demo = openFichier("liste_groupes_projet2.csv");
        //afficher($demo);

        //question5 part 1 //question 6
        $demo1 = convertir($demo);
        //question 5 part 2 //question 6
        afficherList($demo1);

        //question 7
        //echo creerXML($demo1);
    ?>
    
</body>
</html>