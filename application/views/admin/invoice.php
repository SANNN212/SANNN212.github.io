 <div class="container-fluid">
	<h4>Rangkuman Tansaksi</h4>

	<table class="table table-bordered table-hover table-striped">
		<tr>
			<th>Id Transaksi</th>
			<th>Nama Penyumbang</th>
			<th>Nominal</th>
			<th>Tanggal Transaksi</th>
			<th>Aksi</th>
		</tr>
		<?php foreach($invoice as $inv): ?>
		<tr>
			<td><?php echo $inv->id_tran ?></td>
			<td><?php echo $inv->nama ?></td>
			<td><?php echo $inv->nominal ?></td>
			<td><?php echo $inv->tgl_tran ?></td>
			<td><?php echo anchor('admin/invoice/detail/' .$inv->id_tran,'<div class="btn btn-sm btn-primary">Detail</div>') ?></td>
			
		</tr>
	<?php endforeach; ?>
	</table>

</div>