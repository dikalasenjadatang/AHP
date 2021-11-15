<?php

require_once ( 'ahp.php' );

$q="select * from kriteria order by nama";
$q=mysql_query($q);
while($h=mysql_fetch_array($q)){
	$kriteria[]=array($h['id_kriteria'],$h['kode'],$h['nama']);
}
$q="select * from alternatif order by nama";
$q=mysql_query($q);
while($h=mysql_fetch_array($q)){
	$alternatif[]=array($h['id_alternatif'],$h['kode'],$h['nama']);
}

for($i=0;$i<count($kriteria);$i++){
	$id_kriteria[]=$kriteria[$i][0];
}
$matrik_kriteria = ahp_get_matrik_kriteria($id_kriteria);
$jumlah_kolom = ahp_get_jumlah_kolom($matrik_kriteria);
$matrik_normalisasi = ahp_get_normalisasi($matrik_kriteria, $jumlah_kolom);
$eigen_kriteria = ahp_get_eigen($matrik_normalisasi);

for($i=0;$i<count($alternatif);$i++){
	$id_alternatif[]=$alternatif[$i][0];
}
for($i=0;$i<count($kriteria);$i++){
	$matrik_alternatif = ahp_get_matrik_alternatif($kriteria[$i][0], $id_alternatif);
	$jumlah_kolom_alternatif = ahp_get_jumlah_kolom($matrik_alternatif);
	$matrik_normalisasi_alternatif = ahp_get_normalisasi($matrik_alternatif, $jumlah_kolom_alternatif);
	$eigen_alternatif[$i] = ahp_get_eigen($matrik_normalisasi_alternatif);
}

$nilai_to_sort = array();

for($i=0;$i<count($alternatif);$i++){
	$nilai=0;
	for($ii=0;$ii<count($kriteria);$ii++){
		$nilai = $nilai + ( $eigen_alternatif[$ii][$i] * $eigen_kriteria[$ii]);
	}
	$nilai = round( $nilai , 3);
	$nilai_global[$i] = $nilai;
	$nilai_to_sort[] = array($nilai, $alternatif[$i][0]);
}

sort($nilai_to_sort);
for($i=0;$i<count($nilai_to_sort);$i++){
	$ranking[$nilai_to_sort[$i][1]]=(count($nilai_to_sort) - $i);
}


?>
<h3 class="p2">Hasil Perusahaan </h3>
<table class="table table-striped table-hover table-bordered">
	<tdead>
		<tr>
			<td colspan="50">NILAI PERBANDINGAN</td>
		</tr>
		<tr>
			<td width="40">No</td>
			<td>Kriteria</td>
			<?php
			for($i=0;$i<count($kriteria);$i++){
				echo '<td>'.$kriteria[$i][1].'</td>';
			}
			?>
		</tr>
	</thead>
	<tbody>
		<?php
		for($i=0;$i<count($kriteria);$i++){
			echo '
				<tr>
					<td>'.($i+1).'</td>
					<td>'.$kriteria[$i][1].' - '.$kriteria[$i][2].'</td>
			';
			
			for($ii=0;$ii<count($kriteria);$ii++){
				echo '
						<td>'.$matrik_kriteria[$i][$ii].'</td>
				';
			}
			echo '
				</tr>
			';
		}
		?>
		<tr>
			<td></td>
			<td>Jumlah Kolom</td>
			<?php
			for($i=0;$i<count($kriteria);$i++){
				echo '<td>'.$jumlah_kolom[$i].'</td>';
			}
			?>
		</tr>
	</tbody>
</table>

<table class="table table-striped table-hover table-bordered">
	<tdead>
		<tr>
			<td colspan="50">NORMALISASI MATRIX </td>
		</tr>
		<tr>
			<td width="40">No</td>
			<td>Kriteria</td>
			<?php
			for($i=0;$i<count($kriteria);$i++){
				echo '<td>'.$kriteria[$i][1].'</td>';
			}
			?>
			<td>Eigen Vektor </td>
		</tr>
	</thead>
	<tbody>
		<?php
		for($i=0;$i<count($kriteria);$i++){
			echo '
				<tr>
					<td>'.($i+1).'</td>
					<td>'.$kriteria[$i][1].' - '.$kriteria[$i][2].'</td>
			';
			
			for($ii=0;$ii<count($kriteria);$ii++){
				echo '
						<td>'.$matrik_normalisasi[$i][$ii].'</td>
				';
			}
			echo '
					<td>'.$eigen_kriteria[$i].'</td>
				</tr>
			';
		}
		?>
	</tbody>
</table>


