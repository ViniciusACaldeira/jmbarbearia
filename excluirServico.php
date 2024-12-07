<?php

$id = $_GET['id'];

include('database.php');
include('autoriza.php');
include 'notificacao.php';

verificaSeEstaAutorizado( );

apagarServico($id);

header('Location: admin.php'.formataNotificacao("sucesso", "Serviço apagado."));

exit;