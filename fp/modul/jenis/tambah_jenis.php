<div class="col-lg-12">
    <?php if (isset($_POST['add'])) {
        $id_jenis = $_POST['id'];
        $nama_jenis = $_POST['nama_jenis'];
        $keterangan=$_POST['keterangan'];

        $query = mysqli_query($mysqli, "INSERT INTO jenis (ID_JENIS, NAMA_JENIS, KETERANGAN)VALUES('$id_jenis', '$nama_jenis', '$keterangan')")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));

        if ($query) { ?>
        <script language="JavaScript">
            document.location='index.php?page=jenis&alert=4';
        </script>

        <?php }} ?>
        <div class="card">
            <div class="card-header">
                <strong>Tambah Data</strong> Jenis
            </div>
            <div class="card-body card-block">
                <form method="post" enctype="multipart/form-data" class="form-horizontal">
                    <?php 
                    $query = mysqli_query($mysqli, "SELECT * FROM jenis ORDER BY ID_JENIS DESC")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
                    $data=mysqli_fetch_assoc($query) 
                    ?>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">ID Jenis</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" name="id" value="<?php echo $data['ID_JENIS']+1; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Nama Jenis</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="nama_jenis" placeholder="Nama Jenis..." class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="textarea-input" class="form-control-label">Keterangan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="keterangan" rows="5" placeholder="Keterangan..." class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success" type="submit" name="add">Tambah</button>
                    <a href="index.php?page=jenis"><button type="reset" class="btn btn-primary">Reset</button></a>
                    <a href="index.php?page=jenis" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
