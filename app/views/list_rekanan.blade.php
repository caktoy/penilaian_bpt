<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Perusahaan Rekanan</h3>
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
		Operasi : <?php echo link_to('/master/rekanan/tambah', 'Tambah Data Perusahaan', array()); ?>
		<table id="example" class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nama Perusahaan</th>
					<th>Alamat</th>
					<th>No. Telepon</th>
					<th width="15%">Operasi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($list as $data)
				<tr>
					<td>{{$data->ID_REKANAN}}</td>
					<td>{{$data->NAMA_REKANAN}}</td>
					<td>{{$data->ALAMAT_REKANAN}}</td>
					<td>{{$data->TELP_REKANAN}}</td>
					<td align="center">
						{{link_to('/master/rekanan/ubah/'.$data->ID_REKANAN, 'Ubah', array('class' => 'btn btn-primary btn-xs'))}}
						{{link_to('/master/rekanan/hapus/'.$data->ID_REKANAN, 'Hapus', array('class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("Yakin dihapus?")'))}}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>