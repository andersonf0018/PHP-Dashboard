<?php
require('top.php');
isVendedor();

//Campos pessoais
$cnpj = '';
$nome_fantasia = '';
$razao_social = '';
$email = '';
$telefone = '';
//Campos endereço
$cep = '';
$estado = '';
$cidade = '';
$bairro = '';
$rua = '';
$numero = '';
$complemento = '';

$msg = '';

if (isset($_GET['cnpj']) && $_GET['cnpj'] != '') {
    $id = get_safe_value($con, $_GET['cnpj']);
    $res = mysqli_query($con, "SELECT * FROM fornecedores WHERE cnpj='$id'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $cnpj = $row['cnpj'];
        $nome_fantasia = $row['nome_fantasia'];
        $razao_social = $row['razao_social'];
        $email = $row['email'];
        $telefone = $row['telefone'];
        $cep = $row['cep'];
        $estado = $row['estado'];
        $cidade = $row['cidade'];
        $bairro = $row['bairro'];
        $rua = $row['rua'];
        $numero = $row['numero'];
        $complemento = $row['complemento'];
    } else {
        header('location: pagina_fornecedores.php');
        die();
    }
}

if (isset($_POST['submit'])) {
    $cnpj = get_safe_value($con, $_POST['cnpj']);
    $nome_fantasia = get_safe_value($con, $_POST['nome_fantasia']);
    $razao_social = get_safe_value($con, $_POST['razao_social']);
    $email = get_safe_value($con, $_POST['email']);
    $telefone = get_safe_value($con, $_POST['telefone']);
    $cep = get_safe_value($con, $_POST['cep']);
    $estado = get_safe_value($con, $_POST['estado']);
    $cidade = get_safe_value($con, $_POST['cidade']);
    $bairro = get_safe_value($con, $_POST['bairro']);
    $rua = get_safe_value($con, $_POST['rua']);
    $numero = get_safe_value($con, $_POST['numero']);
    $complemento = get_safe_value($con, $_POST['complemento']);

    $res_cnpj = mysqli_query($con, "SELECT * FROM fornecedores WHERE cnpj='$cnpj'");
    $check_cnpj = mysqli_num_rows($res_cnpj);
    if ($check_cnpj > 0) {
        if (isset($_GET['cnpj']) && $_GET['cnpj'] != '') {
            $getData = mysqli_fetch_assoc($res_cnpj);
            if ($id == $getData['cnpj']) {
            } else {
                $msg = "Esse CNPJ já está cadastrado!";
            }
        } else {
            $msg = "Esse CNPJ já está cadastrado!";
        }
    }
    $res_email = mysqli_query($con, "SELECT * FROM fornecedores WHERE email='$email'");
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

    $res_telefone = mysqli_query($con, "SELECT * FROM fornecedores WHERE telefone='$telefone'");
    $check_telefone = mysqli_num_rows($res_telefone);
    if ($check_telefone > 0) {
        if (isset($_GET['telefone']) && $_GET['telefone'] != '') {
            $getData = mysqli_fetch_assoc($res_telefone);
            if ($id == $getData['telefone']) {
            } else {
                $msg = "Esse Telefone já está cadastrado!";
            }
        } else {
            $msg = "Esse Telefone já está cadastrado!";
        }
    }

    if ($msg == '') {
        if (isset($_GET['cnpj']) && $_GET['cnpj'] != '') {
            mysqli_query($con, "UPDATE fornecedores SET cnpj='$cnpj',nome_fantasia='$nome_fantasia',razao_social='$razao_social',email='$email',telefone='$telefone',cep='$cep',estado='$estado',cidade='$cidade',bairro='$bairro',rua='$rua',numero='$numero',complemento='$complemento' WHERE cnpj='$id'");
        } else {
            mysqli_query($con, "INSERT INTO fornecedores(cnpj,nome_fantasia,razao_social,email,telefone,cep,estado,cidade,bairro,rua,numero,complemento) VALUES('$cnpj','$nome_fantasia','$razao_social','$email','$telefone','$cep','$estado','$cidade','$bairro','$rua','$numero','$complemento')");
        }
        header('location: pagina_fornecedores.php');
        die();
    }
}
?>
<div class="content pb-0">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><strong>FORMULÁRIO FORNECEDOR</strong></div>
                <form method="post">
                    <div class="card-body card-block">
                        <?php if ($msg != '') { ?>
                            <div class="alert alert-danger" role="alert">
                                <div class="field_error"><?php echo $msg ?></div>
                            </div>
                        <?php } ?>
                        <div class="form-group col-12 col-md-5">
                            <label for="cnpj" class=" form-control-label">CNPJ<span class="obrigatorio">*</span></label>
                            <input type="text" name="cnpj" class="form-control" required value="<?php echo $cnpj ?>">
                        </div>
                        <div class="form-group col-12 col-md-5">
                            <label for="nome_fantasia" class=" form-control-label">Nome Fantasia<span class="obrigatorio">*</span></label>
                            <input type="text" name="nome_fantasia" class="form-control" required value="<?php echo $nome_fantasia ?>">
                        </div>
                        <div class="form-group col-12 col-md-5">
                            <label for="razao_social" class=" form-control-label">Razão Social<span class="obrigatorio">*</span></label>
                            <input type="text" name="razao_social" class="form-control" required value="<?php echo $razao_social ?>">
                        </div>
                        <div class="form-group col-12 col-md-5">
                            <label for="email" class=" form-control-label">E-mail<span class="obrigatorio">*</span></label>
                            <input type="email" name="email" class="form-control" required value="<?php echo $email ?>">
                        </div>
                        <div class="form-group col-12 col-md-5">
                            <label for="telefone" class=" form-control-label">Telefone<span class="obrigatorio">*</span></label>
                            <input type="text" name="telefone" class="form-control" required value="<?php echo $telefone ?>">
                        </div>
                        <div class="form-group col-12 col-md-5">
                            <label for="cep" class=" form-control-label">CEP<span class="obrigatorio">*</span></label>
                            <input type="text" name="cep" class="form-control" required value="<?php echo $cep ?>">
                        </div>
                        <div class="form-group col-12 col-md-5">
                            <label for="estado" class=" form-control-label">Estado<span class="obrigatorio">*</span></label>
                            <select class="form-control" id="estado" name="estado" required selected="<?php echo $estado ?>">
                                <option value="Acre">Acre</option>
                                <option value="Alagoas">Alagoas</option>
                                <option value="Amapá">Amapá</option>
                                <option value="Amazonas">Amazonas</option>
                                <option value="Bahia">Bahia</option>
                                <option value="Ceará">Ceará</option>
                                <option value="Distrito Federal">Distrito Federal</option>
                                <option value="Espírito Santo">Espírito Santo</option>
                                <option value="Goiás">Goiás</option>
                                <option value="Maranhão">Maranhão</option>
                                <option value="Mato Grosso">Mato Grosso</option>
                                <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                                <option value="Minas Gerais">Minas Gerais</option>
                                <option value="Pará">Pará</option>
                                <option value="Paraíba">Paraíba</option>
                                <option value="Paraná">Paraná</option>
                                <option value="Pernambuco">Pernambuco</option>
                                <option value="Piauí">Piauí</option>
                                <option value="Rio de Janeiro">Rio de Janeiro</option>
                                <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                                <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                                <option value="Rondônia">Rondônia</option>
                                <option value="Roraima">Roraima</option>
                                <option value="Santa Catarina">Santa Catarina</option>
                                <option value="São Paulo">São Paulo</option>
                                <option value="Sergipe">Sergipe</option>
                                <option value="Tocantins">Tocantins</option>
                                <option value="Estrangeiro">Estrangeiro</option>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-5">
                            <label for="cidade" class=" form-control-label">Cidade<span class="obrigatorio">*</span></label>
                            <input type="text" name="cidade" class="form-control" required value="<?php echo $cidade ?>">
                        </div>
                        <div class="form-group col-12 col-md-5">
                            <label for="bairro" class=" form-control-label">Bairro<span class="obrigatorio">*</span></label>
                            <input type="text" name="bairro" class="form-control" required value="<?php echo $bairro ?>">
                        </div>
                        <div class="form-group col-12 col-md-5">
                            <label for="rua" class=" form-control-label">Rua<span class="obrigatorio">*</span></label>
                            <input type="text" name="rua" class="form-control" required value="<?php echo $rua ?>">
                        </div>
                        <div class="form-group col-1">
                            <label for="numero" class=" form-control-label">Número<span class="obrigatorio">*</span></label>
                            <input type="text" name="numero" class="form-control" required value="<?php echo $numero ?>">
                        </div>
                        <div class="form-group col-12 col-md-5">
                            <label for="complemento" class=" form-control-label">Complemento</label>
                            <input type="text" name="complemento" class="form-control" value="<?php echo $complemento ?>">
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