<?php require_once '../conexao.php'; ?>
<?php
session_start();

if (!isset($_SESSION["cliente_id"])) {
    header("Location: formLogin.php");
    exit();
}

$cliente_id = $_SESSION["cliente_id"];
$erro = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cep = $_POST["cep"];
    $rua = $_POST["rua"];
    $numero = $_POST["numero"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];

    try {
        $pdo = Conexao::getInstance();
        $sql = "INSERT INTO endereco (cliente_id, cep, rua, numero, bairro, cidade, estado) VALUES (:cliente_id, :cep, :rua, :numero, :bairro, :cidade, :estado)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':cliente_id', $cliente_id);
        $stmt->bindValue(':cep', $cep);
        $stmt->bindValue(':rua', $rua);
        $stmt->bindValue(':numero', $numero);
        $stmt->bindValue(':bairro', $bairro);
        $stmt->bindValue(':cidade', $cidade);
        $stmt->bindValue(':estado', $estado);
        $stmt->execute();
        header("Location: visualizarEnderecos.php");
        exit();
    } catch (PDOException $erro) {
        $erro = "Erro ao adicionar endereço: " . $erro->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Endereço</title>
    <link rel="stylesheet" href="../CSS/endereco.css">
</head>
<body>
<form method="POST" action="adicionarEndereco.php">
<div class="container-wrapper"> 
        <div class="container">
            <div class="endereco">
                
            <fieldset>
                
                <legend>Endereço</legend>

                <div class="row">
                    <div class="column">
                        <label for="cep">CEP:</label>
                        <input type="text" name="cep" id="cep" pattern="\d{2}\.\d{3}-\d{3}" required title="Exemplo 99.999-999" placeholder="Digite o CEP*" size="80" required>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label for="rua">Rua:</label>
                        <input type="text" name="rua" id="rua" placeholder="Digite a rua*" size="50" required>   
                    </div>

                    <div class="column">
                        <label for="numero">Número:</label>
                        <input type="text" name="numero" id="numero" placeholder="Digite o número*" size="50" required>
                    </div>   
                </div>

                <div class="row">
                    <div class="column">
                        <label for="bairro">Bairro:</label>
                        <input type="text" name="bairro" id="bairro" placeholder="Digite o bairro*" size="50" required>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label for="cidade">Cidade:</label>
                        <input type="text" name="cidade" id="cidade" placeholder="Digite a cidade*" size="50" required>   
                    </div>

                    <div class="column">
                        <label for="estado">Estado:</label>
                        <select name="estado" required>
                            <option selected value="">Escolha um estado*</option> 
                            <option value="DF">Distrito Federal</option>
                            <option value="SP">São Paulo</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="MG">Minas Gerais</option>
                        </select>
                    </div>   
                </div>

                <div class="row">
                    <div class="column">
                        <center><button class="btn2" type="reset">LIMPAR</button></center> 
                    </div>

                    <div class="column">
                        <center><button class="btn" type="submit">CADASTRAR</button></center>  
                    </div>
                    <div class="column"><br>
                         <center><a href="visualizarEnderecos.php" class="btn2" style="text-decoration: none;">VOLTAR</a></center>
                    </div>

            </fieldset>
        </div>
    </div>
</div>
</form>
    <?php if ($erro): ?>
        <p><?php echo $erro; ?></p>
    <?php endif; ?>
</body>
</html>
