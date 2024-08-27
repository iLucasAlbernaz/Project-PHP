<?php
require_once "conexao.php";

date_default_timezone_set('America/Sao_Paulo');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $conexao = Conexao::getInstance();
        $cart = json_decode($_POST['cart'], true);
        $paymentMethod = $_POST['payment-method']; // Captura a forma de pagamento
        $conexao->beginTransaction();

        $data = date("Y-m-d");
        $horario = date("H:i:s");

        foreach ($cart as $item) {
            $stmt = $conexao->prepare("INSERT INTO pedido (nome_produto, preco_unitario, quantidade, total, data, horario, forma_pagamento) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([
                $item['name'],
                $item['price'],
                $item['quantity'],
                $item['price'] * $item['quantity'],
                $data,
                $horario,
                $paymentMethod // Adiciona a forma de pagamento ao pedido
            ]);
        }

        $conexao->commit();
        echo "success";
    } catch (PDOException $e) {
        $conexao->rollBack();
        echo "Erro ao registrar o pedido: " . $e->getMessage();
    }
    exit;
}

try {
    $conexao = Conexao::getInstance();
    $stmt = $conexao->query("SELECT * FROM pedido");
    $pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro ao recuperar os pedidos: " . $e->getMessage();
    $pedidos = [];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>CS Shops</title>
    <link rel="stylesheet" href="CSS/site.css">
    <link rel="stylesheet" href="CSS/carrinho.css">
    <link rel="stylesheet" href="CSS/pedido.css">
</head>
<body class="body3">
    <header>
        <div class="container">
            <div class="logo">
                <a href="#"><img src="IMG/logo.png.jpeg" alt="CS SHOPS"></a>
            </div>
            <nav>
                <ul>
                    <li><a href="site.php"><i class="fas fa-home"></i> Início</a></li>
                    <li><a href="CLIENTE/perfilCliente.php"><i class="fas fa-user-plus"></i> Perfil</a></li>
                    <li><a href="ENDERECO/visualizarEnderecos.php"><i class="fas fa-home"></i> Endereço</a></li>
                    <li><a href="CLIENTE/logout.php"><i class="fas fa-user-plus"></i> Sair</a></li>
                    <li><a href="carrinho.php"><i class="fas fa-shopping-cart"></i> Carrinho</a></li>
                    <li><a href="pedido.php"><i class="fas fa-tag"></i> Pedidos</a></li>
                </ul>
            </div>
        </header>

        <div class="container-pedido">
            <h2 class="h2-pedido">Detalhes do Pedido</h2>
            <?php if (!empty($pedidos)): ?>
                <?php foreach ($pedidos as $pedido): ?>
                    <div class="pedido">
                        <div class="pedido-header">
                            <p class="numero-pedido">Número do Pedido: <?= $pedido['id'] ?></p>
                            <div class="data-horario">
                                <span>Data do Pedido: <?= $pedido['data'] ?></span>
                                <span>Horário do Pedido: <?= $pedido['horario'] ?></span>
                            </div>
                        </div>
                        <table class="table-pedido">
                            <thead>
                                <tr class="tr1">
                                    <th class="th1">Produto</th>
                                    <th class="th1">Preço Unitário</th>
                                    <th class="th1">Quantidade</th>
                                    <th class="th1">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr1">
                                    <td class="td1"><?= htmlspecialchars($pedido['nome_produto']) ?></td>
                                    <td class="td1"><?= htmlspecialchars($pedido['preco_unitario']) ?></td>
                                    <td class="td1"><?= htmlspecialchars($pedido['quantidade']) ?></td>
                                    <td class="td1"><?= htmlspecialchars($pedido['total']) ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- Exibir a forma de pagamento -->
                        <div class="payment-method">Forma de Pagamento: <?= htmlspecialchars($pedido['forma_pagamento']) ?></div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="empty-pedido-message">Nenhum pedido encontrado.</p>
            <?php endif; ?>
        </div>

    <footer>
        <div class="container">
            <div class="footer-links">
                <a href="#">Quem Somos</a>
                <a href="#">Política de Privacidade</a>
                <a href="#">Termos de Uso</a>
                <a href="#">Contato</a>
            </div>
            <br>
            <div class="social-media">
                <a href="https://www.facebook.com/?locale=pt_BR"><img src="IMG/FACEBOOK.png" alt="Facebook"></a>
                <a href="https://twitter.com/i/flow/login?input_flow_data=%7B%22requested_variant%22%3A%22eyJsYW5nIjoicHQifQ%3D%3D%22%7D"><img src="IMG/TWITTER.png" alt="Twitter"></a>
                <a href="https://www.instagram.com/"><img src="IMG/INSTAGRAM.jpg" alt="Instagram"></a>
            </div>
        </div>
    </footer>
</body>
</html>
