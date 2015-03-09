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

      .form-error p {
        display: inline;
        color: red;
      }
    </style>
</head>

<body>

    <div id="wrapper">
      <?php
        $data['aktif'] = "tambahBarang";
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
                            Tambah Barang
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>beranda">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Tambah Barang
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">


                        <form role="form" enctype= "multipart/form-data" method="post" action="/kelola_barang/submitTambah">
                            <div class="form-group">
                                <label>ID Barang <span class="form-error"><?php echo form_error('id'); ?></span></label>
                                <input class="form-control" name="id">
                            </div>

                            <div class="form-group">
                                <label>Nama Barang <span class="form-error"><?php echo form_error('nama'); ?></span></label>
                                <input class="form-control" name="nama">
                            </div>

                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" name="kategori">
                                    <?php foreach($kategori as $k) { ?>
                                    <option value="<?php echo $k->ID_KATEGORI; ?>"><?php echo ucwords($k->NAMA_KATEGORI); ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Jumlah Barang <span class="form-error"><?php echo form_error('jumlah'); ?></span></label>
                                <input type="number" class="form-control" name="jumlah">
                            </div>

                            <label>Harga Beli <span class="form-error"><?php echo form_error('harga_beli'); ?></span></label>
                            <div class="form-group input-group">
                                <span class="input-group-addon">Rp</span>
                                <input type="number" class="form-control" name="harga_beli">
                                <span class="input-group-addon">.00</span>
                            </div>

                            <label>Harga Jual <span class="form-error"><?php echo form_error('harga_jual'); ?></span></label>
                            <div class="form-group input-group">
                                <span class="input-group-addon">Rp</span>
                                <input type="number" class="form-control" name="harga_jual">
                                <span class="input-group-addon">.00</span>
                            </div>

                            <div class="form-group">
                              <label>Keterangan</label>
                              <textarea class="form-control" name="keterangan"></textarea>
                            </div>

                            <div class="form-group">
                              <label>Gambar</label>
                              <input type="file" class="form-control" name="gambar" accept="image/*">
                            </div>

                            <div class="row">
                              <div class="col-lg-6">
                                <button type="reset" class="btn btn-danger">Ulang<i></i></button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
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

    <?php if ($alertMsg != null) { ?>
      <script>
        $('#msgBox').delay(2000).fadeOut(1000);
      </script>
    <?php } ?>

</body>

</html>
