<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Pesan Makanan</h3>
          <!-- tools box -->
          <div class="pull-right box-tools">
            <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
          <!-- /. tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body pad">
          <form class="form-horizontal" action='#' method="post">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Menu</label>

                <div class="col-sm-10">
                  <select name="kode_menu" class="form-control" required>
                    <option value="">Pilih Menu Makanan</option>
                    <?php if ($list_menu) : ?>
                      <?php foreach ($list_menu as $lm) : ?>
                        <option value="<?= $lm->kode_menu; ?>"><?= $lm->nama; ?></option>
                      <?php endforeach ?>
                    <?php endif; ?>
                  </select>

                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Jumlah</label>

                <div class="col-sm-10">
                  <input type="number" name="jumlah" maxlength="100">

                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Pembeli</label>



                <?php if ($_SESSION['hak_akses'] == 'A') { ?>
                  <div class="col-sm-10">
                    <select name="username" class="form-control" required>
                      <option value="">Pilih Username</option>
                      <?php if ($list_pembeli) : ?>
                        <?php foreach ($list_pembeli as $lp) : ?>
                          <option value="<?= $lp->username; ?>"><?= $lp->username; ?> - <?= $lp->nama_lengkap; ?></option>
                        <?php endforeach ?>
                      <?php endif; ?>
                    </select>
                  </div>
                <?php } else { ?>

                  <div class="col-sm-10">
                    <div class="form-control"><?= $_SESSION['nama_lengkap']; ?></div>

                    <input type="text" name="username" value="<?= $_SESSION['username']; ?>" hidden>
                  </div>
                <?php } ?>
              </div>

            </div>
            <!-- /.box-body -->
            <div class=" box-footer">

              <button type="submit" name="submit" value="pesan" class="btn btn-info pull-right">Pesan</button>

            </div>
            <!-- /.box-footer -->
          </form>
        </div>
      </div>
      <!-- /.box -->

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Pemesanan Makanan
            <!-- <small>Simple and fast</small> -->
          </h3>
          <!-- tools box -->
          <div class="pull-right box-tools">
            <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
          <!-- /. tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body pad">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">ID Transaksi</th>
                <th scope="col">Tanggal Transaksi</th>
                <th scope="col">Kode Menu</th>
                <th scope="col">Username</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($list_trx) : ?>
                <?php $i = 1; ?>
                <?php foreach ($list_trx as $lt) : ?>
                  <tr>

                    <th scope="row"><?= $i; ?></th>
                    <td><?= $lt->id; ?></td>
                    <td><?= $lt->tanggal_trx; ?></td>
                    <td><?= $lt->kode_menu; ?></td>
                    <td><?= $lt->username; ?></td>
                    <td><?= $lt->jumlah; ?></td>
                    <td><?= $lt->status; ?></td>
                    <td>
                      <?php
                      echo anchor(site_url('transaksi/read/' . $lt->id), '<div class="btn btn-primary btn-sm" title="Lihat Selengkapnya"><i class="fa fa-search-plus"></i></div>');
                      ?>
                    </td>
                    <!-- <td><?php if ($lt->status == 'Dipinjam') : ?>
                        <a href="<?= site_url('transaksi/kembali/'); ?><?= $lt->id; ?>">Kembali</a>
                  <?php else : ?>
                    - <?php endif ?></td> -->
                  </tr>
                  <?php $i++; ?>
                <?php endforeach ?>
              <?php endif ?>


            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- /.col-->
  </div>
  <!-- ./row -->
</section>
<!-- /.content -->