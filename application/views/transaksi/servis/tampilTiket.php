<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Tiket</h1>
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data tiket jasa servis <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-gray-800">Data Tiket <?php foreach ($konsumen as $k) : echo $k['namaKons']; endforeach;?><a href="<?= base_url(); ?>jasaServis/tambahTiket?id=<?= $get; ?>" class="m-0 font-weight-bold text-primary float-right">+Buat Tiket</a></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Mobil</th>
                            <th>Tanggal Terima</th>
                            <th>Tanggal Kembali</th>
                            <th>Servis</th>
                            <th>Part</th>
                            <th>Total (Rp)</th>
                            <th width="200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jasaservis as $js) : ?>
                            <tr>
                                <td><?= $js['idJasaServis']; ?></td>
                                <td><?= $js['namaMerk']; ?> <?= $js['model']; ?></td>
                                <td><?= $js['tanggalDiterima']; ?></td>
                                <td><?= $js['tanggalDikembalikan']; ?></td>
                                <td><?= $js['namaServis']; ?></td>
                                <td><?= $js['namaPart'].' ('.$js['jumlah'].')' ?></td>
                                <td><?= $js['hargaTotal']; ?></td>
                                <td>
                                    <a class="p-1 rounded btn-success" href="<?= base_url(); ?>jasaServis/servis/<?= $js['idJasaServis']; ?>"><i class="fas fa-plus text-white"></i>Servis</a>
                                    <a class="p-1 rounded btn-success" href="<?= base_url(); ?>jasaServis/part/<?= $js['idJasaServis']; ?>"><i class="fas fa-plus text-white"></i>Part</a>
                                    <a class="p-1 rounded btn-danger" href="<?= base_url(); ?>jasaServis/hapus/<?= $js['idJasaServis']; ?>" onclick="return confirm('Apakah Anda yakin akan menghapus tiket jasa?"><i class="fas fa-trash text-white"></i>Hapus</a>
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