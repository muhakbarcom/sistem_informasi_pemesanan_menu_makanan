<!doctype html>
<html>

<head>
    <title>harviacode.com - codeigniter crud generator</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" />
    <!-- <style>
            body{
                padding: 15px;
            }
        </style> -->
</head>

<body>
    <h2 style="margin-top:0px">User <?php echo $button ?></h2>
    <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Nama Lengkap <?php echo form_error('nama_lengkap') ?></label>
            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" />
        </div>

        <div class="form-group">
            <label for="enum">Hak Akses <?php echo form_error('hak_akses') ?></label>
            <!-- <input type="text" class="form-control" name="hak_akses" id="hak_akses" placeholder="Hak Akses" value="<?php echo $hak_akses; ?>" /> -->
            <select name="hak_akses" class="form-control" required>
                <option value="<?php echo $hak_akses; ?>"><?php if ($hak_akses) {
                                                                echo $hak_akses;
                                                            } else { ?>Pilih Hak Akses <?php }; ?></option>
                <option value="A">Admin</option>
                <option value="P">Pengguna</option>
            </select>
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('user') ?>" class="btn btn-default">Cancel</a>
    </form>
</body>

</html>