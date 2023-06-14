<?php
    include('check.php');
    if($_GET['id']){

        $other_id = $_GET['id'];

        $stmt = $con->prepare("SELECT * FROM chat WHERE (enviou = ? AND recebeu = ?) OR (recebeu = ? AND enviou = ?)");
        $stmt->bind_param("iiii", $user_id, $other_id, $user_id, $other_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $existe = $result->num_rows;

        if ($existe < 1) {
            echo '<p>Sem resultados</p>';
        }

        $stmt = $con->prepare("SELECT * FROM user WHERE id = ?");
        $stmt->bind_param("i", $other_id);
        $stmt->execute();
        $outro = $stmt->get_result()->fetch_assoc();

        $stmt = $con->prepare("SELECT * FROM user WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $eu = $stmt->get_result()->fetch_assoc();

        while($papinho = $result->fetch_assoc()){
            if($papinho['enviou'] == $user_id){
        ?>
            <div class="d-flex justify-content-end mb-4">
				<div class="msg_cotainer_send">
                    <?php echo $papinho['mensagem']?>
					<span class="msg_time_send"><?php echo $papinho['criacao']?></span>
				</div>
				<div class="img_cont_msg">
					<img src="../perfil_foto/<?php echo $eu['foto']?>" class="rounded-circle user_img_msg">
				</div>
			</div>

        <?php
            }
            if($papinho['recebeu'] == $user_id){
            ?>
            <div class="d-flex justify-content-start mb-4">
				<div class="img_cont_msg">
					<img src="../perfil_foto/<?php echo $outro['foto']?>" class="rounded-circle user_img_msg">
				</div>
				<div class="msg_cotainer">
				    <?php echo $papinho['mensagem']?>
				    <span class="msg_time"><?php echo $papinho['criacao']?></span>
			    </div>
			</div>
            <?php
            }
        }
    }   
?>