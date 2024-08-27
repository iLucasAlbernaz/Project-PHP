<?php
if (isset($_GET['total_carrinho'])) {
    $total_carrinho = $_GET['total_carrinho'];
} else {
    $total_carrinho = 0;
}

$chave_pix = "llg.albernaz@gmail.com"; 


$nome_receptor = "Lucas Gabriel Alves Albennaz";
$valor_formatado = number_format($total_carrinho, 2, '', ''); // Sem vírgulas ou pontos
$payload = "https://chart.googleapis.com/chart?" . $chave_pix . "0215" . $nome_receptor . "5204000053039865405" . $valor_formatado . "5303";
$payload_base64 = base64_encode($payload);

// URL para gerar o QR Code usando Google Charts API
$qr_code_url = "IMG/qrcode-pix.png" . urlencode($payload);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Pix</title>
    <link rel="stylesheet" href="CSS/qrcode.css">
</head>
<body>
    <div class="container">
        <h1>QR Code Pix</h1>
        <p>Escaneie o QR Code abaixo para realizar o pagamento via Pix:</p>
        <img src="IMG/qrcode-pix.png" alt="QR Code Pix" class="qr-code">
        <p>Valor: R$ <?php echo number_format($total_carrinho, 2, ',', '.'); ?></p>
    </div>
</body>
</html>
