<?php

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$mensagem = $_POST['mensagem'];

echo $nome . $email . $telefone . $mensagem;
die();