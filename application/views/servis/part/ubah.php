<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data Part
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $part['idPart']; ?>">
                        <div class="form-group">
                            <label for="part">Part</label>
                            <input type="text" class="form-control" id="part" name="part" value="<?= $part['namaPart']; ?>">
                            <small class="form-text text-danger"><?php echo form_error('part'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" value="<?= $part['harga']; ?>">
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