<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Tambah Data Teknisi Pembantu
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="id">ID Teknisi Pembantu</label>
                            <input type="text" class="form-control" id="id" name="id">
                            <small class="form-text text-danger"><?php echo form_error('id'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Teknisi Pembantu</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                            <small class="form-text text-danger"><?php echo form_error('nama'); ?></small>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</div>