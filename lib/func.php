<?php	
	require_once  'keu_func.php';
	require_once  'kon_func.php';
	require_once  'aka_func.php';
	require_once  'psb_func.php';
	require_once  'pus_func.php';

	// error handling
	function errMsg($no,$dt){
		$dt=isset($dt)?$dt:'';
		switch ($no) {
			case '1451':
				return '"'.$dt.'" telah terpakai, silahkan hapus data berkaitan';
			break;
		}
	}
	// general function : query data 
	function getField($f,$tb,$w='',$k=''){
		$s = 'SELECT '.$f.' FROM '.$tb.($w!=''?' WHERE '.$w.' = '.$k:'');
		// var_dump($s);exit();
		$e = mysql_query($s);
		$r = mysql_fetch_assoc($e);
		return $r[$f];
	}
	function vdump($x){
		echo '<pre>';
			var_dump($x);
		echo'</pre>';
		exit();
	}
	function pr($x){
		echo '<pre>';
			print_r($x);
		echo'</pre>';
		exit();
	}

	/*function contentFC(){
	    $out='';
	    // looping grup menu
	    foreach ($_SESSION['grupmodulS']as $i => $v) {
	        foreach ($v['modul'] as $i2 => $v2) {
	            if($v2['modul']==$modul and $v2['statmod']==1) {
	                foreach ($v2['grupmenu'] as $i3 => $v3) {
	                    $out.='<div class="tile-group '.$v3['size'].'">
	                            <div class="tile-group-title">'.$v3['grupmenu'].'</div>';
	                        // $out.=' <a '.($v4['statmenu']==0?'onclick="notif(\'Anda tidak berhak akses '.$v4['menu'].'\',\'blue\')"':'href="'.$v4['link']).'" class="tile '.$v4['size'].' 
	                    foreach ($v3['menu'] as $i4 => $v4) {
	                        $out.=' <a '.($v4['statmenu']==0?'onclick="warning(\''.$v4['menu'].'\');"':'href="'.$v4['link']).'" class="tile '.$v4['size'].' 
	                                    bg-'.($v4['statmenu']==0?'grey':$v4['warna']).'" data-click="transform">
	                                    <div class="tile-content icon">
	                                        <span class="icon-'.($v4['statmenu']==0?'locked-2':$v4['icon']).'"></span>
	                                    </div>
	                                    <div class="brand">
	                                        <div class="label">'.$v4['menu'].'</div>
	                                    </div>
	                                </a>';
	                    }// end of menu looping
	                    $out.='</div>';
	                } // end of grupmenu looping
	            } // end of modul checking
	        } // end of  modul looping
	    } // grup grupmodul looping 
	    echo $out;
	}*/
?>