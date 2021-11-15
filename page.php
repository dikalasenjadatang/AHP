<?php
$page=$_GET['hal'];
switch($page){
	case 'data_alternatif':
		$page="include 'includes/p_alternatif.php';";
		break;
	case 'update_alternatif':
		$page="include 'includes/p_alternatif_update.php';";
		break;
	case 'data_paket':
		$page="include 'includes/p_paket.php';";
		break;
	case 'update_paket':
		$page="include 'includes/p_paket_update.php';";
		break;
	case 'data_kriteria':
		$page="include 'includes/p_kriteria.php';";
		break;
	case 'update_kriteria':
		$page="include 'includes/p_kriteria_update.php';";
		break;
	case 'ubah_password':
		$page="include 'includes/p_ubah_password.php';";
		break;
	case 'nilai_kriteria':
		$page="include 'includes/p_nilai_kriteria.php';";
		break;
	case 'nilai_alternatif':
		$page="include 'includes/p_nilai_alternatif.php';";
		break;
	case 'hasil_alternatif':
		$page="include 'includes/p_hasil_alternatif.php';";
		break;

	default:
		$page="include 'includes/p_home.php';";
		break;
}
$CONTENT_["main"]=$page;

?>