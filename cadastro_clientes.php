<?php
require('top.php');
isVendedor();

//Campos pessoais
$nome = '';
$cpf = '';
$email = '';
$telefone = '';
$sexo = '';
$nascimento = '';
//Campos endereço
$cep = '';
$estado = '';
$cidade = '';
$bairro = '';
$rua = '';
$numero = '';
$complemento = '';

$msg = '';

if (isset($_GET['cpf']) && $_GET['cpf'] != '') {
    $id = get_safe_value($con, $_GET['cpf']);
    $res = mysqli_query($con, "SELECT * FROM clientes WHERE cpf='$id'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $nome = $row['nome'];
        $cpf = $row['cpf'];
        $email = $row['email'];
        $telefone = $row['telefone'];
        $sexo = $row['sexo'];
        $nascimento = $row['nascimento'];
        $cep = $row['cep'];
        $estado = $row['estado'];
        $cidade = $row['cidade'];
        $bairro = $row['bairro'];
        $rua = $row['rua'];
        $numero = $row['numero'];
        $complemento = $row['complemento'];
    } else {
        header('location: pagina_clientes.php');
        die();
    }
}

if (isset($_POST['submit'])) {
    $nome = get_safe_value($con, $_POST['nome']);
    $cpf = get_safe_value($con, $_POST['cpf']);
    $email = get_safe_value($con, $_POST['email']);
    $telefone = get_safe_value($con, $_POST['telefone']);
    $sexo = get_safe_value($con, $_POST['sexo']);
    $nascimento = get_safe_value($con, $_POST['nascimento']);
    $cep = get_safe_value($con, $_POST['cep']);
    $estado = get_safe_value($con, $_POST['estado']);
    $cidade = get_safe_value($con, $_POST['cidade']);
    $bairro = get_safe_value($con, $_POST['bairro']);
    $rua = get_safe_value($con, $_POST['rua']);
    $numero = get_safe_value($con, $_POST['numero']);
    $complemento = get_safe_value($con, $_POST['complemento']);

    $res_cpf = mysqli_query($con, "SELECT * FROM clientes WHERE cpf='$cpf'");
    $check_cpf = mysqli_num_rows($res_cpf);
    if ($check_cpf > 0) {
        if (isset($_GET['cpf']) && $_GET['cpf'] != '') {
            $getData = mysqli_fetch_assoc($res_cpf);
            if ($id == $getData['cpf']) {
            } else {
                $msg = "Esse CPF já está cadastrado!";
            }
        } else {
            $msg = "Esse CPF já está cadastrado!";
        }
    }
    $res_email = mysqli_query($con, "SELECT * FROM clientes WHERE email='$email'");
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

    $res_telefone = mysqli_query($con, "SELECT * FROM clientes WHERE telefone='$telefone'");
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
        if (isset($_GET['cpf']) && $_GET['cpf'] != '') {
            mysqli_query($con, "UPDATE clientes SET nome='$nome',cpf='$cpf',email='$email',telefone='$telefone',sexo='$sexo',nascimento='$nascimento',cep='$cep',estado='$estado',cidade='$cidade',bairro='$bairro',rua='$rua',numero='$numero',complemento='$complemento' WHERE cpf='$id'");
        } else {
            mysqli_query($con, "INSERT INTO clientes(nome,cpf,email,telefone,sexo,nascimento,cep,estado,cidade,bairro,rua,numero,complemento) VALUES('$nome','$cpf','$email','$telefone','$sexo','$nascimento','$cep','$estado','$cidade','$bairro','$rua','$numero','$complemento')");
        }
        header('location: pagina_clientes.php');
        die();
    }
}
?>
<div class="content pb-0">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><strong>FORMULÁRIO CLIENTE</strong></div>
                <form method="post">
                    <div class="card-body card-block">
                        <?php if ($msg != '') { ?>
                            <div class="alert alert-danger" role="alert">
                                <div class="field_error"><?php echo $msg ?></div>
                            </div>
                        <?php } ?>
                        <div class="form-group col-12 col-md-5">
                            <label for="nome" class=" form-control-label">Nome Completo<span class="obrigatorio">*</span></label>
                            <input type="text" name="nome" class="form-control" required value="<?php echo $nome ?>">
                        </div>
                        <div class="form-group col-12 col-md-5">
                            <label for="cpf" class=" form-control-label">CPF<span class="obrigatorio">*</span></label>
                            <input type="text" name="cpf" class="form-control" required value="<?php echo $cpf ?>">
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
                            <label for="sexo" class=" form-control-label">Sexo<span class="obrigatorio">*</span></label>
                            <select class="form-control" id="sexo" name="sexo" required selected="<?php echo $sexo ?>">
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                                <option value="Outros">Outros</option>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-5">
                            <label for="nascimento" class=" form-control-label">Data de Nascimento<span class="obrigatorio">*</span></label>
                            <input type="date" name="nascimento" class="form-control" required value="<?php echo $nascimento ?>">
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