<?php
$link_list='?hal=data_alternatif';
$link_update='?hal=update_alternatif';

if(isset($_POST['save'])){
	$id=$_POST['id'];
	$action=$_POST['action'];
	$kode=$_POST['kode'];
	$nama=$_POST['nama'];
	$alamat=$_POST['alamat'];
	$npwp=$_POST['npwp'];
	$npimpinan=$_POST['npimpinan'];
	$bidangusaha=$_POST['bidangusaha'];
	$harga1=$_POST['harga1'];
	$harga2=$_POST['harga2'];
	$harga3=$_POST['harga3'];
	$telp=$_POST['telp'];
	if(empty($kode) or empty($nama)){
		$error='Masih ada beberapa kesalahan. Silahkan periksa lagi form di bawah ini.';
	}else{
		if($action=='add'){
			if(mysql_num_rows(mysql_query("select * from alternatif where kode='".$kode."'"))>0){
				$error='Kode sudah terdaftar. Silahkan gunakan kode yang lain.';
			}else{
				$q="insert into alternatif(kode,nama,alamat,npwp,npimpinan,bidangusaha,telp,harga1,harga2,harga3) values('".$kode."', '".$nama."','".$alamat."', '".$npwp."','".$npimpinan."', '".$bidangusaha."', '".$telp."', '".$harga1."','".$harga2."', '".$harga3."')";
				mysql_query($q);
				exit("<script>location.href='".$link_list."';</script>");
			}
		}
		if($action=='edit'){
			$q=mysql_query("select * from alternatif where id_alternatif='".$id."'");
			$h=mysql_fetch_array($q);
			$kode_tmp=$h['kode'];
			if(mysql_num_rows(mysql_query("select * from alternatif where kode='".$kode."' and kode<>'".$kode_tmp."'"))>0){
				$error='Kode sudah terdaftar. Silahkan gunakan kode yang lain.';
			}else{
				$q="update alternatif set kode='".$kode."', nama='".$nama."',alamat='".$alamat."',npwp='".$npwp."',npimpinan='".$npimpinan."',bidangusaha='".$bidangusaha."',telp='".$telp."',harga1='".$harga1."',harga2='".$harga2."',harga3='".$harga3."' where id_alternatif='".$id."'";
				mysql_query($q);
				exit("<script>location.href='".$link_list."';</script>");
			}
		}
		
	}
}else{
	if(empty($_GET['action'])){$action='add';}else{$action=$_GET['action'];}
	if($action=='edit'){
		$id=$_GET['id'];
		$q=mysql_query("select * from alternatif where id_alternatif='".$id."'");
		$h=mysql_fetch_array($q);
		$kode=$h['kode'];
		$nama=$h['nama'];
		$alamat=$h['alamat'];
		$npwp=$h['npwp'];
		$npimpinan=$h['npimpinan'];
		$bidangusaha=$h['bidangusaha'];
		$telp=$h['telp'];
		$harga1=$h['harga1'];
		$harga2=$h['harga2'];
		$harga3=$h['harga3'];
		
	}
	if($action=='delete'){
		$id=$_GET['id'];
		mysql_query("delete from alternatif where id_alternatif='".$id."'");
		exit("<script>location.href='".$link_list."';</script>");
	}
}


?>

<h3 class="p2">Update Data Alternatif</h3>

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
	<td width="120">Kode Perusahaan <span class="required">*</span> </td>
	<td><input name="kode" type="text" size="40" value="<?php echo $kode;?>" class="m-wrap large"></td>
  </tr>
  <tr>
	<td>Nama Peruahaan <span class="required">*</span> </td>
	<td><input name="nama" type="text" size="40" value="<?php echo $nama;?>" class="m-wrap large"></td>
  </tr>
    <tr>
	<td width="120">Alamat <span class="required">*</span> </td>
	<td><input name="alamat" type="text" class="m-wrap large" id="alamat" value="<?php echo $alamat;?>" size="40"></td>
  </tr>
  <tr>
	<td>NPWP <span class="required">*</span> </td>
	<td><input name="npwp" type="text" class="m-wrap large" id="npwp" value="<?php echo $npwp;?>" size="40"></td>
  </tr>
    <tr>
	<td width="120">Nama Pimpinan  <span class="required">*</span> </td>
	<td><input name="npimpinan" type="text" class="m-wrap large" id="npimpinan" value="<?php echo $npimpinan;?>" size="40"></td>
  </tr>
  <tr>
	<td>Bidang Usaha <span class="required">*</span> </td>
	<td><input name="bidangusaha" type="text" class="m-wrap large" id="bidangusaha" value="<?php echo $bidangusaha;?>" size="40"></td>
  </tr>
    <tr>
	<td>Telp/ Hp <span class="required">*</span> </td>
	<td><input name="telp" type="text" class="m-wrap large" id="telp" value="<?php echo $telp;?>" size="40"></td>
  </tr>
  <tr>
    <td height="52" colspan="2" valign="bottom"><strong>Data Paket Pelelangan:</strong></td>
  </tr>
  <tr>
	<td>Material Alam <span class="required"></span> </td>
	<td>Rp. 
	  <input name="harga1" type="text" class="m-wrap large" id="harga1" value="<?php echo $harga1;?>" size="40"></td>
  </tr>
    <tr>
	<td width="120">Pabrikasi</td>
	<td>Rp. 
	  <input name="harga2" type="text" class="m-wrap large" id="harga2" value="<?php echo $harga2;?>" size="40"></td>
  </tr>
  <tr>
	<td>Mobilisasi</td>
	<td>Rp. 
	  <input name="harga3" type="text" class="m-wrap large" id="harga3" value="<?php echo $harga3;?>" size="40"></td>
  </tr>
  <tr>
	<td></td>
	<td><button type="submit" name="save" class="btn blue"><i class="icon-ok"></i> Simpan</button> 
	<button type="button" name="cancel" class="btn" onclick="location.href='<?php echo $link_list;?>'">Batal</button></td>
  </tr>
</table>
</form>
