<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Pengguna</h3>
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
		Operasi : <?php echo link_to('/pengguna/tambah', 'Tambah Pengguna', array()); ?>
		<table id="example" class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nama Pengguna</th>
					<th>Level Pengguna</th>
					<th width="15%">Operasi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($pengguna as $data)
				<tr>
					<td>{{$data->ID_PENGGUNA}}</td>
					<td>{{$data->NAMA_PENGGUNA}}</td>
					<td>{{$data->levelpengguna->LEVEL_PENGGUNA}}</td>
					<td align="center">
					{{HTML::link('/pengguna/ubah/'.$data->ID_PENGGUNA, 'Ubah', array('class' => 'btn btn-primary btn-xs'))}}
					{{HTML::link('/pengguna/hapus/'.$data->ID_PENGGUNA, 'Hapus', array('class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("Yakin dihapus?")'))}}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>