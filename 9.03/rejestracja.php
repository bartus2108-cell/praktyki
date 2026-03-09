<?php
include "polonczenie.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
        <p>Masz już konto? <a href="logowanie.php">Zaloguj się!</a></p>
    </nav>
    <h1>Strona Rejestracji</h1>
    <form method="POST">
        <label for="name">Imię:</label>
        <input type="text" name="name" require><br>
        <label for="surname">Nazwisko:</label>
        <input type="text" name="surname" require><br>
        <label for="email">Email:</label>
        <input type="email" name="email" require><br>
        <label for="password">Hasło:</label>
        <input type="password" name="password" require><br>
        <label for="c_password">Potwierdź Hasło:</label>
        <input type="password" name="c_password" require><br><br>
        <input type="submit" value="Zarejestruj">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $surname = mysqli_real_escape_string($db, $_POST['surname']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $c_passwod = mysqli_real_escape_string($db, $_POST['c_password']);

        if($password == $c_passwod){
            $insert = "INSERT INTO klienci (imie, nazwisko, email, haslo) VALUE (?, ?, ?, ?)";
            $add = $db->prepare($insert);
            $add->bind_param("ssss", $name, $surname, $email, $password);

            if($add->execute() == TRUE){
                echo "Rejestracja przebiegłą pomyślnie!";
            }else{
                echo "Rejestracja nie powiodła się, z powodu: ". $add->error;
            }
            $add->close();
        }else{
            echo "Hasła różnią się!";
        }
    }
    ?>
</body>
</html>