<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Jabatan</h1>
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data jabatan <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-gray-800">Data Jabatan <a href="<?= base_url(); ?>coteknisi/tambah" class="m-0 font-weight-bold text-primary float-right">+Tambah Data Teknisi Pembantu</a></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Teknisi Pembantu</th>
                            <th>Nama Teknisi Pembantu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($coteknisi as $ct) : ?>
                            <tr>
                                <td><?= $ct['idCoTeknisi']; ?></td>
                                <td><?= $ct['namaCoTeknisi']; ?></td>
                                <td>
                                    <a class="p-1 rounded btn-success" href="<?= base_url(); ?>coteknisi/ubah/<?= $ct['idCoTeknisi']; ?>"><i class="fas fa-edit text-white"></i>Ubah</a>
                                    <a class="p-1 rounded btn-danger" href="<?= base_url(); ?>coteknisi/hapus/<?= $ct['idCoTeknisi']; ?>" onclick="return confirm('Apakah Anda yakin akan menghapus <?= $ct['namaCoTeknisi']; ?>?')"><i class="fas fa-trash text-white"></i>Hapus</a>
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