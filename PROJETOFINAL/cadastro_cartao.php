<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/cartao.css">
    <title>Cadastro de Cartão</title>

</head>
<body><div class="div4">
    <div class="dados-pessoais">
        <h2>Cadastro de Cartão</h2>
        <form action="salvar_cartao.php" method="POST">
            <div class="row">
                <div class="column">
                    <label for="numero_cartao">Número do Cartão:</label>
                    <input type="text" id="numero_cartao" name="numero_cartao" required>
                </div>
                <div class="column">
                    <label for="nome_cartao">Nome no Cartão:</label>
                    <input type="text" id="nome_cartao" name="nome_cartao" required>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label for="data_validade">Data de Validade:</label>
                    <input type="text" id="data_validade" name="data_validade" placeholder="MM/AA" required>
                </div>
                <div class="column">
                    <label for="codigo_seguranca">Código de Segurança:</label>
                    <input type="text" id="codigo_seguranca" name="codigo_seguranca" required>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label for="cliente_id">ID do Cliente:</label>
                    <input type="text" id="cliente_id" name="cliente_id" required>
                </div>
            </div>
            <div class="row">
                <div class="column">
                <center><button class="limpar-btn" type="reset">LIMPAR</button></center>
                </div>
                <div class="column">
                <center><button class="cadastrar-btn" type="submit">CADASTRAR</button></center>
                </div>
            </div>
        </form>
    </div></div>
</body>
</html>
