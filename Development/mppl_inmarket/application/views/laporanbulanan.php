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

    <script src="<?php asset_url(); ?>js/jquery.js"></script>
    <script src="<?php asset_url(); ?>js/plugins/morris/raphael.min.js"></script>
    <script src="<?php asset_url(); ?>js/plugins/morris/morris.min.js"></script>
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="<?php asset_url(); ?>https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="<?php asset_url(); ?>https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        #divname{
            height:400px;
        }

    </style>
</head>

<body>

    <div id="wrapper">
      <?php
      $data['aktif'] = "laporanBulanan";
      $this->load->view('navbar', $data);
      ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Laporan Bulanan Minimarket
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url()?>beranda/">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Laporan Bulanan
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                    <div class="col-lg-3">
                        <div class="form-group">
                                <label>Pilih Tahun</label>
                                <select class="form-control" id="mySelectTahun" onchange="keyPress()">
                                    <?php for ($i = 2010; $i <= date('Y'); $i++) { ?>
                                    <option value="<?=$i?>" <?=$selectTahun[$i]?>><?=$i?></option>
                                    <?php } ?>
                                    <!-- <option>2010</option>
                                    <option>2011</option>
                                    <option>2012</option>
                                    <option>2013</option>
                                    <option>2014</option> -->
                                </select>
                            </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                                <label>Pilih Bulan</label>
                                <select class="form-control" id="mySelectBulan" onchange="keyPress()">
                                    <?php for ($i = 1; $i <= (int) date('m'); $i++) { ?>
                                    <option value="<?=$i?>" <?=$select[$i]?>><?php echo date('F', mktime(0, 0, 0, $i, 10));?></option>
                                    <?php } ?>
                                    <!-- <option>Januari</option>
                                    <option>Februari</option>
                                    <option>Maret</option>
                                    <option>April</option>
                                    <option>Mei</option> -->
                                </select>
                        </div>
                    </div>

                    <div class="col-lg-12" id="chartShow">
                    <div id="divname"></div>
                    </div>

                    <div class="col-lg-12">

                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        
                                        <!-- <th>Tanggal</th>
                                        <th>ID Transaksi</th>
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
                                      $x++;
                                      foreach ($daftar_barang->result() as $row) { ?>
                                  <tr>

                                      <td><?=$waktu[$x-1]?></td>
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
            var x = document.getElementById("mySelectTahun");
            var valx = x.options[x.selectedIndex].value;


            // alert(valx);

            var y = document.getElementById("mySelectBulan");
            var valy = y.options[y.selectedIndex].value;

            // alert(valy);

            if ( valy < 10 ) {
                window.location.replace("<?php echo base_url();?>laporan/bulanan/"+valx+"-0"+valy);
            } else {
                window.location.replace("<?php echo base_url();?>laporan/bulanan/"+valx+"-"+valy);
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            <?php 
                $data = $newList->result();
                $limit = count($data)-1;
                if ($limit >= 0) {
            ?>
                new Morris.Bar({
                  // ID of the element in which to draw the chart.
                  element: 'divname',
                  // Chart data records -- each entry in this array corresponds to a point on
                  // the chart.
                  data: [
                    <?php 
                        $data = $newList->result();
                        $limit = count($data)-1;
                        for ($i = 0; $i < $limit; $i++) {
                            echo '{barang: "' . $data[$i]->nama_barang . '", jumlah: ' . $data[$i]->jumlah . '},'; 
                        }
                        echo '{barang: "' . $data[$limit]->nama_barang . '", jumlah: ' . $data[$limit]->jumlah . '}';                 
                    ?>
                  ],
                  // The name of the data record attribute that contains x-values.
                  xkey: 'barang',
                  // A list of names of data record attributes that contain y-values.
                  ykeys: ['jumlah'],
                  // Labels for the ykeys -- will be displayed when you hover over the
                  // chart.
                  labels: ['Jumlah']
                });
            <?php }
                else {
            ?>
                $('#divname').css('display', 'none');
                <?php } ?>
        });
    </script>

</body>

</html>
