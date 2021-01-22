<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?= $countTrx; ?></h3>

        <p>Total Transaksi</p>
      </div>
      <div class="icon">
        <i class="ion ion-arrow-swap"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?= $countMenu; ?></h3>

        <p>Menu Tersedia</p>
      </div>
      <div class="icon">
        <i class="ion ion-pizza"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?= $countUsr; ?></h3>

        <p>User Terdaftar</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?= $sumTrx; ?></h3>

        <p>Jumlah Pesanan</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag "></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>
<!-- /.row -->
<!-- Main row -->
<div class="row">
  <!-- Left col -->
  <section class="col-lg-12">
    <!-- Custom tabs (Charts with tabs)-->
    <div class="nav-tabs-custom p-5">
      <div class=" header text-center">
        <h2> <b> Selamat Datang di Restoran I'M Geprek 71</b></h2>
        <p>Jl. Sariasih 4 No.123 Kel. Sarijadi Kec.Suksari Kota Bandung, Jawa Barat 40151</p>
        <img src="<?= base_url('assets/'); ?>dist/img/chicken.jpg" class="user-image" class="img img-responsive" alt="User Image">

      </div>
    </div>
  </section>

  <section class="col-lg-12 connectedSortable">
    <!-- Custom tabs (Charts with tabs)-->
    <div class="nav-tabs-custom">
      <!-- Tabs within a box -->
      <ul class="nav nav-tabs pull-right">
        <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
        <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
        <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
      </ul>
      <div class="tab-content no-padding">
        <!-- Morris chart - Sales -->
        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
      </div>
    </div>
  </section>

</div>
<!-- /.row (main row) -->