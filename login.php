<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connessione al database
    $conn = new mysqli("localhost", "root", "", "ilmioprimositoweb");

    // Verifica della connessione
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    // Sanitizzazione dell'username
    $username = $conn->real_escape_string($username);

    // Query per ottenere l'utente dal database
    $sql = "SELECT * FROM utenti WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password corretta, autenticazione avvenuta con successo
            $_SESSION['username'] = $username;
            // Reindirizza alla pagina della chat (chat.php)
            header("Location: chat.php");
            exit();
        } else {
            echo "Credenziali non valide.";
        }
    } else {
        echo "Credenziali non valide.";
    }

    $conn->close();
}
?>
