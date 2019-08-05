<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
    <title>Faktur Penjualan Barang</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css') ?>" />
</head>

<body onload="window.print()">
    <div id="laporan">
        <table align="center" style="width:700px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
            <!--<tr>
    <td><img src="<? php
                    ?>"/></td>
</tr>-->
        </table>

        <table border="0" align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:0px;">
            <tr>
                <center><b>Clinico Shoes</b></center>
            </tr>

        </table>
        <?php
        $b = $data->row_array();
        ?>
        <table border="0" align="center" style="width:700px;border:none;">
            <tr>
                <th style="text-align:left;">No Faktur</th>
                <th style="text-align:left;">: <?php echo $b['id_trans']; ?></th>
                <th style="text-align:left;">Tanggal</th>
                <th style="text-align:left;">: <?php echo $b['trans_tanggal']; ?></th>

            </tr>
            <tr>
                <th style="text-align:left;">Staff</th>
                <th style="text-align:left;">: <?php echo $b['first_name']; ?></th>
                <th style="text-align:left;">Total</th>
                <th style="text-align:left;">: <?php echo 'Rp ' . number_format($b['trans_total']) . ',-'; ?></th>
            </tr>
            <tr>
                <th style="text-align:left;">Keterangan</th>
                <th style="text-align:left;">: <?php echo $b['trans_status']; ?></th>

            </tr>
        </table>

        <table border="1" align="center" style="width:700px;margin-bottom:20px;">
            <thead>

                <tr>
                    <th style="width:50px;">No</th>
                    <th>Nama Jasa</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>SubTotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                foreach ($data->result_array() as $i) {
                    $no++;

                    $nabar = $i['d_trans_jasa_nama'];
                    $harga = $i['d_trans_harga'];
                    $qty = $i['d_trans_qty'];
                    $total = $i['d_trans_total'];
                    ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td style="text-align:left;"><?php echo $nabar; ?></td>
                        <td style="text-align:right;"><?php echo 'Rp ' . number_format($harga); ?></td>
                        <td style="text-align:center;"><?php echo $qty; ?></td>
                        <td style="text-align:right;"><?php echo 'Rp ' . number_format($total); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>

                <tr>
                    <td colspan="4" style="text-align:center;"><b>Total</b></td>
                    <td style="text-align:right;"><b><?php echo 'Rp ' . number_format($b['trans_total']); ?></b></td>
                </tr>
            </tfoot>
        </table>

    </div>
</body>

</html>