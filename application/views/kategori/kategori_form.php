<!doctype html>
<html>

<head>
    <title>harviacode.com - codeigniter crud generator</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" />

</head>

<body>
    <h2 style="margin-top:0px">Kategori <?php echo $button ?></h2>
    <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="varchar">nama_kategori <?php echo form_error('nama_kategori') ?></label>
            <input autofocus type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="nama_kategori" value="<?php echo $nama_kategori; ?>" />
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('kategori') ?>" class="btn btn-default">Cancel</a>
    </form>
</body>

</html>