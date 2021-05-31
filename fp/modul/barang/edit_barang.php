<div class="col-lg-12">
    <?php 
    if (isset($_POST['edit_simpan'])) {
      $id = $_GET['edit']; 
      $nama_barang= $_POST['nama_barang'];
      $bentuk = $_POST['bentuk'];
      $keterangan = $_POST['keterangan'];
      $jumlah = $_POST['jumlah'];
      $query = mysqli_query($mysqli, "UPDATE barang set NAMA_BARANG='$nama_barang', BENTUK='$bentuk', KETERANGAN_BARANG='$keterangan', JUMLAH='$jumlah' where ID_BARANG= '$id' ")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));

      if ($query) { ?>
      <script language="JavaScript">
        document.location='index.php?page=barang&alert=5';
    </script>
    <?php }} ?>

    <div class="card">
        <div class="card-header">
            <strong>Edit Data Barang</strong>
        </div>
        <div class="card-body card-block">
            <form method="post" enctype="multipart/form-data" class="form-horizontal">

            <?php 
            if (isset($_GET['edit'])) {
              $id = $_GET['edit'];

              $query = mysqli_query($mysqli,"SELECT * FROM barang where ID_BARANG = '$id' ")or die('ada kesalahan pada query tampil data portofolio : '.mysqli_error($mysqli));
              while($data = mysqli_fetch_assoc($query)){
                ?>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Nama</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" name="nama_barang" value="<?php echo $data['NAMA_BARANG']; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Bentuk</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="bentuk" class="form-control" required="required" autofocus="autofocus">
                            <option value="Tablet">Tablet</option>
                            <option value="Kapsul">Kapsul</option>
                            <option value="Sirup">Sirup</option>
                        </select>

                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="textarea-input" class="form-control-label">Keterangan</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="keterangan" class="form-control" required="required" rrequired>
                            <option value="Bagus">Bagus</option>
                            <option value="Rusak">Rusak</option>
                            <option value="-">-</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class="form-control-label">Jumlah</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" name="jumlah" value="<?php echo $data['JUMLAH']; ?>" class="form-control" required>
                    </div>


            <div>
                <button method="POST" class="btn btn-primary" name="edit_simpan">Edit</button>
                <?php
                    if (isset($_POST['edit_simpan'])) 
                    {
                        echo "<div class='alert alert-info'>Data Tersimpan</div>" ;
                        echo "<meta http-equiv='refresh' content='1;url=index.php?page=barang'>";
                     }     
                 ?>
                <a href="index.php?page=barang" class="btn btn-danger">Cancel</a>
            </div>
        </form>
        <?php }} ?>
    </div>
</div>