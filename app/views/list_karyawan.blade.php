<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Karyawan</h3>
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
		Operasi : <?php echo link_to('/master/karyawan/tambah', 'Tambah Karyawan', array()); ?>
		<table id="example" class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th>NIK</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Telepon</th>
					<th>Rekanan</th>
					<th>Divisi</th>
					<th width="15%">Operasi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($list as $data)
				<tr>
					<td>{{$data->NIK_KARYAWAN}}</td>
					<td>{{$data->NAMA_KARYAWAN}}</td>
					<td>{{$data->ALAMAT_KARYAWAN}}</td>
					<td>{{$data->TELEPON_KARYAWAN}}</td>
					<td>{{$data->rekanan->NAMA_REKANAN}}</td>
					<td>{{$data->divisi->NAMA_DIVISI}}</td>
					<td align="center">
						{{ link_to('/master/karyawan/ubah/'.$data->ID_KARYAWAN, 'Ubah', array('class' => 'btn btn-primary btn-xs')) }}
						{{ link_to('/master/karyawan/hapus/'.$data->ID_KARYAWAN, 'Hapus', array('class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("Yakin dihapus?")')) }}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>