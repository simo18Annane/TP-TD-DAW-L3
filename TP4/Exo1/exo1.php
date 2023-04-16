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
        $fnameErr = $lnameErr = $numberErr = "";
        $fnameshow = $lnameshow = $nbrshow = "";
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

            if(!empty($_POST["number"])) {
                $nbrshow = test_input($_POST["number"]);
                if(!preg_match("/^[0-9' ]*$/",$nbrshow)) {
                    $numberErr = "Only numbers and white space allowed";
                }
                else {
                    $nbr = $nbrshow;
                    $verif++;
                }
            }
        }


        if($verif == 3) {
            $fnameshow = $lnameshow = $nbrshow ="";
            $myfile = fopen("personne.txt", "a") or die("Unable to open file!");
            $txt = $namef.";".$namel.";".$nbr."\n";
            fwrite($myfile, $txt);
            fclose($myfile);
        }





        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }


    ?>



    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="fname">Nom :</label>
        <input type="text" id="fname" name="fname" value="<?php echo $fnameshow; ?>" required> <?php echo $fnameErr;?> <br>
        <label for="lname">Prénom :</label>
        <input type="text" id="lname" name="lname" value="<?php echo $lnameshow; ?>" required> <?php echo $lnameErr;?> <br>
        <label for="number">Tél :</label>
        <input type="text" id="number" name="number" value="<?php echo $nbrshow; ?>" required> <?php echo $numberErr;?> <br>
        <input type="submit" name="button" value="Submit"><br>
        <button onclick="window.location.href='liste.php'">afficher personnes</button>

    

    
    </form>



    
</body>
</html>