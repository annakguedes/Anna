<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Formulário</title>
</head>

<body>

<?php
    $id=$_GET ['id'];
    require('conexao.php');
    $deletar="delete from formulario where id=$id";
    mysqli_query($db,$deletar) or die('Não foi possível excluir');
    
    echo"<script>alert('Cadastro excluido com sucesso!');
    window.location.href='consulta.php'</script>";
    ?>

</body>

</html>