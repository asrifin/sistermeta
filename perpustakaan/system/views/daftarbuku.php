<?php $SOUF=stocktake_unfinished();
$fmod='daftarbuku';
$xtable = new xtable($fmod,'Buku');
if($SOUF==0) $xtable->use_select();
$xtable->pageorder="barkode,judul";
if($SOUF!=0) $xtable->noopt=true;

$lok=gpost('lokasi');
$lokasi=lokasi_r($lok,1);
$jen=gpost('jenisbuku');
$jenisbuku=jenisbuku_r($jen,1);
$tingb=gpost('tingkatbuku');
$tingkatbuku=tingkatbuku_r($tingb,1);

// Query
$xtable->search_keyon('barkode=>pus_buku.barkode:EQ-0',
				'idbuku(nomor ID)=>pus_buku.idbuku:EQ-1',
				'judul=>pus_katalog.judul-2',
				'callnumber=>pus_katalog.callnumber-3',
				'kode(kode klasifikasi)=>pus_klasifikasi.kode:EQ-4',
				'pengarang(nama pengarang)=>pus_pengarang.nama-5',
				'penerbit(nama penerbit)=>pus_penerbit.nama-6');

$db=new xdb('pus_buku');
$db->field('pus_buku:replid,katalog,tingkatbuku,lokasi,barkode,idbuku,status','pus_katalog:judul,klasifikasi,callnumber,pengarang,penerbit','pus_klasifikasi:kode as n1,kode','pus_pengarang:nama as n2','pus_penerbit:nama as n3');
$db->join('katalog','pus_katalog');
$db->join('tingkatbuku','pus_tingkatbuku');
$db->joinother('pus_katalog','klasifikasi','pus_klasifikasi');
$db->joinother('pus_katalog','pengarang','pus_pengarang');
$db->joinother('pus_katalog','penerbit','pus_penerbit');
$db->where($lok==0?"":"pus_buku.lokasi='$lok'");
$db->where($ting==0?"":"pus_buku.tingkatbuku='$ting'");
$db->where_and($jen==0?"":"pus_katalog.jenisbuku='$jen'");
$db->where_and($xtable->search_sql_get());

$t=$db->query();
$xtable->ndata=mysql_num_rows($t);
$t=$db->query($xtable->pageorder_sql('barkode','judul','callnumber','n1','n2','n3','status'));

// Page Selection Bar
$PSBar = new PSBar_2(100);
$PSBar->begin();
	if(count($lokasi)>0){
		$PSBar->selection('Lokasi',iSelect('lokasi',$lokasi,$lok,$PSBar->selws,$fmod."_get()"));
	} else {
		$PSBar->end();
		hiddenval('lokasi',$lok);
		hiddenval('jenisbuku',$jen);
		hiddenval('tingkatbuku',$tingb);
		lokasi_warn();
		$PSBar->pass=false;
	}

	if($PSBar->pass){
	if(count($jenisbuku)>0){
		$PSBar->selection('Jenis koleksi',iSelect('jenisbuku',$jenisbuku,$jen,$PSBar->selws,$fmod."_get()"));
	} else {
		$PSBar->end();
		hiddenval('jenisbuku',$jenb);
		hiddenval('tingkatbuku',$tingb);
		jenisbuku_warn();
		$PSBar->pass=false;
	}}

	if($PSBar->pass){
	if(count($tingkatbuku)>0){
		$PSBar->selection('Tingkat koleksi',iSelect('tingkatbuku',$tingkatbuku,$ting,$PSBar->selws,$fmod."_get()"));
	} else {
		$PSBar->end();
		hiddenval('tingkatbuku',$tingb);
		tingkatbuku_warn();
		$PSBar->pass=false;
	}}

$PSBar->end();


if($PSBar->pass){

$xtable->btnbar_begin();
	if($xtable->cari==0){
	echo '<div class="sfont" style="float:left;margin-right:4px;margin-top:4px"><div style="float:left;margin-right:4px;width:100px"><b>Jumlah koleksi:</b></div><div style="float:left;margin-right:4px"><b>'.$xtable->ndata.'</b> item</div></div>';
	}
	$xtable->search_box();
	//$xtable->btnbar_print();
$xtable->btnbar_end();

$xtable->search_info();

if($xtable->ndata>0){
	$xtable->head('@Barkode','@!Nomor Induk','@Judul','@Callnumber','@Klasifikasi','@Pengarang','@Penerbit','@Status');
	while($r=mysql_fetch_array($t)){$xtable->row_begin($r['replid']);
		
		$xtable->td($r['barkode'],120);
		$xtable->td($r['idbuku'],120);
		$xtable->td(buku_judul($r['judul']));
		$xtable->td($r['callnumber'],80);
		$xtable->td(klasifikasi_name($r['klasifikasi']),200);
		$xtable->td($r['n2'],120);
		$xtable->td($r['n3'],120);
		$xtable->td(($r['status']==1?'Tersedia':'Dipinjam'),80);
		if($SOUF==0) $xtable->opt($r['replid'],'u','d');
		
	}
	$xtable->foot();
} else {
	$xtable->nodata_cust('Tidak ada data buku'.($jen==0?'':' jenis '.$jenisbuku[$jen]).($lok==0?'':' pada lokasi ini').'.');
}

}
?>