<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
    <title>Laporan data transaksi</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css') ?>" />
</head>

<body onload="window.print()">
    <div id="laporan">
        <table align="center" style="width:900px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
            <!--<tr>
    <td><img src="<? php
                    ?>"/></td>
</tr>-->
        </table>

        <table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
            <tr>
                <td colspan="2" style="width:800px;paddin-left:20px;">
                    <center>
                        <h4>LAPORAN TRANSAKSI</h4>
                    </center><br />
                </td>
            </tr>

        </table>

        <table border="0" align="center" style="width:900px;border:none;">
            <tr>
                <th style="text-align:left"></th>
            </tr>
        </table>

        <table border="1" align="center" style="width:900px;margin-bottom:20px;">
            <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>No Faktur</th>
                    <th>ID Pelanggan</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Status Jasa</th>
                    <th>Pengiriman</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                foreach ($data->result_array() as $i) {
                    $no++;
                    ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td style="text-align:left;"><?php echo $i['id_transaksi']; ?></td>
                        <td style="text-align:left;"><?php echo $i['id_pelanggan']; ?></td>
                        <td style="text-align:left;"><?php echo $i['nama']; ?></td>
                        <td style="text-align:left;"><?php echo $i['trans_tanggal']; ?></td>
                        <td style="text-align:left;"><?php echo $i['trans_pengiriman']; ?></td>
                        <td style="text-align:left;"><?php echo $i['trans_status']; ?></td>
                        <td style="text-align:right;"><?php echo 'Rp ' . number_format($i['d_trans_total']); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <?php
                $b = $jml->row_array();
                ?>
                <tr>
                    <td colspan="7" style="text-align:center;"><b>Total</b></td>
                    <td style="text-align:right;"><b><?php echo 'Rp ' . number_format($b['total']); ?></b></td>
                </tr>
            </tfoot>
        </table>
        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <td></td>
        </table>
        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <td align="right">Jakarta, <?php echo date('d-M-Y') ?></td>
            </tr>
            <tr>
                <td align="right"></td>
            </tr>

            <tr>
                <td><br /><br /><br /><br /></td>
            </tr>
            <tr>
                <td align="right">( Clinico Shoes )</td>
            </tr>
            <tr>
                <td align="center"></td>
            </tr>
        </table>
        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <th><br /><br /></th>
            </tr>
            <tr>
                <th align="left"></th>
            </tr>
        </table>
    </div>
</body>

</html>_