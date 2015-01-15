<fieldset>
	<legend>{{$judul}}</legend>
	<div class="row">
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Data Karyawan</h3>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form">
							<div class="form-group">
								<label class="col-sm-3 control-label">NIK</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" value="{{$karyawan->NIK_KARYAWAN}}" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" value="{{$karyawan->NAMA_KARYAWAN}}" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Alamat</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" value="{{$karyawan->ALAMAT_KARYAWAN}}" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Telp.</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" value="{{$karyawan->TELEPON_KARYAWAN}}" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Rekanan</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" value="{{$karyawan->rekanan->NAMA_REKANAN}}" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Divisi</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" value="{{$karyawan->divisi->NAMA_DIVISI}}" readonly>
								</div>
							</div>
						</form>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Rekomendasi</h3>
				</div>
				<div class="panel-body">
					<form method="post" action="" class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-sm-3 control-label" for="rekomendasi">Rekomendasi</label>
							<div class="col-sm-9">
								<input type="text" id="rekomendasi" class="form-control" name="rekomendasi" value="{{$rekomendasi->REKOMENDASI}}" autofocus>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
								<button type="submit" class="btn btn-primary">Selesai</button>
								<button type="button" class="btn btn-default pull-right" onclick="kembali()">Batal</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Hasil Penilaian</h3>
				</div>
				<div class="panel-body">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Indikator</th>
								<th>Bobot</th>
								<th>Hasil</th>
								<th>Nilai</th>
							</tr>
						</thead>
						<tbody>
							<?php $total_bobot = 0; $total_nilai = 0; ?>
							@foreach ($penilaian as $p)
							<tr>
								<td>{{$p->indikator->NAMA_INDIKATOR}}</td>
								<td>{{$p->indikator->BOBOT_INDIKATOR*100}}%</td>
								<td>{{$p->range->KET_RANGE}}</td>
								<td>{{$p->HASIL_PENILAIAN}}</td>
								<?php $total_bobot += $p->indikator->BOBOT_INDIKATOR; ?>
								<?php $total_nilai += $p->HASIL_PENILAIAN; ?>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<td>Jumlah</td>
								<td>{{number_format($total_bobot * 100)}}%</td>
								<td>&nbsp;</td>
								<td>{{$total_nilai}}</td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</fieldset>