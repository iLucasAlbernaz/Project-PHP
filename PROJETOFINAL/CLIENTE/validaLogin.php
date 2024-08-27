<?php require_once "../Conexao.php" ?>
<?php
session_start(); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailCpf = $_POST["email"];
    $senha  = $_POST["senha"];

    try {
        $pdo = Conexao::getInstance();
        $sql = "SELECT * FROM cliente WHERE (email = :email OR cpf = :cpf) AND senha  = :senha";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':email', $emailCpf);
        $stmt->bindValue(':cpf', $emailCpf);
        $stmt->bindValue(':senha', $senha);
        $stmt->execute();
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($cliente) {
            
            $_SESSION["cliente_id"] = $cliente["id"]; 
            header("Location: ../site.php"); 
            exit();
        } else {
            
            header("Location: formLogin.php?erro=1"); 
            exit();
        }
    } catch(PDOException $erro) {
        echo $erro->getMessage();
    }
} else {
    
    header("Location: formLogin.php");
    exit();
}
?> 