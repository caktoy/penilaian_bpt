<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<style type="text/css">
	body{
		font-family: sans-serif;
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
	<table width="100%" border="1" cellpadding="5" cellspacing="0">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama Perusahaan</th>
				<th>Alamat</th>
				<th>No. Telepon</th>
			</tr>
		</thead>
		<tbody>
			@foreach($rekanan as $data)
			<tr>
				<td>{{$data->ID_REKANAN}}</td>
				<td>{{$data->NAMA_REKANAN}}</td>
				<td>{{$data->ALAMAT_REKANAN}}</td>
				<td>{{$data->TELP_REKANAN}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
    <br><br>
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