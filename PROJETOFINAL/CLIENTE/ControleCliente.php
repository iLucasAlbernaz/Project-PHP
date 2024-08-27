<?php require_once "ClassCliente.php"; ?> 
<?php require_once "ClassClienteDAO.php";?>
<?php 

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$idade = $_POST['idade'];
$email = $_POST['email'];
$apelido = $_POST['apelido'];
$dataNascimento = $_POST['dataNascimento'];
$telefone = $_POST['telefone'];
$genero = $_POST['genero'];
$senha = $_POST['senha'];

$novoCliente = new ClassCliente();
$novoCliente->setNome($nome);
$novoCliente->setCpf($cpf);
$novoCliente->setIdade($idade);
$novoCliente->setEmail($email);
$novoCliente->setApelido($apelido);
$novoCliente->setDataNascimento($dataNascimento);
$novoCliente->setTelefone($telefone);
$novoCliente->setGenero($genero);
$novoCliente->setSenha($senha);

$ClassClienteDAO = new ClassClienteDAO();
$ClassClienteDAO->cadastrarCliente($novoCliente);

?>


