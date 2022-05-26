<?php
function get_safe_value($con, $str)
{
	if ($str != '') {
		$str = trim($str);
		return mysqli_real_escape_string($con, $str);
	}
}
function isAdmin()
{
	if (!isset($_SESSION['ADMIN_LOGIN'])) {
?>
		<script>
			window.location.href = 'login.php';
		</script>
	<?php
	}
	if ($_SESSION['ADMIN_NIVEL'] != 0) {
	?>
		<script>
			window.location.href = 'index.php';
		</script>
	<?php
	}
}
function isVendedor()
{
	if (!isset($_SESSION['ADMIN_LOGIN'])) {
	?>
		<script>
			window.location.href = 'login.php';
		</script>
	<?php
	}
	if ($_SESSION['ADMIN_NIVEL'] > 1) {
	?>
		<script>
			window.location.href = 'index.php';
		</script>
<?php
	}
}
?>