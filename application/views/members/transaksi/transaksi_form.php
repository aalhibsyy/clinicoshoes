<!-- Begin Page Content -->
<script src="<?= base_url('assets/maskMoney/jquery.maskMoney.min.js') ?>"></script>
<div class="container-fluid">
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <center><?php echo $this->session->flashdata('msg'); ?></center>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <center><b>Transaksi</b></center>
                        </div>
                        <div class="card-body card-block">
                            <form action="<?php echo base_url() . 'members/transaksi/simpan_transaksi' ?>" method="post">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label class=" form-control-label text-right">No. Transaksi :</label>
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <input type="text" id="input_id" name="input_id" class="form-control" value="<?= $kode ?>" required readonly>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label class=" form-control-label text-right">Pilih Jasa :</label>
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <a href="#" data-toggle="modal" data-target="#largeModal" class="btn btn-primary btn-sm" role="button">Pilih Jasa</a>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label text-right">Pilih Staff :</label>
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <input required list="list_barang" class="form-control reset" placeholder="ID atau Nama Staff ..." name="id_barang" id="id_barang" autocomplete="off" onchange="showPelanggan(this.value)">
                                                <datalist id="list_barang" required>
                                                    <?php foreach ($pelanggan as $pelanggan) : ?>
                                                        <option value="<?= $pelanggan->id ?>"><?= $pelanggan->first_name ?></option>
                                                    <?php endforeach ?>
                                                </datalist>
                                            </div>
                                        </div>
                                        <div id="barang">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label text-right">Nama :</label>
                                                </div>
                                                <div class="col-12 col-md-8">
                                                    <input type="text" class="form-control reset" name="nama_pelanggan" id="nama_pelanggan" readonly="readonly">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label text-right">No Telepon :</label>
                                                </div>
                                                <div class="col-12 col-md-8">
                                                    <input type="number" class="form-control reset" name="telepon" id="telepon" readonly="readonly">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label class=" form-control-label text-right">Jenis Sepatu :</label>
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <input type="text" class="form-control reset" name="jenis_sepatu" id="jenis_sepatu" required>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label class=" form-control-label text-right">Size :</label>
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <input type="number" class="form-control reset" name="size" id="size" placeholder="19 - 49" required>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-md-4 mb">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="total" class="besar"><b>Total (Rp) :</b></label>
                                                <input type="text" name="total2" value="<?php echo number_format($this->cart->total()); ?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                                                <input type="hidden" id="total" name="total" value="<?php echo $this->cart->total(); ?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                                            </div>

                                            <input type="hidden" id="id_transaksi" name="id_transaksi" value="<?= $kode ?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required>
                                            <button type="submit" class="btn btn-info btn-lg"> Simpan</button>
                                        </div>
                            </form>
                        </div><!-- end col-md-4 -->
                    </div>


                    <style>
                        tr td {
                            padding-left: 10px !important;
                            padding-right: 10px !important;
                            padding-top: 5px !important;
                            padding-bottom: 3px !important;
                            margin: 0 !important;
                            text-align: center !important;
                        }
                    </style>
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0" style="font-size:14px;margin-top:10px;">
                            <thead class="text-center">
                                <tr>
                                    <th style="text-align:center;">Nama</th>
                                    <th style="text-align:center;">Harga(Rp)</th>
                                    <th style="text-align:center;">Keterangan</th>
                                    <th style="text-align:center;">Jumlah</th>
                                    <th style="text-align:center;">Sub Total</th>
                                    <th style="width:100px;text-align:center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($this->cart->contents() as $items) : ?>
                                    <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
                                    <tr>
                                        <td><?= $items['name']; ?></td>
                                        <td style="text-align:right;"><?php echo number_format($items['price']); ?></td>
                                        <td style="text-align:center;"><?= $items['ket']; ?></td>
                                        <td style="text-align:center;"><?= $items['qty']; ?></td>
                                        <td style="text-align:right;"><?php echo number_format($items['subtotal']); ?></td>

                                        <td style="text-align:center;"><a href="<?php echo base_url() . 'members/transaksi/remove/' . $items['rowid']; ?>" class="btn btn-warning btn-sm"><span class="fa fa-close"></span> Batal</a></td>
                                    </tr>

                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <hr />
                </div>
                <!-- /.row -->
                <!-- ============ MODAL ADD =============== -->
                <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel"><b>Pilih Jasa</b></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body" style="overflow:scroll;height:400px;">
                                <div class="table-responsive">
                                    <table class="table table-border table-condensed" id="mydata">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center">No</th>
                                                <th style="text-align:center">Nama Jasa</th>
                                                <th style="text-align:center">Harga</th>
                                                <th style="text-align:center">Keterangan</th>
                                                <th style="text-align:center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            foreach ($jasa->result_array() as $a) :
                                                $no++;
                                                $id = $a['id_jasa'];
                                                $nm = $a['nama_jasa'];
                                                $harga = $a['harga'];
                                                $ket = $a['keterangan'];
                                                ?>
                                                <tr>
                                                    <td style="text-align:center;"><?php echo $no; ?></td>
                                                    <td style="text-align:center;"><?php echo $nm; ?></td>
                                                    <td style="text-align:right;"><?php echo 'Rp ' . number_format($harga); ?></td>
                                                    <td style="text-align:center;"><?php echo $ket; ?></td>
                                                    <td style="text-align:center;">
                                                        <form action="<?php echo base_url() . 'members/transaksi/add_to_cart' ?>" method="post">
                                                            <input type="hidden" name="id_jasa" value="<?php echo $id ?>">
                                                            <input type="hidden" name="nama" value="<?php echo $nm; ?>">
                                                            <input type="hidden" name="harga" value="<?php echo $harga; ?>">
                                                            <input type="hidden" name="keterangan" value="<?php echo $ket; ?>">
                                                            <input type="hidden" name="qty" value="1" required>
                                                            <button type="submit" class="btn btn-sm btn-info" title="Pilih"><span class="fa fa-edit"></span> Pilih</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Tutup</button>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Cari Pelanggan -->
                <script type="text/javascript">
                    function showPelanggan(str) {

                        if (str == "") {
                            $('#nama_pelanggan').val('');
                            $('#telepon').val('');
                            return;
                        } else {
                            if (window.XMLHttpRequest) {
                                // code for IE7+, Firefox, Chrome, Opera, Safari
                                xmlhttp = new XMLHttpRequest();
                            } else {
                                // code for IE6, IE5
                                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                            }
                            xmlhttp.onreadystatechange = function() {
                                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                    document.getElementById("barang").innerHTML =
                                        xmlhttp.responseText;
                                }
                            }
                            xmlhttp.open("GET", "<?= base_url(
                                                        'members/transaksi/getpelanggan'
                                                    ) ?>/" + str, true);
                            xmlhttp.send();
                        }
                    }
                </script>
                <!-- END Cari Pelanggan -->

                <script type="text/javascript">
                    $(function() {
                        $('#jml_uang').on("input", function() {
                            var total = $('#total').val();
                            var jumuang = $('#jml_uang').val();
                            var hsl = jumuang.replace(/[^\d]/g, "");
                            $('#jml_uang2').val(hsl);
                            $('#kembalian').val(hsl - total);
                        })

                    });
                </script>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#mydata').DataTable();
                    });
                </script>
                <script type="text/javascript">
                    $(function() {
                        $('.jml_uang').priceFormat({
                            prefix: '',
                            centsSeparator: ',',
                            centsLimit: 0,
                            thousandsSeparator: ','
                        });
                        $('#jml_uang2').priceFormat({
                            prefix: '',
                            //centsSeparator: '',
                            centsLimit: 0,
                            thousandsSeparator: ''
                        });
                        $('#kembalian').priceFormat({
                            prefix: '',
                            //centsSeparator: '',
                            centsLimit: 0,
                            thousandsSeparator: ','
                        });
                        $('.harjul').priceFormat({
                            prefix: '',
                            //centsSeparator: '',
                            centsLimit: 0,
                            thousandsSeparator: ','
                        });
                    });
                </script>
                <script type="text/javascript">
                    $(document).ready(function() {
                        //Ajax kabupaten/kota insert
                        $("#kode_brg").focus();
                        $("#kode_brg").on("input", function() {
                            var kobar = {
                                kode_brg: $(this).val()
                            };
                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url() . 'members/penjualan/get_barang'; ?>",
                                data: kobar,
                                success: function(msg) {
                                    $('#detail_barang').html(msg);
                                }
                            });
                        });

                        $("#kode_brg").keypress(function(e) {
                            if (e.which == 13) {
                                $("#jumlah").focus();
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>
</div>
</div>