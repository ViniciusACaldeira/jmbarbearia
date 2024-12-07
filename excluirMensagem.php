<?php

$id = $_GET['id'];

include('database.php');
include('autoriza.php');
include 'notificacao.php';

verificaSeEstaAutorizado( );

apagarMensagem($id);

header('Location: admin.php'.formataNotificacao("sucesso", "Mensagem apagada."));

exit;