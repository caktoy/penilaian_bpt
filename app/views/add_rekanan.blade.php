<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Tambah Rekanan</h3>
	</div>
	<div class="panel-body">
		<form action="" method="post" class="form-horizontal" id="form-rekanan" role="form">
			<div class="form-group">
				<label for="nama" class="col-sm-3 control-label">Nama Perusahaan</label>
				<div class="col-sm-9">
					<input type="text" id="nama" class="form-control" name="nama" placeholder="Nama Divisi" required>
				</div>
			</div>
			<div class="form-group">
				<label for="alamat" class="col-sm-3 control-label">Alamat</label>
				<div class="col-sm-9">
					<textarea id="alamat" class="form-control" name="alamat" placeholder="Alamat Perusahaan"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="telp" class="col-sm-3 control-label">No. Telepon</label>
				<div class="col-sm-9">
					<input type="text" id="telp" class="form-control" name="telp" placeholder="No. Telepon">
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
		$('#form-rekanan').bootstrapValidator({
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
	        	}
	        }
		});
	});
</script>