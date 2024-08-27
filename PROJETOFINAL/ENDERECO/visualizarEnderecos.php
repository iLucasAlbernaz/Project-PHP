<?php require_once '../conexao.php'; ?>
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
                            <li><a href="../CLIENTE/perfilCliente.php"><i class="fas fa-user-plus"></i> Perfil</a></li>
                            <li><a href="../ENDERECO/visualizarEnderecos.php"><i class="fas fa-home"></i> Endereço</a></li>
                            <li><a href="../CLIENTE/logout.php"><i class="fas fa-user-plus"></i> Sair</a></li>
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
    $sql = "SELECT id, cep, rua, numero, bairro, cidade, estado FROM endereco WHERE cliente_id = :cliente_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':cliente_id', $cliente_id);
    $stmt->execute();
    $enderecos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $erro) {
    echo "Erro ao buscar endereços: " . $erro->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Endereços</title>
    <link rel="stylesheet" href="perfil.css">
</head>
<div class="div5">
<body class="body2">
    <div class="perfil">
    <div class="perfil2">
    <header class="header2">
                <h2 class="h22">Seus Endereços</h2>
            </header>
            <form action="processarExclusaoEnderecos.php" method="post">
            <?php if (!empty($enderecos)): ?>
                <ul class="ul2">
                    <?php foreach ($enderecos as $endereco): ?>
                            
                            <li class="li2"> <input type="checkbox" name="excluir[]" value="<?php echo $endereco['id']; ?>"> CEP: <?php echo htmlspecialchars($endereco['cep']); ?> </li>
                            <li class="li2"> Rua: <?php echo htmlspecialchars($endereco['rua']); ?> </li>
                            <li class="li2"> Número: <?php echo htmlspecialchars($endereco['numero']); ?> </li>
                            <li class="li2"> Bairro: <?php echo htmlspecialchars($endereco['bairro']); ?> </li>
                            <li class="li2"> Cidade: <?php echo htmlspecialchars($endereco['cidade']); ?> </li>
                            <li class="li2">Estado: <?php echo htmlspecialchars($endereco['estado']); ?> </li>
                        <br>
                    <?php endforeach; ?>
                </ul>
                <center><button class="btn3" type="submit">Excluir </button></center>
            <?php else: ?>
                <p>Você ainda não cadastrou nenhum endereço.</p>
                <br>
            <?php endif; ?>
            </form>
            <a href="adicionarEndereco.php" class="btn">Adicionar Endereço</a>
        </div>
    </div>
</body>
</div>
</html>