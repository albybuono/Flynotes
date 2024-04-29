<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Nunito:wght@300&family=Roboto+Mono&display=swap" rel="stylesheet">
    <title>chat</title>
</head>
<body>
    <div class="header">
        <div class="logo"> 
            <a href="index.html"><img src="images/Logo1.PNG" width="50" height="50"></a>
        </div>
        <ul class="menu"> 
            <li><a href="index.html">Home</a></li>
            <li><a href="register.html">Register</a></li>
            <li><a href="login.html">Login</a></li>   
        </ul>
        <div class="cta">
            <a href="" class="button">Contatti</a>
        </div>
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div class="hero">
        <div class="hero__content">
            <div id="chat-box"></div>
            <form id="message-form" enctype="multipart/form-data">
                <input type="text" id="message-input" name="message" placeholder="Inserisci il tuo messaggio...">
                <input type="file" name="file">
                <button type="submit" id="send-message">Invia</button>
            </form>
        </div>
    </div>
    

    <!-- Campo nascosto per memorizzare il nome utente -->
    <input type="hidden" id="username" value="<?php echo $_SESSION['username']; ?>">

    <!-- Script jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
