<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Data Pegawai
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $pegawai['namaPegawai']; ?></h5>
                    <h6 class="card-subtitle text-muted">Username:</h6>
                    <p class="card-text"><?= $pegawai['username']; ?></p>
                    <h6 class="card-subtitle text-muted">Jabatan:</h6>
                    <p class="card-text"><?= $pegawai['jabatan']; ?></p>
                    <h6 class="card-subtitle text-muted">Alamat:</h6>
                    <p class="card-text"><?= $pegawai['alamat']; ?></p>
                    <h6 class="card-subtitle text-muted">No. Telepon:</h6>
                    <p class="card-text"><?= $pegawai['noTelp']; ?></p>

                    <a href="<?= base_url(); ?>pegawai" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>