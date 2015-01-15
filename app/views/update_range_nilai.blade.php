<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">{{$judul}}</h3>
	</div>
	<div class="panel-body">
		<form action="" method="post" class="form-horizontal" id="form-range" role="form">
			<div class="form-group">
				<label for="nama" class="col-sm-2 control-label">Keterangan</label>
				<div class="col-sm-10">
					<input type="text" id="nama" class="form-control" name="nama" placeholder="Keterangan" value="{{$range_nilai->KET_RANGE}}" autofocus required>
				</div>
			</div>
			<div class="form-group">
				<label for="nilai" class="col-sm-2 control-label">Nilai</label>
				<div class="col-sm-10">
					<!--<input type="number" id="nilai" class="form-control" name="nilai" placeholder="1-5" value="{{$range_nilai->NILAI_RANGE}}" required>-->
					<select id="nilai" class="form-control" name="nilai" required>
						@for ($i=1; $i <= 5; $i++) { 
							<option value="{{$i}}" @if($i===$range_nilai->NILAI_RANGE) selected @endif>{{$i}}</option>
						@endfor
					</select>
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
		$('#form-range').bootstrapValidator({
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