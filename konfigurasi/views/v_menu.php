<script src="controllers/c_menu.js"></script>
<script src="js/metro/metro-button-set.js"></script>
<script src="js/metro/metro-hint.js"></script>

<nav class="breadcrumbs">
    <ul>
        &nbsp;
        <button class="place-left" data-hint="Tambah Data" id="tambahBC"><span class="icon-plus-2"></span> </button> 
        <li><a href="grup-modul">Grup Modul</a></li>
        <li><a href="modul">Modul</a></li>
        <li><a href="grup-menu">Grup Menu</a></li>
        <li class="active"><a href="#"><b>Menu</b></a></li>
    </ul>
</nav>

<table class="table hovered bordered striped">
    <thead>
        <tr style="color:white;"class="info">
            <th class="text-center">Grup Modul</th>
            <th class="text-center">Modul</th>
            <th class="text-center">Grup Menu</th>
            <th class="text-center">Menu</th>
            <th class="text-center">Link</th>
            <th class="text-center">Ukuran</th>
            <th class="text-center">Warna</th>
            <th class="text-center">Aksi</th>
        </tr>
        <tr xstyle="display:none;" id="cariTR" class="selected">
            <th class="text-center">
                <div class="input-control select">
                    <select data-hint="grup modul" name="grupmodulS" id="grupmodulS" class="cari"></select>
                </div>
            </th>
            <th class="text-center">
                <div class="input-control select">
                    <select data-hint="modul" name="modulS" id="modulS" class="cari"></select>
                </div>
            </th>
            <th class="text-center">
                <div class="input-control select">
                    <select data-hint="grup menu" name="grupmenuS" id="grupmenuS" class="cari"></select>
                </div>
            </th>
            <th class="text-center"><div class="input-control text"><input class="cari" placeholder="cari ..." id="menuS" name="menuS"></div></th>
            <th class="text-center"><div class="input-control text"><input class="cari" placeholder="cari ..." id="linkS" name="linkS"></div></th>
            <th class="text-center"></th>
            <th class="text-center"><div class="input-control text"><input class="cari" placeholder="cari ..." id="warnaS" name="warnaS"></div></th>
            <th class="text-center"></th>
        </tr>
    </thead>

    <tbody id="tbody"></tbody>
</table>