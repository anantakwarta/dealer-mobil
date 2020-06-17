<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data Teknisi Pembantu
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $coteknisi['idCoTeknisi']; ?>">
                        <div class="form-group">
                            <label for="nama">Nama Teknisi Pembantu</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $coteknisi['namaCoTeknisi']; ?>">
                            <small class="form-text text-danger"><?php echo form_error('nama'); ?></small>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</div>