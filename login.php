<?php
require('connection.php');
require('functions.php');
$msg = '';
if (isset($_POST['submit'])) {
   $email = get_safe_value($con, $_POST['email']);
   $senha = get_safe_value($con, $_POST['senha']);
   $sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
   $res = mysqli_query($con, $sql);
   $count = mysqli_num_rows($res);
   if ($count > 0) {
      $row = mysqli_fetch_assoc($res);
      $_SESSION['ADMIN_LOGIN'] = 'logado';
      $_SESSION['ADMIN_EMAIL'] = $email;
      $_SESSION['ADMIN_NOME'] = $row['nome'];
      $_SESSION['ADMIN_NIVEL'] = $row['nivel'];
      header('location: index.php');
      die();
   } else {
      $msg = "Credenciais de login inválidas!";
   }
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

<body class="bg-light">
   <div class="d-flex align-content-center flex-wrap">
      <div class="container">
         <div class="login-form">
            <form method="post">
               <h1 class="text-center">SRJ CONSTRUCT</h1>
               <h2 class="text-center">Entrar</h2>
               <?php if ($msg != '') { ?>
                  <div class="alert alert-danger" role="alert">
                     <div class="field_error"><?php echo $msg ?></div>
                  </div>
               <?php } ?>
               <div class="form-group">
                  <input type="text" name="email" class="form-control" placeholder="E-mail" required>
               </div>
               <div class="form-group">
                  <input type="password" name="senha" class="form-control" placeholder="Senha" required>
               </div>
               <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-primary btn-block">Entrar</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</body>

</html>