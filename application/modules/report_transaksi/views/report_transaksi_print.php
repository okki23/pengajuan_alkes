<!-- <h1 align="center"> Tanda Terima Booking Fee </h1> -->
 
<h1 align="center"> Laporan Transaksi </h1> 
<hr>
<br>
&nbsp;
<br>
<table class="table table-bordered" border="1" cellpadding="3" cellspacing="0">
    <tr style="text-align: center; font-weight:bold;">
        <td> Kode Pengajuan </td>
        <td> Kode Barang </td>
        <td> Nama Barang </td>
        <td> Jumlah </td>
        <td> Kondisi </td>
        <td> Keterangan </td>
        <td> Status </td>
        <td> PIC </td>
        <td> Tanggal Pengajuan </td>
     
    </tr>
        <?php 
            foreach($trans as $key=>$val){
        ?>
            <tr  style="text-align: center;">
                <td> <?php echo $val->kode_pengajuan; ?></td>
                <td> <?php echo $val->kode_barang; ?></td>
                <td> <?php echo $val->nama_barang; ?></td>
                <td> <?php echo $val->jumlah; ?></td>
                <td> <?php echo $val->kondisinya; ?></td>
                <td> <?php echo $val->keterangan; ?></td>
                <td> <?php echo $val->statusnya; ?></td>
                <td> <?php echo $val->username; ?></td>
                <td> <?php echo $val->date_submit; ?></td>
            </tr>

        <?php 
            }
        ?>
</table>
 