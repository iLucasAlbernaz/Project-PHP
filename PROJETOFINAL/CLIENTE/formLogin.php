<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>

</head>
<body>

<form action="validaLogin.php" method="post">
<div class="image-container">
        <img src="../IMG/logo.png.jpeg" alt="CS SHOPS">
    </div>
    <div class="container-wrapper"> 
        <div class="container">
            <div class="dados-pessoais">
                
                <br>
                <fieldset>
                    <legend>Login</legend>
                    <div class="row">
                        <div class="column">
                            <label for="email">E-mail ou CPF:</label>
                            <input type="text" id="email" name="email" placeholder="Digite o seu E-mail ou CPF*" size="50" required>
                        </div>
                        <div class="column">
                            <label for="senha">Senha:</label>
                            <input type="password" name="senha" id="senha" placeholder="Digite a sua senha*" required>
                        </div>
                    </div>
                    <div class="row">   
                        <div class="column">
                            <center><button class="btn" type="submit">ENTRAR</button></center>  <br>
                            <center><a href="../CLIENTE/formCliente.php">Faça o seu CADASTRO aqui !!</a></center>
                        </div>
                    </div> 
                </fieldset>
    </div>
    <BR>
<?php
    if (isset($_GET["erro"]) && $_GET["erro"] == 1) {
    echo "<center><p style='color: red;'>Credenciais inválidas. Por favor, tente novamente.</p></center>";
    }
?>	
    </div>
</div>
    </form>
  
   
</body>
</html>
