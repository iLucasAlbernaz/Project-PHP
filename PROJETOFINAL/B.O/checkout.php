<?php

require_once "conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
     
        $conexao = Conexao::getInstance();
        
       
        $cart = json_decode($_POST['cart'], true);

      
        $conexao->beginTransaction();

      
        $data = date("Y-m-d");
        $horario = date("H:i:s");


        foreach ($cart as $item) {
            $stmt = $conexao->prepare("INSERT INTO pedido (nome_produto, preco_unitario, quantidade, total, data, horario) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([
                $item['name'],
                $item['price'],
                $item['quantity'],
                $item['price'] * $item['quantity'],
                $data,
                $horario
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
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - CS Shops</title>
    <link rel="stylesheet" href="CSS/site.css">
    <link rel="stylesheet" href="CSS/carrinho.css">
    <link rel="stylesheet" href="CSS/checkout.css">
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
            </nav>
        </div>
    </header>

    <div class="container">
        <h2>Checkout</h2>
        <div class="checkout-details">
            <table class="cart-items">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                
                    $total = 0;

                
                    foreach ($cart as $item) {
                        $itemTotal = $item['price'] * $item['quantity'];
                        $total += $itemTotal;
                        echo "<tr>";
                        echo "<td>{$item['name']}</td>";
                        echo "<td>R$ {$item['price']}</td>";
                        echo "<td>{$item['quantity']}</td>";
                        echo "<td>R$ {$itemTotal}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <div class="total">
                <p>Total: R$ <?= number_format($total, 2) ?></p>
            </div>
        </div>
        <div class="checkout-actions">
            <button onclick="finalizePurchase()">Confirmar Pagamento</button>
        </div>
    </div>

    <script>
        function finalizePurchase() {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "pedido.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    if (xhr.responseText.trim() === "success") {
                        window.location.href = "pedido.php";
                    } else {
                        alert("Erro ao registrar o pedido: " + xhr.responseText);
                    }
                }
            };
            xhr.send("cart=" + encodeURIComponent(JSON.stringify(<?php echo json_encode($cart); ?>)));
        }
    </script>
</body>
</html>
