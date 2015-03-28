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

    <style>
      .form-group label {
        width: 100px;
      }
      #inputID {
        width: 200px;
        display: inline-block;
        margin-right: 50px;
      }
      #inputJumlah {
        width: 100px;
        display: inline-block;
      }
      #btnTambah {
        margin-left: 50px;
        display: inline-block;
      }
      #inputBayar {
          display: inline-block;
      }
      a {
        cursor: pointer;
      }
      td {
        transition: opacity 500ms;
        -webkit-transition: opacity 500ms;
      }
      .right-aligned {
        text-align: right;
      }
      #btnSubmit {
        width: 100%;
        font-size: 1.5em;
      }
    </style>
</head>

<body>

    <div id="wrapper">
        <?php if (isset($hak_akses)) {
          if ($hak_akses == 1) {
            $data['aktif'] = 'transaksi';
            $this->load->view('navbar.php', $data);
          }
          else
            $this->load->view('navbarkasir.php');
        } ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Transaksi Penjualan Barang
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Transaksi Penjualan Barang
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                <div class="col-lg-8 col-lg-offset-2">




                      <label>ID Barang</label>
                      <input class="form-control" id="inputID" onkeypress="keyPressTambah(event, this)">

                    <label>Jumlah</label>
                      <input class="form-control" id="inputJumlah" onkeypress="keyPressTambah(event, this)">

                    <button type="button" id="btnTambah" class="btn btn-primay" onclick="tambahBarang()">Tambahkan</button>
                  </div>
                </div>
                <br />
                <form role="form" id="form" method="post" action="<?php echo base_url(); ?>transaksi/cetak">
                <div class="row">
                  <div class="col-lg-10 col-lg-offset-1">
                    <table class="table table-bordered table-hover table-striped" id="tabelBarang">
                      <thead>
                        <tr>
                          <th>ID Barang</th>
                          <th>Nama Barang</th>
                          <th>Harga Satuan</th>
                          <th>Jumlah</th>
                          <th>Harga</th>
                          <th>Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                    <input id="inputTotal" type="hidden" name="total" value="0" />
                    <input id="daftarBarang" type="hidden" name="daftarBarang" />
                  </div>
                </div>
                <div class="row" style="line-height: 2.5em; vertical-align: middle">
                    <div class="col-lg-1 col-lg-offset-3"><label>Total</label></div>
                    <div class="col-lg-5"><span id="cellTotal"></span></div>
                </div>
                <div class="row">
                    <div class="col-lg-1 col-lg-offset-3"><label>Bayar</label></div>
                    <div class="col-lg-5"><input id="inputBayar" name="bayar" class="form-control" onchange="cekBayar(this)" onkeypress="enterPressed(event, this)"></div>
                </div>
                <div class="row">
                    <div class="col-lg-1 col-lg-offset-3"><label>Kembali</label></div>
                    <div class="col-lg-5"><span id="kembalian"></span></div>
                </div>
                <br/>
                <div class="row">
                  <div class="col-lg-2 col-lg-offset-4">
                    <button type="button" class="btn btn-primary" id="btnSubmit" onclick="submitForm()">Selesai</button>
                  </div>
                </div>
              </form>



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
      count = 0;
      sum = 0;
      function tambahBarang() {
        $.getJSON('<?php echo base_url(); ?>ajax/dataBarang/' + $('#inputID').val(),
          function (data) {
            if (!$.isEmptyObject(data)) {
              var idBarang = $('#inputID').val();
              var jumlah = $('#inputJumlah').val();
              if (idBarang && jumlah && jumlah < parseInt(data.STOK)) {
                var inserted = $('<tr><td>' + idBarang + '</td><td>' + data.NAMA_BARANG + '</td><td class="right-aligned">' + data.HARGA_JUAL + '</td><td>' + jumlah + '</td><td class="right-aligned">' + jumlah * data.HARGA_JUAL + '</td><td><a onclick="batal(this)">Batalkan</td></tr>');
                inserted.find('td').css('opacity', '0');
                $('#tabelBarang').find('tbody').append(inserted);
                setTimeout(function(){inserted.find('td').css('opacity', '1.0')}, 10);
                var tempsum = sum;
                sum += jumlah * data.HARGA_JUAL;
                if (isNaN(sum))
                  sum = tempsum;
                $('#cellTotal').text(sum);
                $('#inputTotal').val(sum);
                $('#inputID').val(null);
                $('#inputJumlah').val(null);
                $('#inputID').focus();
              }
            }
          }
        );
      }
      function batal(item) {
        item = $(item);
        var hargaBatal = item.parent().prev().text();
        var tempsum = sum;
        sum -= hargaBatal;
        if (isNaN(sum))
          sum = tempsum;
        var row = item.parent().parent();
        row.remove();
        $('#cellTotal').text(sum);
        $('#inputTotal').val(sum);
      }

      function submitForm() {
        var kembalian = parseInt($('#kembalian').text());
        if (kembalian === NaN || kembalian < 0) {
            alert('Jumlah bayar kurang dari total harga!');
            return false;
        }
        var daftarBarang = [];
        var rows = $('tbody tr');
        for (var i=0; i<rows.length; i++) {
          var barang = {};
          var children = $(rows[i]).children();
          barang.id = parseInt(children[0].innerHTML);
          barang.nama = children[1].innerHTML;
          barang.jumlah = parseInt(children[3].innerHTML);
          barang.hargaSatuan = parseInt(children[2].innerHTML);
          barang.hargaTotal = parseInt(children[4].innerHTML);
          daftarBarang.push(barang);
        }
        $('#daftarBarang').val(JSON.stringify(daftarBarang));
        $('#form').submit();
      }

      function cekBayar(input) {
          $('#kembalian').text(parseInt(input.value) - sum);
      }

      function enterPressed(event, input) {
          var code = (event.keyCode ? event.keyCode : event.which);
          if (code == 13) {
              event.preventDefault();
              cekBayar(input);
              return false;
          }
      }

      function keyPressTambah(event, input) {
          if (event.keyCode == 13) {
              tambahBarang();
          }
      }
    </script>

</body>

</html>
