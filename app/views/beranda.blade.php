<fieldset>
	<legend>Beranda</legend>
	<div class="row">
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-body">
					<div id="column"></div>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-body">
					<div id="pie"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Rekomendasi Karyawan</h3>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Nilai</th>
						<th width="20%">Opsi</th>
					</tr>
				</thead>
				<tbody>
					@foreach($rek as $r)
					<tr>
						<td>{{ $r->karyawan->NAMA_KARYAWAN }}</td>
						<td align="right">{{ number_format($r->NILAI_AKHIR, 2) }}</td>
						<td align="center">
							{{HTML::link('/penilaian/rekomendasi/set/'.$r->ID_REKOMENDASI, 'Rekomendasi', array('class' => 'btn btn-success btn-xs'))}}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</fieldset>
{{ HTML::script('assets/js/jquery-1.11.1.min.js') }}
<script type="text/javascript">
	var chart1;
	var chart2;
	$(document).ready(function() {
		chart1 = new Highcharts.Chart({
			chart: {
				renderTo: 'column',
				type: 'column',
				plotBackgroundColor: null,
	            plotBorderWidth: 1,//null,
	            plotShadow: false
			},
			title: {
				text: 'Grafik 5 Tertinggi Hasil Penilaian Karyawan'
			},
			xAxis: {
				categories: ['Karyawan']
			},
			yAxis: {
				title: {
					text: 'Nilai Akhir'
				}
			},
			legend: {
				enabled: true
			},
			credits: {
				enabled: false
			},
			series: [
				<?php
				foreach ($top5 as $top) {
					$nama = $top->karyawan->NAMA_KARYAWAN;
					$nilai = $top->NILAI_AKHIR;
				?>
				{
					name: '<?php echo $nama; ?>',
					data: [<?php echo $nilai; ?>]
				},
				<?php
				}
				?>
			]
		});
		chart1 = new Highcharts.Chart({
			chart: {
				renderTo: 'pie',
				type: 'pie',
				plotBackgroundColor: null,
	            plotBorderWidth: 1,//null,
	            plotShadow: false
			},
			title: {
				text: 'Grafik Sebaran Karyawan di Perusahaan Rekanan'
			},
			credits: {
				enabled: false
			},
			plotOptions: {
	            pie: {
	                allowPointSelect: true,
	                cursor: 'pointer',
	                dataLabels: {
	                    enabled: true,
	                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
	                    style: {
	                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
	                    }
	                }
	            }
	        },
			series: [{
				type: 'pie',
				name: 'Jumlah',
				data: [
					<?php
					$iter = 0;
					foreach ($for_pie as $data_pie) {
						$nama = $data_pie->rekanan;
						$jumlah = $data_pie->jumlah;
						echo "['".$nama."', ".$jumlah."]";
						if($iter < count($for_pie)){
							echo ",";
						}
						echo "\n";
						$iter++;
					}
					?>
				]
			}]
		});
	});
</script>