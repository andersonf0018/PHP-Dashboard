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
        header('location: pagina_vendedores.php');
        die();
    }
}

if (isset($_POST['submit'])) {
    $nome = get_safe_value($con, $_POST['nome']);
    $email = get_safe_value($con, $_POST['email']);
    $senha = get_safe_value($con, $_POST['senha']);
    $telefone = get_safe_value($con, $_POST['telefone']);

    $res_email = mysqli_query($con, "SELECT * FROM usuarios WHERE email='$email'");
    $check_email = mysqli_num_rows($res_email);
    if ($check_email > 0) {
        if (isset($_GET['email']) && $_GET['email'] != '') {
            $getData = mysqli_fetch_assoc($res_email);
            if ($id == $getData['email']) {
            } else {
                $msg = "Esse E-mail já está cadastrado!";
            }
        } else {
            $msg = "Esse E-mail já está cadastrado!";
        }
    }

    if ($msg == '') {
        if (isset($_GET['email']) && $_GET['email'] != '') {
            mysqli_query($con, "UPDATE usuarios SET nome='$nome',email='$email',senha='$senha',telefone='$telefone',nivel='1' WHERE email='$id'");
        } else {
            mysqli_query($con, "INSERT INTO usuarios(nome,email,senha,telefone,nivel) VALUES('$nome','$email','$senha','$telefone','1')");
        }
        header('location: pagina_vendedores.php');
        die();
    }
}
?>
<div class="content pb-0">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><strong>FORMULÁRIO VENDEDOR</strong></div>
                <form method="post">
                    <div class="card-body card-block">
                        <?php if ($msg != '') { ?>
                            <div class="alert alert-danger" role="alert">
                                <div class="field_error"><?php echo $msg ?></div>
                            </div>
                        <?php } ?>
                        <div class="form-group col-12 col-md-5">
                            <label for="nome" class=" form-control-label">Nome<span class="obrigatorio">*</span></label>
                            <input type="text" name="nome" class="form-control" required value="<?php echo $nome ?>">
                        </div>
                        <div class="form-group col-12 col-md-5">
                            <label for="email" class=" form-control-label">E-mail<span class="obrigatorio">*</span></label>
                            <input type="email" name="email" class="form-control" required value="<?php echo $email ?>">
                        </div>
                        <div class="form-group col-12 col-md-5">
                            <label for="senha" class=" form-control-label">Senha<span class="obrigatorio">*</span></label>
                            <input type="password" name="senha" class="form-control" required value="<?php echo $senha ?>">
                        </div>
                        <div class="form-group col-12 col-md-5">
                            <label for="telefone" class=" form-control-label">Telefone<span class="obrigatorio">*</span></label>
                            <input type="text" name="telefone" class="form-control" required value="<?php echo $telefone ?>">
                        </div>
                        <button name="submit" type="submit" class="btn btn-lg btn-enviar">
                            <span>SALVAR</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>