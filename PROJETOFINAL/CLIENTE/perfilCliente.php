<?php require_once "../Conexao.php" ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>CS Shops</title>
    <link rel="stylesheet" href="../CSS/site.css">
</head>
    <body class="body3">
        <header>
        <div class="container">
                <div class="logo">
                    <a href="#"><img src="../IMG/logo.png.jpeg" alt="CS SHOPS"></a>
                </div>
                    <nav>
                        <ul>
                            <li><a href="../site.php"><i class="fas fa-home"></i> Início</a></li>
                            <li><a href="perfilCliente.php"><i class="fas fa-user-plus"></i> Perfil</a></li>
                            <li><a href="../ENDERECO/visualizarEnderecos.php"><i class="fas fa-home"></i> Endereço</a></li>
                            <li><a href="logout.php"><i class="fas fa-user-plus"></i> Sair</a></li>
                            <li><a href="../carrinho.php"><i class="fas fa-shopping-cart"></i> Carrinho</a></li>
                            <li><a href="../pedido.php"><i class="fas fa-tag"></i> Pedidos</a></li>
                    </ul>
                </div>
        </header>
        
</body>
</html>
<?php
session_start();

if (!isset($_SESSION["cliente_id"])) {
    header("Location: formLogin.php");
    exit();
}

$cliente_id = $_SESSION["cliente_id"];

try {
    $pdo = Conexao::getInstance();
    $sql = "SELECT nome, cpf, idade, email, apelido, dataNascimento, telefone, genero, senha FROM cliente WHERE id = :cliente_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':cliente_id', $cliente_id);
    $stmt->execute();
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$cliente) {
        throw new Exception("Cliente não encontrado");
    }

    $cliente_nome = $cliente['nome'];
    $cliente_email = $cliente['email'];
    $cliente_cpf = $cliente['cpf'];
    $cliente_idade = $cliente['idade'];
    $cliente_apelido = $cliente['apelido'];
    $cliente_dataNascimento = $cliente['dataNascimento'];
    $cliente_telefone = $cliente['telefone'];
    $cliente_genero = $cliente['genero'];
    $cliente_senha = $cliente['senha'];

} catch (PDOException $erro) {
    echo "Erro ao buscar dados do cliente: " . $erro->getMessage();
} catch (Exception $erro) {
    echo "Erro: " . $erro->getMessage();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="perfil.css">
    <title>Perfil</title>
</head>
<div class="div4">
    <body class="body2">
        <div class="perfil">
         <div class="perfil2">
            <header class="header2">
                <h2 class="h22">Perfil</h2>
            </header>
            <p class="p3">Dados Pessoais:</p>
            <ul class="ul2">
                <li class="li2">Nome: <?php echo $cliente_nome; ?></li>
                <li class="li2">CPF: <?php echo $cliente_cpf; ?></li>
                <li class="li2">Idade: <?php echo $cliente_idade; ?></li>
                <li class="li2">Email: <?php echo $cliente_email; ?></li>
                <li class="li2">Apelido: <?php echo $cliente_apelido; ?></li>
                <li class="li2">Data de Nascimento: <?php echo $cliente_dataNascimento; ?></li>
                <li class="li2">Telefone: <?php echo $cliente_telefone; ?></li>
                <li class="li2">Gênero: <?php echo $cliente_genero; ?></li>
                <li class="li2">Senha: <?php echo $cliente_senha; ?></li>
            </ul>

            <a href="alterarDadosCliente.php" class="btn">Alterar Dados</a>
            <a href="logout.php" class="btn">Sair</a>
            </div>
            
        </div>
    </body>
</div>
</html>
