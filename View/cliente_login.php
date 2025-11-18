<?php

session_start();
require_once '../vendor/autoload.php';

use Controller\ClienteController;

$clienteController = new ClienteController();
$loginMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['email'], $_POST['senha'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        if ($clienteController->loginCliente($email, $senha)) {
            header('Location: cliente_pag_principal.php');
            exit();
        }
        else {
            $loginMessage = "Email e/ou senha incorreto";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrybem - Login Empresarial</title>
    <link rel="stylesheet" href="../templates/assets/css/cliente_login.css    ">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="logo">
               
                <span class="logo-text">Agry<span class="logo-highlight">bem</span></span>
            </div>
            <nav class="nav">  
                <a href="../index.php" class="nav-button">Voltar ao início</a>
            </nav>
        </div>
    </header>

    </header>

    <!-- Main Section -->
    <section class="main-section">
        <div class="container main-container">
            

            <!-- Right Side - Login Form -->
            <div class="right-content">
                <div class="login-box">
                    <h2>Conecte-se à sua conta novamente </h2>
                    <p class="subtitle">Você e o Agrybem, juntos!</p>
                    
                    <form method="POST" class="login-form">
                        <div class="form-group">
                            <label for="email">Digite seu E-mail</label>
                            <input type="email" id="email" name="email" placeholder="">
                        </div>
                        
                        <div class="form-group">  
                            <label for="senha">Digite sua Senha</label>
                            <input type="password" id="senha" name="senha" placeholder="">
                        </div>
                        
                        <button type="submit" class="btn-entrar">ENTRAR</button>
                        
                        <p class="cadastro-link">
                            Não tem conta ainda? <a href="cliente_cadastro.php">Cadastre-se</a>
                        </p>
                    </form>

                    <p style="height: 15px; font-size: 12px; color: black;"><?php echo $loginMessage;?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
     <footer class="footer">
        <div class="container footer-container">
            <div class="footer-logo">
                
                <span class="footer-logo-text">Agry<span class="footer-logo-highlight">bem</span></span>
            </div>
            <div class="footer-tagline">
                Mais que produção, uma relação com você!
            </div>
        </div>
    </footer>
</body>
</html>