<?php
include 'autoriza.php';
verificaSeEstaAutorizado();

include 'notificacao.php';

if( $_SERVER['REQUEST_METHOD'] === 'POST')
{
    include 'database.php';

    $nome = $_POST['nome'];
    $preco = $_POST['preco'];

    $retorno = "";

    if( inserirServico( $nome, $preco ) )
        $retorno= formataNotificacao("sucesso", "$nome, cadastrado com sucesso");
    else
        $retorno= formataNotificacao("erro", "$nome, já existe.");

    header("Location: cadastrar_servico.php".$retorno );
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="login.css">
    <title>Barbearia - Cadastro de Serviços</title>
</head>
<header> 
    <h1>JM Barbearia - Cadastro de Serviços</h1>
</header>
<body>
    <?php notificacao( );?>

    <a href="admin.php">Voltar</a>
    <div class="container">
        <div class="login">
            <form action="cadastrar_servico.php" method="post">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" required>
                <br><br>
                <label for="preco">Preço:</label>
                <input type="number" step="0.01" min="0.0" name="preco" id="preco" required>
                <button type="submit">Cadastrar</button>
            </form>
        </div>
    </div>
</body>
</html>