<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Ubah Jenis Indikator</h3>
	</div>
	<div class="panel-body">
		<form action="" method="post" class="form-horizontal" id="form-jenis" role="form">
			<div class="form-group">
				<label for="nama" class="col-sm-3 control-label">Jenis Indikator</label>
				<div class="col-sm-9">
					<input type="text" id="nama" class="form-control" name="nama" placeholder="Jenis Indikator" value="{{$jenis_indikator->JENIS_INDIKATOR}}">
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
		$('#form-jenis').bootstrapValidator({
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
	        				regexp: /^[a-zA-Z0-9 ().,-]+$/,
	        				message: 'Mohon isi dengan karakter yang diperbolehkan'
	        			}
	        		}
	        	}
	        }
		});
	});
</script>