<!DOCTYPE html>
<html>
<head>
	<title>Rapor Siswa</title>
	<style type="text/css">
		td{
			padding: 5px;
		}
		table{
			font-size: 11px;
		}
	</style>
</head>
<body>
	<?php 
	include 'koneksi.php';
	@$nisn = $_GET['nisn'];
	@$sem = $_GET['sem'];
	$query_siswa = mysqli_query($conn, "SELECT biodata.*, nilai.*, kelas.kode_kelas, kelas.tahun FROM biodata, nilai, kelas WHERE biodata.nisn = nilai.nisn AND nilai.nisn = '$nisn' AND nilai.sem = '$sem' AND id_siswa = '$nisn' ");
	// echo mysqli_error($conn);
	$siswa = mysqli_fetch_array($query_siswa);
	if ($siswa[14]==1&&$siswa[14]==2) {
		$kelas_r = 'X';
		$kelas_a = '10';
	}elseif ($siswa[14]==3&&$siswa[14]==4) {
		$kelas_r = 'XI';
		$kelas_a = '11';
	}elseif ($siswa[14]==5&&$siswa[14]==6) {
		$kelas_r = 'XII';
		$kelas_a = '12';
	}

	if ($siswa[14]==1){
		$sem_r = 'I';
	}elseif ($siswa[14]==2){
		$sem_r = 'II';
	}elseif ($siswa[14]==3){
		$sem_r = 'III';
	}elseif ($siswa[14]==4){
		$sem_r = 'IV';
	}elseif ($siswa[14]==5){
		$sem_r = 'V';
	}elseif ($siswa[14]==6){
		$sem_r = 'VI';
	}

	$semester = $siswa['sem']%2;

	if ($semester==0) {
		$semes = 'Genap';
	}else{
		$semes = 'Ganjil';
	}

	 ?>
	<table width="90%" align="center" style="margin-top: 3%; font-family: arial;">
		<tr>
			<td width="20%">Nama Sekolah</td>
			<td>: Sekolah Menengah Kejuruan Negeri 2 Padang Panjang</td>
			<td width="20%">Kelas</td>
			<td>: <?php echo ucwords($siswa['kode_kelas']); ?></td>
		</tr>
		<tr>
			<td width="20%">Alamat</td>
			<td>: Jln. Syekh Ibrahim Musa No.26 RT VI</td>
			<td width="20%">Semester</td>
			<td>: <?php echo $sem_r.' / '.$semes; ?></td>
		</tr>
		<tr>
			<td width="20%">Nama Peserta Didik</td>
			<td>: <?php	echo ucwords($siswa['nama_lengkap']); ?></td>
			<td width="20%">Tahun Pelajaran</td>
			<td>: <?php $te = $siswa['tahun']+1;echo $siswa['tahun'].'/'.$te; ?></td>
		</tr>
		<tr>
			<td  width="20%">NISN</td>
			<td >: <?php echo ucwords($siswa['nisn']); ?></td>
		</tr>
	</table>

	<table width="90%"  align="center" style="font-family: arial;" >
		<tr>
			<td><p><b>CAPAIAN HASIL BELAJAR <br> A. Sikap</b></p></td>
		</tr>
	</table>

	<?php 
		$sikap_query = mysqli_query($conn, "SELECT * FROM sikap WHERE nisn = '$nisn' AND sem = '$sem' ");
		$sikap = mysqli_fetch_array($sikap_query);
	 ?>

	<table width="90%" border="1" align="center" style="font-family: arial;" >
		<tr>
			<td><p style="margin: 5px">Predikat Sikap Spiritual : <?php echo $sikap[3] ?></p>
				<p style="margin: 5px; margin-bottom: 20px">Deskripsi : <?php echo $sikap[4] ?> </p>
				<p style="margin: 5px">Predikat Sikap Sosial : <?php echo $sikap[5] ?></p>
				<p style="margin: 5px;">Deskripsi : <?php echo $sikap[6] ?></p>
			</td>
		</tr>
	</table>

	<table width="90%"  align="center" style="font-family: arial;" >
		<tr>
			<td><p><b>B. Pengetahuan dan Keterampilan</b></p></td>
		</tr>
	</table>

	<table width="90%" border="1" align="center" style="font-family: arial;" >
		<tr align="center">
			<td rowspan="2">No</td>
			<td rowspan="2">Mata Pelajaran</td>
			<td colspan="4">Pengetahuan</td>
			<td colspan="4">Keterampilan</td>
		</tr>
		<tr align="center">
			<td>KB</td>
			<td>Angka</td>
			<td>Predikat</td>
			<td>Deskripsi</td>
			<td>KB</td>
			<td>Angka</td>
			<td>Predikat</td>
			<td>Deskripsi</td>
		</tr>
		<tr>
			<td colspan="10">A. Muatan Nasional</td>
		</tr>
		<?php 
			$nilai_a_query = mysqli_query($conn, "SELECT nilai.*, mapel.jenis, mapel.nama_mapel, mapel.kkm FROM nilai, mapel WHERE nisn = '$nisn' AND sem = '$sem' AND nilai.id_mapel = mapel.id_mapel AND mapel.jenis = '1'");
			$no = 1;
			while ($nilai_a = mysqli_fetch_array($nilai_a_query)) {
		 	if ($nilai_a['nilai1']>=86 && $nilai_a['nilai1']<=100) {
		 		$pred1 = 'A';
		 	}elseif ($nilai_a['nilai1']>=76 && $nilai_a['nilai1']<=85) {
		 		$pred1 = 'B';
		 	}elseif ($nilai_a['nilai1']>=66 && $nilai_a['nilai1']<=75) {
		 		$pred1 = 'C';
		 	}elseif ($nilai_a['nilai1']>=56 && $nilai_a['nilai1']<=65) {
		 		$pred1 = 'D';
		 	}elseif ($nilai_a['nilai1']>=0 && $nilai_a['nilai1']<=55) {
		 		$pred1 = 'E';
		 	}

		 	if ($nilai_a['nilai2']>=86 && $nilai_a['nilai2']<=100) {
		 		$pred2 = 'A';
		 	}elseif ($nilai_a['nilai2']>=76 && $nilai_a['nilai2']<=85) {
		 		$pred2 = 'B';
		 	}elseif ($nilai_a['nilai2']>=66 && $nilai_a['nilai2']<=75) {
		 		$pred2 = 'C';
		 	}elseif ($nilai_a['nilai2']>=56 && $nilai_a['nilai2']<=65) {
		 		$pred2 = 'D';
		 	}elseif ($nilai_a['nilai2']>=0 && $nilai_a['nilai2']<=55) {
		 		$pred2 = 'E';
		 	}
		 ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $nilai_a['nama_mapel'] ?></td>
			<td><?php echo $nilai_a['kkm'] ?></td>
			<td><?php echo $nilai_a['nilai1'] ?></td>
			<td><?php echo $pred1 ?></td>
			<td><?php echo $nilai_a['desk1'] ?></td>
			<td><?php echo $nilai_a['kkm'] ?></td>
			<td><?php echo $nilai_a['nilai2'] ?></td>
			<td><?php echo $pred2 ?></td>
			<td><?php echo $nilai_a['desk2'] ?></td>
		</tr>
	<?php } ?>
		<tr>
			<td colspan="10"><b>B. Muatan Wilayah</b></td>
		</tr>
		<?php 
			$nilai_a_query = mysqli_query($conn, "SELECT nilai.*, mapel.jenis, mapel.nama_mapel, mapel.kkm FROM nilai, mapel WHERE nisn = '$nisn' AND sem = '$sem' AND nilai.id_mapel = mapel.id_mapel AND mapel.jenis = '2'");
			$no = 1;
			while ($nilai_a = mysqli_fetch_array($nilai_a_query)) {
		 	if ($nilai_a['nilai1']>=86 && $nilai_a['nilai1']<=100) {
		 		$pred1 = 'A';
		 	}elseif ($nilai_a['nilai1']>=76 && $nilai_a['nilai1']<=85) {
		 		$pred1 = 'B';
		 	}elseif ($nilai_a['nilai1']>=66 && $nilai_a['nilai1']<=75) {
		 		$pred1 = 'C';
		 	}elseif ($nilai_a['nilai1']>=56 && $nilai_a['nilai1']<=65) {
		 		$pred1 = 'D';
		 	}elseif ($nilai_a['nilai1']>=0 && $nilai_a['nilai1']<=55) {
		 		$pred1 = 'E';
		 	}

		 	if ($nilai_a['nilai2']>=86 && $nilai_a['nilai2']<=100) {
		 		$pred2 = 'A';
		 	}elseif ($nilai_a['nilai2']>=76 && $nilai_a['nilai2']<=85) {
		 		$pred2 = 'B';
		 	}elseif ($nilai_a['nilai2']>=66 && $nilai_a['nilai2']<=75) {
		 		$pred2 = 'C';
		 	}elseif ($nilai_a['nilai2']>=56 && $nilai_a['nilai2']<=65) {
		 		$pred2 = 'D';
		 	}elseif ($nilai_a['nilai2']>=0 && $nilai_a['nilai2']<=55) {
		 		$pred2 = 'E';
		 	}
		 ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $nilai_a['nama_mapel'] ?></td>
			<td><?php echo $nilai_a['kkm'] ?></td>
			<td><?php echo $nilai_a['nilai1'] ?></td>
			<td><?php echo $pred1 ?></td>
			<td><?php echo $nilai_a['desk1'] ?></td>
			<td><?php echo $nilai_a['kkm'] ?></td>
			<td><?php echo $nilai_a['nilai2'] ?></td>
			<td><?php echo $pred2 ?></td>
			<td><?php echo $nilai_a['desk2'] ?></td>
		</tr>
	<?php } 

		$nilaiakhir_query = mysqli_query($conn, "SELECT SUM(nilai1) as np, SUM(nilai2) as nk, COUNT(nilai1) as tot FROM nilai INNER JOIN mapel on nilai.id_mapel=mapel.id_mapel WHERE nisn = '$nisn' AND sem = '$sem'");
		$nilaiakhir = mysqli_fetch_array($nilaiakhir_query);

		// $rangking_query = mysqli_query($conn, "SELECT (SELECT FIND_IN_SET(SUM(nilai1) as np, (SELECT GROUP_CONCAT(DISTINCT np ORDER BY np DESC separator ',') FROM nilai))) as rangking FROM nilai WHERE nisn = '$nisn' AND sem = '$sem'");
		// $rangking = mysqli_fetch_array($rangking_query);

		$jumlah_query = mysqli_query($conn, "SELECT COUNT(id_siswa) as jum FROM kelas WHERE sem = '$sem' AND kode_kelas = '$siswa[kode_kelas]'");
		$jumlah = mysqli_fetch_array($jumlah_query);
		echo mysqli_error($conn);
        $rp = $nilaiakhir['np'] / $nilaiakhir['tot'];
        $rk = $nilaiakhir['nk'] / $nilaiakhir['tot'];
        $jumlah_nilai = $nilaiakhir['nk']+$nilaiakhir['np'];
        $jumlah_rata = ($rp + $rk)/2;
		

	?>
