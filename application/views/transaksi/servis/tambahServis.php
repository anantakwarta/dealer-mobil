
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Tambah Servis
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php if ($lastId->{'idServisTeknisi'} == NULL) { echo 2021; } else { echo $lastId->{'idServisTeknisi'}; }?>">
                        <input type="hidden" name="idJasaServis" value="<?= $idJasaServis;?>">
                        <div class="form-group">
                            <label for="idServis">Servis</label>
                            <select class="form-control" id="idServis" name="idServis">
                                <option>-- Pilih Servis --</option>
                                <?php foreach ($servis as $s) : ?>
                                    <option value="<?= $s['idServis']; ?>"><?= $s['namaServis']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Servis</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</div>