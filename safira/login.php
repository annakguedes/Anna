<?php

  if (isset($_POST['submit'])) {

    // print_r('email: ' . $_POST['email']);
    // print_r('<br>');
    // print_r('senha: ' . $_POST['senha']);

    include_once('conexao.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $result = mysqli_query($conexao, "INSERT INTO login(email,senha) 
      VALUES ('$email','$senha')");

    header('Location: index.html');
  }

?>
