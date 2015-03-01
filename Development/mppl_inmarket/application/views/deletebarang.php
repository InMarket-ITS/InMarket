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
    <style>
    #msgBox {
      position: fixed;
      width: 500px;
      left: 40%;
    }
    .modal-dialog {
      margin-top: 12%;
    }
    </style>
</head>

<body>

    <div id="wrapper">

      <?php
      $data['aktif'] = "deleteBarang";
      $this->load->view('navbar', $data);
      ?>
      <div id="page-wrapper">


        <?php if ($alertMsg != null) { ?>
          <div id="msgBox" class="alert alert-<?php echo $alertClass; ?>">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <?php echo $alertMsg; ?>
          </div>
          <?php } ?>

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Hapus Barang
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Hapus Barang
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">


                        <form role="form" action="/kelola_barang/submitHapus" id="formHapus">


                            <div class="form-group">
                                <label>Kategori Barang</label>
                                <select class="form-control">
                                    <option>Makanan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Nama Barang</label>
                                <select class="form-control">
                                    <option>Toblerone</option>
                                </select>
                            </div>
                            <div class="row">
                              <div class="col-lg-6">
                                <button type="button" class="btn btn-default" onclick="konfirmasiHapus()">Pilih</button>
                              </div>
                            </div>
                        </form>




                    </div>

                </div>
                <!-- /.row -->

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

    <script src="<?php asset_url(); ?>js/plugins/bootbox.min.js"></script>
    <?php if ($alertMsg != null) { ?>
      <script>
      $('#msgBox').delay(2000).fadeOut(1000);
      </script>
      <?php } ?>

    <script>
      function konfirmasiHapus() {

        bootbox.confirm({
          buttons: {
            confirm: {
              label: 'Ya',
              className: 'btn btn-primary'
            },
            cancel: {
              label: 'Tidak',
              className: 'cancel-button-class'
            }
          },
          message: 'Yakin ingin menghapus barang ini?',
          callback: function(result) {
            if (result) {
              $('#formHapus').submit();
            };
          }
        });
      }
    </script>

</body>

</html>
