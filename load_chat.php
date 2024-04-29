<?php
session_start();

// Connessione al database
$conn = new mysqli("localhost", "root", "", "ilmioprimositoweb");

// Verifica della connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Query per recuperare i messaggi dalla tabella della chat
$sql = "SELECT * FROM chat_message ORDER BY timestamp DESC";
$result = $conn->query($sql);

// Verifica se la query ha restituito un errore
if (!$result) {
    die("Errore nella query: " . $conn->error);
}

// Array per memorizzare i messaggi
$messages = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Costruisci il messaggio da visualizzare
        $message = "<p><strong>" . $row['username'] . "</strong>: " . $row['message'];
        if (!empty($row['file_path'])) {
            $message .= ' - <a href="' . $row['file_path'] . '">File allegato</a>';
        }
        $message .= "</p>";

        // Aggiungi il messaggio all'array
        $messages[] = $message;
    }
} else {
    echo "Nessun messaggio nella chat.";
}

// Stampa i messaggi in ordine inverso (dal più recente al più vecchio)
for ($i = count($messages) - 1; $i >= 0; $i--) {
    echo $messages[$i];
}

// Chiudi la connessione al database
$conn->close();
?>
