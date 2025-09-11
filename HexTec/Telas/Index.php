<?php
<<<<<<< HEAD
include("conexao.php");

$result = mysqli_query($conexao, "SELECT * FROM produtos");
=======
session_start();
include 'Conexao.php'; // inclui a conexão com o banco

if(isset($_POST['enviar'])){
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    // Prepared statement para evitar SQL Injection
    $stmt = $conn->prepare("SELECT * FROM usuario WHERE nome = ? AND senha = ?");
    $stmt->bind_param("ss", $nome, $senha);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if($resultado->num_rows > 0){
        // Usuário encontrado
        $_SESSION['nome'] = $nome;
        header("Location: alterar.php"); // redireciona para a página protegida
        exit;
    } else {
        // Usuário ou senha incorretos
        echo '<script>alert("Usuário e/ou senha incorretos!"); window.location="index.php";</script>';
    }

    $stmt->close();
    $conn->close();
} else {
    echo 'Faça o login primeiro: <a href="index.php">aqui!</a>';
}
>>>>>>> 29e5b283af69b99e65a8e43dffe671dd33341100
?>

<!DOCTYPE html>
<html lang="pt-br">
<<<<<<< HEAD
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hextec - Loja de Periféricos</title>
<link rel="stylesheet" href="../Style/layout.css">
<style>
.grid-produtos {
    display:flex;
    flex-wrap:wrap;
    list-style:none;
    padding:0;
    margin:0 -10px;
}

.grid-produtos li {
    flex:1 1 calc(25% - 20px);
    margin:10px;
}

.produto {
    cursor:pointer;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    background-color:#1f1f1f; 
    border-radius:8px;
    overflow:hidden;
    padding:10px;
    text-align:center;
    color:#fff;
    display:flex;
    flex-direction:column;
    align-items:center;
}

.produto:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 15px rgba(0,0,0,0.3);
}

.produto img {
    width:100%;
    height:250px;
    object-fit:cover;
    border-radius:6px;
    margin-bottom:10px;
}

.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.85);
    justify-content: center;
    align-items: center;
    z-index: 1000;
    overflow: auto;
}

.modal-content {
    display: flex;
    background-color: #1f1f1f;
    border-radius: 15px;
    max-width: 900px;
    width: 90%;
    max-height: 80%;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.6);
    position: relative;
    font-family: 'Roboto', sans-serif;
}

.modal-left {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 30px;
}

.modal-left .img-box-background {
    position: absolute;
    top: 10px;
    left: 10px;
    right: 10px;
    bottom: 10px;
    background-color: #121212;
    border-radius: 25px;
    z-index: 0;
}

.modal-left img {
    width: 100%;
    max-width: 380px;
    height: 380px;
    object-fit: cover;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.4);
    border: 4px solid #000;
    z-index: 1;
    position: relative;
}

.modal-right {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    padding: 20px;
    gap: 20px;
    align-items: stretch;
}

.modal-right .box {
    background-color: #272727;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.3);
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.modal-right .box h2 {
    margin: 0;
    font-size: 22px;
    color: #00ffcc;
}

.modal-right .box p {
    margin: 0;
    font-size: 16px;
    line-height: 1.5;
    color: #ddd;
}

.modal-right .box .preco {
    color: #00ff00;
    font-weight: bold;
    font-size: 18px;
}

#addCarrinho {
    margin-top: 15px;
    padding: 14px 30px;
    background: linear-gradient(90deg, #00ffcc, #0099ff);
    color: #1f1f1f;
    font-weight: bold;
    font-size: 16px;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
    align-self: center;
}

#addCarrinho:hover {
    background: linear-gradient(90deg, #0099ff, #00ffcc);
}

.close-btn {
    position: absolute;
    top: 15px;
    right: 15px;
    background: #ff4d4d;
    color: #fff;
    border: none;
    padding: 6px 12px;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
}

.close-btn:hover {
    background: #ff1a1a;
}

@media (max-width: 700px) {
    .modal-content {
        flex-direction: column;
        max-height: 90%;
    }

    .modal-left img {
        max-width: 100%;
        height: auto;
    }

    .modal-right {
        padding: 15px;
        gap: 12px;
    }

    #addCarrinho {
        align-self: center;
    }
}

@media (max-width:500px){
    .grid-produtos li {
        flex:1 1 100%;
    }
}
</style>
<script>
document.addEventListener("DOMContentLoaded", () => {
    const openMenuBtn = document.getElementById("openMenu");
    const closeMenuBtn = document.getElementById("closeMenu");
    const navMenu = document.getElementById("navMenu");

    openMenuBtn.addEventListener("click", () => {
        navMenu.style.display = "flex";
        openMenuBtn.style.display = "none";
        closeMenuBtn.style.display = "block";
    });

    closeMenuBtn.addEventListener("click", () => {
        navMenu.style.display = "none";
        openMenuBtn.style.display = "block";
        closeMenuBtn.style.display = "none";
    });
});
</script>
</head>
<body>

