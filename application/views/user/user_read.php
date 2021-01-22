<!doctype html>
<html>

<head>
    <title>harviacode.com - codeigniter crud generator</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" />

</head>

<body>
    <h2 style="margin-top:0px">User Read</h2>
    <table class="table">
        <tr>
            <td>Username</td>
            <td><?php echo $username; ?></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><?php echo $password; ?></td>
        </tr>
        <tr>
            <td>Nama Lengkap</td>
            <td><?php echo $nama_lengkap; ?></td>
        </tr>
        <tr>
            <td>Hak Akses</td>
            <td><?php echo $hak_akses; ?></td>
        </tr>
        <tr>
            <td></td>
            <td><a href="<?php echo site_url('user') ?>" class="btn btn-default">Cancel</a></td>
        </tr>
    </table>
</body>

</html>