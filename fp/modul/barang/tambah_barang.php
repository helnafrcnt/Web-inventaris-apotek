<div class="col-lg-12">
    <?php 
    if (isset($_POST['add'])) {
        $id_barang = $_POST['id_barang'];
        $id_jenis=$_POST['id_jenis'];
        $nama_barang= $_POST['nama_barang'];
        $keterangan = $_POST['keterangan'];
        $jumlah = $_POST['jumlah'];
        $total = $_POST['jumlah'];
        $bentuk = $_POST['bentuk'];

        $ID_TRANSAKSI = @$_POST['ID_TRANSAKSI'];
        $TANGGAL_TRANSAKSI =@$_POST['TANGGAL_TRANSAKSI'];
        $ID_PETUGAS = @$_POST['ID_PETUGAS'];
        $ID_BARANG = @$_POST['id_barang'];
        $JUMLAH_MASUK = @$_POST['jumlah'];
        $STATUS_TRANSAKSI = @$_POST['STATUS_TRANSAKSI'];

        $query = mysqli_query($mysqli, "INSERT INTO barang (ID_BARANG, ID_JENIS, NAMA_BARANG, BENTUK, KETERANGAN_BARANG, JUMLAH, TOTAL)
        VALUES('$id_barang', '$id_jenis', '$nama_barang', '$bentuk', '$keterangan', '$jumlah', '$total')") or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
        $query1 = mysqli_query($mysqli, "INSERT INTO transaksi (ID_TRANSAKSI, TANGGAL_TRANSAKSI, STATUS_TRANSAKSI,ID_BARANG , JUMLAH_MASUK, ID_PETUGAS)
        VALUES ('$ID_TRANSAKSI','$TANGGAL_TRANSAKSI','$STATUS_TRANSAKSI','$ID_BARANG','$JUMLAH_MASUK', '$ID_PETUGAS')") or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
        $query2 = mysqli_query($mysqli, "INSERT INTO detail_transaksi (ID_TRANSAKSI, ID_BARANG)
        VALUES('$ID_TRANSAKSI', '$ID_BARANG')") or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
        if ($query && $query1 && $query2) { ?>
        <script language="JavaScript">
            document.location='index.php?page=barang&alert=4';
        </script>

        <?php }} ?>
        <div class="card">
            <div class="card-header">
                <strong>Tambah Data Barang</strong> 
            </div>
            <div class="card-body card-block">
                <form method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">ID Barang</label>
                        </div>
                        <?php 
                        $query = mysqli_query($mysqli, "SELECT * FROM barang ORDER BY ID_BARANG DESC")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
                        $data=mysqli_fetch_assoc($query)
                        ?>
                        <?php 
                        date_default_timezone_set('Asia/Jakarta');
                        $transaksi= date("Y-m-d h:i");
                        $query = mysqli_query($mysqli, "SELECT * FROM transaksi ORDER BY ID_TRANSAKSI DESC")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
                        $data1=mysqli_fetch_assoc($query) 
                        ?>
                        <div class="col-12 col-md-9">
                            <input type="number" name="id_barang" value="<?php echo $data['ID_BARANG']+1; ?>" class="form-control" required>
                        </div>
                    </div>
                            <input type="hidden" id="text-input" name="ID_TRANSAKSI" value="<?php echo $data1['ID_TRANSAKSI']+1; ?>" class="form-control" >
                            <input type="hidden" id="text-input" name="TANGGAL_TRANSAKSI" value="<?php echo $transaksi ?>" class="form-control" >
                        
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Petugas</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="ID_PETUGAS" class="form-control" required="required" autofocus="autofocus">
                                        <option>Pilih Petugas</option>
                                        <?php
                                        $query = mysqli_query($mysqli, "SELECT * FROM petugas ORDER BY NAMA_PETUGAS");
                                        while ($data2=mysqli_fetch_assoc($query)) {
                                            ?>
                                        <option value="<?php echo $data2['ID_PETUGAS']; ?>"><?php echo $data2['NAMA_PETUGAS']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <input type="hidden" id="text-input" name="STATUS_TRANSAKSI" value="Masuk" class="form-control" >              

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Jenis</label>
                            </div>
                            <div class="col-12 col-md-9">

                                <select name="id_jenis" class="form-control" required="required" autofocus="autofocus">
                                    <option>Pilih Jenis</option>
                                    <?php 
                                    $query = mysqli_query($mysqli, "SELECT * FROM jenis ORDER BY NAMA_JENIS");
                                    while ($data=mysqli_fetch_assoc($query)) {
                                        ?>
                                        <option value="<?php echo $data['ID_JENIS']; ?>"><?php echo $data['NAMA_JENIS']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Nama Barang</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="nama_barang" placeholder="Nama Barang..." class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Bentuk</label>
                                </div>
                                <div class="col-12 col-md-9">

                                    <select name="bentuk" class="form-control" required="required" autofocus="autofocus">
                                        <option>Pilih Bentuk</option>
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
                                    <select name="keterangan" class="form-control" required="required" required>
                                        <option>Pilih Keterangan</option>
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
                                    <input type="number" name="jumlah" placeholder="Jumlah..." class="form-control" required>
                                </div>
                            </div>
                        <div class="card-footer">
                            <button class="btn btn-success" type="submit" name="add">Tambah</button>
                            <a href="index.php?page=tambah_barang"><button type="reset" class="btn btn-primary">Reset</button></a>
                            <a href="index.php?page=barang" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>