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
		@if (count($range_nilai)<5)
		Operasi : <?php echo link_to('/master/range_nilai/tambah', 'Tambah Range Nilai', array()); ?>
		@endif
		<table id="example" class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th width="10%">Id</th>
					<th>Keterangan</th>
					<th>Nilai</th>
					<th width="15%">Operasi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($range_nilai as $data)
				<tr>
					<td>{{$data->ID_RANGE}}</td>
					<td>{{$data->KET_RANGE}}</td>
					<td>{{$data->NILAI_RANGE}}</td>
					<td align="center">
						{{HTML::link('/master/range_nilai/ubah/'.$data->ID_RANGE, 'Ubah', array('class' => 'btn btn-primary btn-xs'))}}
						{{HTML::link('/master/range_nilai/hapus/'.$data->ID_RANGE, 'Hapus', array('class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("Yakin dihapus?")'))}}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>