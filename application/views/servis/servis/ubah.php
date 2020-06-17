<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data Servis
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $servis['idServis']; ?>">
                        <div class="form-group">
                            <label for="servis">Servis</label>
                            <input type="text" class="form-control" id="servis" name="servis" value="<?= $servis['namaServis']; ?>">
                            <small class="form-text text-danger"><?php echo form_error('servis'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga per Jam</label>
                            <input type="text" class="form-control" id="harga" name="harga" value="<?= $servis['hargaPerJam']; ?>">
                            <small class="form-text text-danger"><?php echo form_error('harga'); ?></small>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</div>