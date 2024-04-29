$(document).ready(function(){
    // Funzione per caricare i messaggi nella chat
    function loadChat() {
        $.ajax({
            url: 'load_chat.php',
            type: 'GET',
            success: function(response) {
                $('#chat-box').html(response);
            }
        });
    }

    // Carica i messaggi nella chat all'avvio della pagina
    loadChat();

    // Invia un messaggio quando l'utente preme il pulsante "Invia"
    $('#message-form').submit(function(event) {
        event.preventDefault(); // Evita il comportamento predefinito del form

        var formData = new FormData($(this)[0]);

        $.ajax({
            url: 'send_message.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                loadChat(); // Aggiorna la chat dopo l'invio del messaggio
                $('#message-input').val(''); // "Pulisce" l'input del messaggio dopo l'invio
            },
            error: function(xhr, status, error) {
                console.error("Errore durante l'invio del messaggio:", error);
            }
        });
    });

    // Funzione per aggiornare la chat ogni 2 secondi
    setInterval(loadChat, 2000); // 2000 millisecondi = 2 secondi
});
