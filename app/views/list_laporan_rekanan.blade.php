<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">{{$judul}}</h3>
	</div>
	<div class="panel-body">
		<table id="example" class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Perusahaan</th>
					<th>Alamat</th>
					<th>No. Telepon</th>
				</tr>
			</thead>
			<tbody>
				@foreach($rekanan as $data)
				<tr>
					<td>{{$data->ID_REKANAN}}</td>
					<td>{{$data->NAMA_REKANAN}}</td>
					<td>{{$data->ALAMAT_REKANAN}}</td>
					<td>{{$data->TELP_REKANAN}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<label for="btn_cetak">Cetak : </label>
		{{HTML::link('/laporan/rekanan/cetak', 'PDF', array('class' => 'btn btn-primary btn-xs', 'target' => '_blank'))}}
	</div>
</div>