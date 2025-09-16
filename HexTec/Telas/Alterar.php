<?php
include("conexao.php");

// Se o formulário for enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $preco = floatval($_POST['preco']);
    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);

    // Upload da imagem
    if (!empty($_FILES['imagem']['name'])) {
        $nomeArquivo = basename($_FILES['imagem']['name']);
        $caminho = "../Imagens/" . $nomeArquivo;
        move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho);

        $sql = "UPDATE produtos SET nome='$nome', preco='$preco', descricao='$descricao', imagem='$caminho' WHERE id=$id";
    } else {
        $sql = "UPDATE produtos SET nome='$nome', preco='$preco', descricao='$descricao' WHERE id=$id";
    }

    mysqli_query($conexao, $sql) or die("Erro ao atualizar: " . mysqli_error($conexao));
    header("Location: alterar.php"); // recarrega a página
    exit;
}

// Buscar produtos
$result = mysqli_query($conexao, "SELECT * FROM produtos");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Produtos - Hextec</title>
    <link rel="stylesheet" href="assets/css/layout.css">
    <style>
        body{
            background-color: #050505ff;
            color: #00ffcc;
        }
        .form-produto {
            background: #1f1f1f;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
        }
        .form-produto img {
            max-width: 150px;
            display: block;
            margin-bottom: 10px;
        }
        .form-produto label {
            display: block;
            margin-top: 10px;
            color: #00ffcc;
        }
        .form-produto input, .form-produto textarea {
            width: 100%;
            margin-top: 5px;
            padding: 8px;
            background-color: #000;
            color: #00ffcc;
            
        }
        .form-produto input:hover {
            border-color: #01e2c8ff;
        }
        .form-produto button {
            margin-top: 10px;
            padding: 10px 15px;
            background: #00ffcc;
            color: #121212;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-produto button:hover {
            background: #01e2c8ff;
            border-color: #01e2c8ff;

        }
        .hextec {
            font-size: 50px;
            text-align: center;
        }
    </style>
</head>
<body>

<header class="header">
</header>

<section class="produtos" id="produtos">
    <div class="container">
        <h2 class="hextec">Alterar Produtos</h2>

        <?php while ($produto = mysqli_fetch_assoc($result)): ?>
        <form class="form-produto" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $produto['id'] ?>">

            <label>Imagem atual:</label>
            <img src="<?= $produto['imagem'] ?>" alt="<?= $produto['nome'] ?>">

            <label>Alterar imagem:</label>
            <input type="file" name="imagem">

            <label>Nome:</label>
            <input type="text" name="nome" value="<?= htmlspecialchars($produto['nome']) ?>">

            <label>Preço:</label>
            <input type="text" name="preco" value="<?= number_format($produto['preco'], 2, ',', '.') ?>">

            <label>Descrição:</label>
            <textarea name="descricao"><?= htmlspecialchars($produto['descricao']) ?></textarea>

            <button type="submit">Salvar</button>
        </form>
        <?php endwhile; ?>
    </div>
</section>

<footer class="footer">
    <div class="container">
        <p>&copy; 2025 Hextec - Todos os direitos reservados.</p>
    </div>
    <div >
        <a href="home.php" ><p> Voltar ao Hextec </p></a>
    </div>
</footer>

</body>
</html>

