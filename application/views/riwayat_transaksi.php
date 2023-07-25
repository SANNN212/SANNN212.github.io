<div class="container-fluid">
    <h2 class="text-center"></h2>
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>No</th>
            <th>Nama penyumbang</th>
            <th>Nominal</th>
            <th>Metode Pembayaran</th>
            <th>Tanggal Transaksi</th>
        </tr>

        <?php $No = 1;
        foreach ($riwayat_transaksi as $transaksi): ?>
            <tr>
                <td><?php echo $No ?></td>
                <td><?php echo $transaksi->nama; ?></td>
                <td><?php echo number_format($transaksi->nominal ,0,',','.')?></td>
                <td><?php echo $transaksi->mtd_bayar; ?></td>
                <td><?php echo $transaksi->tgl_tran; ?></td>
            </tr>
            <?php $No++; 
        endforeach; ?>

    </table>
    <a href="<?php echo base_url('dashboard/index') ?>">
        <div class="btn btn-sm btn-primary">Kembali</div>
    </a>
</div>