<table class="table table-striped table-hover table-bordered">
	<tdead>
		<tr>
			<td colspan="50">EIGEN KRITERIA DAN PERUSAHAAN </td>
		</tr>
		<tr>
			<td width="40">No</td>
			<td>Perusahaan</td>
			<?php
			for($i=0;$i<count($kriteria);$i++){
				echo '<td>'.$kriteria[$i][1].'</td>';
			}
			?>
			<td>Nilai</td>
			<td>Ranking</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td></td>
			<td>Vektor Eigen</td>
			<?php
			for($i=0;$i<count($kriteria);$i++){
				echo '<td>'.$eigen_kriteria[$i].'</td>';
			}
			?>
			<td></td>
			<td></td>
		</tr>
		<?php
		for($i=0;$i<count($alternatif);$i++){
			echo '
				<tr>
					<td>'.($i+1).'</td>
					<td>'.$alternatif[$i][1].' - '.$alternatif[$i][2].'</td>
			';
			for($ii=0;$ii<count($kriteria);$ii++){
				echo '
						<td>'.$eigen_alternatif[$ii][$i].'</td>
				';
				
			}
			echo '
					<td><strong>'.$nilai_global[$i].'</strong></td>
					<td>'.$ranking[$alternatif[$i][0]].'</td>
				</tr>
			';
		}
		?>
	</tbody>
</table>
<h3 class="p2">Hasil Pemenangan Tender </h3>
<table class="table table-striped table-hover table-bordered">
	 <tr>
	 <td colspan="4" bgcolor="#FFFFFF">Pemenang Untuk Pengadaan Material Alam</td>
	 </tr>
       <tr>
         <td width="25" bgcolor="#CCCCCC"><div align="left" class="style11">No.</div></td>
         <td width="120" bgcolor="#CCCCCC"><div align="left" class="style11">Alternatif</div></td>
		 <td width="74" bgcolor="#CCCCCC"><div align="left" class="style11">Harga</div></td>
         <td width="111" bgcolor="#CCCCCC"><div align="left" class="style11">Pemenang Ke</div></td>
  	  </tr>
       <?php
	   include "config.php";
    $shry = mysql_query("select *from alternatif ORDER BY harga1 ASC");
        while ($hry = mysql_fetch_array($shry)) {
		$no++;
    ?>
       <tr>
         <td height="31" bgcolor="#FFFFFF"><div align="left" class="style11"><?php echo $no; ?></div></td>
           <td bgcolor="#FFFFFF"><div align="left" class="style11"><?php echo $hry['nama']; ?></div></td>
           <td bgcolor="#FFFFFF"><div align="left" class="style11">Rp. <?php echo $hry['harga1']; ?></div></td>
           <td bgcolor="#FFFFFF"><div align="left" class="style11"><?php echo $no; ?></div></td>
       </tr>
       <?php
    }
    ?>
</table>
<table class="table table-striped table-hover table-bordered">
	 <tr>
	 <td colspan="4" bgcolor="#FFFFFF">Pemenang Untuk Pengadaan Material Pabrikasi</td>
	 </tr>
       <tr>
         <td width="25" bgcolor="#CCCCCC"><div align="left" class="style11">No.</div></td>
         <td width="118" bgcolor="#CCCCCC"><div align="left" class="style11">Alternatif</div></td>
		 <td width="76" bgcolor="#CCCCCC"><div align="left" class="style11">Harga</div></td>
         <td width="111" bgcolor="#CCCCCC"><div align="left" class="style11">Pemenang Ke</div></td>
  	  </tr>
       <?php
	   include "config.php";
    $shry = mysql_query("select *from alternatif ORDER BY harga2 ASC");
        while ($hry = mysql_fetch_array($shry)) {
		$n++;
    ?>
       <tr>
         <td height="31" bgcolor="#FFFFFF"><div align="left" class="style11"><?php echo $n; ?></div></td>
           <td bgcolor="#FFFFFF"><div align="left" class="style11"><?php echo $hry['nama']; ?></div></td>
           <td bgcolor="#FFFFFF"><div align="left" class="style11">Rp. <?php echo $hry['harga2']; ?></div></td>
           <td bgcolor="#FFFFFF"><div align="left" class="style11"><?php echo $n; ?></div></td>
       </tr>
       <?php
    }
    ?>
</table>
<table class="table table-striped table-hover table-bordered">
	 <tr>
	 <td colspan="4" bgcolor="#FFFFFF">Pemenang Untuk Pengadaan Mobilisasi</td>
	 </tr>
       <tr>
         <td width="25" bgcolor="#CCCCCC"><div align="left" class="style11">No.</div></td>
         <td width="118" bgcolor="#CCCCCC"><div align="left" class="style11">Alternatif</div></td>
		 <td width="74" bgcolor="#CCCCCC"><div align="left" class="style11">Harga</div></td>
         <td width="113" bgcolor="#CCCCCC"><div align="left" class="style11">Pemenang Ke</div></td>
  	  </tr>
       <?php
	   include "config.php";
    $shry = mysql_query("select *from alternatif ORDER BY harga3 ASC");
        while ($hry = mysql_fetch_array($shry)) {
		$nn++;
    ?>
       <tr>
         <td height="31" bgcolor="#FFFFFF"><div align="left" class="style11"><?php echo $nn; ?></div></td>
           <td bgcolor="#FFFFFF"><div align="left" class="style11"><?php echo $hry['nama']; ?></div></td>
           <td bgcolor="#FFFFFF"><div align="left" class="style11">Rp. <?php echo $hry['harga3']; ?></div></td>
           <td bgcolor="#FFFFFF"><div align="left" class="style11"><?php echo $nn; ?></div></td>
       </tr>
       <?php
    }
    ?>
</table>

