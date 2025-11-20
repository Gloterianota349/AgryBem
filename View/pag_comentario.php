<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentários - Feedback dos Clientes</title>
    <!-- O caminho para o CSS deve ser ajustado conforme a estrutura do seu projeto -->
    <link rel="stylesheet" href="../templates/assets/css/pag_comentario.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>


    <!-- ===== HEADER (Baseado no arquivo Documentosemtítulo(2).txt) ===== -->
    <header class="header">
        <div class="container">
            <div class="logo">
                <span class="logo-text">Agry<span class="logo-highlight">bem</span></span>
            </div>
            <nav class="nav">
               
                <a href="../View/loja.php" class="nav-link nav-button">Voltar</a>
            </nav>
            <!-- O menu mobile foi omitido para simplificar, mas pode ser adicionado se necessário -->
        </div>
    </header>


    <!-- ===== CONTEÚDO PRINCIPAL ===== -->
    <main id="main-content">
        <div class="container">
            <section class="comment-section">
                <!-- Cabeçalho da Seção -->
                <div class="comment-section-header">
                    <h1 class="comment-section-title">Deixe seu Feedback</h1>
                 
                </div>


                <!-- Lista de Comentários -->
                <div class="comments-list-container">
                    <div class="comments-header">
                        <h2>Comentários</h2>
                        <!-- O número de comentários deve ser atualizado via JavaScript em um projeto real -->
                        <span class="comment-count-badge" id="comment-count">1</span> 
                    </div>
                    <ul id="comments-list">
                        <!-- COMENTÁRIO DE EXEMPLO INTEGRADO NO HTML -->
                        <li class="comment-item">
                            <div class="comment-header">
                                <div class="comment-author-info">
                                    <div class="comment-avatar">UC</div>
                                    <div class="comment-author-details">
                                        <span class="comment-author">Usuário Cadastrado</span>
                                        <span class="comment-date">Agora</span>
                                    </div>
                                </div>
                                <div class="comment-actions">
                                    <button class="edit-btn" title="Editar Comentário">
                                        <i class="fas fa-pencil-alt"></i> Editar
                                    </button>
                                    <button class="delete-btn" title="Excluir Comentário">
                                        <i class="fas fa-trash-alt"></i> Excluir
                                    </button>
                                </div>
                            </div>
                            <p class="comment-body">oie tudo bem</p>
                        </li>
                        <!-- Outros comentários seriam adicionados aqui -->
                    </ul>
                </div>
            </section>
        </div>
    </main>


    <!-- ===== CAIXA DE COMENTÁRIO (FORMULÁRIO FIXO) INTEGRADA NO HTML ===== -->
    <!-- Mantido o estilo de formulário fixo na parte inferior, conforme o CSS e a imagem de referência -->
    <div class="fixed-comment-form-wrapper">
        <form id="comment-form">
            <div class="form-group">
                <!-- A imagem de referência mostra um campo de texto simples, não um textarea de múltiplas linhas -->
                <input type="text" id="comment-text" placeholder="Escreva seu comentário..." required style="height: 45px; border-radius: 20px; padding: 10px 20px; border: 1px solid #e0e0e0; width: 100%; font-size: 15px; font-family: 'Poppins', sans-serif; transition: all 0.3s ease;">
            </div>
            <button type="submit" class="submit-btn">
                <i class="fas fa-paper-plane"></i> Enviar
            </button>
        </form>
    </div>

<script src="../templates/assets/js/pag_comentario.js"></script>
    <!-- O script JS deve ser mantido para a funcionalidade real -->
    <!-- <script src="../templates/assets/js/pag_comentario.js"></script> -->

     <!-- Api Vlibras -->
    <div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
        <div class="vw-plugin-top-wrapper"></div>
    </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>
</body>
</html>