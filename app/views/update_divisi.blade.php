<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Tambah Divisi</h3>
	</div>
	<div class="panel-body">
		<form action="" method="post" class="form-horizontal" id="form-divisi" role="form">
			<div class="form-group">
				<label for="nama" class="col-sm-2 control-label">Nama Divisi</label>
				<div class="col-sm-10">
					<input type="text" id="nama" class="form-control" name="nama" placeholder="Nama Divisi" value="{{$data->NAMA_DIVISI}}">
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
		$('#form-divisi').bootstrapValidator({
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
	        				regexp: /^[a-zA-Z0-9 .,]+$/,
	        				message: 'Karakter yang diperbolehkan: huruf, spasi, titik (.), koma (,)'
	        			}
	        		}
	        	}
	        }
		});
	});
</script>