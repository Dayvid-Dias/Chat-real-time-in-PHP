<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="css/cad2.css">
    <link rel="stylesheet" href="css/auth.css">

    <title>EnderChat - Cadastro</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="forme cadastro">
                <form action="php/cad.php" method="POST" enctype="multipart/form-data" id="cadastro">
                    <h2>Cadastro</h2>
                    <div>
                       <img src="img/user.png" id="imgPhoto"> 
                    </div>
                    
                    <input type="file" name="foto" id="images" accept="image/*">
                    
                    <div class="input-container ic1">
                        <input id="nome" class="input" type="text" name="nome" placeholder="Nome">
                    </div>

                    <div class="input-container ic2">
                        <input id="email" class="input" type="email" name="email" placeholder="E-mail">
                    </div>

                    <div class="input-container ic2">
                        <input id="senha" class="input" type="password" name="senha" placeholder="Senha">
                    </div>

                    <button type="text" class="submit">Cadastrar</button>
                    <div class="subtitle">
                      <p class="link" onclick="$('.cadastro').fadeOut();$('.login').fadeIn()">Já tenho uma conta</p>  
                    </div>
                    

                </form>
            </div>

            <div class="forme login">
                <form action="php/login.php" method="POST" enctype="multipart/form-data" id="login">
                    <h2>Login</h2>

                    <div class="input-container ic2">
                        <input id="email" class="input" type="email" name="email" placeholder="E-mail">
                    </div>

                    <div class="input-container ic2">
                        <input id="senha" class="input" type="password" name="senha" placeholder="Senha">
                    </div>

                    <button type="text" class="submit">Entrar</button>
                    
                    <div class="subtitle">
                        <p class="link" onclick="$('.cadastro').fadeIn();$('.login').fadeOut()">Não tenho uma conta</p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script src="js/cad2.js"></script>
    <script src="js/jquery.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
        'use strict'

        let photo = document.getElementById('imgPhoto');
        let file =  document.getElementById('images');

        photo.addEventListener('click' , () => {
        file.click();
        });

        file.addEventListener('change' , () => {
        
        if (file.files.length <= 0 ){
            return;
        }
        
        let reader = new FileReader();
        reader.onload = () => {
            photo.src = reader.result;0
        } 

        reader.readAsDataURL(file.files[0]);

        });
    </script>
</body>
</html>