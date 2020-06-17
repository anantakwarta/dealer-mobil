<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Transaksi</h1>
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data transaksi <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-gray-800">Data Transaksi <a href="<?= base_url(); ?>transaksi/tampilMerk" class="m-0 font-weight-bold text-primary float-right">+Tambah Transaksi</a></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Konsumen</th>
                            <th>Nama Pegawai</th>
                            <th>Tanggal</th>
                            <th>Merk Mobil</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transaksi as $t) : ?>
                            <tr>
                                <td><?= $t['namaKons']; ?></td>
                                <td><?= $t['namaPegawai']; ?></td>
                                <td><?= $t['tanggal']; ?></td>
                                <td><?= $t['namaMerk']; ?> <?= $t['model'] ?></td>
                                <td>
                                    <a class="p-1 rounded btn-primary" href="<?= base_url(); ?>transaksi/detail/<?= $t['idTransaksi']; ?>"><i class="fas fa-info text-white"></i>Detail</a>
                                    <a class="p-1 rounded btn-success" href="<?= base_url(); ?>transaksi/editTampilMerk?id=<?= $t['idTransaksi']; ?>"><i class="fas fa-edit text-white"></i>Ubah</a>
                                    <a class="p-1 rounded btn-danger" href="<?= base_url(); ?>transaksi/hapus/<?= $t['idTransaksi']; ?>" onclick="return confirm('Apakah Anda yakin akan menghapus transaksi konsumen <?= $t['namaKons']; ?>?')"><i class="fas fa-trash text-white"></i>Hapus</a>
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