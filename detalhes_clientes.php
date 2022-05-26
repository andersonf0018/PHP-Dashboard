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
?>
<div class="content pb-0">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><strong>DETALHES CLIENTE</strong></div>
                <form method="post">
                    <div class="card-body card-block">
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>CPF</h4>
                            <p><?php echo $cpf ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>Nome</h4>
                            <p><?php echo $nome ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>E-mail</h4>
                            <p><?php echo $email ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>Telefone</h4>
                            <p><?php echo $telefone ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>Sexo</h4>
                            <p><?php echo $sexo ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>Data de Nascimento</h4>
                            <p><?php echo $nascimento ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>CEP</h4>
                            <p><?php echo $cep ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>Estado</h4>
                            <p><?php echo $estado ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>Cidade</h4>
                            <p><?php echo $cidade ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>Bairro</h4>
                            <p><?php echo $bairro ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>Rua</h4>
                            <p><?php echo $rua ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>Número</h4>
                            <p><?php echo $numero ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>Complemento</h4>
                            <p><?php echo $complemento ?></p>
                        </div>
                        <div class="box-detalhes col-12">
                            <a class="btn-voltar" href="pagina_clientes.php">
                                <span><i class="fa-solid fa-arrow-left"></i> VOLTAR</span>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>