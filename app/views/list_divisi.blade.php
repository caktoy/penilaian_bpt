<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Divisi</h3>
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
		Operasi : <?php echo link_to('/master/divisi/tambah', 'Tambah Divisi', array()); ?>
		<table id="example" class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th width="15%">Id</th>
					<th>Nama Divisi</th>
					<th width="15%">Operasi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($list as $data)
				<tr>
					<td>{{ $data->ID_DIVISI }}</td>
					<td>{{ $data->NAMA_DIVISI }}</td>
					<td align="center">
						<?php echo link_to('/master/divisi/ubah/'.$data->ID_DIVISI, 'Ubah', array('class' => 'btn btn-primary btn-xs')); ?>
						<?php echo link_to('/master/divisi/hapus/'.$data->ID_DIVISI, 'Hapus', array('class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("Yakin dihapus?")')); ?>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>