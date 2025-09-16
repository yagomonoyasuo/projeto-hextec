<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login conta</title>
      <script src="../Scripts/script_login.js"></script>
      <link rel="stylesheet" href="../Style/style_login.css">
  </head>
  <style>

        /* Reset básico */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Segoe UI', sans-serif;
}

body, html {
  height: 100%;
  background-color: #121212;
  color: #f1f1f1;
  line-height: 1.6;
}

a {
  text-decoration: none;
  color: inherit;
}

/* Splash screen */
.splash {
  position: fixed;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: #121212;
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999;
  transition: opacity 2.5s ease, visibility 1.5s ease;
}

.splash img {
  width: 200px;
  animation: pulse 3.5s infinite;
}

.splash.hidden {
  opacity: 0;
  visibility: hidden;
}

@keyframes pulse {
  0% { transform: scale(1); opacity: 1; }
  50% { transform: scale(1.05); opacity: 0.8; }
  100% { transform: scale(1); opacity: 1; }
}

/* Container principal */
.container {
  display: flex;
  width: 100vw;
  height: 50vh;
  justify-content: center;
  background-color:#121212;
}

.left .logo {
  width: 400px;
  height: 400px;
  transition: transform 0.3s ease;
}

.left h1 {
  font-size: 3rem;
  text-align: center;
  font-weight: 700;
}

/* Right */
.right {
  background: #1f1f1f;
  color: #f1f1f1;
  width: 60%;
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 40px;
}

.welcome {
  font-size: 50px;
  font-weight: 900;
  margin-bottom: 30px;
  color: #00ffcc;
}

/* Labels e Inputs */
label, input {
  margin: 0 auto;
  text-align: left;
  width: 300px;
}

.label {
  display: flex;
  justify-content: left;
  text-align: left;
  margin: 3% 0;
  font-size: 22px;
  font-weight: 900;
  color: #f1f1f1;
}

.label-text {
  font-size: 14px;
  font-weight: 600;
  color: #ccc;
  cursor: pointer;
  transition: color 0.5s ease;
}

.input {
  width: min(400px, 90%);
  padding: 15px;
  border: 1px solid #333;
  border-radius: 8px;
  font-size: 18px;
  font-weight: 600;
  background: #121212;
  color: #f1f1f1;
  margin-bottom: 15px;
}

.input:focus {
  outline: 2px solid #00ffcc;
}

/* Divider */
.divider {
  border: none;
  border-top: 2px solid #00ffcc;
  width: min(400px, 90%);
  margin-right: 100%;
}

/* Botões */
.google, .twitter, .create {
  width: min(400px, 90%);
  padding: 12px;
  border: none;
  border-radius: 8px;
  font-size: 16px;
  font-weight: bold;
  margin-top: 10px;
  cursor: pointer;
  transition: transform 0.2s, background 0.3s;
}

.google, .twitter {
  background: white;
  color: black;
}

.google img, .twitter img {
  width: 20px;
}

.create {
  background: linear-gradient(to right, #00ffcc, #007acc);
  align-items: right;
  margin-right: 100%;
  color: #121212;
}

.create:hover {
  background: #00ccb3;
  transform: translateY(-2px);
}

/* Termos e login */
.terms {
  font-size: 0.75rem;
  color: #ccc;
  text-align: center;
  margin-top: 10px;
  width: 80%;
}

.terms a {
  color: #00ffcc;
  text-decoration: none;
}

.login {
  margin-top: 20px;
  font-size: 0.9rem;
  text-align: center;
  margin-right: 25%;
}

.login a {
  color: #00ffcc;
  text-decoration: none;
  font-weight: bold;
}

/* Mostrar senha */
.show-password {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  gap: 6px;
  margin-top: 5px;
  margin-bottom: 10px;
  font-size: 14px;
  color: #ccc;
  width: 100%;
  max-width: 300px;
}

.show-password input[type="checkbox"] {
  display: none;
}

.switch {
  position: relative;
  width: 40px;
  height: 20px;
  background: #555;
  border-radius: 20px;
  cursor: pointer;
  transition: background 0.3s ease;
}

.switch::after {
  content: "";
  position: absolute;
  top: 2px;
  left: 2px;
  width: 16px;
  height: 16px;
  background: white;
  border-radius: 50%;
  transition: transform 0.3s ease;
}

.show-password input[type="checkbox"]:checked + .switch {
  background: #00ffcc;
}

.show-password input[type="checkbox"]:checked + .switch::after {
  transform: translateX(14px);
}

/* Responsividade */
@media (max-width: 768px) {
  .container {
    flex-direction: column;
  }

  .left, .right {
    width: 100%;
    height: auto;
    padding: 20px;
  }

  .left .logo {
    width: 250px;
    height: 250px;
  }

  .left h1 {
    font-size: 2.5rem;
  }

  .right {
    padding: 30px 20px;
  }

  .welcome {
    font-size: 2rem;
  }

  .input {
    font-size: 18px;
  }

  .terms, .login {
    font-size: 0.8rem;
    width: 100%;
  }
}

@media (max-width: 480px) {
  .welcome {
    font-size: 1.8rem;
  }

  .left h1 {
    font-size: 2rem;
  }

  .input {
    font-size: 16px;
    padding: 12px;
  }

  .label {
    font-size: 18px;
  }
}
  </style>
  <body>
    <section class="splash">
    <img src="../Imagens/hextec placeholder.png" alt="HexTec">
  </section>

    <main class="container">
    <section>
        <h1 class="welcome">CRIE SUA CONTA!</h1>

        <section id="formulario">
          <form name="cad" action="" method="POST">

            <label for="nome" class="label">Nome</label>
            <input type="text" placeholder="Digite seu nome de usuário" name="nome" id="nome" class="input">

            <label for="senha" class="label">Senha</label>
            <input type="password" placeholder="Digite sua senha" name="senha" id="senha" class="input">  

            <hr color="#007acc" class="divider"></hr>
    
            <input type="submit" name="enviar"  value="enviar" class="input create" style="display: flex; align-items: center; justify-content: center; text-align: center;">
            <!-- Quando for fazer o back-end, remover o "formaction" -->
          </form>
           <p class="terms">
            Ao se inscrever, você concorda com os <a href="termos.php">Termos de Serviço</a> e a <a href="termos.php">Política de
            Privacidade</a>, incluindo o <a href="termos.php">Uso de Cookies</a>.
          </p>

          <p class="login">
            Criar conta: <a href="criar conta.php">AQUI</a>
          </p>
        </main>
        </section>
      </section>
  </body>
</html>
<?php

include("Conexao.php");

$result = mysqli_query($conexao, "SELECT * FROM produtos");

if(isset($_POST['enviar'])){
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    // Prepared statement para evitar SQL Injection
    $stmt = $conexao->prepare("SELECT * FROM usuario WHERE nome = ? AND senha = ?");
    $stmt->bind_param("ss", $nome, $senha);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if($resultado->num_rows > 0){
        // Usuário encontrado
        $_SESSION['nome'] = $nome;
        header("Location: Alterar.php"); // redireciona para a página protegida
        exit;
    } else {
        // Usuário ou senha incorretos
        echo '<script>alert("Usuário e/ou senha incorretos!"); window.location="index.php";</script>';
    }

    $stmt->close();
    $conn->close();
} else {
    echo 'Faça o login primeiro: <a href="index.php">aqui!!</a>';
}

?>