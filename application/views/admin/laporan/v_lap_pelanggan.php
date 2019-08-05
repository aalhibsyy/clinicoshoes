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

        <table border="0" align="center" style="width:900px;border:none;">
            <tr>
                <th style="text-align:left"></th>
            </tr>
        </table>
        <table border="1" align="center" style="width:900px;margin-bottom:20px;">
            <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>ID Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>Jenis Kelamin</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
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
                        <td style="text-align:center;"><?php echo $i['id_pelanggan']; ?></td>
                        <td style="text-align:center;"><?php echo $i['nama']; ?></td>
                        <td style="text-align:center;"><?php echo $i['jenis_kelamin']; ?></td>
                        <td style="text-align:center;"><?php echo $i['telepon']; ?></td>
                        <td style="text-align:center;"><?php echo $i['alamat']; ?></td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
</body>

</html>