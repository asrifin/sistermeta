<?php require_once(MODDIR.'fform/fform.php'); $opt=gpost('opt');$cid=gpost('cid');if($cid=='')$cid=0;

// form Module
$fmod='katalog_pengarang';
$dbtable='pus_pengarang';
$fform=new fform($fmod,$opt,$cid,'pengarang');

$inp=app_form_gpost('nama','nama2','keterangan');

if($opt=='a'||$opt=='u'||$opt=='d'){ $q=false;
	if($opt=='a'){ // add
		$q=dbInsert($dbtable,$inp);
		if($q){
			echo mysql_insert_id().';'.$inp['nama'];
		}
	}
	else if($opt=='u') { // edit
		$q=dbUpdate($dbtable,$inp,"replid='$cid'");
	}
	else if($opt=='d'){ // delete
		$q=dbDel($dbtable,"replid='$cid'");
	}
	$fform->notif($q);
} else {
	if($opt=='uf'||$opt=='df'){ // Prepocessing form
		$r=dbSFA("*",$dbtable,"W/replid='$cid'");
	} else {
		
	}
	$fform->head();
	if($opt=='af' || $opt=='uf'){ require_once(MODDIR.'control.php'); // Add or Edit form
	
		$fform->fi('Nama pengarang',iText('nama',$r['nama'],$fform->rwidths,'','onkeyup="E(\'nama2\').value=pengarang_namabib(this.value)"'));
		$fform->fi('Nama kutipan',iText('nama2',$r['nama2'],$fform->rwidths));
		$fform->fa('Keterangan',iTextarea('keterangan',$r['keterangan'],$fform->rwidths,3));
	
	} else if($opt=='df'){ // Delete form 
	
		$fform->dlg_del($r['kode']);
		
	} $fform->foot();
} ?>