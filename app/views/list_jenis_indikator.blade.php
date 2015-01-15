<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Jenis Indikator</h3>
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
		Operasi : <?php echo link_to('/master/jenis_indikator/tambah', 'Tambah Jenis Indikator', array()); ?>
		<table id="example" class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th width="10%">Id</th>
					<th>Jenis Indikator</th>
					<th width="15%">Operasi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($jenis_indikator as $data)
				<tr>
					<td>{{$data->ID_JENIS_INDIKATOR}}</td>
					<td>{{$data->JENIS_INDIKATOR}}</td>
					<td align="center">
						{{HTML::link('/master/jenis_indikator/ubah/'.$data->ID_JENIS_INDIKATOR, 'Ubah', array('class' => 'btn btn-primary btn-xs'))}}
						{{HTML::link('/master/jenis_indikator/hapus/'.$data->ID_JENIS_INDIKATOR, 'Hapus', array('class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("Yakin dihapus?")'))}}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>