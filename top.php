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
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
</head>

<body>
   <aside id="left-panel" class="left-panel">
      <nav class="navbar navbar-expand-sm navbar-default">
         <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
               <li class="menu-title">MENU</li>
               <?php if ($_SESSION['ADMIN_ROLE'] != 1) { ?>
                  <li class="menu-item-has-children dropdown">
                     <a href="vendor_management.php"><i class="fa-thin fa-dolly"></i> PRODUTOS </a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="vendor_management.php"><i class="fa-thin fa-bag-shopping"></i> CLIENTES </a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="vendor_management.php"><i class="fal fa-portrait"></i> VENDEDORES </a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="vendor_management.php"><i class="fa-thin fa-dolly"></i> FORNECEDORES </a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="vendor_management.php"><i class="fa-thin fa-dolly"></i> ADMINS </a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="vendor_management.php"> VENDOR MANAGEMENT </a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="categories.php"> CATEGORIES </a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="users.php"> CUSTOMER MANAGEMENT </a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="coupon_master.php"> COUPON </a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="contact_us.php"> CONTACT US</a>
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
                  <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Olá, <?php echo $_SESSION['ADMIN_USERNAME'] ?></a>
                  <div class="user-menu dropdown-menu">
                     <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Sair</a>
                  </div>
               </div>
            </div>
         </div>
      </header>