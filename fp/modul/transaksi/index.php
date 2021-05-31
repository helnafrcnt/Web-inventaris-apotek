<?php if (isset($_GET['delete'])) {
       $id  = $_GET['delete'];
       $id2  = $_GET['delete2'];
       $querydelete = mysqli_query($mysqli, "DELETE FROM transaksi WHERE ID_TRANSAKSI='$id' ")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
       $querydelete2 = mysqli_query($mysqli, "DELETE FROM detail_transaksi WHERE ID_DETAIL_TRANSAKSI='$id2' ")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
       if ($querydelete) {
        echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        <span class="badge badge-pill badge-danger">Sukses</span><br>
        Data berhasil dihapus.  
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    }
    else {
        echo "gagal";
    }
}
?>
<section class="statistic statistic2">
    <div class="container">
        <div class="row">
            <?php  $query=mysqli_query($mysqli, "SELECT SUM(JUMLAH) FROM barang")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
            $data=mysqli_fetch_assoc($query)    
            ?>
            <div class="col-md-6 col-lg-3">
                <div class="statistic__item statistic__item--green">
                    <h2 class="number"><?php echo $data['SUM(JUMLAH)']; ?></h2>
                    <span class="desc">Jumlah Barang</span>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <?php  $query=mysqli_query($mysqli, "SELECT SUM(JUMLAH_KELUAR) FROM transaksi where STATUS_TRANSAKSI = 'Keluar'")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
            $data=mysqli_fetch_assoc($query)    
            ?>
                    <div class="statistic__item statistic__item--orange">
                    <h2 class="number"><?php echo $data['SUM(JUMLAH_KELUAR)']; ?></h2>
                    <h2 class="number"></h2>
                <span class="desc">Barang Keluar</span>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <?php  $query=mysqli_query($mysqli, "SELECT SUM(JUMLAH_MASUK) FROM transaksi where STATUS_TRANSAKSI = 'Masuk' ")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
            $data=mysqli_fetch_assoc($query)    
            ?>
                <div class="statistic__item statistic__item--green">
                    <h2 class="number"><?php echo $data['SUM(JUMLAH_MASUK)']; ?></h2>
                <h2 class="number"></h2>
                <span class="desc">Barang Masuk</span>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <?php  
            $query=mysqli_query($mysqli, "SELECT SUM(JUMLAH) FROM barang where KETERANGAN_BARANG = 'Rusak' ")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
            while($data=mysqli_fetch_assoc($query)){    
                ?>
                <div class="statistic__item statistic__item--red">
                    <h2 class="number"><?php echo $data['SUM(JUMLAH)']; ?></h2>
                    <span class="desc">barang rusak</span>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<!-- STATISTIC-->
<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <?php include 'alert.php'; ?>
        <h3 class="title-5 m-b-35">Data Transaksi</h3>
        <div class="table table-data__tool">
         <form class="form-header" action="" method="POST">
            <input class="au-input au-input--xl" type="text" name="cari"  placeholder="Pencarian ID tok" />
            <button class="btn btn-info" type="submit" name="pencarian">Cari</button>
        </form>
        <div class="table-data__tool-right">
            <a href="index.php?page=tambah_transaksi">
             <button class="btn btn-primary">Tambah Data</button>
         </a>
         <a href="modul/transaksi/cetak_transaksi.php">
             <button class="btn btn-secondary">Cetak</button>
         </a>        
     </div>
 </div>

 <div class="table-responsive table-responsive-data2">
    <table class="table table-data2">
        <thead>
            <tr>
            <th>ID</th>
            <th>Tanggal Transaksi</th>
            <th>Status Transaksi</th>
            <th>Nama</th>
            <th>Jumlah Keluar</th>
            <th>Jumlah Masuk</th>
            <th>Nama Petugas</th>
            </tr>
        </thead>
        <tbody>
         <?php               

         if(isset($_POST['pencarian']))
         {
            $cari = $_POST['cari'];
            $query=mysqli_query($mysqli, "SELECT detail_transaksi.*, transaksi.*, barang.*, petugas.* FROM detail_transaksi
                LEFT JOIN transaksi ON transaksi.ID_TRANSAKSI=detail_transaksi.ID_TRANSAKSI
                LEFT JOIN barang ON barang.ID_BARANG=detail_transaksi.ID_BARANG
                LEFT JOIN petugas ON transaksi.ID_PETUGAS=petugas.ID_PETUGAS
                WHERE transaksi.ID_TRANSAKSI=detail_transaksi.ID_TRANSAKSI && transaksi.ID_TRANSAKSI like '%$cari%' ORDER BY transaksi.ID_TRANSAKSI ASC")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
        }
        else{
            $query=mysqli_query($mysqli, "SELECT detail_transaksi.*, transaksi.*, barang.*, petugas.* FROM detail_transaksi
                LEFT JOIN transaksi ON transaksi.ID_TRANSAKSI=detail_transaksi.ID_TRANSAKSI
                LEFT JOIN barang ON barang.ID_BARANG=detail_transaksi.ID_BARANG
                LEFT JOIN petugas ON transaksi.ID_PETUGAS=petugas.ID_PETUGAS ORDER BY transaksi.ID_TRANSAKSI ASC")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));  
        }
        while ($data = mysqli_fetch_assoc($query)) {
            ?>
            <tr class="tr-shadow">
                <td><?php echo $data['ID_TRANSAKSI']; ?></td>
                <td><?php echo $data['TANGGAL_TRANSAKSI']; ?></td>
                <td><strong><?php echo $data['STATUS_TRANSAKSI']; ?><strong></td>
                <td><?php echo $data['NAMA_BARANG']; ?></td> 
                <td><?php echo $data['JUMLAH_KELUAR']; ?></td>
                <td><?php echo $data['JUMLAH_MASUK']; ?></td> 
                <td><?php echo $data['NAMA_PETUGAS']; ?></td>                                         
                <td>
                    <a data-toggle="tooltip" data-placement="top" title="delete" class="btn btn-danger btn-sm" href="index.php?page=transaksi&delete=<?php echo $data['ID_TRANSAKSI']; ?>&delete2=<?php echo $data['ID_DETAIL_TRANSAKSI']; ?>" onclick="return confirm('apakah anda yakin untuk delete?')">
                        <i class="fas fa-trash"></i>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- END DATA TABLE -->
</div>
</div>