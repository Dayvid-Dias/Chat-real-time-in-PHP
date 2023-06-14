<?php
    include('check.php');

    if ($_GET["term"]){
        $nome = mysqli_real_escape_string($con, $_GET["term"]);

        // Query
        $stmt = $con->prepare("SELECT id, nome, foto, online FROM user WHERE (nome LIKE '%$nome%') ORDER BY nome DESC LIMIT 20");
        $stmt->execute();
        $result = $stmt->get_result();
        $count = $result->num_rows;

        if ($count < 1) {
            echo '<p>Sem resultados</p>';
        }

        while ($other_user = $result->fetch_assoc()) {
            ?>
            <li class="active" id="conversa">
				<div class="d-flex bd-highlight">
					<div class="img_cont">
                        <input type="hidden" value="<?php echo $other_user['foto']?>" id="newimg">
						<img id="pica" src="../perfil_foto/<?php echo $other_user['foto']?>" class="rounded-circle user_img">
						<span class="online_icon"></span>
					</div>
                    <input type="hidden" name="" value="<?php echo $other_user['id']?>" id="inputt">
					<div class="user_info">
						<span id="newname"><?php echo $other_user['nome']?></span>
						<p><?php echo $other_user['online']?></p>
					</div>
				</div>
			</li>
            <?php
        }
    }
?>
<script>
var procurar = document.getElementById('conversa')
var inputtt = document.getElementById('inputt')
var imgperfil = document.getElementById('fotoperfil')
var nomeperfil = document.getElementById('nomeperfil')
var foto = $('#newimg').val()
var name = $('#newname').text()

procurar.addEventListener('click', function(e) {
    $('#searchContainer').hide()
    $("#pesquisar").val("")
    $(".card-footer").show();
    imgperfil.setAttribute('src', '../perfil_foto/'+foto)
    nomeperfil.innerHTML = name
    papo()
    setInterval(() => {
        papo()
    }, 3000);
    procurar.removeEventListener('click', function(e){})
})

</script>