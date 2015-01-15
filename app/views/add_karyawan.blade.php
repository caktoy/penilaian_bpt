<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Tambah Karyawan</h3>
	</div>
	<div class="panel-body">
		<form action="" method="post" id="form-karyawan" class="form-horizontal" role="form">
			<div class="form-group">
				<label for="nik" class="col-sm-2 control-label">NIK</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nik" placeholder="NIK Karyawan" required autofocus>
				</div>
			</div>
			<div class="form-group">
				<label for="nama" class="col-sm-2 control-label">Nama</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nama" placeholder="Nama Karyawan" required>
				</div>
			</div>
			<div class="form-group">
				<label for="alamat" class="col-sm-2 control-label">Alamat</label>
				<div class="col-sm-10">
					<textarea name="alamat" class="form-control" placeholder="Alamat" rows="3"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="telp" class="col-sm-2 control-label">No. Telepon</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="telp" placeholder="No. Telepon">
				</div>
			</div>
			<div class="form-group">
				<label for="rekanan" class="col-sm-2 control-label">Rekanan</label>
				<div class="col-sm-10">
					<div class="input-group">
						<select name="rekanan" class="form-control select-box" required>
							<option></option>
							@foreach($rekanan as $opt_rekan)
							<option value="{{$opt_rekan->ID_REKANAN}}">{{$opt_rekan->NAMA_REKANAN}}</option>
							@endforeach
						</select>
						<span class="input-group-btn">
							{{HTML::link('/master/rekanan/tambah', 'Tambah', array('class' => 'btn btn-default'))}}
							<!--<button class="btn btn-default" type="button">Tambah</button>-->
						</span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="divisi" class="col-sm-2 control-label">Divisi</label>
				<div class="col-sm-10">
					<div class="input-group">
						<select name="divisi" class="form-control" required>
							<option></option>
							@foreach($divisi as $opt_divisi)
							<option value="{{$opt_divisi->ID_DIVISI}}">{{$opt_divisi->NAMA_DIVISI}}</option>
							@endforeach
						</select>
						<span class="input-group-btn">
							{{HTML::link('/master/divisi/tambah', 'Tambah', array('class' => 'btn btn-default'))}}
							<!--<button class="btn btn-default" type="button">Tambah</button>-->
						</span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<button type="button" class="btn btn-default" onclick="kembali()">Batal</button>
				</div>
			</div>
		</form>
	</div>
</div>
{{ HTML::script('assets/js/jquery-1.11.1.min.js') }}
<script type="text/javascript">
	$(document).ready(function() {
		$('#form-karyawan').bootstrapValidator({
			message: 'Mohon diisi',
			feedbackIcons: {
	            valid: 'glyphicon glyphicon-ok',
	            invalid: 'glyphicon glyphicon-remove',
	            validating: 'glyphicon glyphicon-refresh'
	        },
	        fields: {
	        	nik: {
	        		validators: {
	        			notEmpty: {
	        				message: 'Kolom ini harus diisi'
	        			},
	        			regexp: {
	        				regexp: /^[0-9]+$/,
	        				message: 'Mohon isi dengan angka'
	        			}
	        		}
	        	},
	        	nama: {
	        		validators: {
	        			notEmpty: {
	        				message: 'Kolom ini harus diisi'
	        			},
	        			regexp: {
	        				regexp: /^[a-zA-Z .,]+$/,
	        				message: 'Karakter yang diperbolehkan: huruf, spasi, titik (.), koma (,)'
	        			}
	        		}
	        	},
	        	telp: {
	        		validators: {
	        			regexp: {
	        				regexp: /^[0-9-() ]+$/,
	        				message: 'Mohon isi dengan pola yang sesuai'
	        			}
	        		}
	        	},
                alamat: {
	        		validators: {
	        			regexp: {
	        				regexp: /^[a-zA-Z0-9-()., /]+$/,
	        				message: 'Mohon isi dengan karakter yang sesuai'
	        			}
	        		}
	        	},
	        	rekanan: {
	        		message: 'Pilih salah satu'
	        	},
	        	divisi: {
	        		message: 'Pilih salah satu'
	        	}
	        }
		});
	});
</script>