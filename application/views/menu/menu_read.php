<!doctype html>
<html>

<head>
    <title>harviacode.com - codeigniter crud generator</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" />

</head>

<body>
    <h2 style="margin-top:0px">menu Read</h2>
    <table class="table">
        <tr>
            <td>Nama Menu</td>
            <td><?php echo $nama; ?></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><?php echo $harga; ?></td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td><?php echo $kategori_id; ?></td>
        </tr>
        <td>Kode menu</td>
        <td><?php echo $kode_menu; ?></td>
        </tr>
        <tr>
            <td></td>
            <td><a href="<?php echo site_url('menu') ?>" class="btn btn-default">Cancel</a></td>
        </tr>
    </table>
</body>

</html>