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

if (isset($_POST['submit'])) {
    $codigo = get_safe_value($con, $_POST['codigo']);
    $nome_produto = get_safe_value($con, $_POST['nome_produto']);
    $fornecedor = get_safe_value($con, $_POST['fornecedor']);
    $categoria = get_safe_value($con, $_POST['categoria']);
    $preco_custo = get_safe_value($con, $_POST['preco_custo']);
    $preco_venda = get_safe_value($con, $_POST['preco_venda']);
    $estoque = get_safe_value($con, $_POST['estoque']);

    $res = mysqli_query($con, "SELECT * FROM produtos WHERE codigo='$codigo'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        if (isset($_GET['codigo']) && $_GET['codigo'] != '') {
            $getData = mysqli_fetch_assoc($res);
            if ($id == $getData['codigo']) {
            } else {
                $msg = "Esse Código do Produto já está cadastrado!";
            }
        } else {
            $msg = "Esse Código do Produto já está cadastrado!";
        }
    }

    if ($msg == '') {
        if (isset($_GET['codigo']) && $_GET['codigo'] != '') {
            mysqli_query($con, "UPDATE produtos SET codigo='$codigo',nome_produto='$nome_produto',fornecedor='$fornecedor',categoria='$categoria',preco_custo='$preco_custo',preco_venda='$preco_venda',estoque='$estoque' WHERE codigo='$id'");
        } else {
            mysqli_query($con, "INSERT INTO produtos(codigo,nome_produto,fornecedor,categoria,preco_custo,preco_venda,estoque) VALUES('$codigo','$nome_produto','$fornecedor','$categoria','$preco_custo','$preco_venda','$estoque')");
        }
        header('location: pagina_produtos.php');
        die();
    }
}
?>
<div class="content pb-0">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><strong>FORMULÁRIO PRODUTOS</strong></div>
                <form method="post">
                    <div class="card-body card-block">
                        <?php if ($msg != '') { ?>
                            <div class="alert alert-danger" role="alert">
                                <div class="field_error"><?php echo $msg ?></div>
                            </div>
                        <?php } ?>
                        <div class="form-group col-12 col-md-5">
                            <label for="codigo" class=" form-control-label">Código do Produto<span class="obrigatorio">*</span></label>
                            <input type="text" name="codigo" class="form-control" required value="<?php echo $codigo ?>">
                        </div>
                        <div class="form-group col-12 col-md-5">
                            <label for="nome_produto" class=" form-control-label">Nome do Produto<span class="obrigatorio">*</span></label>
                            <input type="text" name="nome_produto" class="form-control" required value="<?php echo $nome_produto ?>">
                        </div>
                        <div class="form-group col-12 col-md-5">
                            <label for="fornecedor" class=" form-control-label">Fornecedor<span class="obrigatorio">*</span></label>
                            <select class="form-control" id="fornecedor" name="fornecedor" required>
                                <?php
                                $query_fornecedores = "SELECT * FROM fornecedores";
                                $resultado_fornecedores = mysqli_query($con, $query_fornecedores);
                                while ($row_fornecedores = mysqli_fetch_assoc($resultado_fornecedores)) { ?>
                                    <option value="<?php echo $row_fornecedores['nome_fantasia']; ?>"><?php echo $row_fornecedores['nome_fantasia']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-5">
                            <label for="categoria" class=" form-control-label">Categoria<span class="obrigatorio">*</span></label>
                            <select class="form-control" id="categoria" name="categoria" required selected="<?php echo $categoria ?>">
                                <option value="Emboço">Emboço</option>
                                <option value="Reboco">Reboco</option>
                                <option value="Vergalhões">Vergalhões</option>
                                <option value="Quadro de Distribuição">Quadro de Distribuição</option>
                                <option value="Tijolos">Tijolos</option>
                                <option value="Areia">Areia</option>
                                <option value="Tubos de PVC">Tubos de PVC</option>
                                <option value="Graute">Graute</option>
                                <option value="Cimento">Cimento</option>
                                <option value="Argamassa para Chapisco">Argamassa para Chapisco</option>
                                <option value="Caixas de Luz">Caixas de Luz</option>
                                <option value="Azulejos">Azulejos</option>
                                <option value="Portas">Portas</option>
                                <option value="Interruptores">Interruptores</option>
                                <option value="Vigas">Vigas</option>
                                <option value="Laje">Laje</option>
                                <option value="Massa Corrida">Massa Corrida</option>
                                <option value="Pincéis">Pincéis</option>
                                <option value="Tinta">Tinta</option>
                                <option value="Pedra Brita">Pedra Brita</option>
                                <option value="Madeira">Madeira</option>
                                <option value="Cal">Cal</option>
                                <option value="Tiner">Tiner</option>
                                <option value="Gesso">Gesso</option>
                                <option value="Impermeabilizante">Impermeabilizante</option>
                                <option value="Telhas">Telhas</option>
                                <option value="Serra">Serra </option>
                                <option value="Martelo">Martelo</option>
                                <option value="Outros">Outros</option>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-2">
                            <label for="preco_custo" class=" form-control-label">Preço de Custo<span class="obrigatorio">*</span></label>
                            <div class="input-group">
                                <div class="input-group-text">R$</div>
                                <input type="number" name="preco_custo" class="form-control" placeholder="Valor" min="0" required value="<?php echo $preco_custo ?>">
                            </div>
                        </div>
                        <div class="form-group col-12 col-md-2">
                            <label for="preco_venda" class=" form-control-label">Preço de Venda<span class="obrigatorio">*</span></label>
                            <div class="input-group">
                                <div class="input-group-text">R$</div>
                                <input type="number" name="preco_venda" class="form-control" placeholder="Valor" min="0" required value="<?php echo $preco_venda ?>">
                            </div>
                        </div>
                        <div class="form-group col-12 col-md-2">
                            <label for="estoque" class=" form-control-label">Estoque<span class="obrigatorio">*</span></label>
                            <input type="number" name="estoque" class="form-control" min="0" required value="<?php echo $estoque ?>">
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