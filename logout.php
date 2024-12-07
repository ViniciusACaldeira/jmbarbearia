<?php

include 'notificacao.php';

session_start();

$_SESSION = array();

session_destroy();

header('Location: index.php'.formataNotificacao("sucesso", "Logout realizado!"));
exit;