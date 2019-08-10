<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
    <title>laporan transaksi</title>
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
            <?php
            $urut = 0;
            $nomor = 0;
            $group = '-';
            $total = 0;
            foreach ($data->result_array() as $d) {
              
                $nomor++;
                $urut++;
                if ($group == '-' || $group != $d['id_trans']) {
                    $kat = $d['id_trans'];
                    $query = $this->db->query("SELECT *, SUM(d_trans_qty) AS jml_trans FROM transaksi a 
                    JOIN detail_transaksi b ON a.id_transaksi=b.id_transaksi 
                    JOIN users c ON c.id=a.id_pelanggan
                    WHERE b.id_transaksi='$kat'");
                    $t = $query->row_array();
                    $tots = $t['jml_trans'];
                    $nm_f = $t['first_name'];
                    $nm_l = $t['last_name'];
                    $phone = $t['phone'];
                    if ($group != '-')
                   
                        echo "</table><br>";
                    echo "<table align='center' width='800px;' border='1'>";
                    echo "<tr><td colspan='2'><b>ID Transaksi: $kat</b> &nbsp;&nbsp; <b>Nama : $nm_f $nm_l</b> &nbsp;&nbsp; <b>No Telp : $phone</b></td>
                                <td colspan='2' style='text-align:center;'><b>Total Jasa : $tots</b></td>
                        </tr>";
                    echo "<tr style='background-color:#ccc;'>
                    <td width='4%' align='center'>No</td>
                    <td width='60%' align='center'>Servis</td>
                    <td width='30%' align='center'>Jumlah</td>
                    <td width='30%' align='center'>Harga</td>
                    </tr>";
                    $nomor = 1;
                }
                $group = $d['id_trans'];
                if ($urut == 500) {
                    $nomor = 0;
                    $total = 0;
                    echo "<div class='pagebreak'> </div>";
                    //echo "<center><h2>KALENDER EVENTS PER TAHUN</h2></center>";
                }
                ?>
                <tr>
                    <td style="text-align:center;vertical-align:top;text-align:center;"><?php echo $nomor; ?></td>
                    <td style="vertical-align:top;padding-left:5px;"><?php echo $d['d_trans_jasa_nama']; ?></td>
                    <td style="vertical-align:top;text-align:center;"><?php echo $d['d_trans_qty']; ?></td>
                    <td style="vertical-align:top;text-align:center;">Rp<?php echo number_format($d['d_trans_total'],2,',','.'); ?></td>
                </tr>
                <?php $total = $total + $d['d_trans_total']; ?>
        
            <?php
            }
            ?>
        </table>
        <br />
        <table border="0" align="center" style="width:800px;border:none;">
            <tr>
                <th style="text-align:right">Total Pemasukan</th>
            </tr>
            <tr>
                <td style="text-align:right">
               <b> Rp.<?=number_format($total,2,',','.');?></b>
                </td>
            </tr>
        </table>

    </div>
</body>

</html>