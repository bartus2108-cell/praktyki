<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td, table{
            border: black solid 3px;
        }
    </style>
</head>
<body>
    <?php
        #Tabliczka mnożenia - dwie pętle for, jedna w drugiej. Generujecie tabelkę 10 na 10 i wpisujecie w każdym polu kolejne wartości.

        echo "<table>";
        for($x = 0; $x <= 10; $x++){
            echo "<tr>";
            for($y = 0; $y <= 10; $y++){
                if($x == 0 && $y == 0){
                    echo "<td></td>";
                }elseif($x == 0){
                    echo "<td>" .$y. "</td>";
                }elseif($y == 0){
                    echo "<td>" .$x. "</td>";
                }else{
                    echo "<td>" .$x * $y. "</td>";
                }
            }
            echo "</tr>";
        }
        echo "</table>";
        ?>
</body>
</html>