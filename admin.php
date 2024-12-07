<?php
    include 'notificacao.php';
    include 'autoriza.php';
    include('database.php');

    verificaSeEstaAutorizado();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="css.css">
    <title>Barbearia - Painel Admin</title>
</head>

<header> 
    <h1>JM Barbearia - Painel Administrador</h1>
</header>

<body>
    <?php notificacao( );?>

    <div>
        <p>Bem vindo, <?php echo $_SESSION['username']; ?> </p>
        <a href="logout.php"> Logout </a>
    </div>

    <nav>
        <ul>
            <li><span onclick="document.querySelector('#mensagem').style.display = 'block';document.querySelector('#servicos').style.display='none'">Mensagem</span></li>
            <li><span onclick="document.querySelector('#servicos').style.display = 'block';document.querySelector('#mensagem').style.display='none'">Serviços</span></li>
        </ul>
    </nav>

    <div id="mensagem">
        <h3>Mensagem</h3>
        <table>
            <thead>
                <tr>
                    <td>Nome</td>
                    <td>Email</td>
                    <td>Telefone</td>
                    <td>Mensagem</td>
                    <td>Ações</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $result = coletarMensagens();
                    
                    if( $result->num_rows > 0 ):
                        while( $mensagem = $result->fetch_assoc() ):
                ?>
                            <tr>
                                <td><?php echo htmlspecialchars($mensagem['nome']) ?></td>
                                <td><?php echo htmlspecialchars($mensagem['email']) ?></td>
                                <td><?php echo htmlspecialchars($mensagem['telefone']) ?></td>
                                <td><?php echo htmlspecialchars($mensagem['mensagem']) ?></td>
                                <td>
                                    <a href="excluirMensagem.php?id=<?php echo $mensagem['id']; ?>">Exluir</a>
                                </td>
                            </tr>
                    <?php
                        endwhile;
                    else:
                    ?>
                        <tr><td colspan="5">Sem Mensagem</td></tr>
                    <?php
                    endif;
                    ?>
            </tbody>
        </table>
    </div>
    <div id="servicos" style="display: none;">
        <h3>Serviços</h3>
        <a href="cadastrar_servico.php">Cadastrar Serviço</a>
        <table>
            <thead>
                <tr>
                    <td>Serviço</td>
                    <td>Preço</td>
                    <td>Ação</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $result = coletaServicos();
                    
                    if( $result->num_rows > 0 ):
                        while( $mensagem = $result->fetch_assoc() ):
                ?>
                            <tr>
                                <td><?php echo htmlspecialchars($mensagem['nome']) ?></td>
                                <td>R$ <?php echo htmlspecialchars($mensagem['preco']) ?></td>
                                <td>
                                    <a href="excluirServico.php?id=<?php echo $mensagem['id']; ?>">Exluir</a>
                                </td>
                            </tr>
                    <?php
                        endwhile;
                    else:
                    ?>
                        <tr><td colspan="3">Sem Serviços</td></tr>
                    <?php
                    endif;
                    ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>