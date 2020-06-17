<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Tambah Data Konsumen
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="id">ID Konsumen</label>
                            <input type="text" class="form-control" id="id" name="id">
                            <small class="form-text text-danger"><?php echo form_error('id'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Konsumen</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                            <small class="form-text text-danger"><?php echo form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username">
                            <small class="form-text text-danger"><?php echo form_error('username'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <small class="form-text text-danger"><?php echo form_error('password'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat">
                            <small class="form-text text-danger"><?php echo form_error('alamat'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="noTelp">No. Telepon</label>
                            <input type="text" class="form-control" id="noTelp" name="noTelp">
                            <small class="form-text text-danger"><?php echo form_error('noTelp'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="kota">Kota</label>
                            <input type="text" class="form-control" id="kota" name="kota">
                            <small class="form-text text-danger"><?php echo form_error('kota'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="provinsi">Provinsi</label>
                            <input type="text" class="form-control" id="provinsi" name="provinsi">
                            <small class="form-text text-danger"><?php echo form_error('provinsi'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="kodePos">Kode Pos</label>
                            <input type="text" class="form-control" id="kodePos" name="kodePos">
                            <small class="form-text text-danger"><?php echo form_error('kodePos'); ?></small>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</div>