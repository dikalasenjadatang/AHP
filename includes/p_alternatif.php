<?php

$link_list='?hal=data_alternatif';
$link_update='?hal=update_alternatif';

$q="select * from alternatif order by nama";
$q=mysql_query($q);
if(mysql_num_rows($q) > 0){
	while($h=mysql_fetch_array($q)){
		$no++;
		$id=$h['id_alternatif'];
		$allow_del=true;
		if(mysql_num_rows(mysql_query("select * from nilai_alternatif where id_alternatif_1='".$h['id_alternatif']."' limit 0,1"))>0){$allow_del=false;}
		if(mysql_num_rows(mysql_query("select * from nilai_alternatif where id_alternatif_2='".$h['id_alternatif']."' limit 0,1"))>0){$allow_del=false;}
		if($allow_del){$disabled='';}else{$disabled='disabled';}
		$daftar.='
		  <tr>
			<td valign="top">'.$no.'</td>
			<td valign="top">'.$h['kode'].'</td>
			<td valign="top">'.$h['nama'].'</td>
			<td valign="top">'.$h['npimpinan'].'</td>
			<td valign="top">'.$h['harga1'].'</td>
			<td valign="top">'.$h['harga2'].'</td>
			<td valign="top">'.$h['harga3'].'</td>
			<td align="center" valign="top"><a href="'.$link_update.'&amp;id='.$id.'&amp;action=edit" class="btn"><i class="icon-edit"></i></a> <a href="#" onclick="DeleteConfirm(\''.$link_update.'&amp;id='.$id.'&amp;action=delete\');return(false);" class="btn '.$disabled.'"><i class="icon-trash"></i></a></td>
		  </tr>
		';
	}
}


?>
<script language="javascript">
function DeleteConfirm(url){
	if (confirm("Anda yakin akan menghapus data ini ?")){
		window.location.href=url;
	}
}
</script>

<h3 class="p2">Data Perusahaan </h3>
<a href="<?php echo $link_update;?>" class="btn blue" style="float:right"><i class="icon-plus"></i> Tambah data alternatif</a><br /><br />
<table width="775" class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th width="40">No</th>
			<th width="69">Kode</th>
			<th width="144">Alternatif</th>
			<th width="103"> Pimpinan</th>
			<th width="80">Alam</th>
			<th width="82">Pabrikasi</th>
			<th width="70">Mobilisasi</th>
			<th width="233" align="right">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php echo $daftar;?>
	</tbody>
</table>
