<?php
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
?>

<!DOCTYPE html>
<html lang="pt-br">
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

</html>

