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
					<th>Jenis Indikator</th>
					<th>Indikator</th>
					<th>Bobot</th>
					<th>Keterangan</th>
				</tr>
			</thead>
			<tbody>
                @foreach($kriteria as $k)
				<tr>
					<td>{{$k->jenisindikator->JENIS_INDIKATOR}}</td>
					<td>{{$k->NAMA_INDIKATOR}}</td>
					<td align="right">{{($k->BOBOT_INDIKATOR*100)}}%</td>
					<td>{{$k->KET_INDIKATOR}}</td>
				</tr>
                @endforeach
			</tbody>
		</table>
        <label for="btn_cetak">Cetak : </label>
		{{HTML::link('/laporan/kriteria/cetak', 'PDF', array('class' => 'btn btn-primary btn-xs', 'target' => '_blank'))}}
	</div>
</div>