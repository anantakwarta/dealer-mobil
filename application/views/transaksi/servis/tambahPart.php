
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Tambah Part
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php if ($lastId->{'idPartDipakai'} == NULL) { echo 4021; } else { echo $lastId->{'idPartDipakai'}; }?>">
                        <input type="hidden" name="idJasaServis" value="<?= $idJasaServis;?>">
                        <div class="form-group">
                            <label for="idPart">Part</label>
                            <select class="form-control" id="idPart" name="idPart">
                                <option>-- Pilih Part --</option>
                                <?php foreach ($part as $p) : ?>
                                    <option value="<?= $p['idPart']; ?>"><?= $p['namaPart']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah">
                            <small class="form-text text-danger"><?php echo form_error('jumlah'); ?></small>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Part</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</div>