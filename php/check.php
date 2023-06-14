<?php
    include('connect.php');

    if(isset($_COOKIE["ID"])){
        $id = $_COOKIE["ID"];

        $stmt = $con->prepare("SELECT * FROM user WHERE id like ?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();

        if($user){
            $user_id = $user['id'];

            $stmt = $con->prepare("UPDATE user SET online = now() WHERE id = ?");
            $stmt->bind_param("i",$user_id);
            $stmt->execute();
        }
    }
?>