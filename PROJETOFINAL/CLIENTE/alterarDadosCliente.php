<?php require_once "../Conexao.php";?>
<?php require_once "ClassCliente.php";?>
<?php require_once "ClassClienteDAO.php";?>
<?php
session_start();

if (!isset($_SESSION['cliente_id'])) {
    header("Location: formLogin.php");
    exit();
}

$cliente_id = $_SESSION['cliente_id'];


try {
    $pdo = Conexao::getInstance();
    $sql = "SELECT * FROM cliente WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $cliente_id);
    $stmt->execute();
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$cliente) {
        echo "Cliente não encontrado.";
        exit();
    }
} catch (PDOException $erro) {
    echo $erro->getMessage();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];
    $apelido = $_POST['apelido'];
    $dataNascimento = $_POST['dataNascimento'];
    $telefone = $_POST['telefone'];
    $genero = $_POST['genero'];
    $senha = $_POST['senha'];

    $clienteAtualizado = new ClassCliente();
    $clienteAtualizado->setId($cliente_id);
    $clienteAtualizado->setNome($nome);
    $clienteAtualizado->setCpf($cpf);
    $clienteAtualizado->setIdade($idade);
    $clienteAtualizado->setEmail($email);
    $clienteAtualizado->setApelido($apelido);
    $clienteAtualizado->setDataNascimento($dataNascimento);
    $clienteAtualizado->setTelefone($telefone);
    $clienteAtualizado->setGenero($genero);
    $clienteAtualizado->setSenha($senha);

    $clienteDAO = new ClassClienteDAO();
    $clienteDAO->alterarCliente($clienteAtualizado);

    echo "Dados atualizados com sucesso!";
    header("Location: perfilCliente.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/cliente.css">
    <title>Alterar Dados</title>
</head>
<body>
    <form method="post" action="alterarDadosCliente.php">
        <div class="container-wrapper"> 
            <div class="container">
                <div class="dados-pessoais">
                    <fieldset>
                        <legend>Alterar Dados Pessoais</legend>
                        
                        <div class="row">
                            <div class="column">
                                <label for="nome">Nome completo:</label>
                                <input type="text" name="nome" id="nome" value="<?php echo $cliente['nome']; ?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="column">
                                <label for="cpf">CPF:</label>
                                <input type="text" name="cpf" id="cpf" readonly="true" value="<?php echo $cliente['cpf']; ?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="column">
                                <label for="email">E-mail:</label>
                                <input type="email" name="email" id="email" value="<?php echo $cliente['email']; ?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="column">
                                <label for="telefone">Telefone:</label>
                                <input type="tel" name="telefone" id="telefone" value="<?php echo $cliente['telefone']; ?>" required>
                            </div>

                            <div class="column">
                                <label for="dataNascimento">Data de nascimento:</label>
                                <input type="date" name="dataNascimento" id="dataNascimento" readonly="true" value="<?php echo $cliente['dataNascimento']; ?>" required>
                            </div>

                            <div class="column">
                                <label for="idade">Idade:</label>
                                <input type="number" name="idade" id="idade" readonly="true" value="<?php echo $cliente['idade']; ?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="column">
                                <label for="apelido">Apelido:</label>
                                <input type="text" name="apelido" id="apelido" value="<?php echo $cliente['apelido']; ?>" required>
                            </div>

                            <div class="column">
                                <label for="genero">Gênero:</label>
                                <select name="genero" required>
                                    <option value="masculino" <?php echo ($cliente['genero'] == 'masculino') ? 'selected' : ''; ?>>Masculino</option>
                                    <option value="feminino" <?php echo ($cliente['genero'] == 'feminino') ? 'selected' : ''; ?>>Feminino</option>
                                    <option value="outro" <?php echo ($cliente['genero'] == 'outro') ? 'selected' : ''; ?>>Outro</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="column">
                                <label for="senha">Senha:</label>
                                <input type="password" name="senha" id="senha" value="<?php echo $cliente['senha']; ?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="column">
                                <center><button class="btn" type="submit">Salvar Alterações</button></center>  
                            </div>
                        </div>
                        
                    </fieldset>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
