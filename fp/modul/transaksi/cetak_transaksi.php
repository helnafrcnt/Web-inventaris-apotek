<?php 
include '../../session.php';
?>

<?php
header("Content-type: application/vnd.ms word");
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=data transaksi.doc");
header("Pragma: no-cache");
header("Expires: 0");
header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
?>	

<table align="center" border="0" cellpadding="0" cellspacing="0">
	<h3 align="center"><font color="black">Data Apotek</font></h3>
	<table border="1" align="center" cellpadding="5" cellspacing="0">
		<tr>
            <th>ID</th>
            <th>Tanggal Transaksi</th>
            <th>Status Transaksi</th>
            <th>Nama</th>
            <th>Jumlah Masuk</th>
            <th>Jumlah Keluar</th>
            <th>Nama Petugas</th>
        </tr>
	</thead>
	<tbody>
		<?php 
		$query=mysqli_query($mysqli, "SELECT * FROM transaksi,barang,petugas WHERE transaksi.ID_PETUGAS = petugas.ID_PETUGAS && transaksi.ID_BARANG = barang.ID_BARANG ORDER BY ID_TRANSAKSI DESC")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli)); 

		while ($data = mysqli_fetch_assoc($query)) {
			?>
			<tr>
				<td><?php echo $data['ID_TRANSAKSI']; ?></td>
                <td><?php echo $data['TANGGAL_TRANSAKSI']; ?></td>
                <td><strong><?php echo $data['STATUS_TRANSAKSI']; ?><strong></td>
                <td><?php echo $data['NAMA_BARANG']; ?></td>
                <td><?php echo $data['JUMLAH_MASUK']; ?></td> 
                <td><?php echo $data['JUMLAH_KELUAR']; ?></td> 
                <td><?php echo $data['NAMA_PETUGAS']; ?></td>                                         
                <td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	
	<!-- END DATA TABLE -->