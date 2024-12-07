<?php

if( $_SERVER['REQUEST_METHOD'] === "POST" )
{
    include('database.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];

    $resposta;
    if( inserirMensagem($nome, $email, $telefone, $mensagem) )
    {
        $resposta_mensagem = "Mensagem gravada com sucesso";
        $status = "sucesso";
    }
    else
    {
        $resposta_mensagem = "Falha ao gravar a mensagem";
        $status = "erro";
    }

    header("Location: index.php?status=$status&notificacao=$resposta_mensagem");
}

?>