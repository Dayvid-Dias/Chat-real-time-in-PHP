<?php
    $con = mysqli_connect("localhost", "root", "", "enderchat");

    if($con->connect_error){
        echo "Falha ao conectar ao banco de dados".mysqli_connect_error();
    }
?>