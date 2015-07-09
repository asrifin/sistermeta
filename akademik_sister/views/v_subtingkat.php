<script src="controllers/c_subtingkat.js"></script>

<script src="../js/combogrid/jquery-ui-1.10.1.custom.min.js"></script>
<script src="../js/combogrid/jquery.ui.combogrid-1.6.3.js"></script>

<link rel="stylesheet" type="text/css" media="screen" href="../css/combogrid/jquery-ui-1.10.1.custom.css"/>
<link rel="stylesheet" type="text/css" media="screen" href="../css/combogrid/jquery.ui.combogrid.css"/>


<h4 style="color:white;">Sub Tingkat</h4>
<div id="loadarea"></div>

<button data-hint="Tambah Data" xclass="large" id="tambahBC"><span class="icon-plus-2"></span> </button>
<button data-hint="Field Pencarian" xclass="large" id="cariBC"><span class="icon-search"></span> </button>

<div style="display:none;" class="input-control select span3">
    <select  class="cari" data-hint="departemen" name="departemenS" id="departemenS"></select>
</div>
<div class="input-control select span3">
    <select  class="cari" data-hint="tahunajaran" name="tahunajaranS" id="tahunajaranS"></select>
</div>
<div class="input-control select span3">
    <select  class="cari" data-hint="tingkat" name="tingkatS" id="tingkatS"></select>
</div>
<table class="table hovered bordered striped">
    <thead>
        <tr style="color:white;"class="info">
            <th class="text-center">Subtingkat (Kelas)</th>
            <th class="text-center">Aksi</th>
        </tr>
        <tr style="display:none;" id="cariTR" class="info">
            <th class="text-center"><div class="input-control text"><input class="cari" placeholder="subtingkat" id="subtingkatS"></div></th>
            <th></th>
        </tr>
    </thead>

    <tbody id="tbody">
    </tbody>
    <tfoot>
        
    </tfoot>
</table> 

<!-- 
    // ---------------------- //
    // -- created by rovi  -- //
    // ---------------------- // 
 -->