<?php
require('connection.php');
require('functions.php');
if (isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN'] != '') {
} else {
   header('location:login.php');
   die();
}
?>
<!doctype html>
<html lang="pt-br">

<head>
   <meta charset="utf-8">
   <title>Painel Administrativo</title>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="assets/style.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
   <aside id="left-panel" class="left-panel">
      <nav class="navbar navbar-expand-sm navbar-default">
         <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
               <li class="menu-title">MENU</li>
               <?php if ($_SESSION['ADMIN_NIVEL'] == 0) { ?>
                  <li class="menu-item-has-children dropdown">
                     <a href="pagina_vendas.php"><i class="fa-solid fa-dollar-sign"></i> VENDAS </a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="pagina_produtos.php"><i class="fa-solid fa-box"></i> PRODUTOS </a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="pagina_clientes.php"><i class="fa fa-bag-shopping"></i> CLIENTES </a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="pagina_vendedores.php"><i class="fa fa-portrait"></i> VENDEDORES </a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="pagina_fornecedores.php"><i class="fa fa-dolly"></i> FORNECEDORES </a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="pagina_admins.php"><i class="fa-solid fa-key"></i> ADMINS </a>
                  </li>
               <?php } ?>
               <?php if ($_SESSION['ADMIN_NIVEL'] == 1) { ?>
                  <li class="menu-item-has-children dropdown">
                     <a href="pagina_vendas.php"><i class="fa-solid fa-dollar-sign"></i> VENDAS </a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="pagina_produtos.php"><i class="fa-solid fa-box"></i> PRODUTOS </a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="pagina_clientes.php"><i class="fa fa-bag-shopping"></i> CLIENTES </a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="pagina_fornecedores.php"><i class="fa fa-dolly"></i> FORNECEDORES </a>
                  </li>
               <?php } ?>
            </ul>
         </div>
      </nav>
   </aside>
   <div id="right-panel" class="right-panel">
      <header id="header" class="header">
         <div class="top-right">
            <div class="header-menu">
               <div class="user-area dropdown float-right">
                  <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Olá, <?php echo $_SESSION['ADMIN_NOME'] ?></a>
                  <div class="user-menu dropdown-menu">
                     <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Sair</a>
                  </div>
               </div>
            </div>
         </div>
      </header>