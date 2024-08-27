<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/cliente.css">
    <title>Cliente</title>  
</head>
<body>

<form method="post" action="ControleCliente.php" > 
<div class="container-wrapper"> 
    <div class="container">
        <div class="dados-pessoais">

            <fieldset>
                <legend>Dados Pessoais</legend>
                
                <div class="row">
                    <div class="column">
                        <label for="nome">Nome completo:</label>
                        <input type="text" name="nome" id="nome" placeholder="Digite o seu nome completo*" size="50" required>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label for="cpf">CPF:</label>
                        <input type="text" name="cpf" id="cpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" required title="Exemplo 999.999.999-99" placeholder="Digite o seu CPF*">
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" id="email" placeholder="Digite o seu e-mail*" size="50" required>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label for="telefone">Telefone:</label>
                        <input type="tel" name="telefone" id="telefone" pattern="\(\d{2}\)\d{5}-\d{4}" required title="Exemplo (99)9999-9999" placeholder="Digite o seu telefone*">
                    </div>

                    <div class="column">
                        <label for="dataNascimento">Data de nascimento: </label>
                        <input type="date" name="dataNascimento" id="dataascimento" required>
                    </div>

                    <div class="column">
                        <label for="idade">Idade:</label>
                        <input type="number" name="idade" id="idade" placeholder="Digite a sua idade*" required>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label for="nome">Apelido: </label>
                        <input type="text" name="apelido" id="apelido" placeholder="Digite o seu apelido*" size="50" required>
                    </div>

                    <div class="column">
                        <label for="genero">Gênero:</label>
                        <select name="genero" required>
                            <option selected value="">Escolha um gênero*</option>
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                            <option value="outro">Outro</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha" id="senha" placeholder="Digite a sua senha*" size="50" required>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <center><button class="btn2" type="reset">LIMPAR</button></center> 
                    </div>
                    
                    <div class="column">
                        <center><button class="btn" type="submit">CADASTRAR</button></center>  
                    </div>
                </div>
                
            </fieldset>
        </div>
    </div>
</div>

</form>
</body>
</html