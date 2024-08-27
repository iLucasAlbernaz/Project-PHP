<?php require_once '../conexao.php'; ?>
<?php
session_start();

if (!isset($_SESSION["cliente_id"])) {
    header("Location: formLogin.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["excluir"])) {
    try {
        $pdo = Conexao::getInstance();
        $sql = "DELETE FROM endereco WHERE id = :endereco_id";
        $stmt = $pdo->prepare($sql);
        
        foreach ($_POST["excluir"] as $endereco_id) {
            $stmt->bindValue(':endereco_id', $endereco_id);
            $stmt->execute();
        }
        
        header("Location: visualizarEnderecos.php");
        exit();
    } catch (PDOException $erro) {
        echo "Erro ao excluir endereço: " . $erro->getMessage();
    }
} else {
    header("Location: visualizarEnderecos.php");
    exit();
}
?>
