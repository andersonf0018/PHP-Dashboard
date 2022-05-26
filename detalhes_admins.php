<?php
require('top.php');
isAdmin();

$nome = '';
$email = '';
$senha = '';
$telefone = '';

$msg = '';

if (isset($_GET['email']) && $_GET['email'] != '') {
    $id = get_safe_value($con, $_GET['email']);
    $res = mysqli_query($con, "SELECT * FROM usuarios WHERE email='$id'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $nome = $row['nome'];
        $email = $row['email'];
        $senha = $row['senha'];
        $telefone = $row['telefone'];
    } else {
        header('location: pagina_admins.php');
        die();
    }
}

$msg = '';
?>
<div class="content pb-0">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><strong>DETALHES ADMINS</strong></div>
                <form method="post">
                    <div class="card-body card-block">
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>Nome</h4>
                            <p><?php echo $nome ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>E-mail</h4>
                            <p><?php echo $email ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>Senha</h4>
                            <p><?php echo $senha ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>Telefone</h4>
                            <p><?php echo $telefone ?></p>
                        </div>
                        <div class="box-detalhes col-12">
                            <a class="btn-voltar" href="pagina_admins.php">
                                <span><i class="fa-solid fa-arrow-left"></i> VOLTAR</span>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>