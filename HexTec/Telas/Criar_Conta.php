<?php
session_start();
include("Conexao.php");

if (isset($_POST['cadastrar'])) {
    $nome = trim($_POST['nome']);
    $senha = trim($_POST['senha']);
    $email = trim($_POST['email']);

    if (!empty($nome) && !empty($senha) && !empty($email)) {
        // Usar prepared statement para segurança
        $stmt = $conexao->prepare("INSERT INTO usuario (nome, senha, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nome, $senha, $email);

        if ($stmt->execute()) {
            echo "<script>alert('Conta criada com sucesso!'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Erro ao criar conta!');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Preencha todos os campos!');</script>";
    }
    $conexao->close();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta</title>
    <link rel="stylesheet" href="../Style/style_login.css">
</head>
<body>
    <main class="container">
        <section>
            <h1 class="welcome">CRIAR CONTA</h1>

            <form method="POST" action="">
                <label for="nome" class="label">Nome</label>
                <input type="text" name="nome" id="nome" class="input" placeholder="Digite seu nome de usuário" required>

                <label for="senha" class="label">Senha</label>
                <input type="password" name="senha" id="senha" class="input" placeholder="Digite sua senha" required>

                <label for="email" class="label">Email</label>
                <input type="email" name="email" id="email" class="input" placeholder="Digite seu email" required>

                <input type="submit" name="cadastrar" value="Cadastrar" 
                       class="input create" style="display:flex; align-items:center; justify-content:center; text-align:center;">
            </form>

            <p class="login">
                Já tem conta? <a href="index.php">Entrar aqui</a>
            </p>
        </section>
    </main>
</body>
</html>
