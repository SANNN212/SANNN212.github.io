<div class="container-fluid">
<?php  
	foreach($invoice as $psn):
	?>	
	<?php  
	foreach($pesanan as $pn):
	?>	
	<h4>Detail Transaksi <div class="btn btn-sm btn-success">No. Invoice :<?php echo $psn->id_tran ?></div></h4>

	<table class="table table-bordered table-hover table-striped">
		<tr>
			<th>ID transaksi</th>
			<th>Nama penyumbang</th>
			<th>Nominal</th>
			<th>Metode Pembayaran</th>
			<th>Tanggal Transaksi</th>
			<th>Kategori Sumbangan</th>
			<th>Nama Program</th>
		</tr>

	
	<tr>
		<td><?php echo $psn->id_tran ?></td>
		<td><?php echo $psn->nama ?></td>
		<td><?php echo number_format($psn->nominal ,0,',','.')?></td>
		<td><?php echo $psn->mtd_bayar ?></td>
		<td><?php echo $psn->tgl_tran ?></td>
		<td><?php echo $pn->kategori ?></td>
		<td><?php echo $pn->nama_prg ?></td>
	
	</tr>

	<?php endforeach; ?>
	<?php endforeach; ?>

	</table>
	<a href="<?php echo base_url('admin/invoice') ?>"> <div class="btn btn-sm btn-primary">Kembali
		</div> </a>
</div>