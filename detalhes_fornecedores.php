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
?>
<div class="content pb-0">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><strong>DETALHES FORNECEDOR</strong></div>
                <form method="post">
                    <div class="card-body card-block">
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>CNPJ</h4>
                            <p><?php echo $cnpj ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>Nome Fantasia</h4>
                            <p><?php echo $nome_fantasia ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>Razão Social</h4>
                            <p><?php echo $razao_social ?></p>
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
                            <a class="btn-voltar" href="pagina_fornecedores.php">
                                <span><i class="fa-solid fa-arrow-left"></i> VOLTAR</span>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>