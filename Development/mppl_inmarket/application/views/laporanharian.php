<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

     <title>InMarket - Inventaris Minimarket</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php asset_url(); ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php asset_url(); ?>css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php asset_url(); ?>css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php asset_url(); ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="shortcut icon" href="<?php echo asset_url();?>icon/ikon.ico">
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="<?php asset_url(); ?>https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="<?php asset_url(); ?>https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
      <?php
      $data['aktif'] = "laporanHarian";
      $this->load->view('navbar', $data);
      ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Laporan Harian Minimarket
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url()?>beranda/">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Laporan Harian
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                    <div class="col-lg-6">
                        <div class="form-group">
                                <label>Pilih Tanggal</label>
                                <input type="date" id="search" class="form-control" placeholder="<?php echo date('Y-m-d')?>" onchange="keyPress()" value="<?=$search?>">
                        </div>
                    </div>



                    <div class="col-lg-12">

                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>

                                        <!-- <th>ID Transaksi</th>
                                        <th>Barang</th>
                                        <th>Jumlah</th>
                                        <th>Total</th> -->

                                        <th>Barang</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <?php $x = 0; $total = 0; if ($list[0] != null) {
                                      foreach ($list as $daftar_barang) {
                                        foreach ($daftar_barang->result() as $row) { ?>
                                    <tr>

                                        <td><?=$row->ID_FAKTUR?></td>
                                        <td><?=$row->NAMA_BARANG?></td>
                                        <td><?=$row->JUMLAH?></td>
                                        <td><?php echo $row->HARGA_JUAL * $row->JUMLAH?></td>

                                    </tr>

                                    <?php }}} ?> -->

                                    <?php foreach ($newList->result() as $row) { ?>
                                    <tr>

                                        <td><?=$row->nama_barang?></td>
                                        <td><?=$row->jumlah?></td>
                                        <td><?php echo $row->harga_jual * $row->jumlah?></td>

                                    </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>





            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php asset_url(); ?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php asset_url(); ?>js/bootstrap.min.js"></script>

    <script>
        function keyPress() {
            var val = $('#search').val();
            //alert(val);
            window.location.replace("<?php echo base_url();?>laporan/harian/"+val);
        }
    </script>

</body>

</html>