<?php 
$query_jumlah = "SELECT * FROM kelas WHERE sem = '$sem' AND kode_kelas = '$siswa[kode_kelas]'";
$jumlah_query = mysqli_query($conn, $query_jumlah);

$siswa=array();
$i=0;
		while ($jumlah = mysqli_fetch_array($jumlah_query)) {
			${'siswa'.$i}=array();
			${'siswa'.$i}['id_siswa']=$jumlah['id_siswa'];
			${'query_nilai'.$i} = "SELECT SUM(nilai1) as np FROM nilai INNER JOIN mapel on nilai.id_mapel=mapel.id_mapel WHERE nisn=$jumlah[id_siswa]";
			${'nilai_query'.$i}= mysqli_query($conn, ${'query_nilai'.$i});
			${'totalquery'.$i}= mysqli_fetch_array(${'nilai_query'.$i});
			${'siswa'.$i}['totalnilai'] = ${'totalquery'.$i}['np'];
			${'siswa'.$i}['id_siswa']=$jumlah['id_siswa'];
			$siswa[]=${'siswa'.$i};
			$i++;
		}
		// print_r($siswa);

		foreach ($siswa as $key => $row) {
			$id_siswa[$key]  = $row['id_siswa'];
			$totalnilai[$key]  = $row['totalnilai'];
			}
			$totalnilai  = array_column($siswa, 'totalnilai');
			$id_siswa = array_column($siswa, 'id_siswa');
			array_multisort($totalnilai, SORT_DESC, $id_siswa, SORT_ASC, $siswa);
