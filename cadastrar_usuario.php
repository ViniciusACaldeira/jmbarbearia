<?php

$erro = "";

if( $_SERVER['REQUEST_METHOD'] === 'POST')
{
    include('database.php');

    $login = $_POST['login'];
    $senha = $_POST['senha'];

    if( !inserirUsuario($login, $senha) )
        $erro = "Nome do usuário já existe!";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbearia - Cadastro Usuário</title>
</head>
<body>
    <?php if($erro): ?>
        <p style="color:red;"><?php echo $erro; ?></p>
    <?php endif; ?>
    <form action="cadastrar_usuario.php" method="post">
        <label for="login">Login:</label>
        <input type="text" name="login" id="login">
        <br><br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha">
        <br><br>
        <input type="submit" value="Cadastar">
    </form>
</body>
</html>