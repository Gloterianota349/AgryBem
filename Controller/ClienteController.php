<?php

namespace Controller;

use Model\Cliente;

class ClienteController{
    private $clienteModel;
    
    public function __construct(){
        $this->clienteModel = new Cliente();
    }

    //Cadastro de cliente
    public function cadastroCliente($nome, $email, $senha){
        if(empty($nome) or empty($email) or empty($senha)){
            return false;
        }

        return $this->clienteModel->registerClient($nome, $email, $senha);
    }
    
    // E-MAIL JÁ CADASTRADO?
    public function checkClienteByEmail($email){
        return $this->clienteModel->getClientByEmail($email);
    }

    //Login de cliente
    public function loginCliente($email, $senha){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $cliente = $this->clienteModel->getClientByEmail($email);
        
        if($cliente && password_verify($senha, $cliente['senha'])){
            $_SESSION['id'] = $cliente['id'];
            $_SESSION['nome'] = $cliente['nome'];
            $_SESSION['email'] = $cliente['email'];

            return true;
        }
        return false;
    }

    //Verificar se o cliente está logado
    public function isLoggedIn(){
        return isset($_SESSION['id']);
    }

    // Buscar nome do cliente
    public function getClienteName($id, $nome){
        return $this->clienteModel->getClienteName($id, $nome);
    }

    // Buscar informações do cliente (pelo cliente)
    public function getClienteInfo($id, $nome, $email, $senha){
        return $this->clienteModel->getClienteInfo($id, $nome, $email, $senha);
    }

    //Atualizar informações de cadastro do cliente
    public function updateClient($id, $nome, $email){

        if(empty($id) or empty($nome) or empty($email)){
            return false;
        }

        return $this->clienteModel->updateClient($id, $nome, $email);
    }

    //Excluir cadastro do cliente
    public function deleteCliente($id){
        if(empty($id)){
            return false;
        }
        return $this->clienteModel->deleteCliente($id);
    }

    // Redefinir senha por email
    public function resetPasswordByEmail($email, $senha){
        // sanitização e validação básica
        $email = filter_var(trim($email ?? ''), FILTER_VALIDATE_EMAIL);
        $senha = trim($senha ?? '');
        if(!$email || empty($senha) || strlen($senha) < 6) return false;
        return $this->clienteModel->updatePasswordByEmail($email, $senha);
    }

}
?>