$arraySiswa=array();
$j=0;
foreach ($siswa as $key => $row) {
	${'siswa'.$j}=array();
	${'siswa'.$j}['id_siswa']= $row['id_siswa'];
	${'siswa'.$j}['totalnilai']= $row['totalnilai'];
	${'siswa'.$j}['rangking']=$j+1;
	$arraySiswa[]=${'siswa'.$j};
	if ($row['id_siswa']==$nisn) {
		$rangking = ${'siswa'.$j}['rangking'];
	}
	$j++;
	}
 ?>
		<tr>
			<td colspan="2">Jumlah Nilai</td>
			<td align="center"> = </td>
			<td colspan="7"><?php echo $jumlah_nilai ?></td>
		</tr>
		<tr>
			<td colspan="2">Jumlah Rata-rata</td>
			<td align="center"> = </td>
			<td colspan="7"><?php echo number_format($jumlah_nilai/$nilaiakhir['tot']/2,2) ?></td>
		</tr>
		<tr>
			<td colspan="2">Peringkat</td>
			<td align="center"> = </td>
			<td colspan="7"><?php echo $rangking?></td>
		</tr>
	</table>

	<table width="90%"  align="center" style="font-family: arial;" >
		<tr>
			<td><p><b>C. Praktek Kerja Lapangan</b></p></td>
		</tr>
	</table>
	<table width="90%"  border="1" align="center" style="font-family: arial;" >
		<tr align="">
			<td width="2%">No</td>
			<td align="center">Mitra DU/DI</td>
			<td align="center" >Lokasi</td>
			<td align="center">Lamanya (bulan)</td>
			<td align="center">Keterangan</td>
		</tr>
		<tr>
			<td>1</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>2</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>3</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</table>

	<table width="90%"  align="center" style="font-family: arial;" >
		<tr>
			<td><p><b>D. Ekstra Kurikuler</b></p></td>
		</tr>
	</table>
	<table width="90%"  border="1" align="center" style="font-family: arial;" >
		<tr align="">
			<td width="5%" align="center">No</td>
			<td width="35%" align="center" >Kegiatan Ektrakurikuler</td>
			<td width="60%" align="center">Keterangan</td>
		</tr>
		<tr>
			<td align="center">1</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td align="center">2</td>
			<td></td>
			<td></td>
		</tr>
	</table>

	<table width="90%"  align="center" style="font-family: arial;" >
		<tr>
			<td><p><b>E. Prestasi</b></p></td>
		</tr>
	</table>
	<table width="90%"  border="1" align="center" style="font-family: arial;" >
		<tr align="">
			<td width="5%" align="center">No</td>
			<td width="35%" align="center">Jenis Prestasi</td>
			<td width="60%" align="center">Keterangan</td>
		</tr>
		<tr>
			<td align="center">1</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td align="center">2</td>
			<td></td>
			<td></td>
		</tr>
	</table>


	<?php 
	$ket_query = mysqli_query($conn, "SELECT * FROM keterangan WHERE nisn = '$nisn' AND sem = '$sem' ");
	$ket = mysqli_fetch_array($ket_query);
	echo mysqli_error($conn);
	 ?>
	<table width="90%"  align="center" style="font-family: arial;" >
		<tr>
			<td><p><b>F. Ketidakhadiran</b></p></td>
		</tr>
	</table>
	<table width="90%"  border="1" align="center" style="font-family: arial; " >
		<tr>
			<td width="20%">Sakit</td>
			<td> : <?php echo $ket['sakit'] ?> <b style="margin-right: 90%; float: right;">Hari</b></td>
		</tr>
		<tr>
			<td width="20%">Izin</td>
			<td> : <?php echo $ket['izin'] ?><b style="margin-right: 90%; float: right;">Hari</b></td>
		</tr>
		<tr>	
			<td width="20%">Absen</td>
			<td> : <?php echo $ket['absen'] ?><b style="margin-right: 90%; float: right;">Hari</b></td>
		</tr>
	</table>

	<table width="90%"  align="center" style="font-family: arial;" >
		<tr>
			<td><p><b>G. Catatan Wali Kelas</b></p></td>
		</tr>
	</table>
	<table width="90%"  border="1" align="center" style="font-family: arial;" >
		<tr height="70px">	
			<td><?php echo $ket['cat'] ?></td>
		</tr>
	</table>

	<table width="90%"  align="center" style="font-family: arial;" >
		<tr>
			<td><p><b>H. Tanggapan Orang Tua/Wali</b></p></td>
		</tr>
	</table>
	<table width="90%"  border="1" align="center" style="font-family: arial;" >
		<tr height="70px">	
			<td></td>
		</tr>
	</table>

	<?php
function tgl_indo($tanggal){
  $bulan = array (
    1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
  $pecahkan = explode('-', $tanggal);
  return $pecahkan[2].' '.$bulan[(int)$pecahkan[1]].' '.$pecahkan[0];
}
	 ?>
	<table width="90%"  align="center" style="font-family: arial; margin-top: 30px" >
		<tr>
			<td></td>
			<td>Padang Panjang, <?php echo tgl_indo(date('Y-m-d')) ?></td>
		</tr>
		<tr>	
			<td>Mengetahui :</td>
			<td width="30%">Wali Kelas,</td>
		</tr>
		<tr>	
			<td>Orang Tua/Wali</td>
			<td width="30%"></td>
		</tr>
		<tr height="80px">	
			<td></td>
			<td></td>
		</tr>
		<tr>	
			<td></td>
			<td>YUSMA ELDA, S.Pd</td>
		</tr>
		<tr>	
			<td>_______________________</td>
			<td>NIP.19750414 200802 2 001</td>
		</tr>
	</table>




      <script>
        window.print();
      </script>
</body>
</html>