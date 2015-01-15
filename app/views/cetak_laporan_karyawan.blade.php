<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<style type="text/css">
	body{
		font-family: sans-serif;
		font-size: 12pt;
	}
	body > .tipe-laporan {
		text-align: center;
		font-weight: bold;
		text-decoration: underline;
		font-size: 12pt;
        padding-top: 20px;
	}
    body > .tgl-laporan {
        text-align: center;
		font-size: 10pt;
        padding-bottom: 20px;
    }
	</style>
</head>
<body>
    @include('header_laporan')
    <div class="tipe-laporan">{{ $judul }}</div>
    <div class="tgl-laporan">Tanggal cetak: {{ date('d M Y') }}</div>
    <p>
    	Dengan Hormat,<br>
    	Sehubungan dengan penilaian karyawan perusahaan yang bertujuan untuk meningkatkan kinerja sumber daya manusia dalam organisasi, maka karyawan yang tercantum dibawah ini:
    </p>
    <p>
    	<table>
    		<tr>
    			<td>Nama (NIK)</td>
    			<td>:</td>
    			<td>{{ $karyawan->NAMA_KARYAWAN }} ({{ $karyawan->NIK_KARYAWAN }})</td>
    		</tr>
    		<tr>
    			<td>Alamat</td>
    			<td>:</td>
    			<td>{{ $karyawan->ALAMAT_KARYAWAN }}</td>
    		</tr>
    		<tr>
    			<td>No. Telp.</td>
    			<td>:</td>
    			<td>{{ $karyawan->TELEPON_KARYAWAN }}</td>
    		</tr>
    		<tr>
    			<td>Penempatan / Divisi</td>
    			<td>:</td>
    			<td>{{ $karyawan->rekanan->NAMA_REKANAN }} / {{ $karyawan->divisi->NAMA_DIVISI }}</td>
    		</tr>
    	</table>
    </p>
    <p>
    	<br>Menerangkan hasil penilaian kinerja karyawan bersangkutan sebagai berikut:
    </p>
	<table width="100%" border="1" cellpadding="5" cellspacing="0">
		<thead>
			<tr>
				<th>Indikator</th>
				<th>Bobot</th>
				<th>Hasil</th>
				<th>Nilai</th>
			</tr>
		</thead>
		<tbody>
			<?php $total_bobot = 0; $total_nilai = 0; ?>
			@foreach ($penilaian as $p)
			<tr>
				<td>{{$p->indikator->NAMA_INDIKATOR}}</td>
				<td align="right">{{$p->indikator->BOBOT_INDIKATOR*100}}%</td>
				<td>{{$p->range->KET_RANGE}}</td>
				<td align="right">{{$p->HASIL_PENILAIAN}}</td>
				<?php $total_bobot += $p->indikator->BOBOT_INDIKATOR; ?>
				<?php $total_nilai += $p->HASIL_PENILAIAN; ?>
			</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<td align="right">Jumlah</td>
				<td align="right">{{number_format($total_bobot * 100)}}%</td>
				<td>&nbsp;</td>
				<td align="right">{{$total_nilai}}</td>
			</tr>
		</tfoot>
	</table>
	@if($rekomendasi->REKOMENDASI != "")
	<p><br>Dari hasil penilaian diatas, maka karyawan tersebut direkomendasikan sebagai <strong>{{$rekomendasi->REKOMENDASI}}</strong>.</p>
	@endif
	<p>Atas perhatiannya, kami ucapkan terima kasih.</p>
    <br>
    <table border="0" width="100%">
        <tr>
            <td align="center" width="25%">
                Kabag. HRD
                <br><br><br><br>
                <strong>Moh. Oby Setiawan</strong>
            </td>
            <td align="center">&nbsp;</td>
            <td align="center" width="25%">
                Direktur
                <br><br><br><br>
                <strong>Heri Siswanto</strong>
            </td>
        </tr>
    </table>
</body>
</html>