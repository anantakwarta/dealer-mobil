<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Data Konsumen
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $konsumen['namaKons']; ?></h5>
                    <h6 class="card-subtitle text-muted">Username:</h6>
                    <p class="card-text"><?= $konsumen['username']; ?></p>
                    <h6 class="card-subtitle text-muted">Alamat:</h6>
                    <p class="card-text"><?= $konsumen['alamat']; ?></p>
                    <h6 class="card-subtitle text-muted">No. Telepon:</h6>
                    <p class="card-text"><?= $konsumen['noTelp']; ?></p>
                    <h6 class="card-subtitle text-muted">Kota:</h6>
                    <p class="card-text"><?= $konsumen['kota']; ?></p>
                    <h6 class="card-subtitle text-muted">Provinsi:</h6>
                    <p class="card-text"><?= $konsumen['provinsi']; ?></p>
                    <h6 class="card-subtitle text-muted">Kode Pos:</h6>
                    <p class="card-text"><?= $konsumen['kodePos']; ?></p>

                    <a href="<?= base_url(); ?>konsumen" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>