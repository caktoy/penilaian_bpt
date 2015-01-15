<?php
/**
* @author Thony Hermawan
*/
class LaporanController extends Controller
{
	
	public function penilaian()
	{
		$data = array(
			'judul' => 'Hasil Penilaian', 
			'content' => 'list_laporan_penilaian',
			'penilaian' => Rekomendasi::all(),
			);
		return View::make('page', $data);
	}

	public function rekanan()
	{
		$data = array(
			'judul' => 'Perusahaan Rekanan',
			'content' => 'list_laporan_rekanan',
			'rekanan' => Rekanan::all(),
			);
		return View::make('page', $data);
	}
    
    public function kriteria()
    {
        $data = array(
            'judul' => 'Indikator Penilaian',
            'content' => 'list_laporan_kriteria',
            'kriteria' => Indikator::all(),
        );
        return View::make('page', $data);
    }

	public function cetakRekanan()
	{
		$data = array(
			'judul' => 'Perusahaan Rekanan',
			'content' => 'cetak_laporan_rekanan',
			'rekanan' => Rekanan::all(),
			);
		//return View::make('page', $data);
		$pdf = PDF::loadView('cetak_laporan_rekanan', $data);
		$pdf->setPaper('a4');
		return $pdf->stream('rekanan.pdf');
	}

	public function cetakKriteria()
	{
		$data = array(
			'judul' => 'Kriteria Penilaian',
			'content' => 'cetak_laporan_kriteria',
			'kriteria' => Indikator::orderBy('ID_JENIS_INDIKATOR')->get(),
			);
		//return View::make('page', $data);
		$pdf = PDF::loadView('cetak_laporan_kriteria', $data);
		$pdf->setPaper('a4');
		return $pdf->stream('kriteria.pdf');
	}

	public function cetakPenilaian()
	{
		$data = array(
			'judul' => 'Hasil Penilaian',
			'content' => 'cetak_laporan_penilaian',
			'penilaian' => Rekomendasi::all(),
			);
		//return View::make('page', $data);
		$pdf = PDF::loadView('cetak_laporan_penilaian', $data);
		$pdf->setPaper('a4');
		return $pdf->stream('Hasil Penilaian ('.date('d M Y').').pdf');
	}

	public function cetakLaporanKaryawan($id)
	{
		$rekomendasi = Rekomendasi::find($id);
		$karyawan = Karyawan::find($rekomendasi->ID_KARYAWAN);
		$data = array(
			'judul' => 'Hasil Penilaian Karyawan',
			'content' => 'cetak_laporan_karyawan',
			'rekomendasi' => $rekomendasi,
			'karyawan' => $karyawan,
			'penilaian' => Penilaian::where('ID_KARYAWAN', '=', $rekomendasi->ID_KARYAWAN)->get(),
			);
		//return View::make('page', $data);
		$pdf = PDF::loadView('cetak_laporan_karyawan', $data);
		$pdf->setPaper('a4');
		return $pdf->stream('Hasil_Penilaian_Karyawan_'.date('dmY').'_'.$karyawan->NIK_KARYAWAN.'.pdf');
	}

}