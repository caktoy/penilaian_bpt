<html>
<head>
	<title><?php echo $judul; ?> - PT. BUMI PERSADA TRANSPORTATION</title>
	{{ HTML::style('assets/css/bootstrap.css') }}
	{{ HTML::style('assets/css/mylogin.css') }}
	<link rel="shortcut icon" href="assets/img/favicon.ico">
</head>
<body>
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>Login</strong></h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-5">
						<div style="text-align:center;">
						{{HTML::image('assets/img/logo-bpt.png', 'Logo BPT', array('style' => 'width:300px;'))}}
						<h3>PT. BANGUN PERSADA TRANSPORTATION</h3>
						</div>
					</div>
					<div class="col-sm-7">	
						<?php
						if (Session::has('pesan')) {
							echo "<div class='alert alert-info alert-dismissible' role='alert'>";
							echo "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>
								<span class='sr-only'>Close</span></button>";
							echo Session::get('pesan');
							echo "</div>";
						}
						?>
						<form method="post" action="" role="form">
							<div class="form-group">
								<label for="username">Nama Pengguna</label>
								<input type="text" name="username" class="form-control" placeholder="Nama Pengguna" required autofocus>
							</div>
							<div class="form-group">
								<label for="password">Kata Kunci</label>
								<input type="password" name="password" class="form-control" placeholder="Kata Kunci" required>
							</div>
							<div class="form-group">
								<label for="username">Masuk Sebagai</label>
								<select name="login_as" class="form-control" required>
									<option selected>-- pilih salah satu --</option>
									@foreach ($level as $lvl)
									<option value="{{$lvl->ID_LEVEL}}">{{$lvl->LEVEL_PENGGUNA}}</option>
									@endforeach
								</select>
							</div>
							<button class="btn btn-lg btn-success btn-block" type="submit">Masuk</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{ HTML::script('assets/js/jquery.js') }}
	{{ HTML::script('assets/js/jquery-ui-1.9.2.custom.js') }}
	{{ HTML::script('assets/js/bootstrap.js') }}
	{{ HTML::script('assets/js/myscript.js') }}
	{{ HTML::script('assets/js/jquery.dataTables.js') }}
	{{ HTML::script('assets/js/dataTables.bootstrap.js') }}
</body>
</html>