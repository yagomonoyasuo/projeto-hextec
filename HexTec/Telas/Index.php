<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login conta</title>
    <link rel="stylesheet" href="../Styles/Style_CriarConta.css">
    <link rel="shortcut icon" type="image/x-icon" href="../Imagens/Logos/Logo-CafeDev.ico">
      <script src="../Scripts/Script_CriarConta.js"></script>
  </head>

  <body>

    <section class="splash">
    <img src="../Imagens/Logos/Logo-CafeDev.png" alt="Cafe Dev Logo">
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
            Login: <a href="index.php">AQUI</a>
          </p>
        </footer>
        </section>
      </section>

      <section id="rightCadastro">
        <img src="imagens/Logo-CafeDev.png" alt="Cafe Dev Logo" class="logo" />

      </section>
      </section>
    </section>
  </body>

</html>
<?php

session_start();
    if(isset($_POST['login'])){
        $user = $_POST['user'];
        $senha = $_POST['senha'];
        $email = $_POST['email'];
//faz o banco vagabundo//
        $sql = 'select *from usuario ="'.$user.'" and senha ="'.$senha.'" and email ="'.$email.'";';

        if ($user=="admin" && $senha=="12345678etec"){
           $_SESSION['user'] = $user;
            header('location:alterar.php');

        } else {
            echo '<script>window.alert("usuário e/ou senha incorretos!");window.location="index.php";</script>';
        }


    } else {
        echo 'faça o login primeiro: <a href="login.html">aqui!</a>';
    }

?>

