<?php
    session_start();
    $_SESSION['nome'] = null;
    $_SESSION['email'] = null;
    session_destroy();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sair</title>
    <link rel="stylesheet" href="css/logout.css">
</head>

<body>
    <!-- Botão de logout no canto superior esquerdo -->
    <a href="index.html" class="btn-logout">Sair</a>

    <div class="message-container">
        <p class="logout-success">Saída realizada com sucesso!</p>
        <p><a href="login.php" class="login-link">ENTRAR NOVAMENTE</a></p>
    </div>
</body>

</html>