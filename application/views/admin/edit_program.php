<div class="container-fluid">
	<h3><i class="fas fa-edit"></i>Edit Program</h3>

	<?php foreach ($program as $brg) :?>
		<form method="post" action="<?php echo base_url().'admin/data_program/update'?>">
			<div class="form-group">
			<input type="hidden" name="id_prg" value="<?php echo $brg->id_prg; ?>">
				<label>Nama Program</label>
				<input type="text" name="nama_prg" class="form-control" value="<?php echo $brg->nama_prg?>">
			</div>
			<div class="form-group">
				<label>Keterangan</label>
				<input type="hidden" name="keterangan" class="form-control" value="<?php echo $brg->keterangan?>">
			</div>
			<div class="form-group">
				<label>Kategori</label>
				<input type="text" name="kategori" class="form-control" value="<?php echo $brg->kategori?>">
			</div>
			<div class="form-group">
				<label>Sumbangan Yang Dibutuhkan</label>
				<input type="text" name="sumbangan" class="form-control" value="<?php echo $brg->sumbangan?>">
			</div>
			<div class="form-group">
				<label>Sumbangan Terkumpul</label>
				<p><?php echo $brg->jml_smbg?></p>
			</div>
			<button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
			
		</form>

	<?php endforeach; ?>
</div>