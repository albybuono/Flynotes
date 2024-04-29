<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connessione al database
    $conn = new mysqli("localhost", "root", "", "ilmioprimositoweb");

    // Verifica della connessione
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    // Sanitizzazione e hash della password
    $username = $conn->real_escape_string($username);
    $email = $conn->real_escape_string($email);
    $password = password_hash($conn->real_escape_string($password), PASSWORD_DEFAULT);

    // Verifica se l'email esiste già nel database
    $check_email_query = "SELECT * FROM utenti WHERE email='$email'";
    $result_email = $conn->query($check_email_query);
    if ($result_email->num_rows > 0) {
        echo "L'email inserita è già associata a un altro account.";
        exit(); // Interrompi l'esecuzione dello script
    }

    // Verifica se lo username esiste già nel database
    $check_username_query = "SELECT * FROM utenti WHERE username='$username'";
    $result_username = $conn->query($check_username_query);
    if ($result_username->num_rows > 0) {
        echo "Lo username inserito è già utilizzato da un altro account.";
        exit(); // Interrompi l'esecuzione dello script
    }

    // Inserimento dell'utente nel database
    $sql = "INSERT INTO utenti (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Registrazione avvenuta con successo, memorizza il nome utente nella sessione
        $_SESSION['username'] = $username;
        header("Location: chat.php");
        exit();
    } else {
        echo "Errore durante la registrazione: " . $conn->error;
    }

    $conn->close();
}
?>
