<?php if (isset($_GET['delete'])) {
    $id  = $_GET['delete'];
    $querydelete = mysqli_query($mysqli, "DELETE FROM barang WHERE ID_BARANG='$id' ")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));

    if ($querydelete) {
        echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        <span class="badge badge-pill badge-danger">Sukses</span><br>
        Data berhasil dihapus.  
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    }
}
?>
<div class="row">
    <div class="col-md-12">
        <?php include 'alert.php'; ?>
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Data Barang</h3>
        <div class="table-data__tool">
            <form class="form-header" action="" method="POST">
                <input class="au-input au-input--xl" type="text" name="cari"  placeholder="Pencarian Nama Barang / ID Barang" />
                <button class="btn btn-info" type="submit" name="pencarian">Cari</button>
            </form>
            <div class="table-data__tool-right">
                <a href="index.php?page=tambah_barang">
                   <button class="btn btn-primary">Tambah Data</button>
               </a>     
           </div>
       </div>
       <div class="table-responsive table-responsive-data2">
        <table class="table table-data2">
            <thead>
                <tr>
                    <th>ID BARANG</th>
                    <th>NAMA JENIS</th>
                    <th>NAMA BARANG</th>
                    <th>BENTUK</th>
                    <th>KETERANGAN</th>
                    <th>JUMLAH</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if(isset($_POST['pencarian']))
                {
                    $cari = $_POST['cari'];
                    $query = mysqli_query($mysqli, "SELECT * FROM barang,jenis where barang.ID_JENIS = jenis.ID_JENIS && NAMA_BARANG like '%$cari%' OR barang.ID_JENIS = jenis.ID_JENIS && ID_BARANG like '%$cari%'")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
                }
                else{
                    $query = mysqli_query($mysqli, "SELECT * FROM barang,jenis WHERE barang.ID_JENIS = jenis.ID_JENIS ORDER BY ID_BARANG ASC")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));  
                }
                while ($data = mysqli_fetch_assoc($query)):
                    ?>
                    <tr class="tr-shadow">
                        <td><?php echo $data['ID_BARANG']; ?></td>
                        <td><?php echo $data['NAMA_JENIS']; ?></td>
                        <td><?php echo $data['NAMA_BARANG']; ?></td>
                        <td><?php echo $data['BENTUK']; ?></td>
                        <td><?php echo $data['KETERANGAN_BARANG']; ?></td>
                        <td><?php echo $data['JUMLAH']; ?></td>
                        <td>
                            <a data-toggle="tooltip" data-placement="top" title="edit" class="btn btn-secondary btn-sm" href="index.php?page=edit_barang&edit=<?php echo $data['ID_BARANG']; ?>"  onclick="return confirm('apakah anda yakin untuk edit <?php echo $data['NAMA_BARANG']; ?> ?')">
                                <i class=" fas fa-edit"></i>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="delete" class="btn btn-danger btn-sm" href="index.php?page=barang&delete=<?php echo $data['ID_BARANG']; ?>" onclick="return confirm('apakah anda yakin untuk delete <?php echo $data['NAMA_BARANG']; ?> ?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endwhile;?>
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>