<?php

session_start();
require_once '../vendor/autoload.php';

use Controller\EmpreendedorController;

$empreendedorController = new EmpreendedorController();
$loginMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['cnpj_cpf'], $_POST['senha'])) {
        $cnpj_cpf = $_POST['cnpj_cpf'];
        $senha = $_POST['senha'];

        if ($empreendedorController->loginEmpreendedor($cnpj_cpf, $senha)) {
            header('Location: painel_profissional_empresa.php');
            exit();
        }
        else {
            $loginMessage = "CNPJ/CPF e/ou senha incorreto";
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
    <link rel="stylesheet" href="../templates/assets/css/empresa_login.css">
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
            <!-- Left Side - Keywords -->
            <div class="left-content">
                <div class="keywords">
                    <div class="keyword-item icon-keyword">
                        <div class="icon-box">
                            <img src="./img/grafico_crescimento.png" alt="Negócios">
                        </div>
                        <span class="keyword-text-bordered">Negócios</span>
                    </div>
                    <div class="keyword-item">
                        <span class="keyword-text-plain">que cultivam</span>
                    </div>
                    <div class="keyword-item highlight-keyword">
                        <span class="keyword-text-highlight">Valores</span>
                    </div>
                </div>
            </div>

            <!-- Right Side - Login Form -->
            <div class="right-content">
                <div class="login-box">
                    <h2>Conecte-se à sua conta comercial</h2>
                    <p class="subtitle">Você e o Agrybem, juntos!</p>
                    
                    <form method="POST" class="login-form">
                        <div class="form-group">
                            <label for="cnpj">Digite seu CNPJ ou CPF</label>
                            <input type="text" id="cnpj" name="cnpj_cpf" placeholder="">
                        </div>
                        
                        <div class="form-group">
                            <label for="senha">Digite sua Senha</label>
                            <input type="password" id="senha" name="senha" placeholder="">
                        </div>
                        
                        <button type="submit" class="btn-entrar">ENTRAR</button>
                        
                        <p class="cadastro-link">
                            Não tem conta ainda? <a href="cadastro_empresa.php">Cadastre-se</a>
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