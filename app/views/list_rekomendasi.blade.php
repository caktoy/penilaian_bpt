<fieldset>
	<legend>Rekomendasi</legend>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Hasil Penilaian</h3>
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
		<p>Tabel dibawah ini berisi hasil penilaian karyawan.</p>
		<table id="example" class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th>NIK</th>
					<th>Karyawan</th>
					<th>Rekanan</th>
					<th>Divisi</th>
					<th>Penilaian</th>
					<th>Rekomendasi</th>
					<th width="20%">Operasi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($rekomendasi as $data)
				<tr>
					<td>{{$data->karyawan->NIK_KARYAWAN}}</td>
					<td>{{$data->karyawan->NAMA_KARYAWAN}}</td>
					<td>{{$data->karyawan->rekanan->NAMA_REKANAN}}</td>
					<td>{{$data->karyawan->divisi->NAMA_DIVISI}}</td>
					<td align="right">{{number_format($data->NILAI_AKHIR, 2)}}</td>
					<td>{{$data->REKOMENDASI}}</td>
					<td align="center">
						{{HTML::link('/penilaian/rekomendasi/set/'.$data->ID_REKOMENDASI, 'Rekomendasi', array('class' => 'btn btn-success btn-xs'))}}
                        {{HTML::link('/penilaian/rekomendasi/ulang/'.$data->ID_REKOMENDASI, 'Nilai Ulang', array('class' => 'btn btn-warning btn-xs'))}}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
</fieldset>