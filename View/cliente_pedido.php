<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrybem - Meus Pedidos (Cliente)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Referência ao novo CSS com os estilos unificados -->
    <link rel="stylesheet" href="../templates/assets/css/cliente_pedido.css"> 
</head>
<body>
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

    <main class="orders-page-content">
        <div class="container">
            <h1 class="orders-title">Meus Pedidos</h1>
            
            <!-- Seção de Filtros -->
            <div class="orders-filters">
                <div class="filter-item">
                    <label for="filter-date">Selecionar Data:</label>
                    <input type="date" id="filter-date" value="2025-11-05">
                </div>
                <div class="filter-item">
                    <label for="filter-status">Status:</label>
                    <select id="filter-status">
                        <option value="all">Todos</option>
                        <option value="retirada" selected>Retirado</option>
                        <option value="enviado">Enviado</option>
                    </select>
                </div>
            </div>

            <div class="orders-list">
                
                <!-- Grupo de Pedidos por Data: 05/11/2025 -->
                <div class="order-group">
                    <h2 class="group-title">📅 Pedidos para 05/11/2025</h2>

                    <!-- Card de Pedido 1 (Status: Enviado - Verde) -->
                    <div class="order-card">
                        <div class="card-header">
                            <h2 class="card-title">Pedido #2025001</h2>
                            <!-- Status Fixo: Enviado (Verde) -->
                            <span class="card-status status-enviado">🟢 Enviado</span>
                        </div>
                        <div class="card-meta">
                            <span class="meta-item"><span class="meta-label">Loja:</span> Fazenda Orgânica do Seu João</span>
                            <span class="meta-item"><span class="meta-label">Data Agendada:</span> 05/11/2025</span>
                            <span class="meta-item"><span class="meta-label">Horário:</span> 11:00</span>
                        </div>
                        <ul class="card-items-list">
                            <li class="item-list-title">Itens Solicitados:</li>
                            <li class="card-item">
                                <span class="item-name">Tomate Cereja Orgânico</span>
                                <span class="item-quantity">2kg</span>
                            </li>
                            <li class="card-item">
                                <span class="item-name">Alface Crespa Hidropônica</span>
                                <span class="item-quantity">3 unidades</span>
                            </li>
                            <li class="card-item">
                                <span class="item-name">Ovos Caipiras Grandes</span>
                                <span class="item-quantity">1 dúzia</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Grupo de Pedidos por Data: 06/11/2025 -->
                <div class="order-group">
                    <h2 class="group-title">📅 Pedidos para 06/11/2025</h2>

                    <!-- Card de Pedido 2 (Status: Retirada - Amarelo) -->
                    <div class="order-card">
                        <div class="card-header">
                            <h2 class="card-title">Pedido #2025002</h2>
                            <!-- Status Fixo: Retirada (Amarelo) -->
                            <span class="card-status status-retirada">🟡 Retirado</span>
                        </div>
                        <div class="card-meta">
                            <span class="meta-item"><span class="meta-label">Loja:</span> Quitanda da Dona Maria</span>
                            <span class="meta-item"><span class="meta-label">Data Solicitada:</span> 06/11/2025</span>
                            <span class="meta-item"><span class="meta-label">Horário:</span> 15:00</span>
                        </div>
                        <ul class="card-items-list">
                            <li class="item-list-title">Itens Solicitados:</li>
                            <li class="card-item">
                                <span class="item-name">Manga Palmer</span>
                                <span class="item-quantity">4 unidades</span>
                            </li>
                            <li class="card-item">
                                <span class="item-name">Laranja Pêra</span>
                                <span class="item-quantity">5kg</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- Grupo de Pedidos por Data: 02/11/2025 -->
                <div class="order-group">
                    <h2 class="group-title">📅 Pedidos para 02/11/2025</h2>

                    <!-- Card de Pedido 3 (Status: Enviado - Verde) -->
                    <div class="order-card">
                        <div class="card-header">
                            <h2 class="card-title">Pedido #2025003</h2>
                            <!-- Status Fixo: Enviado (Verde) -->
                            <span class="card-status status-enviado">🟢 Enviado</span>
                        </div>
                        <div class="card-meta">
                            <span class="meta-item"><span class="meta-label">Loja:</span> Pães Artesanais do Bairro</span>
                            <span class="meta-item"><span class="meta-label">Data Agendada:</span> 02/11/2025</span>
                            <span class="meta-item"><span class="meta-label">Horário:</span> 08:00</span>
                        </div>
                        <ul class="card-items-list">
                            <li class="item-list-title">Itens Solicitados:</li>
                            <li class="card-item">
                                <span class="item-name">Pão Integral de Fermentação Natural</span>
                                <span class="item-quantity">1 unidade</span>
                            </li>
                            <li class="card-item">
                                <span class="item-name">Baguete Tradicional</span>
                                <span class="item-quantity">2 unidades</span>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </main>

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