<header class="header">
    <div class="container">
        <a href="index.php" class="logo">Hextec</a>
        <button id="openMenu" class="menu-mobile">&#9776;</button>
        <nav class="navigation" id="navMenu">
            <button id="closeMenu" class="menu-mobile" style="display: none;">&times;</button>
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
    <section class="banner" id="home">
        <div class="container">
            <h1>Potencialize sua gameplay</h1>
            <p>Os melhores periféricos gamer com preços imbatíveis</p>
            <a href="#produtos" class="btn-banner">Ver Produtos</a>
        </div>
    </section>

    <section class="sobre" id="sobre">
        <div class="container">
            <h2>Quem somos</h2>
            <p>A <strong>Hextec</strong> nasceu com o propósito de oferecer qualidade e desempenho para o seu setup gamer. Trabalhamos com as melhores marcas e tecnologia de ponta para entregar o que há de melhor no mercado de periféricos.</p>
        </div>
    </section>

    <section class="produtos" id="produtos">
        <div class="container">
            <h2>Nossos Produtos</h2>
            <ul class="grid-produtos">
                <?php while($produto = mysqli_fetch_assoc($result)): ?>
                <li>
                    <article class="produto" 
                             data-nome="<?= htmlspecialchars($produto['nome']) ?>"
                             data-preco="<?= number_format($produto['preco'], 2, ',', '.') ?>"
                             data-descricao="<?= htmlspecialchars($produto['descricao']) ?>"
                             data-imagem="<?= htmlspecialchars($produto['imagem']) ?>">
                        <figure>
                            <img src="<?= htmlspecialchars($produto['imagem']) ?>" alt="<?= htmlspecialchars($produto['nome']) ?>">
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

<div id="modal" class="modal">
    <section class="modal-content" aria-modal="true">
        <button id="closeModal" class="close-btn" aria-label="Fechar">X</button>
        <div class="modal-left">
            <div class="img-box-background"></div>
            <img id="modalImagem" src="" alt="Imagem do produto">
        </div>
        <div class="modal-right">
            <div class="box">
                <h2 id="modalNome"></h2>
            </div>
            <div class="box">
                <p id="modalPreco"></p>
            </div>
            <div class="box">
                <p id="modalDescricao"></p>
            </div>
            <button id="addCarrinho">Adicionar no Carrinho</button>
        </div>
    </section>
</div>

<footer class="footer">
    <div class="container">
        <p>&copy; 2025 Hextec - Todos os direitos reservados.</p>
    </div>
</footer>

<script>
const modal = document.getElementById("modal");
const modalNome = document.getElementById("modalNome");
const modalPreco = document.getElementById("modalPreco");
const modalDescricao = document.getElementById("modalDescricao");
const modalImagem = document.getElementById("modalImagem");
const closeModal = document.getElementById("closeModal");
const btnCarrinho = document.getElementById("addCarrinho");

document.querySelectorAll(".produto").forEach(prod => {
    prod.addEventListener("click", () => {
        modalNome.textContent = prod.dataset.nome;
        modalPreco.innerHTML = `<span class="preco">R$ ${prod.dataset.preco}</span>`;
        modalDescricao.textContent = prod.dataset.descricao;
        modalImagem.src = prod.dataset.imagem;
        modal.style.display = "flex";
    });
});

closeModal.addEventListener("click", () => {
    modal.style.display = "none";
});

window.addEventListener("click", (e) => {
    if(e.target === modal){
        modal.style.display = "none";
    }
});

btnCarrinho.addEventListener("click", () => {
    alert(`Produto "${modalNome.textContent}" adicionado ao carrinho!`);
});
</script>

</body>
=======
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login conta</title>
    <link rel="stylesheet" href="../Styles/Style_CriarConta.css">
    <link rel="shortcut icon" type="image/x-icon" href="../Imagens/Logos/Logo-CafeDev.ico">
      <script src="../Scripts/script_login.js"></script>
      <link rel="stylesheet" href="../Style/style_login.css">
  </head>

  <body style="display: flex; justify-content: center; align-items: center; min-height: 100vh;">

    <section class="splash">
    <img src="../Imagens/hextec placeholder.png" alt="HexTec">
  </section>

    <main class="container">
    <section >
      <section id="leftCadastro">
        <h1 class="welcome">CRIE SUA CONTA!</h1>

        <section id="formulario">
          <form name="cad" action="" method="POST">

            <label for="nome" class="label">Nome</label>
            <input type="text" placeholder="Digite seu nome de usuário" name="nome" id="nome" class="input">

            <label for="senha" class="label">Senha</label>
            <input type="password" placeholder="Digite sua senha" name="senha" id="senha" class="input">  

            <hr color="#007acc" class="divider"></hr>
    
            <input type="submit" name="enviar" value="enviar" class="input create" style="display: flex; align-items: center; justify-content: center; text-align: center;">
            <!--Quando for fazer o back-end, remover o "formaction"-->
          </form>
        </main>
        <footer>
          <p class="terms">
            Ao se inscrever, você concorda com os <a href="termos.php">Termos de Serviço</a> e a <a href="termos.php">Política de
            Privacidade</a>, incluindo o <a href="termos.php">Uso de Cookies</a>.
          </p>

          <p class="login">
            Criar conta: <a href="criar conta.php">AQUI</a>
          </p>
        </footer>
        </section>
      </section>
  </body>

>>>>>>> 29e5b283af69b99e65a8e43dffe671dd33341100
</html>
