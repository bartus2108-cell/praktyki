<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th{
            border: solid, black;
        }
    </style>
</head>
<body>
    <p>
        <!-- ZAD 1. -->

        <?php 
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $age = $_POST["age"];
        $gender = $_POST["gender"];
        $job = $_POST["job"];

        if($name == NULL){
            echo "Brak Podanego Imienia!";
        }elseif($surname == NULL){
            echo "Brak Podanego Nazwiska!";
        }elseif($age == NULL){
            echo "Brak Podanego Wieku!";
        }elseif($gender == NULL){
            echo "Brak Podanej Płci!";
        }elseif($job == NULL){
            echo "Brak Podanego Zawodu!";
        }

        if($name != NULL){
            file_put_contents("dane z zadania 8.txt", $name. "\n", FILE_APPEND);
        }
        if($surname != NULL){
            file_put_contents("dane z zadania 8.txt", $surname. "\n", FILE_APPEND);
        }
        if($age != NULL){
            file_put_contents("dane z zadania 8.txt", $age. "\n", FILE_APPEND);
        }
        if($gender != NULL){
            file_put_contents("dane z zadania 8.txt", $gender. "\n", FILE_APPEND);
        }
        if($job != NULL){
            file_put_contents("dane z zadania 8.txt", $job. "\n \n", FILE_APPEND);
        }
        ?>
    </p>
    <form method="POST">
        Imię: <input type="text" name="name"><br>
        Nazwisko: <input type="text" name="surname"><br>
        Wiek: <input type="number" name="age"><br>
        Płeć: <select name="gender">
            <option value="Kobieta">Kobieta</option>
            <option value="Mężczyzna">Mężczyzna</option>
        </select><br>
        Zawód: <input type="text" name="job"><br><br>
        <input type="submit" value="Potwierdź"><br><br>
    </form>
    <?php

    #echo $_SERVER['REQUEST_METHOD'];

    /*if($_SERVER['REQUEST_METHOD'] == "POST"){

    }*/

    #ZAD 2.

    echo "<br>";

    file_get_contents("dane z zadania 8.txt", "r");

    $data[] = $name;
    $data[] = $surname;
    $data[] = $age;
    $data[] = $gender;
    $data[] = $job;

    $arr = array($name, $surname, $age, $gender, $job);

    echo "<table>";
        echo "<tr>";
            echo "<th>Imie</th>";
            echo "<th>Nazwisko</th>";
            echo "<th>Wiek</th>";
            echo "<th>Płeć</th>";
            echo "<th>Zawód</th>";
        echo "</tr>";
        echo "<tr>";
            echo "<th>". implode(" ", $arr). "</th>";
        echo "</tr>";
    echo "</table>";
    ?>
</body>
</html>