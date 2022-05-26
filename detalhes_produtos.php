<?php
require('top.php');
isVendedor();

$codigo = '';
$nome_produto = '';
$fornecedor = '';
$categoria = '';
$preco_custo = '';
$preco_venda = '';
$estoque = '';

$msg = '';

if (isset($_GET['codigo']) && $_GET['codigo'] != '') {
    $id = get_safe_value($con, $_GET['codigo']);
    $res = mysqli_query($con, "SELECT * FROM produtos WHERE codigo='$id'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $codigo = $row['codigo'];
        $nome_produto = $row['nome_produto'];
        $fornecedor = $row['fornecedor'];
        $categoria = $row['categoria'];
        $preco_custo = $row['preco_custo'];
        $preco_venda = $row['preco_venda'];
        $estoque = $row['estoque'];
    } else {
        header('location: pagina_produtos.php');
        die();
    }
}
?>
<div class="content pb-0">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><strong>DETALHES PRODUTOS</strong></div>
                <form method="post">
                    <div class="card-body card-block">
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>Código do Produto</h4>
                            <p><?php echo $codigo ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>Nome do Produto</h4>
                            <p><?php echo $nome_produto ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>Fornecedor</h4>
                            <p><?php echo $fornecedor ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>Categoria</h4>
                            <p><?php echo $categoria ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>Preço de Custo</h4>
                            <p>R$ <?php echo $preco_custo ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>Preço Venda</h4>
                            <p>R$ <?php echo $preco_venda ?></p>
                        </div>
                        <div class="box-detalhes col-12 col-md-5">
                            <h4>Estoque</h4>
                            <p><?php echo $estoque ?></p>
                        </div>
                        <div class="box-detalhes col-12">
                            <a class="btn-voltar" href="pagina_produtos.php">
                                <span><i class="fa-solid fa-arrow-left"></i> VOLTAR</span>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>