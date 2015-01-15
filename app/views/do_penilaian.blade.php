<fieldset>
	<legend>Penilaian Karyawan</legend>
<div class="row">
	<div class="col-sm-7">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Jenis Penilaian</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="jenis" class="col-sm-3 control-label">Jenis Indikator</label>
						<div class="col-sm-9">
							<select name="jenis" id="jenis" class="form-control" autofocus>
								<option>-- pilih salah satu --</option>
								@foreach($jenis as $opt)
								@if($opt->ID_JENIS_INDIKATOR!==1)
								<option value="{{$opt->ID_JENIS_INDIKATOR}}">{{$opt->JENIS_INDIKATOR}}</option>
								@endif
								@endforeach
							</select>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div id="posisi">
			<div class="loading"><center>Memuat...</center></div>
		</div>
	</div>
	<div class="col-sm-5">
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
				<h3 class="panel-title">Range Nilai</h3>
			</div>
			<div class="panel-body">
				<p>Keterangan nilai yang digunakan:</p>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Keterangan</th>
							<th width="20%">Nilai</th>
						</tr>
					</thead>
					<tbody>
						@foreach($range as $r)
						<tr>
							<td>{{$r->KET_RANGE}}</td>
							<td align="center">{{$r->NILAI_RANGE}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</fieldset>
{{ HTML::script('assets/js/jquery-1.11.1.min.js') }}
<script type="text/javascript">
	$(document).ready(function() {
		$(".loading").hide();
		$("#jenis").change(function() {
			var jenis = this.value;
			var url = "{{ URL::asset('/') }}penilaian/do/jenis/"+jenis;
			$(".loading").show("slow");
			$('#posisi').delay(500).queue(function(nxt) {
				$(this).load(url);
				nxt();
			});
		});
	});
</script>