<?php
if (Session::has('pesan')) {
	echo "<div class='alert alert-info alert-dismissible' role='alert'>";
	echo "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>
		<span class='sr-only'>Close</span></button>";
	echo Session::get('pesan');
	echo "</div>";
}
?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Ubah Password</h3>
	</div>
	<div class="panel-body">
		<form action="" method="post" class="form-horizontal" role="form">
			<div class="form-group">
				<label for="inputPasswordLama" class="col-sm-3 control-label">Password Lama</label>
				<div class="col-sm-9">
					<input type="password" id="inputPassword" class="form-control" name="pass_lama" placeholder="Password Lama" required autofocus>
					<?php echo $errors->first('pass_lama'); ?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputKonfirmasiPassLama" class="col-sm-3 control-label">Konfirmasi Password</label>
				<div class="col-sm-9">
					<input type="password" id="inputKonfirmasiPassLama" class="form-control" name="pass_konfirmasi" placeholder="Konfirmasi Password Lama" required>
					<?php echo $errors->first('pass_konfirmasi'); ?>
				</div>
			</div>
			<hr>
			<div class="form-group">
				<label for="inputPasswordBaru" class="col-sm-3 control-label">Password Baru</label>
				<div class="col-sm-9">
					<input type="password" id="inputPasswordBaru" class="form-control" name="pass_baru" placeholder="Password Baru" required>
					<?php echo $errors->first('pass_baru'); ?>
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