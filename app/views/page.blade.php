<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title><?php echo $judul; ?> - PT. BANGUN PERSADA TRANSPORTATION</title>
	{{ HTML::style('assets/css/bootstrap.css') }}
	{{ HTML::style('assets/css/dashboard.css') }}
	{{ HTML::style('assets/css/flick/jquery-ui-1.9.2.custom.css') }}
	{{ HTML::style('assets/css/dataTables.bootstrap.css') }}
	{{ HTML::style('assets/js/bootstrapvalidator/dist/css/bootstrapValidator.css') }}
	<link rel="shortcut icon" href="assets/img/favicon.ico">
</head>
<body>
	<?php
	function pecah_url($url, $urutan)
	{
		$data = explode('/', $url);
		return $data[$urutan];
	}
	?>
	<!-- Navbar -->
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">
					{{ HTML::image('assets/img/logo-bpt.png', 'logo bpt', array('width' => 70, 'style' => 'margin-top:-15px;')) }}
					PT. BANGUN PERSADA TRANSPORTATION
				</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Session::get('username')}} <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><?php echo link_to('/beranda/ubah_password', 'Ubah Password', array()); ?></li>
							<li><?php echo link_to('/logout', 'Keluar', array('onclick' => 'return confirm("Keluar?");')); ?></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-3 sidebar">@include('sidebar')</div>
			<div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 main">@include($content)</div>
		</div>
	</div>
	<script type="text/javascript">
	function kembali() {
		history.go(-1);
	}
	</script>
	{{ HTML::script('assets/js/jquery-1.11.1.min.js') }}
	{{ HTML::script('assets/js/jquery-ui-1.9.2.custom.js') }}
	{{ HTML::script('assets/js/bootstrap.js') }}
	{{ HTML::script('assets/js/myscript.js') }}
	{{ HTML::script('assets/js/jquery.dataTables.js') }}
	{{ HTML::script('assets/js/dataTables.bootstrap.js') }}
	{{ HTML::script('assets/js/bootstrapvalidator/dist/js/bootstrapValidator.min.js') }}
	{{ HTML::script('assets/js/bootstrapvalidator/dist/js/language/id_ID.js') }}
	{{ HTML::script('assets/js/highcharts.js') }}
	{{ HTML::script('assets/js/exporting.js') }}
</body>
</html>