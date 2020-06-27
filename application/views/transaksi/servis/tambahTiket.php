<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Tambah Tiket
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $lastId->{'idJasaServis'};?>">
                        <input type="hidden" name="idKons" value="<?= $get;?>">
                        <div class="form-group">
                            <label for="idTransaksi">Riwayat Transaksi</label>
                            <select class="form-control" id="idTransaksi" name="idTransaksi">
                                <?php foreach ($transaksi as $t) : ?>
                                    <option value="<?= $t['idTransaksi']; ?>"><?= $t['idTransaksi'].' - '.$t['namaMerk'].' '.$t['model']; ?></option>
                                    <input type="hidden" name="idMobil" value="<?= $t['idMobil'];?>">
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Buat Tiket</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</div>