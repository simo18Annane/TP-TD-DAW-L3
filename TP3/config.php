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

    function convertir($tableau) {
        $tab = array();
        for($k=0; $k < count($tableau); $k++) {
            //probleme de Undefined array key=> tableau vide, $demo[69]=null.
            $groupe = $tableau[$k][3];
            $name = $tableau[$k][1]." ".$tableau[$k][2];
            if(!isset($tab[$groupe])) {
                $tab[$groupe] = array();
            }
            array_push($tab[$groupe], $name);
        }
        return $tab;
    }

    function afficherList($tableau) {
        ksort($tableau);
        foreach($tableau as $groupe => $etudiants) {
            echo "<h2>Groupe Numéro ".$groupe." (composé de ".count($etudiants)." étudiants)</h2>";
            echo "<ol>";
            foreach($etudiants as $etudiant){
                echo "<li>".$etudiant."</li>";
            }
            echo "</ol>";
        }
    }

    function creerXML($tableau) {
        ksort($tableau);
        $xml = new DOMDocument('1.0', 'UTF-8');
        $baliseOuv = $xml->createElement('universite');
        $xml->appendChild($baliseOuv);
        foreach($tableau as $groupe => $etudiants) {
            $gr = $xml->createElement('Groupe');
            $baliseOuv->appendChild($gr);
            $gr->setAttribute('numero', $groupe);
            foreach($etudiants as $etudiant) {
                $element = $xml->createElement('etudiant', $etudiant);
                $gr->appendChild($element);
            }
        }

        //Formater le contenu XML
        $xml->formatOutput = true;
        $xmlString = $xml->saveXML();

        //Définir les en-têtes 
        header('content-type: text/xml');
        header('content-disposition: attachment; filename="groupeEtu.xml"');

        return $xmlString;
    }
 

?>