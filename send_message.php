<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION["username"];
    $message = $_POST["message"];
    
    // Gestione del file allegato
    $file_path = '';
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_path = 'uploads/' . $file_name;
        move_uploaded_file($file_tmp, $file_path);
    }

    // Connessione al database e inserimento del messaggio
    $conn = new mysqli("localhost", "root", "", "ilmioprimositoweb");
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    $sql = "INSERT INTO chat_message (username, message, file_path) VALUES ('$username', '$message', '$file_path')";
    $result = $conn->query($sql);
    if (!$result) {
        echo "Errore durante l'inserimento del messaggio nel database: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Errore: Metodo di richiesta non consentito.";
}
?>
