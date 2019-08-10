<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
    <title>Laporan Pelanggan</title>
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
                        <h4>LAPORAN DATA PELANGGAN</h4>
                    </center><br />
                </td>
            </tr>

        </table>

        <table border="0" align="center" style="width:800px;border:none;">
            <tr>
                <th style="text-align:left"></th>
            </tr>
        </table>
        <table border="1" align="center" style="width:800px;margin-bottom:20px;">
            <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>Nama</th>
                    <th>No Telp</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Total Transaksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                foreach ($data->result_array() as $i) {
                    $idpel = $i['idpel'];
                    $query = $this->db->query("SELECT COUNT(id_transaksi) AS jml_trans FROM transaksi
                    WHERE id_pelanggan=$idpel");
                    $t = $query->row_array();

                    $no++;
                    ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td style="text-align:left;"><?= $i['first_name']; ?> <?= $i['last_name']; ?></td>
                        <td style="text-align:left;"><?php echo $i['phone']; ?></td>
                        <td style="text-align:left;"><?php echo $i['email']; ?></td>
                        <td style="text-align:left;"><?php echo $i['address']; ?></td>
                        <td style="text-align:center;"><?php echo $t['jml_trans']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
</body>

</html>