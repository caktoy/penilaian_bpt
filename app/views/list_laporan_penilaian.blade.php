<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">{{$judul}}</h3>
	</div>
	<div class="panel-body">
		<?php
		if (Session::has('pesan')) {
			echo "<div class='alert alert-info alert-dismissible' role='alert'>";
			echo "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>
				<span class='sr-only'>Close</span></button>";
			echo Session::get('pesan');
			echo "</div>";
		}
		?>
		<table id="example" class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th>NIK</th>
					<th>Nama</th>
					<th>Rekanan</th>
					<th>Divisi</th>
					<th>Nilai</th>
					<th>Rekomendasi</th>
					<th>Cetak</th>
				</tr>
			</thead>
			<tbody>
                @foreach($penilaian as $p)
				<tr>
					<td>{{$p->karyawan->NIK_KARYAWAN}}</td>
					<td>{{$p->karyawan->NAMA_KARYAWAN}}</td>
					<td>{{$p->karyawan->rekanan->NAMA_REKANAN}}</td>
					<td>{{$p->karyawan->divisi->NAMA_DIVISI}}</td>
					<td align="right">{{number_format($p->NILAI_AKHIR, 2)}}</td>
					<td>{{$p->REKOMENDASI}}</td>
					<td align="center">{{HTML::link('/laporan/penilaian/karyawan/cetak/'.$p->ID_REKOMENDASI, 'PDF', array('class' => 'btn btn-primary btn-xs', 'target' => '_blank'))}}</td>
				</tr>
                @endforeach
			</tbody>
		</table>
        <label for="btn_cetak">Cetak : </label>
		{{HTML::link('/laporan/penilaian/cetak', 'PDF', array('class' => 'btn btn-primary btn-xs', 'target' => '_blank'))}}
	</div>
</div>