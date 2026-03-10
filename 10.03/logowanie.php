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
        <p>Nie masz jeszcze konta? <a href="rejestracja.php">Zarejestruj się!</a></p>
    </nav>
    <h1>Strona Logowania</h1>
    <form method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" require><br>
        <label for="password">Hasło:</label>
        <input type="password" name="password" require><br><br>
        <input type="submit" value="Zaloguj">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

        $command = "SELECT id, haslo FROM klienci WHERE email = ?";
        $execute = $db->prepare($command);
        $execute->bind_param("s", $email);
        $execute->execute();

        $result = $execute->get_result();

        if($result->num_rows == 1){
            $fetch = $result->fetch_assoc();
            $password_2 = $fetch['haslo'];

            if(password_verify($password, $password_2)){
                $_SESSION['user_id'] = $fetch['id'];
                echo "Logowanie powiodło się!";
                header("Location: zamowienia.php");
                exit();
            }else{
                echo "Błędny email lub hasło!";
            }
        }else{
            echo "Taki użytkownik nie istnieje!";
        }
        $execute->close();
    }
    ?>
</body>
</html>