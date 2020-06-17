<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data Mobil
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $mobil['idMobil']; ?>">
                        <div class="form-group">
                            <label for="merk">Merk</label>
                            <select class="form-control" id="merk" name="merk">
                                <?php foreach ($merk as $m) :
                                    if ($m['idMerk'] == $mobil['idMerk']) : ?>
                                        <option value="<?= $m['idMerk']; ?>" selected><?= $m['namaMerk']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $m['idMerk']; ?>"><?= $m['namaMerk']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="model">Model</label>
                            <input type="text" class="form-control" id="model" name="model" value="<?= $mobil['model']; ?>">
                            <small class="form-text text-danger"><?php echo form_error('model'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="warna">Warna</label>
                            <select class="form-control" id="warna" name="warna">
                                <?php foreach ($warna as $w) :
                                    if ($w['idWarna'] == $mobil['idWarna']) : ?>
                                        <option value="<?= $w['idWarna']; ?>" selected><?= $w['warna']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $w['idWarna']; ?>"><?= $w['warna']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="text" class="form-control" id="tahun" name="tahun" value="<?= $mobil['tahun']; ?>">
                            <small class="form-text text-danger"><?php echo form_error('tahun'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" value="<?= $mobil['harga']; ?>">
                            <small class="form-text text-danger"><?php echo form_error('harga'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="text" class="form-control" id="stok" name="stok" value="<?= $mobil['stok']; ?>">
                            <small class="form-text text-danger"><?php echo form_error('stok'); ?></small>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>