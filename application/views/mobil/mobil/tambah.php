<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Tambah Data Mobil
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="id">ID Mobil</label>
                            <input type="text" class="form-control" id="id" name="id">
                            <small class="form-text text-danger"><?php echo form_error('id'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="merk">Merk</label>
                            <select class="form-control" id="merk" name="merk">
                                <?php foreach ($merk as $m) : ?>
                                    <option value="<?= $m['idMerk']; ?>"><?= $m['namaMerk']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="model">Model</label>
                            <input type="text" class="form-control" id="model" name="model">
                            <small class="form-text text-danger"><?php echo form_error('model'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="coteknisi">Warna</label>
                            <select class="form-control" id="warna" name="warna">
                                <?php foreach ($warna as $w) : ?>
                                    <option value="<?= $w['idWarna']; ?>"><?= $w['warna']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <select class="form-control" id="tahun" name="tahun">
                                <?php foreach ($tahun as $t) : ?>
                                    <option value="<?= $t['tahun']; ?>"><?= $t['tahun']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"><?php echo form_error('tahun'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga">
                            <small class="form-text text-danger"><?php echo form_error('harga'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="text" class="form-control" id="stok" name="stok">
                            <small class="form-text text-danger"><?php echo form_error('stok'); ?></small>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>