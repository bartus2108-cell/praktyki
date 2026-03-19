<?php
header("Content-Type: application/json");

$host = "localhost";
$username = "root";
$password = "";
$dbname = "shop_db";

$db = mysqli_connect($host, $username, $password, $dbname);
if (!$db){
    error_log("Wystąpił Błąd: " . mysqli_connect_error());
    echo json_encode(["status" => "error", "message" => "Błąd połączenia z bazą danych."]);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data["action"])){
        if ($data["action"] === 'register'){
            $username = $db->real_escape_string($data["username"]);
            $email = $db->real_escape_string($data["email"]);
            $password = password_hash($data["password"], PASSWORD_DEFAULT);

            $checkUser = $db->query("SELECT id FROM users WHERE username = '$username' OR email = '$email'");
            if ($checkUser->num_rows > 0){
                echo json_encode(["status" => "error", "message" => "Użytkownik lub email już istnieje."]);
            }else{
                $db->query("INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')");
                echo json_encode(["status" => "success", "message" => "Rejestracja zakończona pomyślnie"]);
            }
        }elseif($data["action"] == "login"){
            $username = $db->real_escape_string($data["username"]);
            $password = $data["password"];

            $user = $db->query("SELECT id, password FROM users WHERE username = '$username'");
            if ($user->num_rows > 0){
                $userData = $user->fetch_assoc();
                if (password_verify($password, $userData["password"])){
                    $token = bin2hex(random_bytes(16));
                    $expiry = date("Y-m-d H:i:s", strtotime("+1 hour"));

                    $db->query("UPDATE users SET token = '$token', token_expiry = '$expiry' WHERE id = {$userData['id']}");

                    echo json_encode(["status" => "success", "message" => "Logowanie zakończone pomyślne", "token" => $token]);
                }else{
                    echo json_encode(["status" => "error", "message" => "Nieprawidłowe hasło!"]);
                }
            }else{
                echo json_encode(["status" => "error", "message" => "Użytkownik o takiej nazwie nie istnieje"]);
            }
        }
    }
}

$db->close();
?>
