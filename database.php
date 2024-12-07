<?php

function conectarBancoDeDados( ){
    $conn = new mysqli('sql104.infinityfree.com', 'if0_37867112', 'Tech200172', 'if0_37867112_jmbarbearia');
    //$conn = new mysqli('localhost', 'root', '', 'barbearia_janderson');

    if($conn->connect_error)
        die("Falha na conexão! O erro foi: " . $conn->connect_error);

    return $conn;
}

function inserirMensagem( $nome, $email, $telefone, $mensagem ){
    $conn = conectarBancoDeDados();

    $stmt = $conn->prepare("INSERT INTO mensagem (nome, email, telefone, mensagem) VALUES (?,?,?,?)");
    $stmt->bind_param( "ssss", $nome, $email, $telefone, $mensagem );

    return $stmt->execute();
}

function coletarMensagens( )
{
    $conn = conectarBancoDeDados();
    
    $sql = "SELECT * FROM mensagem";
    $result = $conn->query($sql);

    return $result;
}

function apagarMensagem( $id )
{
    $conn = conectarBancoDeDados();
    
    $stmt = $conn->prepare("DELETE FROM mensagem WHERE id = ?");
    $stmt->bind_param("s", $id);

    $result = $stmt->execute();

    $stmt->close( );
    $conn->close( );

    return $result;
}

function coletaUsuarioPorNome( $login )
{
    $conn = conectarBancoDeDados();

    $stmt = $conn->prepare("SELECT * FROM usuario WHERE nome = ? ");
    $stmt->bind_param("s", $login);
    $stmt->execute();

    $result = $stmt->get_result();

    $usuario = $result->fetch_assoc();

    $stmt->close( );
    $conn->close( );

    return $usuario;
}

function login( $login, $senha )
{
    $usuario = coletaUsuarioPorNome($login);

    if( $usuario['senha'] === md5($senha) )
        return true;

    return false;
}

function inserirUsuario( $login, $senha )
{
    $usuario = coletaUsuarioPorNome($login);

    if( $usuario !== null || !empty($usuario) )
        return false;

    $conn = conectarBancoDeDados();

    $senha = md5($senha);

    $stmt = $conn->prepare( "INSERT INTO usuario (nome, senha) VALUES (?,?)");
    $stmt->bind_param("ss", $login, $senha);
    $stmt->execute();

    $stmt->close();
    $conn->close();

    return true;
}

function coletaServicos( )
{
    $conn = conectarBancoDeDados();
    
    $sql = "SELECT * FROM servico";
    $result = $conn->query($sql);

    return $result;
}

function coletaServicoPorNome( $nome )
{
    $conn = conectarBancoDeDados();

    $stmt = $conn->prepare("SELECT * FROM servico WHERE nome = ?");
    $stmt->bind_param("s", $nome);
    $stmt->execute();

    $result = $stmt->get_result();

    $servico = $result->fetch_assoc();

    $stmt->close( );
    $conn->close( );

    return $servico;
}

function inserirServico( $nome, $preco )
{
    $servico = coletaServicoPorNome($nome);

    if( $servico !== null || !empty($servico) )
        return false;

    $conn = conectarBancoDeDados();

    $stmt = $conn->prepare( "INSERT INTO servico (nome, preco) VALUES (?,?)");
    $stmt->bind_param("sd", $nome, $preco);
    $stmt->execute();

    $stmt->close();
    $conn->close();

    return true;
}

function apagarServico($id)
{
    $conn = conectarBancoDeDados();
    
    $stmt = $conn->prepare("DELETE FROM servico WHERE id = ?");
    $stmt->bind_param("s", $id);

    $result = $stmt->execute();

    $stmt->close( );
    $conn->close( );

    return $result;
}