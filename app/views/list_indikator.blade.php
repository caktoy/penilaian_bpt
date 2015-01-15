<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Indikator</h3>
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
		Operasi : <?php echo link_to('/master/indikator/tambah', 'Tambah Indikator', array()); ?>
		<table id="example" class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th>Jenis Indikator</th>
					<th>Indikator</th>
					<th>Bobot</th>
					<th>Keterangan</th>
					<th width="15%">Operasi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($indikator as $data)
				<tr>
					<td>{{$data->jenisindikator->JENIS_INDIKATOR}}</td>
					<td>{{$data->NAMA_INDIKATOR}}</td>
					<td align="right">{{$data->BOBOT_INDIKATOR*100}}%</td>
					<td>{{$data->KET_INDIKATOR}}</td>
					<td align="center">
					{{HTML::link('/master/indikator/ubah/'.$data->ID_INDIKATOR, 'Ubah', array('class' => 'btn btn-primary btn-xs'))}}
					{{HTML::link('/master/indikator/hapus/'.$data->ID_INDIKATOR, 'Hapus', array('class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("Yakin dihapus?")'))}}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>