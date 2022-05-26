<?php
require('top.php');
isAdmin();
if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($con, $_GET['type']);
    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET['email']);
        $delete_sql = "DELETE FROM usuarios WHERE email='$id'";
        mysqli_query($con, $delete_sql);
    }
}

$sql = "SELECT * FROM usuarios WHERE nivel='0'";
$res = mysqli_query($con, $sql);
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h4 class="box-title col-12 col-md-9">ADMINS</h4>
                            <a class="col-12 col-md-3" href="cadastro_admins.php">
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
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>Telefone</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($res)) { ?>
                                        <tr>
                                            <td><?php echo $row['nome'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['telefone'] ?></td>
                                            <td>
                                                <?php
                                                echo "<a class='badge badge-complete' href='detalhes_admins.php?email=" . $row['email'] . "'><i class='fa-solid fa-eye'></i></a>&nbsp;";

                                                echo "<a class='badge badge-edit' href='cadastro_admins.php?email=" . $row['email'] . "'><i class='fa-solid fa-pencil'></i></a>&nbsp;";

                                                echo "<a class='badge badge-delete' href='?type=delete&email=" . $row['email'] . "'><i class='fa-solid fa-trash'></i></a>";
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