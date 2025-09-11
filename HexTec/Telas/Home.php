<?php
include("conexao.php"); // inclui sua conexão com o banco

// Buscar todos os produtos
$result = mysqli_query($conexao, "SELECT * FROM produtos");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/layout.css">
    <title>Hextec - Loja de Periféricos</title>
</head>
<body>

    <!-- Topo da Página -->
    <header class="header">
        <div class="container">
            <a href="index.php" class="logo">Hextec</a>
            
            <nav class="navigation">
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#sobre">Sobre</a></li>
                    <li><a href="#produtos">Produtos</a></li>
                    <li><a href="#contato">Contato</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <!-- Banner principal -->
        <section class="banner" id="home">
            <div class="container">
                <h1>Potencialize sua gameplay</h1>
                <p>Os melhores periféricos gamer com preços imbatíveis</p>
                <a href="#produtos" class="btn-banner">Ver Produtos</a>
            </div>
        </section>

        <!-- Sobre a empresa -->
        <section class="sobre" id="sobre">
            <div class="container">
                <h2>Quem somos</h2>
                <p>A <strong>Hextec</strong> nasceu com o propósito de oferecer qualidade e desempenho para o seu setup gamer. Trabalhamos com as melhores marcas e tecnologia de ponta para entregar o que há de melhor no mercado de periféricos.</p>
            </div>
        </section>

        <!-- Produtos em destaque -->
        <section class="produtos" id="produtos">
            <div class="container">
                <h2>Nossos Produtos</h2>
                <ul class="grid-produtos">
                    <?php while($produto = mysqli_fetch_assoc($result)): ?>
                    <li>
                        <article class="produto">
                            <figure>
                                <img class="produto img" src="<?= htmlspecialchars($produto['imagem']) ?>" alt="<?= htmlspecialchars($produto['nome']) ?>">
                                    <figcaption>
                                        <h3><?= htmlspecialchars($produto['nome']) ?></h3>
                                    </figcaption>
                            </figure>
                            <p>A partir de R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
                            <p><strong>15% de desconto no Pix</strong></p>
                        </article>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </section>

        <!-- Contato -->
        <section class="contato" id="contato">
            <div class="container">
                <h2>Fale Conosco</h2>
                <p>Precisa de ajuda ou quer fazer um orçamento personalizado?</p>
                <address>
                    <ul>
                        <li>Email: <a href="mailto:contato@hextec.com">contato@hextec.com</a></li>
                        <li>WhatsApp: <a href="https://wa.me/5511912345678" target="_blank">(11) 91234-5678</a></li>
                        <li>Instagram: <a href="https://instagram.com/hextecofc" target="_blank">@hextecofc</a></li>
                    </ul>
                </address>
            </div>
        </section>
    </main>

    <!-- Rodapé -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 Hextec - Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="assets/js/script.js"></script>
</body>
</html>

