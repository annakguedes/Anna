<?php

@include 'conexao.php';

if(isset($_POST['add_product'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'logotipo_tcc/'.$product_image;

   if(empty($product_name) || empty($product_price) || empty($product_image)){
      $message[] = 'Por favor preencha tudo';
   }else{
      $insert = "INSERT INTO products(name, price, image) VALUES('$product_name', '$product_price', '$product_image')";
      $upload = mysqli_query($conn, $insert);
      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         $message[] = 'Novo produto adicionado com sucesso!';
      }else{
         $message[] = 'Não foi possível adicionar o produto!';
      }
   }

};


if (isset($_GET['delete'])) {
   // Sanitiza e converte para um número inteiro
   $id = intval($_GET['delete']); 

   // Prepara e executa a query
   $query = "DELETE FROM products WHERE id = $id";
   if (mysqli_query($conn, $query)) {
       // Executa o redirecionamento e para o script
       header('Location: admin_page.php');
       exit(); 
   } else {
       // Exibe o erro caso a query falhe
       echo "Erro ao excluir o produto: " . mysqli_error($conn);
   }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Página administrador</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href='css/page_update.css'>

</head>
<body>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}

?>
   
<div class="container">

   <div class="admin-product-form-container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>Cadastrar novo produto</h3>
         <input type="text" placeholder="digite o nome do produto" name="product_name" class="box">
         <input type="number" placeholder="digite o preço do produto" name="product_price" class="box">
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
         <input type="submit" class="btn" name="add_product" value="adicionar produto">
      </form>

   </div>

   <?php

   $select = mysqli_query($conn, "SELECT * FROM products");
   
   ?>

<div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>Imagem do produto</th>
            <th>Nome do produto</th>
            <th>Preço do produto</th>
            <th>Ação</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><img src="logotipo_tcc/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['name']; ?></td>
            <td>$<?php echo $row['price']; ?>/-</td>
            <td>
               <a href="admin_update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> editar </a>
               <a href="admin_page.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> deletar </a>
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>

</div>


</body>
</html>