<?php
$link_list='?hal=data_paket';
$link_update='?hal=update_paket';

if(isset($_POST['save'])){
	$id=$_POST['id'];
	$action=$_POST['action'];
	$kode=$_POST['kode'];
	$nama_paket=$_POST['nama_paket'];
	$jumlah=$_POST['jumlah'];
	$jenis_paket=$_POST['jenis_paket'];
	$satuan=$_POST['satuan'];
	$bidangusaha=$_POST['bidangusaha'];
	
	
	if(empty($kode) or empty($nama_paket)){
		$error='Masih ada beberapa kesalahan. Silahkan periksa lagi form di bawah ini.';
	}else{
		if($action=='add'){
			if(mysql_num_rows(mysql_query("select * from paket where kode='".$kode."'"))>0){
				$error='Kode sudah terdaftar. Silahkan gunakan kode yang lain.';
			}else{
				$q="insert into paket(kode,jenis_paket,nama_paket,jumlah,satuan) values('".$kode."', '".$jenis_paket."','".$nama_paket."','".$jumlah."', '".$satuan."')";
				mysql_query($q)or die(mysql_error());
				exit("<script>location.href='".$link_list."';</script>");
			}
		}
		if($action=='edit'){
			$q=mysql_query("select * from paket where id_paket='".$id."'");
			$h=mysql_fetch_array($q);
			$kode_tmp=$h['kode'];
			if(mysql_num_rows(mysql_query("select * from paket where kode='".$kode."' and kode<>'".$kode_tmp."'"))>0){
				$error='Kode sudah terdaftar. Silahkan gunakan kode yang lain.';
			}else{
				$q="update paket set kode='".$kode."', nama_paket='".$nama_paket."' where id_paket='".$id."'";
				mysql_query($q);
				exit("<script>location.href='".$link_list."';</script>");
			}
		}
		
	}
}else{
	if(empty($_GET['action'])){$action='add';}else{$action=$_GET['action'];}
	if($action=='edit'){
		$id=$_GET['id'];
		$q=mysql_query("select * from paket where id_paket='".$id."'");
		$h=mysql_fetch_array($q);
		$kode=$h['kode'];
		$nama_paket=$h['nama_paket'];
	}
	if($action=='delete'){
		$id=$_GET['id'];
		mysql_query("delete from paket where id_paket='".$id."'");
		exit("<script>location.href='".$link_list."';</script>");
	}
}


?>

<h3 class="p2">Update Data Paket</h3>

<form action="<?php echo $link_update;?>" name="" method="post" enctype="multipart/form-data">
<input name="id" type="hidden" value="<?php echo $id;?>">
<input name="action" type="hidden" value="<?php echo $action;?>">
<?php
if(!empty($error)){
	echo '
	   <div class="alert alert-error ">
		  '.$error.'
	   </div>
	';
}
?>

<table width="100%" border="0" cellspacing="4" cellpadding="4" class="tabel_reg">
  <tr>
	<td width="120">Kode Paket <span class="required">*</span> </td>
	<td><input name="kode" type="text" size="25" value="<?php echo $kode;?>" class="m-wrap large"></td>
  </tr>
  <tr>
	<td>Jenis Paket  <span class="required">*</span> </td>
	<td><input name="jenis_paket" type="text" size="40" value="<?php echo $jenis_paket;?>" class="m-wrap large"></td>
  </tr>
    <tr>
	<td width="120">Nama Paket  <span class="required">*</span> </td>
	<td><input name="nama_paket" type="text" class="m-wrap large" id="jumlah" value="<?php echo $nama_paket;?>" size="40"></td>
  </tr>
  <tr>
	<td>Jumlah <span class="required">*</span> </td>
	<td><input name="jumlah" type="text" class="m-wrap large" id="jumlah" value="<?php echo $jumlah;?>" size="40"></td>
  </tr>
    <tr>
	<td width="120">Satuan  <span class="required">*</span> </td>
	<td><input name="satuan" type="text" class="m-wrap large" id="satuan" value="<?php echo $satuan;?>" size="40"></td>
  </tr>
  <tr>
	<td></td>
	<td><button type="submit" name="save" class="btn blue"><i class="icon-ok"></i> Simpan</button> 
	<button type="button" name="cancel" class="btn" onclick="location.href='<?php echo $link_list;?>'">Batal</button></td>
  </tr>
</table>
</form>
