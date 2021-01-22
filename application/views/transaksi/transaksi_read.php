<!doctype html>
<html>

<head>
    <title>harviacode.com - codeigniter crud generator</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" />

</head>

<body>
    <h2 style="margin-top:0px">Transaksi Read</h2>
    <table class="table">
        <tr>
            <td>Kode Menu</td>
            <td><?php echo $kode_menu; ?></td>
        </tr>
        <tr>
            <td>Username</td>
            <td><?php echo $username; ?></td>
        </tr>
        <tr>
            <td>Tanggal Trx</td>
            <td><?php echo $tanggal_trx; ?></td>
        </tr>
        <tr>
            <td>Status</td>
            <td><?php echo $status; ?></td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td><?php echo $jumlah; ?></td>
        </tr>
        <tr>
            <td></td>
            <td><a href="<?php echo site_url('transaksi') ?>" class="btn btn-default">Cancel</a></td>
        </tr>
    </table>
</body>

</html>