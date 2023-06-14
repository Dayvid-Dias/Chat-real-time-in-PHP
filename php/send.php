<?php
    include('check.php');

    if($_GET['mensagem'] && $_GET['id']){
        $mensagem = $_GET['mensagem'];
        $other_id = $_GET['id'];

        $stmt = $con->prepare("INSERT INTO chat(enviou, recebeu, mensagem, criacao) 
        VALUES(?, ?, ?, now())");
        $stmt->bind_param("iis",$user_id, $other_id, $mensagem);
        $stmt->execute();
    }
?>