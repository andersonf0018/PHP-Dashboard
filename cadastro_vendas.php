<?php
require('top.php');
isVendedor();

$codigo_produto = '';
$cpf_cliente = '';
$quantidade = '';
$email_vendedor = $_SESSION['ADMIN_EMAIL'];
$valor_total = '';

$msg = '';

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_safe_value($con, $_GET['id']);
    $res = mysqli_query($con, "SELECT * FROM vendas WHERE id='$id'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $codigo_produto = $row['codigo_produto'];
        $cpf_cliente = $row['cpf_cliente'];
        $quantidade = $row['quantidade'];
        $valor_total = $row['valor_total'];
    } else {
        header('location: pagina_vendas.php');
        die();
    }
}

if (isset($_POST['submit'])) {
    $codigo_produto = get_safe_value($con, $_POST['codigo_produto']);
    $cpf_cliente = get_safe_value($con, $_POST['cpf_cliente']);
    $quantidade = get_safe_value($con, $_POST['quantidade']);

    $res = mysqli_query($con, "SELECT * FROM produtos WHERE codigo='$codigo_produto'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $getData = mysqli_fetch_assoc($res);
        if ($getData['estoque'] < $quantidade) {
            $msg = "A quantidade desejada é maior que a quantidade em estoque!";
        } else {
            $valor_total = $getData['preco_venda'] * $quantidade;
        }
    }

    if ($msg == '') {
        $res_estoque = mysqli_query($con, "SELECT * FROM produtos WHERE codigo='$codigo_produto'");
        $data_estoque = mysqli_fetch_assoc($res_estoque);
        $estoque = $data_estoque['estoque'];
        $novo_estoque = $estoque - $quantidade;
        $data = date('Y-m-d H:i:s');
        mysqli_query($con, "INSERT INTO vendas(codigo_produto,cpf_cliente,email_vendedor,quantidade,valor_total,data_venda) VALUES('$codigo_produto','$cpf_cliente','$email_vendedor','$quantidade','$valor_total','$data')");
        mysqli_query($con, "UPDATE produtos SET estoque='$novo_estoque' WHERE codigo='$codigo_produto'");
        header('location: pagina_vendas.php');
        die();
    }
}
?>
<div class="content pb-0">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><strong>FORMULÁRIO VENDA</strong></div>
                <form method="post">
                    <div class="card-body card-block">
                        <?php if ($msg != '') { ?>
                            <div class="alert alert-danger" role="alert">
                                <div class="field_error"><?php echo $msg ?></div>
                            </div>
                        <?php } ?>
                        <div class="form-group col-12 col-md-5">
                            <label for="codigo_produto" class=" form-control-label">Produto<span class="obrigatorio">*</span></label>
                            <select class="form-control" id="codigo_produto" name="codigo_produto" required>
                                <?php
                                $query_produtos = "SELECT * FROM produtos";
                                $resultado_produtos = mysqli_query($con, $query_produtos);
                                while ($row_produtos = mysqli_fetch_assoc($resultado_produtos)) { ?>
                                    <option value="<?php echo $row_produtos['codigo']; ?>"><?php echo $row_produtos['codigo']; ?> - <?php echo $row_produtos['nome_produto']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-5">
                            <label for="cpf_cliente" class=" form-control-label">Cliente<span class="obrigatorio">*</span></label>
                            <select class="form-control" id="cpf_cliente" name="cpf_cliente" required>
                                <?php
                                $query_clientes = "SELECT * FROM clientes";
                                $resultado_clientes = mysqli_query($con, $query_clientes);
                                while ($row_clientes = mysqli_fetch_assoc($resultado_clientes)) { ?>
                                    <option value="<?php echo $row_clientes['cpf']; ?>"><?php echo $row_clientes['cpf']; ?> - <?php echo $row_clientes['nome']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-2">
                            <label for="quantidade" class=" form-control-label">Quantidade<span class="obrigatorio">*</span></label>
                            <input type="number" name="quantidade" class="form-control" min="1" required value="<?php echo $quantidade ?>">
                        </div>
                        <button name="submit" type="submit" class="btn btn-lg btn-enviar">
                            <span>REALIZAR VENDA</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>