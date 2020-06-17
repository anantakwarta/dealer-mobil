<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Mobil</h1>
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Mobil<strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-gray-800">Data Mobil<a href="<?= base_url(); ?>mobil/tambah" class="m-0 font-weight-bold text-primary float-right">+Tambah Data Mobil</a></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Merk</th>
                            <th>Model</th>
                            <th>Warna</th>
                            <th>Tahun</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mobil as $m) : ?>
                            <tr>
                                <td><?= $m['namaMerk']; ?></td>
                                <td><?= $m['model']; ?></td>
                                <td><?= $m['warna']; ?></td>
                                <td><?= $m['tahun']; ?></td>
                                <td><?= $m['harga']; ?></td>
                                <td><?= $m['stok']; ?></td>
                                <td>
                                    <a class="p-1 rounded btn-success" href="<?= base_url(); ?>mobil/ubah/<?= $m['idMobil']; ?>"><i class="fas fa-edit text-white"></i>Ubah</a>
                                    <a class="p-1 rounded btn-danger" href="<?= base_url(); ?>mobil/hapus/<?= $m['idMobil']; ?>" onclick="return confirm('Apakah Anda yakin akan menghapus <?= $m['namaMerk']; ?> <?= $m['model']; ?>?')"><i class="fas fa-trash text-white"></i>Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->