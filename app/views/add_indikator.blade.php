<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Tambah Indikator</h3>
	</div>
	<div class="panel-body">
		<form action="" method="post" class="form-horizontal" id="form-indikator" role="form">
			<div class="form-group">
				<label for="jenis" class="col-sm-3 control-label">Jenis Indikator</label>
				<div class="col-sm-9">
					<div class="input-group">
						<select class="form-control" id="jenis" name="jenis" required autofocus>
							<option></option>
							@foreach ($jenis_indikator as $opt)
							<option value="{{ $opt->ID_JENIS_INDIKATOR }}">{{ $opt->JENIS_INDIKATOR }}</option>
							@endforeach
						</select>
						<span class="input-group-btn">
							{{HTML::link('/master/jenis_indikator/tambah', 'Tambah', array('class' => 'btn btn-default'))}}
							<!--<button class="btn btn-default" type="button">Tambah</button>-->
						</span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="nama" class="col-sm-3 control-label">Nama Indikator</label>
				<div class="col-sm-9">
					<input type="text" id="nama" class="form-control" name="nama" placeholder="Nama Indikator" required>
				</div>
			</div>
			<div class="form-group">
				<label for="bobot" class="col-sm-3 control-label">Bobot (%)</label>
				<div class="col-sm-9">
					<input type="text" id="bobot" class="form-control" name="bobot" placeholder="00.00" required>
				</div>
			</div>
			<div class="form-group">
				<label for="ket" class="col-sm-3 control-label">Keterangan</label>
				<div class="col-sm-9">
					<textarea id="ket" class="form-control" name="ket" placeholder="Keterangan" rows="3"></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9">
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
		$('#form-indikator').bootstrapValidator({
			message: 'Mohon diisi',
			feedbackIcons: {
	            valid: 'glyphicon glyphicon-ok',
	            invalid: 'glyphicon glyphicon-remove',
	            validating: 'glyphicon glyphicon-refresh'
	        },
	        fields: {
	        	nama: {
	        		validators: {
	        			notEmpty: {
	        				message: 'Kolom ini harus diisi'
	        			},
	        			regexp: {
	        				regexp: /^[a-zA-Z0-9 ()-.,]+$/,
	        				message: 'Mohon isi dengan karakter yang sesuai'
	        			}
	        		}
	        	},
	        	bobot: {
	        		validators: {
	        			regexp: {
	        				regexp: /^[0-9.]+$/,
	        				message: 'Mohon isi dengan angka'
	        			}
	        		}
	        	},
                ket: {
	        		validators: {
	        			regexp: {
	        				regexp: /^[a-zA-Z0-9-()., /]+$/,
	        				message: 'Mohon isi dengan karakter yang sesuai'
	        			}
	        		}
	        	}
                ,
	        	jenis: {
	        		message: 'Pilih salah satu'
	        	}
	        }
		});
	});
</script>