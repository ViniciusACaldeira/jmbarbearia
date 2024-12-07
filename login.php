<?php
include('database.php');
include 'notificacao.php';

if( $_SERVER['REQUEST_METHOD'] === 'POST')
{
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    
    session_start();
    
    if( login($login, $senha) )
    {
        $_SESSION['username'] = $login;
        $_SESSION['logged_in'] = true;
    
        header("Location: admin.php".formataNotificacao("sucesso", "$login, conectado!"));
    }
    else
    {
        header("Location: login.php".formataNotificacao("erro", "Usuário ou senha inválido"));
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="login.css">
    <title>Barbearia - Login</title>
</head>
<header> 
    <h1>JM Barbearia - Login</h1>
</header>
<body>
    <?php notificacao( );?>

    <div class="container">
        <div class="login">
            <form action="login.php" method="post">
                <label for="login">Login:</label>
                <input type="text" name="login" id="login">
                <br><br>
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha">
                <button type="submit">Entrar</button>
            </form>
        </div>
    </div>
</body>
</html>