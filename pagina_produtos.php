<?php
require('top.php');
isVendedor();
if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($con, $_GET['type']);
    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET['codigo']);
        $delete_sql = "DELETE FROM produtos WHERE codigo='$id'";
        mysqli_query($con, $delete_sql);
    }
}

$sql = "SELECT * FROM produtos";
$res = mysqli_query($con, $sql);
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h4 class="box-title col-12 col-md-9">PRODUTOS</h4>
                            <a class="col-12 col-md-3" href="cadastro_produtos.php">
                                <button name="submit" type="submit" class="btn btn-lg btn-criar">
                                    <span>CADASTRAR NOVO</span>
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nome do Produto</th>
                                        <th>Preço Venda</th>
                                        <th>Estoque</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($res)) { ?>
                                        <tr>
                                            <td><?php echo $row['codigo'] ?></td>
                                            <td><?php echo $row['nome_produto'] ?></td>
                                            <td><?php echo $row['preco_venda'] ?></td>
                                            <td><?php echo $row['estoque'] ?></td>
                                            <td>
                                                <?php
                                                echo "<a class='badge badge-complete' href='detalhes_produtos.php?codigo=" . $row['codigo'] . "'><i class='fa-solid fa-eye'></i></a>&nbsp;";

                                                echo "<a class='badge badge-edit' href='cadastro_produtos.php?codigo=" . $row['codigo'] . "'><i class='fa-solid fa-pencil'></i></a>&nbsp;";

                                                echo "<a class='badge badge-delete' href='?type=delete&codigo=" . $row['codigo'] . "'><i class='fa-solid fa-trash'></i></a>";
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>