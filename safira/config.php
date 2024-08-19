<?php
// isset -> serve para saber se uma variável está definida
include_once('conexao.php');
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sqlInsert = "UPDATE login 
        SET senha='$senha',email='$email'
        WHERE id=$id";
    $result = $conexao->query($sqlInsert);
    print_r($result);
}
header('Location: sistema.html');

?>