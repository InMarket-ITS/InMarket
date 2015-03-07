<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url();?>beranda/">InMarket</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu alert-dropdown">
                <li>
                    <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                </li>

                <li class="divider"></li>
                <li>
                    <a href="#">View All</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Administrator <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="<?php echo base_url(); ?>beranda/keluar"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li <?php if ($aktif=="beranda") {?>class="active"<?php }?> >
                <a href="<?php echo base_url();?>beranda/"><i class="fa fa-fw fa-dashboard"></i> Home</a>
            </li>

            <li <?php if ($aktif=="barang") {?>class="active"<?php }?> >
                <a href="<?php echo base_url();?>tampil_barang/"><i class="fa fa-fw fa-desktop"></i> Lihat Data Barang</a>
            </li>

            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-wrench"></i> Kelola Barang<i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
                    <li <?php if ($aktif=="tambahBarang") {?>class="active"<?php }?> >
                        <a href="<?php echo base_url();?>kelola_barang/tambah">Tambah Barang</a>
                    </li>
                    <li <?php if ($aktif=="updateBarang") {?>class="active"<?php }?> >
                        <a href="<?php echo base_url();?>kelola_barang/cari_ubah">Update Barang</a>
                    </li>
                    <li <?php if ($aktif=="deleteBarang") {?>class="active"<?php }?> >
                        <a href="<?php echo base_url();?>kelola_barang/hapus">Hapus Barang</a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#dropdownLaporan"><i class="fa fa-fw fa-table"></i> Laporan <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="dropdownLaporan" class="collapse">
                    <li <?php if ($aktif=="laporanHarian") {?>class="active"<?php }?> >
                        <a href="<?php echo base_url();?>laporan/harian">Harian</a>
                    </li>
                    <li <?php if ($aktif=="laporanBulanan") {?>class="active"<?php }?> >
                      <a href="<?php echo base_url();?>laporan/bulanan">Bulanan</a>
                    </li>
                    <li <?php if ($aktif=="laporanTahunan") {?>class="active"<?php }?> >
                      <a href="<?php echo base_url();?>laporan/tahunan">Tahunan</a>
                    </li>
                </ul>
            </li>



        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
