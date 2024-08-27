<?php
class ClassCliente{
    private $nome;
    private $cpf;
    private $idade;
    private $email;
    private $apelido;
    private $dataNascimento;
    private $telefone;
    private $genero;
    private $senha; 
    private $id;

    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }
    public function setIdade($idade) {
        $this->idade = $idade;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function setApelido($apelido) {
        $this->apelido = $apelido;
    }
    public function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }
    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }
    public function setGenero($genero) {
        $this->genero = $genero;
    }
    public function setSenha($senha) {
        $this->senha = $senha;
    }
    public function getNome() {
        return $this->nome;
    }
    public function getCpf() {
        return $this->cpf;
    }
    public function getIdade() {
        return $this->idade;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getApelido() {
        return $this->apelido;
    }
    public function getDataNascimento() {
        return $this->dataNascimento;
    }
    public function getTelefone() {
        return $this->telefone;
    }
    public function getGenero() {
        return $this->genero;
    }
    public function getSenha() {
        return $this->senha;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function getId() {
        return $this->id;
    }
}
?>