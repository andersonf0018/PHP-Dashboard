<?php
require('top.php');
isVendedor();

$id = '';
$codigo_produto = '';
$cpf_cliente = '';
$email_vendedor = '';
$quantidade = '';
$valor_total = '';
$data_venda = '';

$msg = '';

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_safe_value($con, $_GET['id']);
    $res = mysqli_query($con, "SELECT * FROM vendas WHERE id='$id'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $id = $row['id'];
        $codigo_produto = $row['codigo_produto'];
        $cpf_cliente = $row['cpf_cliente'];
        $email_vendedor = $row['email_vendedor'];
        $quantidade = $row['quantidade'];
        $valor_total = $row['valor_total'];
        $data_venda = $row['data_venda'];
    } else {
        header('location: pagina_vendas.php');
        die();
    }
}

$msg = '';

$res_produto = mysqli_query($con, "SELECT * FROM produtos WHERE codigo='$codigo_produto'");
$data_produto = mysqli_fetch_assoc($res_produto);
$nome_produto = $data_produto['nome_produto'];

$res_cliente = mysqli_query($con, "SELECT * FROM clientes WHERE cpf='$cpf_cliente'");
$data_cliente = mysqli_fetch_assoc($res_cliente);
$nome_cliente = $data_cliente['nome'];

$res_vendedor = mysqli_query($con, "SELECT * FROM usuarios WHERE email='$email_vendedor'");
$data_vendedor = mysqli_fetch_assoc($res_vendedor);
$nome_vendedor = $data_vendedor['nome'];

$valor_unitario = $valor_total / $quantidade;

?>
<div class="content pb-0">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><strong>DETALHES VENDA</strong></div>
                <form method="post">
                    <div class="card-body card-block">
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>ID</h4>
                            <p><?php echo $id ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>Código do Produto</h4>
                            <p><?php echo $codigo_produto ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>Nome do Produto</h4>
                            <p><?php echo $nome_produto ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>CPF do Cliente</h4>
                            <p><?php echo $cpf_cliente ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>Nome do Cliente</h4>
                            <p><?php echo $nome_cliente ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>E-mail do Vendedor</h4>
                            <p><?php echo $email_vendedor ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>Nome do Vendedor</h4>
                            <p><?php echo $nome_vendedor ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>Quantidade</h4>
                            <p><?php echo $quantidade ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>Valor Unitário</h4>
                            <p>R$ <?php echo $valor_unitario ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>Valor Total</h4>
                            <p>R$ <?php echo $valor_total ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>Data da Venda</h4>
                            <p><?php echo $data_venda ?></p>
                        </div>
                        <div class="box-detalhes col-12">
                            <a class="btn-voltar" href="pagina_vendas.php">
                                <span><i class="fa-solid fa-arrow-left"></i> VOLTAR</span>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>