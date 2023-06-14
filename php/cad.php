<?php
    include('connect.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    extract($_FILES);

    $picture = rand(100000000,999999999).$_FILES['foto']['name'];
    $caminho = "../perfil_foto/".$picture;

    move_uploaded_file($foto['tmp_name'],$caminho);

    //verifica se todos os campos estão preenchidos
    if ($nome == "" || $email == "" || $senha == "") {
        die(header("HTTP/1.0 401 Preencha todos os campos do formulário"));
    }

    //checa se o nome já existe no banco de dados
    $checarNome = $con->prepare("SELECT id FROM user WHERE nome = ?");
    $checarNome->bind_param("s",$nome);
    $checarNome->execute();
    $result = $checarNome->get_result()->num_rows;
    if($result>0){
        die(header("HTTP/1.0 401 Já existe uma conta com esse nome"));
    }

    //checa se o email já existe no banco de dados
    $checarEmail = $con->prepare("SELECT id FROM user WHERE email = ?");
    $checarEmail->bind_param("s",$email);
    $checarEmail->execute();
    $result = $checarEmail->get_result()->num_rows;
    if($result>0){
        die(header("HTTP/1.0 401 Já existe uma conta com esse email"));
    }

    $stmt = $con->prepare("INSERT INTO user(nome, email, senha, foto ,online, criacao) 
    VALUES(?, ?, ?, ?, now(), now())");
    $stmt->bind_param("ssss",$nome,$email,$senha,$picture);
    $stmt->execute();
    include_once("login.php");
    header("location:chat.php");
?>