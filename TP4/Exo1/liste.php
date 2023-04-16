<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="exo1.css">

    <title>Document</title>
</head>
<body>
    <a href="exo1.php">ajouter</a>
    <h1>Liste des personnes<h1>



    <?php
    function openFichier($nomF) {
        $file = fopen($nomF, "r") or die("erreur d'ouverture!!");
        $tab = array();
        while(!feof($file)) {
            array_push($tab, explode(";", fgets($file)));
        }
        fclose($file);
        return $tab;
    }    

    function afficher($tableau) {
        echo "<table>";
        echo "<tr>";
        echo "<th>Nom</th>";
        echo "<th>Prenom</th>";
        echo "<th>Tél</th>";
        echo "</tr>";
       for($i=0; $i < count($tableau); $i++){
           echo "<tr";
           if($i % 2 != 0){
               echo " class='color'";
           }
           echo ">";
           for($j=0; $j < count($tableau[$i]); $j++){
               echo "<td>".$tableau[$i][$j]."</td>";
           }
           echo "</tr>";
       }

       echo "</table>";
    }    

    $tabContact = openFichier("personne.txt");
    $tabInit = $tabContact;
   
    if(isset($_POST['tri'])) { 
        sort($tabContact);
    }

    if(isset($_POST['annulertri'])) {
        $tabContact = $tabInit;
    }


    if(isset($_POST['supprimer'])) {
        $name = test_input($_POST["nomSupp"]);
        $file = fopen("personne.txt", "r") or die("erreur d'ouverture!!");
        $tmpFile = fopen("personne.tmp", "w") or die("erreur d'ouverture!!");
        while(!feof($file)) {
            $line = fgets($file);
            $lineParts = explode(";", $line);
            if($lineParts[0] != $name) {
                fwrite($tmpFile, $line);
            }
        }
        fclose($file);
        fclose($tmpFile);
        rename("personne.tmp", "personne.txt");
        header('Location: '.$_SERVER['PHP_SELF']);
        exit();
    }

    if(isset($_POST['modifier'])) {
        $name = test_input($_POST["idPersonne"]);
        $num = test_input($_POST["nvNum"]);
        $file = fopen("personne.txt", "r") or die("erreur d'ouverture!!");
        $tmpFile = fopen("personne.tmp", "w") or die("erreur d'ouverture!!");
        while(!feof($file)) {
            $line = fgets($file);
            $lineParts = explode(";", $line);
            if($lineParts[0] != $name) {
                fwrite($tmpFile, $line);
            }
            else{
                $line = $lineParts[0].";".$lineParts[1].";".$num."\n";
                fwrite($tmpFile, $line);
            }
        }
        fclose($file);
        fclose($tmpFile);
        rename("personne.tmp", "personne.txt");
        header('Location: '.$_SERVER['PHP_SELF']);
        exit();
    }

    afficher($tabContact);



    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="submit" name="tri" value="trier"><br>
        <input type="submit" name="annulertri" value="annuler"><br>
        <input type="text" id="nomSupp" name="nomSupp">
        <input type="submit" name="supprimer" value="delete"><br>
        <label for="idPersonne">nom Contact à modifier :</label>
        <input type="text" id="idPersonne" name="idPersonne"><br>
        <input type="text" id="nvNum" name="nvNum"><br>
        <input type="submit" name="modifier" value="edit"><br>
    </form>




</body>
</html>