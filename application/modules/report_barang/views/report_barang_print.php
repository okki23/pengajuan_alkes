<!-- <h1 align="center"> Tanda Terima Booking Fee </h1> -->
 
<h1 align="center"> Laporan Barang </h1> 
<hr>
<br>
&nbsp;
<br>
<table class="table table-bordered" border="1" cellpadding="3" cellspacing="0">
    <tr style="text-align: center; font-weight:bold;">
        <td> Kode Barang </td>
        <td> Nama Barang </td>
        <td> Qty </td>
    </tr>
        <?php 
            foreach($trans as $key=>$val){
        ?>
            <tr  style="text-align: center;">
                <td> <?php echo $val->kode_barang; ?></td>
                <td> <?php echo $val->nama_barang; ?></td>
                <td> <?php echo $val->qty; ?></td>
            </tr>

        <?php 
            }
        ?>
</table>
 