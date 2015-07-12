<?php
include 'includes/config.php';
include 'includes/mysql.php';
include 'includes/configsitus.php';
global $koneksi_db,$url_situs;

echo "<html><head><title>Laporan Hutang </title>";
echo '<style type="text/css">
   table { page-break-inside:auto; 
    font-size: 0.8em; /* 14px/16=0.875em */
font-family: "Times New Roman", Times, serif;
   }
   tr    { page-break-inside:avoid; page-break-after:auto }
	table {
    border-collapse: collapse;}
	th,td {
    padding: 5px;
}
.border{
	border: 1px solid black;
}
.border td{
	border: 1px solid black;
}
body {
	margin		: 0;
	padding		: 0;
    font-size: 1em; /* 14px/16=0.875em */
font-family: "Times New Roman", Times, serif;
    margin			: 2px 0 5px 0;
}
</style>';
echo "</head><body>";
echo'
<table align="center">
<tr><td colspan="7"><img style="margin-right:5px; margin-top:5px; padding:1px; background:#ffffff; float:left;" src="images/logo.png" height="70px"></td></tr>

';
$tglmulai 		= $_GET['tglmulai'];
$tglakhir 		= $_GET['tglakhir'];
$status 		= $_GET['status'];
$supplier 		= $_GET['supplier'];
$namasupplier = getnamasupplier($supplier);
switch ($status) {
   case 'Semua':
         $wherestatus="";
         break;
   case 'Lunas':
         $wherestatus="and Hutang='0'";
         break;
   case 'Hutang':
         $wherestatus="and Hutang<>'0'";
         break;
}
if($supplier=='Semua'){
         $wheresupplier="";
		 $namasupplier ='SEMUA';
}else{
         $wheresupplier="and kodesupplier='$supplier'";
}
echo'<tr><td colspan="8"><h4>Laporan Hutang, Dari '.tanggalindo($tglmulai).', Sampai '.tanggalindo($tglakhir).', Supplier '.$namasupplier.'</h4></td></tr>';
echo'
<tr class="border">
            <td>No.Invoice</td>
            <td>Tanggal</td>
            <td>Supplier</td>
            <td>Total</td>
            <td>Bayar</td>
            <td>Kekurangan</td>
            <td>Jatuh Tempo</td>
            <td width="10%">Aksi</td>
        </tr>';
$s = mysql_query( "SELECT * FROM `pos_pembelian` where tgl >= '$tglmulai' and tgl <= '$tglakhir' $wherestatus $wheresupplier  order by tgltermin asc" );
while ($data = mysql_fetch_array($s)) { 
$noinvoice = $data['noinvoice'];
$hutang = $data['hutang'];
$lihatslip = '<a href="cetak_notainvoice.php?kode='.$data['noinvoice'].'&lihat=ok"target="new">'.$data['noinvoice'].'</a>';
$tgltermin = tanggalindo($data['tgltermin']);
if($tgltermin=='01/01/1970'){
$tgltermin='';
}
if($hutang>'0'){
$tombollunas = 'Hutang';
}else{
$tombollunas = 'Lunas';
}
echo'<tr class="border">
            <td>'.$lihatslip.'</td>
            <td>'.tanggalindo($data['tgl']).'</td>
            <td>'.getnamasupplier($data['kodesupplier']).'</td>
            <td>'.rupiah_format($data['total']).'</td>
            <td>'.rupiah_format($data['bayar']).'</td>
            <td>'.rupiah_format($data['hutang']).'</td>
            <td>'.$tgltermin.'</td>
            <td>'.$tombollunas.'</td>
        </tr>';
$ttotal += $data['total'];
$tbayar += $data['bayar'];
$thutang += $data['hutang'];
}   
echo '
<tr class="border">
            <td colspan="3">Grand Total</td>
            <td>'.rupiah_format($ttotal).'</td>
            <td>'.rupiah_format($tbayar).'</td>
            <td>'.rupiah_format($thutang).'</td>
            <td colspan="2"></td>
        </tr>';
echo '</table>';

/****************************/
echo "</body</html>";
/*
if (isset($_GET['tglmulai'])){
echo "<script language=javascript>
window.print();
</script>";
}
*/
?>
