<?php
require('top.php');

$logado_atualmente = $_SESSION['ADMIN_EMAIL'];

$quantidade_geral_vendas = mysqli_num_rows(mysqli_query($con, "SELECT * FROM vendas"));
$quantidade_geral_produtos = mysqli_num_rows(mysqli_query($con, "SELECT * FROM produtos"));
$quantidade_geral_clientes = mysqli_num_rows(mysqli_query($con, "SELECT * FROM clientes"));
$quantidade_geral_vendedores = mysqli_num_rows(mysqli_query($con, "SELECT * FROM usuarios WHERE nivel='1'"));
$quantidade_geral_fornecedores = mysqli_num_rows(mysqli_query($con, "SELECT * FROM fornecedores"));
$quantidade_geral_admins = mysqli_num_rows(mysqli_query($con, "SELECT * FROM usuarios WHERE nivel='0'"));

$quantidade_perfil_vendas = mysqli_num_rows(mysqli_query($con, "SELECT * FROM vendas WHERE email_vendedor='$logado_atualmente'"));

?>
<div class="content pb-0">
	<div class="orders">
		<div class="row">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-body">
						<h4 class="box-title" style="margin-left: 25px;">Painel</h4>
					</div>
					<?php if ($_SESSION['ADMIN_NIVEL'] == 0) { ?>
						<div class="row mb-3">
							<div class="card col-12 col-md-5 info-card vendas">
								<div class="row">
									<div class="col-md-3 icone-box">
										<i class="fa-solid fa-dollar-sign"></i>
									</div>
									<div class="col-md-8">
										<div class="card-body">
											<h5 class="card-title">Total de Vendas</h5>
											<p class="card-text"><?php echo $quantidade_geral_vendas ?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="card col-12 col-md-5 info-card produtos">
								<div class="row">
									<div class="col-md-3 icone-box">
										<i class="fa-solid fa-box"></i>
									</div>
									<div class="col-md-8">
										<div class="card-body">
											<h5 class="card-title">Total de Produtos</h5>
											<p class="card-text"><?php echo $quantidade_geral_produtos ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row mb-3">
							<div class="card col-12 col-md-5 info-card clientes">
								<div class="row">
									<div class="col-md-3 icone-box">
										<i class="fa fa-bag-shopping"></i>
									</div>
									<div class="col-md-8">
										<div class="card-body">
											<h5 class="card-title">Total de Clientes</h5>
											<p class="card-text"><?php echo $quantidade_geral_clientes ?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="card col-12 col-md-5 info-card vendedores">
								<div class="row">
									<div class="col-md-3 icone-box">
										<i class="fa fa-portrait"></i>
									</div>
									<div class="col-md-8">
										<div class="card-body">
											<h5 class="card-title">Total de Vendedores</h5>
											<p class="card-text"><?php echo $quantidade_geral_vendedores ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row mb-3">
							<div class="card col-12 col-md-5 info-card fornecedores">
								<div class="row">
									<div class="col-md-3 icone-box">
										<i class="fa fa-dolly"></i>
									</div>
									<div class="col-md-8">
										<div class="card-body">
											<h5 class="card-title">Total de Fornecedores</h5>
											<p class="card-text"><?php echo $quantidade_geral_fornecedores ?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="card col-12 col-md-5 info-card admins">
								<div class="row">
									<div class="col-md-3 icone-box">
										<i class="fa-solid fa-key"></i>
									</div>
									<div class="col-md-8">
										<div class="card-body">
											<h5 class="card-title">Total de Admins</h5>
											<p class="card-text"><?php echo $quantidade_geral_admins ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
					<?php if ($_SESSION['ADMIN_NIVEL'] == 1) { ?>
						<div class="row mb-3">
							<div class="card col-12 col-md-5 info-card vendas">
								<div class="row">
									<div class="col-md-3 icone-box">
										<i class="fa-solid fa-dollar-sign"></i>
									</div>
									<div class="col-md-8">
										<div class="card-body">
											<h5 class="card-title">Suas Vendas</h5>
											<p class="card-text"><?php echo $quantidade_perfil_vendas ?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="card col-12 col-md-5 info-card produtos">
								<div class="row">
									<div class="col-md-3 icone-box">
										<i class="fa-solid fa-box"></i>
									</div>
									<div class="col-md-8">
										<div class="card-body">
											<h5 class="card-title">Total de Produtos</h5>
											<p class="card-text"><?php echo $quantidade_geral_produtos ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row mb-3">
							<div class="card col-12 col-md-5 info-card clientes">
								<div class="row">
									<div class="col-md-3 icone-box">
										<i class="fa fa-bag-shopping"></i>
									</div>
									<div class="col-md-8">
										<div class="card-body">
											<h5 class="card-title">Total de Clientes</h5>
											<p class="card-text"><?php echo $quantidade_geral_clientes ?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="card col-12 col-md-5 info-card fornecedores">
								<div class="row">
									<div class="col-md-3 icone-box">
										<i class="fa fa-dolly"></i>
									</div>
									<div class="col-md-8">
										<div class="card-body">
											<h5 class="card-title">Total de Fornecedores</h5>
											<p class="card-text"><?php echo $quantidade_geral_fornecedores ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>