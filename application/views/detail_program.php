<div class="container-fluid">
	<div class="card">
  		<div class="card-header">
    	Detail Program
  		</div>
  	<div class="card-body">
  		<?php foreach ($program as $brg) : ?>
    	<div class="row">
    		<div class="col-md-4">
    			 <img src="<?php echo base_url().'/gambarmaul/'.$brg->gambar?>" class="card-img-top">
    		</div>
    		<div class="col-md-8">
          <table class="table">
              <tr>
                  <td>Nama Program</td>
                  <td><strong> <?php echo $brg->nama_prg?></strong></td>
              </tr>
              <tr>
                  <td>Keterangan</td>
                  <td><strong> <?php echo $brg->keterangan?></strong></td>
              </tr>
              <tr>
                  <td>Kategori</td>
                  <td><strong> <?php echo $brg->kategori?></strong></td>
              </tr>
              <tr>
                  <td>Sumbangan yang di butuhkan</td>
                  <td><strong> <?php echo $brg->sumbangan?></strong></td>
              </tr>
              <tr>
                  <td>Sumbangan Terkumpul</td>
                  <td><strong> <?php echo number_format($brg->jml_smbg,0 ,',','.')?></strong></td>
              </tr>
          </table>
          <?php echo anchor('dashboard/tambah_ke_keranjang/'.$brg->id_prg,'<div class="btn btn-sm btn-primary">Tambah ke Transaksi</div>')?>
          <?php echo anchor('dashboard/index/','<div class="btn btn-sm btn-danger">Kembali</div>')?>      
            </div>
    	</div>
    <?php endforeach; ?>


  </div>
</div>
</div>