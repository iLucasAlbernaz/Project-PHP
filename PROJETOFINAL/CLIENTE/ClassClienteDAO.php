<?php require_once "../Conexao.php"; ?>
<?php
Class ClassClienteDAO {
    public function cadastrarCliente($novoCliente) {
        try {
        $pdo = Conexao::getInstance();
        $sql = "INSERT INTO cliente (nome, cpf, idade, email, apelido, dataNascimento, telefone, genero, senha) VALUES (?,?,?,?,?,?,?,?,?)";
        
        $stmt = $pdo->prepare($sql);
         $stmt->bindValue(1,$novoCliente->getNome());
         $stmt->bindValue(2,$novoCliente->getCpf());
         $stmt->bindValue(3,$novoCliente->getIdade());
         $stmt->bindValue(4,$novoCliente->getEmail());
         $stmt->bindValue(5,$novoCliente->getApelido());
         $stmt->bindValue(6,$novoCliente->getDataNascimento());
         $stmt->bindValue(7,$novoCliente->getTelefone());
         $stmt->bindValue(8,$novoCliente->getGenero());
         $stmt->bindValue(9,$novoCliente->getSenha());
         
         $stmt->execute();
         echo "<center><h1>Cadastro Realizado com sucesso!</h1><center><br>";
         } catch(PDOException $erro) {
        echo $erro->getMessage();
         } 
            header("Location: formLogin.php");

        }     


    public function alterarCliente($novoCliente){
        try{
            $pdo = Conexao::getInstance();
            $sql = "UPDATE cliente SET nome=:nome, cpf=:cpf, idade=:idade, email=:email, apelido=:apelido, dataNascimento=:datanascimento, telefone=:telefone, genero=:genero, senha=:senha WHERE id=:id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':nome',$novoCliente->getNome());
            $stmt->bindValue(':cpf',$novoCliente->getCpf());
            $stmt->bindValue(':idade',$novoCliente->getIdade());
            $stmt->bindValue(':email',$novoCliente->getEmail());
            $stmt->bindValue(':apelido',$novoCliente->getApelido());
            $stmt->bindValue(':datanascimento',$novoCliente->getDataNascimento());
            $stmt->bindValue(':telefone',$novoCliente->getTelefone());
            $stmt->bindValue(':genero',$novoCliente->getGenero());
            $stmt->bindValue(':senha',$novoCliente->getSenha());
            $stmt->bindValue(':id',$novoCliente->getId());
            $stmt->execute();
            return true;
        }catch(PDOException $erro){
            echo $erro->getMessage();
        }
    }      
}
?>