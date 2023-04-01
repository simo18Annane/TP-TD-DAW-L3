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
    function factorielle($number) {
        if($number > 0){
            $res=$number * factorielle($number-1);
            return $res;
        }
        elseif($number==0){
            return 1;
        }
    }

    echo factorielle(4);
    ?>

</body>
</html>