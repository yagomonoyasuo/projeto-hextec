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