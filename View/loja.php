<?php
session_start();
require_once '../vendor/autoload.php';

use Controller\EmpreendimentoController;
use Controller\EnderecoController;

$empreendimento_id = $_GET['id'] ?? null;

if (!$empreendimento_id) {
    // Redireciona ou mostra uma mensagem de erro se o ID não for fornecido
    header('Location: cliente_pag_principal.php');
    exit();
}

$empreendimentoController = new EmpreendimentoController();
$enderecoController = new EnderecoController();

// Busca as informações do empreendimento
$empreendimentoInfo = $empreendimentoController->getempreendimentoInfo($empreendimento_id);
$empreendimentoFoto = $empreendimentoController->getEmpreendimentoFoto($empreendimento_id);

// Busca as informações do endereço do empreendimento
$enderecoInfo = null;
if ($empreendimentoInfo && isset($empreendimentoInfo['id_endereco'])) {
    $enderecoInfo = $enderecoController->getEnderecoInfo($empreendimentoInfo['id_endereco']);
}

// Converte a foto para base64
$foto_base64 = '';
if ($empreendimentoFoto && isset($empreendimentoFoto['foto'])) {
    $foto_base64 = base64_encode($empreendimentoFoto['foto']);
}
$foto_src = 'data:image/jpeg;base64,' . $foto_base64;

// PREPARAÇÃO DA URL DO MAPA
$mapQuery = 'Brasil'; // Valor padrão caso não haja endereço
if ($enderecoInfo) {
    $mapParts = [
        $enderecoInfo['rua'] ?? '',
        $enderecoInfo['numero'] ?? '',
        $enderecoInfo['bairro'] ?? '',
        $enderecoInfo['cidade'] ?? '',
        $enderecoInfo['estado'] ?? '',
        $enderecoInfo['cep'] ?? ''
    ];
    // Remove partes vazias e junta com vírgula
    $addressString = implode(',', array_filter($mapParts));
    // Codifica a string para ser usada em uma URL (troca espaços por '+', etc.)
    $mapQuery = urlencode($addressString);
}
$googleMapsApiKey = 'AIzaSyC0tzkSQhRrMOcoMZ1XU0Ty4RwCER5gxLo'; // IMPORTANTE: Substitua pela sua chave de API do Google Maps
$mapUrl = "https://www.google.com/maps/embed/v1/place?key={$googleMapsApiKey}&q={$mapQuery}";

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrybem - Página Principal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../templates/assets/css/loja.css">
    <script src="js/carrinho.js" defer></script>
