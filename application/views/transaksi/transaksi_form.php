<!doctype html>
<html>

<head>
    <title>harviacode.com - codeigniter crud generator</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" />

</head>

<body>
    <h2 style="margin-top:0px">Transaksi <?php echo $button ?></h2>
    <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="varchar">Kode Menu <?php echo form_error('kode_menu') ?></label>
            <input type="text" class="form-control" name="kode_menu" id="kode_menu" placeholder="Kode Menu" value="<?php echo $kode_menu; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
        <div class="form-group">
            <label for="datetime">Tanggal Trx <?php echo form_error('tanggal_trx') ?></label>
            <input type="text" class="form-control" name="tanggal_trx" id="tanggal_trx" placeholder="Tanggal Trx" value="<?php echo $tanggal_trx; ?>" />
        </div>
        <div class="form-group">
            <label for="enum">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Jumlah <?php echo form_error('jumlah') ?></label>
            <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" />
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('transaksi') ?>" class="btn btn-default">Cancel</a>
    </form>
</body>

</html>