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

    <link href="<?php asset_url(); ?>css/plugins/dataTables.bootstrap.css" rel="stylesheet">
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
          $data['aktif'] = "barang";
          $this->load->view('navbar', $data);
        ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Data Barang
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Data Barang
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                    <div class="col-lg-12">

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="tabelBarang">
                                <thead>
                                    <tr>
                                        <th>ID Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Harga Barang</th>
                                        <th>Stok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($list->result() as $row) { ?>
                                    <tr>
                                        <td><?=$row->ID_BARANG?></td>
                                        <td><?=$row->NAMA_BARANG?></td>
                                        <td><?=$row->HARGA_JUAL?></td>
                                        <td><?=$row->STOK?></td>
                                    </tr>
                                    <?php } ?>
                                    <!-- <tr>
                                        <td>B001</td>
                                        <td>Pasta Gigi</td>
                                        <td>5000</td>
                                        <td>20</td>
                                    </tr>
                                    <tr>
                                        <td>B002</td>
                                        <td>Sikat Gigi</td>
                                        <td>3500</td>
                                        <td>50</td>
                                    </tr>
                                    <tr>
                                        <td>B003</td>
                                        <td>Sabun Mandi</td>
                                        <td>4000</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>B004</td>
                                        <td>Detergen</td>
                                        <td>25000</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <td>B005</td>
                                        <td>Shampoo</td>
                                        <td>7500</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <td>B006</td>
                                        <td>Handuk</td>
                                        <td>30000</td>
                                        <td>21</td>
                                    </tr>
                                    <tr>
                                        <td>B007</td>
                                        <td>Pembersih Wajah</td>
                                        <td>15000</td>
                                        <td>22</td>
                                    </tr> -->

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
    <script src="<?php asset_url(); ?>js/plugins/dataTables/jquery.dataTables.min.js"></script>
    <script src="<?php asset_url(); ?>js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(function() {
           $('#tabelBarang').dataTable(
               {
                   "language": {
                       "search": "Cari: ",
                       "lengthMenu": "Menampilkan _MENU_ barang per halaman",
                       "info": "Menampilkan barang ke-_START_ sampai _END_ dari _TOTAL_ barang",
                       "infoFiltered": "",
                       "infoEmpty": "",
                       "zeroRecords": "Barang tidak ditemukan",
                       "paginate" : {
                           "next": ">>",
                           "previous": "<<"
                       }
                   }
               }
           );
        });
    </script>
</body>

</html>
