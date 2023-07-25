<div class="container-fluid">
	<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_program"><i class="fas fa-plus fa-sm"></i>Tambah program</button>

	<table class="table table-bordered">
		<tr>
			<th>NO</th>
			<th>PROGRAM</th>
			<th>KETERANGAN</th>
			<th>KATEGORI</th>
			<th>JUMLAH SUMBANGAN</th>
			<th>DANA TERKUMPUL</th>
			<th colspan="3">AKSI</th>
		</tr>
		<?php 
		$no =1;
		foreach($program as $brg) : ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $brg->nama_prg ?></td>
				<td><?php echo $brg->keterangan ?></td>
				<td><?php echo $brg->kategori ?></td>
				<td><?php echo $brg->sumbangan ?></td>
				<td><?php echo $brg->jml_smbg ?></td>
				<td><div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div></td>
				<td><?php echo anchor('admin/data_program/edit/'.$brg->id_prg,'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')?>edit</td>
				<td><?php echo anchor('admin/data_program/hapus/'.$brg->id_prg,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
			</tr>

		<?php endforeach; ?>
	</table>

</div>

<div class="modal fade" id="tambah_program" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Program</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

       <form action="<?php echo base_url().'/admin/data_program/tambah_aksi' ;?>" method="post" enctype="multipart/form-data">

       	<div class="form-group">
       		<label>PROGRAM</label>
       		<input type="text" name="nama_prg" class="form-control">
       	</div>
       	<div class="form-group">
       		<label>Keterangan</label>
       		<input type="text" name="keterangan" class="form-control">
       	</div>
       	<div class="form-group">
       		<label>Kategori</label>
       		<select class="form-control" name="kategori">
       			<option>Sumbangan Keagamaan</option>
       			<option>Sumbangan Kemanusiaan</option>
       			<option>Sumbangan Pendidikan</option>
       			<option>Sumbangan Kesehatan</option>
       			<option>Sumbangan Bencana</option>
       		</select>
       	</div>
       	<div class="form-group">
       		<label>Sumbangan Yang dibutuhkan</label>
       		<input type="text" name="sumbangan" class="form-control">
       	</div>
     
       	<div class="form-group">
       		<label>Gambar</label><br>
       		<input type="file" name="gambar" class="form-control">
       	</div>

       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>

      </form>
    </div>
  </div>
</div>