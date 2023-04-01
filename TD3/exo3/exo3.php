<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="exo3.css">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th></th>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>7</th>
            <th>8</th>
            <th>9</th>
            <th>10</th>
        </tr>
        <?php
            for( $i=0; $i < 10; $i++){
                $x=$i+1;
                echo "<tr>";
                for($j=0; $j <= 10; $j++){
                    if($j==0){
                        echo "<th>".$x."</th>";
                    }
                    else{
                        $y=$x*$j;
                        echo "<td>".$x." x ".$j." = ".$y;
                    }
                }
                echo "</tr>";
            }
        ?>

    </table>

    
</body>
</html>