<div class="container-fluid">

    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Ubah Data Pegawai
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $pegawai['idPegawai']; ?>">
                        <div class="form-group">
                            <label for="nama">Nama Pegawai</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $pegawai['namaPegawai']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $pegawai['username']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?= $pegawai['password']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <select class="form-control" id="idJabatan" name="idJabatan">
                                <?php foreach ($jabatan as $j) :
                                    if ($j['idJabatan'] == $pegawai['idJabatan']) : ?>
                                        <option value="<?= $j['idJabatan']; ?>" selected><?= $j['jabatan']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $j['idJabatan']; ?>"><?= $j['jabatan']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $pegawai['alamat']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="noTelp">No. Telepon</label>
                            <input type="text" class="form-control" id="noTelp" name="noTelp" value="<?= $pegawai['noTelp']; ?>">
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</div>