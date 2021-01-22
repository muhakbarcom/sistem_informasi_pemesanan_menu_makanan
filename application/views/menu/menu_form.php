<!doctype html>
<html>

<head>
    <title>harviacode.com - codeigniter crud generator</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" />

</head>

<body>
    <h2 style="margin-top:0px">Menu <?php echo $button ?></h2>
    <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="varchar">nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="nama" value="<?php echo $nama; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">harga <?php echo form_error('harga') ?></label>
            <input type="text" class="form-control" name="harga" id="harga" placeholder="harga" value="<?php echo $harga; ?>" />
        </div>

        <div class="form-group">
            <label for="int">Kategori Id <?php echo form_error('kategori_id') ?></label>
            <select name="kategori_id" class="form-control">
                <option value="<?php echo $kategori_id; ?>"><?php if ($kategori_id) {
                                                                echo $kategori_id;
                                                            } else { ?>Pilih Kategori <?php }; ?></option>
                <?php if ($list_kategori) : ?>
                    <?php foreach ($list_kategori as $lk) : ?>
                        <option value="<?= $lk->id; ?>"><?= $lk->nama_kategori; ?></option>
                    <?php endforeach ?>
                <?php endif ?>
            </select>
        </div>
        <div class="form-group">
            <label for="varchar">Kode menu <?php echo form_error('kode_menu') ?></label>
            <input type="text" class="form-control" name="kode_menu" id="kode_menu" placeholder="Kode menu" value="<?php echo $kode_menu; ?>" />
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('menu') ?>" class="btn btn-default">Cancel</a>
    </form>
</body>

</html>