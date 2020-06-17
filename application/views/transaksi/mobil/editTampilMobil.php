<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          	<div class="d-sm-flex align-items-center justify-content-between mb-4">
          		<?php foreach ($merk as $merk) { ?>
            	<h1 class="h3 mb-0 text-gray-800">Daftar Mobil <?php echo $merk['namaMerk'] ?></h1>
          		<?php } ?>
          	</div>
          	
          	<div class="row">
          		<?php foreach ($mobil as $m) { ?>

           		<!-- Earnings (Monthly) Card Example -->
           		<div class="col-xl-3 col-md-6 mb-4">
           			<a href="<?= base_url(); ?>transaksi/ubah?id=<?= $get; ?>&idMobil=<?= $m['idMobil']; ?>">
           			<div class="card border-left-primary shadow h-100 py-2">
               			<div class="card-body">
               				<div class="row no-gutters align-items-center">
                   				<div class="col mr-2">
                   					<div class="h3 mb-0 font-weight-bold text-gray-800"><?= $m['model']; ?></div>
                   					<div class="text-s font-weight-bold text-gray-600 mb-1">Rp <?= $m['harga']; ?></div>
                   					<div class="text-xs font-weight-bold text-gray-600 mb-0">Warna <?= $m['warna']; ?></div>
                   					<div class="text-xs font-weight-bold text-gray-600 mb-0">Stok: <?= $m['stok']; ?></div>
                   				</div>  
               				</div>
               			</div>
           			</div>
           			</a>
           		</div>
           		<?php } ?>
       		</div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->