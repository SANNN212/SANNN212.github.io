<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <br><br>
            <h3>Input Data Sumbangan</h3>
            <?php foreach ($program as $brg) : ?>
            <form method="post" action="<?php echo base_url('dashboard/proses_pesanan') ?>">
                <input type="hidden" name="id_prg" value="<?php echo $brg->id_prg; ?>">
                <div class="form-group">
                    <label><h6>Nama Penyumbang : </h6></label><br>
                    <label><?php echo $user['nama']; ?></label>
                </div>
                <div class="form-group">
                    <label><h6>Jenis Sumbangan : </h6></label><br> 
                    <label><?php echo $brg->kategori ?></label>
                </div>
                <input type="hidden" name="nama" value="<?php echo $user['nama']; ?>">
                <div class="form-group">
                    <label>Nominal</label>
                    <input type="numeric" name="nominal" placeholder="Nominal" class="form-control">
                </div>
                <div class="form-group">
                    <label>Pilih Bank</label>
                    <select class="form-control" name="mtd">
                        <option>BRI - xxxxxx</option>
                        <option>BCA - xxxxxx</option>
                        <option>Muamalat - xxxxx</option>
                    </select>
                </div>
                <button class="mb-3 btn btn-sm btn-primary" type="submit">Pesan</button>
            </form>
            <?php endforeach; ?>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
