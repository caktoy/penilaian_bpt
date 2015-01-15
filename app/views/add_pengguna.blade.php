<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Tambah Pengguna</h3>
	</div>
	<div class="panel-body">
		<form action="" method="post" class="form-horizontal" role="form">
			<div class="form-group">
				<label for="nama" class="col-sm-3 control-label">Nama Pengguna</label>
				<div class="col-sm-9">
					<input type="text" id="nama" class="form-control" name="nama" placeholder="Nama Pengguna" required autofocus>
				</div>
			</div>
			<div class="form-group">
				<label for="pass" class="col-sm-3 control-label">Kata Kunci</label>
				<div class="col-sm-9">
					<input type="password" id="pass" class="form-control" name="pass" placeholder="Password" required>
				</div>
			</div>
			<div class="form-group">
				<label for="level" class="col-sm-3 control-label">Level Pengguna</label>
				<div class="col-sm-9">
					<select name="level" id="level" class="form-control" required>
						<option>-- pilih salah satu --</option> 
						@foreach ($level as $opt)
						<option value="{{$opt->ID_LEVEL}}">{{$opt->LEVEL_PENGGUNA}}</option>
						@endforeach
					</select>
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