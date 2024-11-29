<header class="header">
   <div class="flex">
   <a href="index.html" class="logo">
      <img src="logotipo_tcc/logo-1.png" alt=""/>
    </a>
      <nav class="navbar">
      <a href="index.html">Voltar</a>
      </nav>

      <?php
         if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
            $row_count = '0';
         }else{
            $email = $_SESSION['email'];
            

            $select_rows = mysqli_query($conn, "SELECT * FROM `cart` WHERE email = '$email'") or die('query failed');
            $row_count = mysqli_num_rows($select_rows);
         }
      ?>

<style>
   .logo img{
  height: 10rem;
}

</style>

      <a href="cart.php" class="cart">carrinho <span><?php echo $row_count; ?></span> </a>
      <div id="menu-btn" class="fas fa-bars"></div>
   </div>
</header>