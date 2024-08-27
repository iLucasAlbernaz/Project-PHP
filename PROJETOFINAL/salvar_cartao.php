<?php
require_once "Conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST['numero_cartao']) && 
        isset($_POST['nome_cartao']) && 
        isset($_POST['data_validade']) && 
        isset($_POST['codigo_seguranca']) &&
        isset($_POST['cliente_id'])
    ) {
        $data_validade = explode('/', $_POST['data_validade']);
        $mes_validade = $data_validade[0];
        $ano_validade = $data_validade[1];

        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO cartoes (numero_cartao, nome_cartao, expiracao_mes, expiracao_ano, codigo_seguranca, cliente_id) VALUES (:numero_cartao, :nome_cartao, :expiracao_mes, :expiracao_ano, :codigo_seguranca, :cliente_id)";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':numero_cartao' => $_POST['numero_cartao'],
                ':nome_cartao' => $_POST['nome_cartao'],
                ':expiracao_mes' => $mes_validade,
                ':expiracao_ano' => $ano_validade,
                ':codigo_seguranca' => $_POST['codigo_seguranca'],
                ':cliente_id' => $_POST['cliente_id']
            ]);

            header("Location: carrinho.php");
        } catch(PDOException $e) {
            echo "Erro ao salvar o cartão: " . $e->getMessage();
        }
    } else {
        echo "Todos os campos são obrigatórios.";
    }
} else {
    echo "Acesso não autorizado.";
}
?>
