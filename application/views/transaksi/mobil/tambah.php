<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi Mobil</h1>
    </div>
    <div class="row mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="<?= base_url();?>transaksi">&larr; Kembali memilih mobil</a>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $lastId->{'idTransaksi'};?>">
                        <input type="hidden" name="idMobil" value="<?= $mobil['idMobil'];?>">
                        <input type="hidden" name="idKons" value="<?= $get;?>">
                        <div class="form-group">
                            <label for="model">Model</label>
                            <input type="text" class="form-control" value="<?= $mobil['namaMerk'];?> <?= $mobil['model'];?>" readonly="">
                        </div>
                        <div class="form-group">
                            <label for="warna">Warna</label>
                            <input type="text" class="form-control" value="<?= $mobil['warna'];?>" readonly="">
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="text" class="form-control" value="<?= $mobil['tahun'];?>" readonly="">
                        </div>
                        <div class="form-group">
                            <label for="warna">harga</label>
                            <input type="text" class="form-control" value="<?= $mobil['harga'];?>" readonly="">
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right mt-1" onclick="return confirm('Apakah Anda yakin mobil <?= $mobil['namaMerk'];?> <?= $mobil['model'];?>')">Beli</button>
                    </form>

                </div>
                <div class="card-footer text-center">
                    <p class="text-gray-900 mb-0">Masih belum yakin?</p>
                    <a href="<?= base_url();?>transaksi">&larr; Kembali memilih mobil</a>
                </div>
            </div>

        </div>
    </div>
</div>
</div>