<legend>Navigasi</legend>
<div class="panel-group" id="accordion">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<?php echo link_to('/beranda', 'Beranda', array()); ?>
				<span class="glyphicon glyphicon-home pull-right"></span>
			</h4>
		</div>
	</div>
	@if(Session::get('level')==1 || Session::get('level')==3 || Session::get('level')==4)
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
					Manajemen Data
					<span class="glyphicon glyphicon-th-list pull-right"></span>
				</a>
			</h4>
		</div>
		<div id="collapseOne" class="panel-collapse collapse @if(pecah_url(URL::current(), 5)==='master') in @endif">
			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
					<li><?php echo link_to('/master/karyawan', 'Karyawan', array()); ?></li>
					<li><?php echo link_to('/master/divisi', 'Divisi', array()); ?></li>
					<li><?php echo link_to('/master/rekanan', 'Rekanan', array()); ?></li>
					<li><?php echo link_to('/master/indikator', 'Indikator', array()); ?></li>
					<li><?php echo link_to('/master/jenis_indikator', 'Jenis Indikator', array()); ?></li>
					<li><?php echo link_to('/master/range_nilai', 'Range Nilai', array()); ?></li>
				</ul>
			</div>
		</div>
	</div>
	@endif
	@if(Session::get('level')==2 || Session::get('level')==1)
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
					Penilaian
					<span class="glyphicon glyphicon-stats pull-right"></span>
				</a>
			</h4>
		</div>
		<div id="collapseTwo" class="panel-collapse collapse @if(pecah_url(URL::current(), 5)==='penilaian') in @endif">
			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
					@if(Session::get('level')==1)
					<li><?php echo link_to('/penilaian', 'Penilaian', array()); ?></li>
					@endif
					@if(Session::get('level')==2 || Session::get('level')==1)
					<li><?php echo link_to('/penilaian/rekomendasi', 'Rekomendasi', array()); ?></li>
					@endif
				</ul>
			</div>
		</div>
	</div>
	@endif
	@if(Session::get('level')==1 || Session::get('level')==3 || Session::get('level')==4)
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseUser">
					Pengguna
					<span class="glyphicon glyphicon-user pull-right"></span>
				</a>
			</h4>
		</div>
		<div id="collapseUser" class="panel-collapse collapse @if(pecah_url(URL::current(), 5)==='pengguna') in @endif">
			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
					<li><?php echo link_to('/pengguna', 'Pengguna', array()); ?></li>
					<!--<li><?php //echo link_to('/pengguna/level', 'Level Pengguna', array()); ?></li>-->
				</ul>
			</div>
		</div>
	</div>
	@endif
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
					Laporan
					<span class="glyphicon glyphicon-print pull-right"></span>
				</a>
			</h4>
		</div>
		<div id="collapseThree" class="panel-collapse collapse @if(pecah_url(URL::current(), 5)==='laporan') in @endif">
			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
					<li><?php echo link_to('/laporan/kriteria', 'Kriteria Penilaian', array()); ?></li>
					<li><?php echo link_to('/laporan/rekanan', 'Perusahaan Rekanan', array()); ?></li>
					<li><?php echo link_to('/laporan/penilaian', 'Hasil Penilaian', array()); ?></li>
				</ul>
			</div>
		</div>
	</div>
</div>