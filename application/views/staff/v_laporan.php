<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered table-condensed" style="font-size:12px;" id="mydata">
                <thead>
                    <tr>
                        <th style="text-align:center;width:40px;">No</th>
                        <th>Laporan</th>
                        <th style="width:100px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td style="text-align:center;vertical-align:middle">1</td>
                        <td style="vertical-align:middle;">Laporan Pengerjaan</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-default" href="#lap_jual_perbulan" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>
        <!-- ============ MODAL ADD =============== -->
        <!-- ============ MODAL ADD =============== -->
        <div class="modal fade" id="lap_jual_pertanggal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel">Pilih Tanggal</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/laporan/lap_transaksi_pertanggal' ?>" target="_blank">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label col-xs-3">Tanggal</label>
                                <div class="col-xs-9">
                                    <div class='input-group date' id='datepicker' style="width:300px;">
                                        <input type='date' name="tgl" class="form-control" value="" placeholder="Tanggal..." required />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ============ MODAL ADD =============== -->
        <div class="modal fade" id="lap_jual_perbulan" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel">Pilih Bulan</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'staff/laporan/lap_order' ?>" target="_blank">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label col-xs-3">Bulan</label>
                                <div class="col-xs-9">
                                    <select name="bln" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Bulan" data-width="80%" required />
                                    <?php foreach ($trans_bln->result_array() as $k) {
                                        $bln = $k['bulan'];
                                        ?>
                                        <option><?php echo $bln; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>


                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ============ MODAL ADD =============== -->
        <div class="modal fade" id="lap_jual_pertahun" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel">Pilih Tahun</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/laporan/lap_transaksi_pertahun' ?>" target="_blank">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label col-xs-3">Tahun</label>
                                <div class="col-xs-9">
                                    <select name="thn" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Tahun" data-width="80%" required />
                                    <?php foreach ($trans_thn->result_array() as $t) {
                                        $thn = $t['tahun'];
                                        ?>
                                        <option><?php echo $thn; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>


                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ============ MODAL ADD =============== -->
        <div class="modal fade" id="lap_laba_rugi" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel">Pilih Bulan</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/laporan/lap_laba_rugi' ?>" target="_blank">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label col-xs-3">Bulan</label>
                                <div class="col-xs-9">
                                    <select name="bln" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Bulan" data-width="80%" required />
                                    <?php foreach ($trans_bln->result_array() as $k) {
                                        $bln = $k['bulan'];
                                        ?>
                                        <option><?php echo $bln; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>


                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ============ END MODAL ADD =============== -->

    </div>

</div>