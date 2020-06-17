<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data Teknisi
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $teknisi['idTeknisi']; ?>">
                        <div class="form-group">
                            <label for="nama">Nama Teknisi</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $teknisi['namaTeknisi']; ?>">
                            <small class="form-text text-danger"><?php echo form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="coteknisi">Teknisi Pembantu</label>
                            <select class="form-control" id="coteknisi" name="coteknisi">
                                <?php foreach ($coteknisi as $ct) :
                                    if ($ct['idCoTeknisi'] == $teknisi['idCoTeknisi']) : ?>
                                        <option value="<?= $ct['idCoTeknisi']; ?>" selected><?= $ct['namaCoTeknisi']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $ct['idCoTeknisi']; ?>"><?= $ct['namaCoTeknisi']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>