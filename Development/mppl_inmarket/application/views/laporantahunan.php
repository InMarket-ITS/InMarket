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
      $data['aktif'] = "laporanTahunan";
      $this->load->view('navbar', $data);
      ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Laporan Tahunan Minimarket
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Laporan Tahunan
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                    <div class="col-lg-6">
                        <div class="form-group">
                                <label>Pilih Tahun</label>
                                <select class="form-control" id="mySelect" onchange="keyPress()">
                                    <?php for ($i = 2010; $i <= date('Y'); $i++) { ?>
                                    <option value="<?=$i?>" <?=$select[$i]?>><?=$i?></option>
                                    <?php } ?>
                                    <!-- <option>2010</option>
                                    <option>2011</option>
                                    <option>2012</option>
                                    <option>2013</option>
                                    <option>2014</option> -->
                                </select>
                            </div>
                    </div>



                    <div class="col-lg-12">

                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Bulan</th>
                                        <th>Total</th>


                                    </tr>
                                </thead>
                                <tbody>

                                    <?php for ($x=1; $x<13; $x++) { ?>
                                    <tr>

                                        <td><?php echo date('F', mktime(0, 0, 0, $x, 10));?></td>
                                        <td><?=$list[$x]?></td>

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
        function keyPress(e) {
            var x = document.getElementById("mySelect").selectedIndex;
            var val = document.getElementsByTagName("option")[x].value;
            window.location.replace("<?php echo base_url();?>laporan/tahunan/"+val);
        }
    </script>

</body>

</html>
