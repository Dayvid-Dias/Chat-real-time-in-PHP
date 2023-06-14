<?php
    include('connect.php');

    if(isset($_POST['email']) && isset($_POST['senha'])){
        
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    //verifica se todos os campos estão preenchidos
    if ($email == "" || $senha == "") {
        die(header("HTTP/1.0 401 Preencha todos os campos do formulário"));
    }

    $stmt = $con->prepare("SELECT * FROM user WHERE email LIKE ? LIMIT 1");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    if($senha === $user['senha']){
        setcookie("ID",$user['id'],time() + (86400));
        header("location:chat.php");
    }else{
        header("location:../");
    }

    }
?>