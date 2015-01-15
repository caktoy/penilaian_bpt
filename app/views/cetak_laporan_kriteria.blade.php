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
				<th>Jenis Indikator</th>
				<th>Indikator</th>
				<th>Bobot</th>
				<th>Keterangan</th>
			</tr>
		</thead>
		<tbody>
            @foreach($kriteria as $k)
			<tr valign="top">
				<td>{{$k->jenisindikator->JENIS_INDIKATOR}}</td>
				<td>{{$k->NAMA_INDIKATOR}}</td>
				<td align="right">{{($k->BOBOT_INDIKATOR*100)}}%</td>
				<td>{{$k->KET_INDIKATOR}}</td>
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