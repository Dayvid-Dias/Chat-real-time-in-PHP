
<?php
include('../../../connect.php');
include('../../../check.php');
extract($_POST);
extract($_FILES);

$picture = rand(1000,100000).$_FILES['foto']['name'];
$caminho = "../../../pictures/".$picture;

move_uploaded_file($foto['tmp_name'], $caminho);

if(mysqli_query($con, "UPDATE `user` SET `foto` = '$picture' WHERE `id_cliente` = '$user_id';")){
$msg = "Sucesso ao enviar suas informações!";
header("location:../../../index.php");
}else{
    $msg = "Tente Novamente";
}
?>