<?php
require('top.php');
isVendedor();
if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($con, $_GET['type']);
    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET['id']);
        $delete_sql = "DELETE FROM vendas WHERE id='$id'";
        mysqli_query($con, $delete_sql);
    }
}
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h4 class="box-title col-12 col-md-9">VENDAS</h4>
                            <a class="col-12 col-md-3" href="cadastro_vendas.php">
                                <button name="submit" type="submit" class="btn btn-lg btn-criar">
                                    <span>REALIZAR NOVA</span>
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Código do Produto</th>
                                        <th>Vendedor</th>
                                        <th>Valor Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($_SESSION['ADMIN_NIVEL'] == 0) {
                                        $sql = "SELECT * FROM vendas";
                                        $res = mysqli_query($con, $sql);
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            $email_vendedor = $row['email_vendedor'];
                                            $res_vendedor = mysqli_query($con, "SELECT * FROM usuarios WHERE email='$email_vendedor'");
                                            $data_vendedor = mysqli_fetch_assoc($res_vendedor);
                                            $nome_vendedor = $data_vendedor['nome'];
                                    ?>
                                            <tr>
                                                <td><?php echo $row['id'] ?></td>
                                                <td><?php echo $row['codigo_produto'] ?></td>
                                                <td><?php echo $nome_vendedor ?></td>
                                                <td>R$ <?php echo $row['valor_total'] ?></td>
                                                <td>
                                                    <?php
                                                    echo "<a class='badge badge-complete' href='detalhes_vendas.php?id=" . $row['id'] . "'><i class='fa-solid fa-eye'></i></a>&nbsp;";

                                                    echo "<a class='badge badge-delete' href='?type=delete&id=" . $row['id'] . "'><i class='fa-solid fa-trash'></i></a>";
                                                    ?>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                    <?php
                                    if ($_SESSION['ADMIN_NIVEL'] == 1) {
                                        $email_atual = $_SESSION['ADMIN_EMAIL'];
                                        $sql = "SELECT * FROM vendas WHERE email_vendedor='$email_atual'";
                                        $res = mysqli_query($con, $sql);
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            $email_vendedor = $row['email_vendedor'];
                                            $res_vendedor = mysqli_query($con, "SELECT * FROM usuarios WHERE email='$email_vendedor'");
                                            $data_vendedor = mysqli_fetch_assoc($res_vendedor);
                                            $nome_vendedor = $data_vendedor['nome'];
                                    ?>
                                            <tr>
                                                <td><?php echo $row['id'] ?></td>
                                                <td><?php echo $row['codigo_produto'] ?></td>
                                                <td><?php echo $nome_vendedor ?></td>
                                                <td>R$ <?php echo $row['valor_total'] ?></td>
                                                <td>
                                                    <?php
                                                    echo "<a class='badge badge-complete' href='detalhes_vendas.php?id=" . $row['id'] . "'><i class='fa-solid fa-eye'></i></a>&nbsp;";
                                                    ?>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>