</head>
<body>
    <!-- Header -->
  <header class="header">
        <div class="container">
            <div class="logo">
                <span class="logo-text">Agry<span class="logo-highlight">bem</span></span>
            </div>
            <nav class="nav">
             
                <a href="../View/cliente_pag_principal.php" class="nav-button">Voltar</a>
              
            </nav>
        </div>
    </header>
    
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
       
        </div>
    </section>
    <!-- CONTEÚDO DO PERFIL INTEGRADO (Sem tag <main> para evitar conflitos) -->
        <!-- HEADER SECTION WITH LOGO AND TITLE -->
        <section class="header-section">
            <div class="container">
                <div class="header-top">
                    <div class="logo-institution">
                       
                        <img src="<?php echo $foto_src; ?>" alt="<?php echo htmlspecialchars($empreendimentoInfo['nome']); ?>" class="logo-img">
                    </div>

                    <div class="header-info">
                        <h1 class="institution-title"><?php echo htmlspecialchars($empreendimentoInfo['nome']); ?></h1>
        
                    </div>
                    <!-- Ícone do Carrinho Movido para Aqui -->
                    <a href="../view/carrinho.php" class="cart-icon-link-profile">
                        <img src="../templates/assets/img/vista-lateral-vazia-do-carrinho-de-compras.png" alt="Carrinho de Compras" class="cart-icon-profile">
                        <span class="cart-count-profile" id="cart-count-profile">0</span>
                    </a>
                </div>
                
            </div>
        </section>

        <div class="container">
            <div class="comment-feed">
                <a href="../View/pag_comentario.php"> Comentários</a>
            </div>
        </div>

        <!-- DESCRIPTION CARD -->
        <section class="card-section">
            <div class="container">
                <div class="card" data-card="description">
                  
                    <!-- REMOVIDO: style="display: none;" -->
                    <div class="card-actions">
                        <button class="card-save-button" title="Salvar">✓</button>
                        <button class="card-cancel-button" title="Cancelar">✕</button>
                    </div>
                    <div class="form-field">
                       
                        <textarea id="company-description" disabled><?php echo htmlspecialchars($empreendimentoInfo['descricao']); ?></textarea>
                    </div>
                </div>
            </div>
        </section>

        <!-- INSTITUTION INFO CARD -->
        <section class="card-section">
            <div class="container">
                <div class="card" data-card="institution">
                   
                    <!-- REMOVIDO: style="display: none;" -->
                    <div class="card-actions">
                        <button class="card-save-button" title="Salvar">✓</button>
                        <button class="card-cancel-button" title="Cancelar">✕</button>
                    </div>
                    <form class="institution-form" id="institutionForm">
                        

                        <div class="form-field">
                            <label for="company-name">Nome </label>
                            <input type="text" id="company-name" value="<?php echo htmlspecialchars($empreendimentoInfo['nome']); ?>" disabled>
                        </div>

                       

                        <div class="form-field">
                            <label for="phone">Telefone</label>
                            <input type="tel" id="phone" value="<?php echo htmlspecialchars($empreendimentoInfo['telefone']); ?>" disabled>
                        </div>

                        <div class="form-field">
                            <label for="hours">Horário de Funcionamento</label>
                            <input type="text" id="hours" value="<?php echo htmlspecialchars($empreendimentoInfo['hr_funcionamento']); ?>" disabled>
                        </div>

                        <div class="form-field">
                            <label for="whatsapp">Link para WhatsApp</label>
                            <input type="text" id="whatsapp" value="<?php echo htmlspecialchars($empreendimentoInfo['link_whatsapp']); ?>" disabled>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- ADDRESS CARD -->
        <section class="card-section">
            <div class="container">
                <div class="card" data-card="address">
                    <div class="card-header">
                        <h2 class="card-title">Endereço</h2>
                      
                    </div>
                    <!-- REMOVIDO: style="display: none;" -->
                    <div class="card-actions">
                        <button class="card-save-button" title="Salvar">✓</button>
                        <button class="card-cancel-button" title="Cancelar">✕</button>
                    </div>
                    <form class="address-form" id="addressForm">
                        <div class="form-field">
                            <label for="cep">CEP</label>
                            <input type="text" id="cep" value="<?php echo htmlspecialchars($enderecoInfo['cep']); ?>" disabled>
                        </div>

                        <div class="form-field">
                            <label for="street">Rua</label>
                            <input type="text" id="street" value="<?php echo htmlspecialchars($enderecoInfo['rua']); ?>" disabled>
                        </div>

                        <div class="form-field">
                            <label for="number">Número</label>
                            <input type="text" id="number" value="<?php echo htmlspecialchars($enderecoInfo['numero']); ?>" disabled>
                        </div>

                        <div class="form-field">
                            <label for="neighborhood">Bairro</label>
                            <input type="text" id="neighborhood" value="<?php echo htmlspecialchars($enderecoInfo['bairro']); ?>" disabled>
                        </div>

                        <div class="form-field">
                            <label for="city">Cidade</label>
                            <input type="text" id="city" value="<?php echo htmlspecialchars($enderecoInfo['cidade']); ?>" disabled>
                        </div>

                        <div class="form-field">
                            <label for="state">Estado</label>
                            <input type="text" id="state" value="<?php echo htmlspecialchars($enderecoInfo['estado']); ?>" disabled>
                        </div>

                        <div class="form-field">
                            <label for="reference">Ponto de Referência</label>
                            <input type="text" id="reference" value="<?php echo htmlspecialchars($enderecoInfo['complemento']); ?>" disabled>
                        </div>
                    </form>
                </div>
            </div>
        </section>

      <!-- MAP SECTION -->
        <section class="map-section">
            <div class="container">
                <div class="map-placeholder">
                    <iframe
                        id="google-map-iframe"
                        width="600"
                        height="450"
                        style="border:0"
                        loading="lazy"
                        allowfullscreen
                        referrerpolicy="no-referrer-when-downgrade"
                        src="<?= htmlspecialchars($mapUrl) ?>">
                    </iframe>
                </div>
            </div>
        </section>
    <!-- FIM DO CONTEÚDO DO PERFIL INTEGRADO -->
     <!-- Seção de Pesquisa -->
        <section class="search-section">
            
            <h2 class="search-title">Produtos</h2>
            <div class="search-container">
                <div class="search-input-wrapper">
                    <input type="text" class="search-input" placeholder="Pesquisar...">
                    <button class="search-btn-icon" id="searchIcon">
                        <img src="../templates/assets/img/lupa de pesquisa.png" alt="Pesquisar" class="search-icon-img">
                    </button>
                </div>
            </div>
        </section>
    <div class="informacao-secao">
         <p>Clique no card para saber preço e categoria</p> 
    </div>
      
     <!-- Seção de Produtos em Destaque -->
    <section class="featured-products">
        <div class="container">
          

            <div class="product-cards-container">
                <!-- Card de Produto 1 -->
                <div class="product-card" data-product-id="1" data-product-name="Banana" data-product-category="Fruta" data-product-price="17.50" data-product-image="img/Post instagram dia do feirante moderno verde (21) 1.png">
                    <div class="product-image-placeholder">
                                             <img src="img/Post instagram dia do feirante moderno verde (21) 1.png" alt="">
                    </div>
                    <div class="product-info-overlay">

                        <h3 class="product-name">Maçã</h3>
                     <h3 class="product-description">Fruta</br>17,50 R$</h3>
                        
                    </div>
                    <button class="add-to-cart-btn" data-product-id="1">+</button>
                </div>

                <!-- Card de Produto 2 -->
                <div class="product-card" data-product-id="2" data-product-name="Tomate" data-product-category="Legume" data-product-price="6.00" data-product-image="img/tomate.png">
                    <div class="product-image-placeholder">
                                             <img src="../templates/assets/img/Post instagram dia do feirante moderno verde (23) 1.png" alt="">
                    </div>
                    <div class="product-info-overlay">

                        <h3 class="product-name">Abacaxi</h3>
                     <h3 class="product-description">Fruta</br>R$ 6,00 kg</h3>
                        
                    </div>
                    <button class="add-to-cart-btn" data-product-id="2">+</button>
                </div>

                <!-- Card de Produto 3 -->
                <div class="product-card" data-product-id="3" data-product-name="Alface" data-product-category="Verdura" data-product-price="3.50" data-product-image="img/alface.png">
                    <div class="product-image-placeholder">
                                             <img src="../templates/assets/img/alface.png" alt="">
                    </div>
                    <div class="product-info-overlay">

                        <h3 class="product-name">Alface</h3>
                     <h3 class="product-description">Verdura</br>3,50 R$</h3>
                        
                    </div>
                    <button class="add-to-cart-btn" data-product-id="3">+</button>
                </div>

                <!-- Card de Produto 4 -->
                <div class="product-card" data-product-id="4" data-product-name="Batata" data-product-category="Raiz" data-product-price="4.20" data-product-image="img/batata.png">
                    <div class="product-image-placeholder">
                                             <img src="../templates/assets/img/batata.png" alt="">
                    </div>
                    <div class="product-info-overlay">

                        <h3 class="product-name">Batata</h3>
                     <h3 class="product-description">Raiz</br>4,20 R$</h3>
                        
                    </div>
                    <button class="add-to-cart-btn" data-product-id="4">+</button>
                </div>
                 <!-- Card de Produto 4 -->
                <div class="product-card" data-product-id="4" data-product-name="Batata" data-product-category="Raiz" data-product-price="4.20" data-product-image="img/batata.png">
                    <div class="product-image-placeholder">
                                             <img src="img/batata.png" alt="">
                    </div>
                    <div class="product-info-overlay">

                        <h3 class="product-name">Batata</h3>
                     <h3 class="product-description">Raiz</br>4,20 R$</h3>
                        
                    </div>
                    <button class="add-to-cart-btn" data-product-id="4">+</button>
                </div>

                 <!-- Card de Produto 4 -->
                <div class="product-card" data-product-id="4" data-product-name="Batata" data-product-category="Raiz" data-product-price="4.20" data-product-image="img/batata.png">
                    <div class="product-image-placeholder">
                                             <img src="img/batata.png" alt="">
                    </div>
                    <div class="product-info-overlay">

                        <h3 class="product-name">Batata</h3>
                     <h3 class="product-description">Raiz</br>4,20 R$</h3>
                        
                    </div>
                    <button class="add-to-cart-btn" data-product-id="4">+</button>
                </div>
                 <!-- Card de Produto 4 -->
                <div class="product-card" data-product-id="4" data-product-name="Batata" data-product-category="Raiz" data-product-price="4.20" data-product-image="img/batata.png">
                    <div class="product-image-placeholder">
                                             <img src="img/batata.png" alt="">
                    </div>
                    <div class="product-info-overlay">

                        <h3 class="product-name">Batata</h3>
                     <h3 class="product-description">Raiz</br>4,20 R$</h3>
                        
                    </div>
                    <button class="add-to-cart-btn" data-product-id="4">+</button>
                </div>

                <!-- Card de Produto 5 -->
                <div class="product-card" data-product-id="5" data-product-name="Maçã" data-product-category="Fruta" data-product-price="9.90" data-product-image="img/maca.png">
                    <div class="product-image-placeholder">
                                             <img src="img/maca.png" alt="">
                    </div>
                    <div class="product-info-overlay">

                        <h3 class="product-name">Maçã</h3>
                     <h3 class="product-description">Fruta</br>9,90 R$</h3>
                        
                    </div>
                    <button class="add-to-cart-btn" data-product-id="5">+</button>
                </div>

            </div>
        </div>
    </section>
    

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