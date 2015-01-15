<?php
/**
* @author Thony Hermawan
*/
class PenilaianController extends Controller
{
	
	public function penilaian()
	{
		$data = array(
			'judul' => 'Penilaian Karyawan', 
			'content' => 'list_penilaian',
			'karyawan' => Karyawan::where('STATUS_PENILAIAN', '=', 'belum')->get(),
			);

		return View::make('page', $data);
	}

	public function doPenilaian($id)
	{
		$karyawan = Karyawan::find($id);
		$data = array(
			'judul' => 'Penilaian Karyawan : '.$karyawan->NAMA_KARYAWAN.' ('.$karyawan->NIK_KARYAWAN.')',
			'content' => 'do_penilaian',
			'jenis' => JenisIndikator::orderBy('JENIS_INDIKATOR')->get(),
			'karyawan' => $karyawan,
			'range' => RangeNilai::all(),
			);
		return View::make('page', $data);
	}

	public function rekomendasi()
	{
		$data = array(
			'judul' => 'Rekomendasi', 
			'content' => 'list_rekomendasi',
			'rekomendasi' => Rekomendasi::orderBy('NILAI_AKHIR', 'desc')->get(),
			);

		return View::make('page', $data);
	}

	public function loadByJenis($id)
	{
		$form_name = 'form_penilaian_';
		if ($id == 1) {
			$form_name = $form_name.'umum';
			$ind_khusus = Indikator::where('id_jenis_indikator', '=', 1)->get();
		} elseif ($id == 2) {
			$form_name = $form_name.'ob';
			$ind_khusus = Indikator::where('id_jenis_indikator', '=', 2)->get();
		} elseif ($id == 3) {
			$form_name = $form_name.'driver';
			$ind_khusus = Indikator::where('id_jenis_indikator', '=', 3)->get();
		} elseif ($id == 4) {
			$form_name = $form_name.'security';
			$ind_khusus = Indikator::where('id_jenis_indikator', '=', 4)->get();
		} elseif ($id == 5) {
			$form_name = $form_name.'ass_driver';
			$ind_khusus = Indikator::where('id_jenis_indikator', '=', 5)->get();
		}
		$data = array(
			'range' => RangeNilai::all(),
			'ind_umum' => Indikator::where('id_jenis_indikator', '=', 1)->get(),
			'ind_khusus' => $ind_khusus,
			);
		return View::make($form_name, $data);
	}

	public function actDoPenilaian($id)
	{
		try{
			$jenis = Input::get('jenis');
			$jumlah_indikator = Input::get('jumlah_indikator');
			$total_nilai = 0;
			$total_bobot = 0;

			for ($i=1; $i <= $jumlah_indikator; $i++) { 
				$ind_name = "ind".$i;
				$selected_range = "range".$i;
				$id_indikator = Input::get($ind_name);
				$id_range = Input::get($selected_range);

				$cari_indikator = Indikator::find($id_indikator);
				$cari_nilai = RangeNilai::find($id_range);
				$bobot_indikator = $cari_indikator->BOBOT_INDIKATOR;
				$nilai_range = $cari_nilai->NILAI_RANGE;
				$hitung = number_format($nilai_range * $bobot_indikator, 2);
				$total_nilai += $hitung;
				$total_bobot += $bobot_indikator;

				$penilaian = new Penilaian;
				$penilaian->ID_INDIKATOR = $id_indikator;
				$penilaian->ID_RANGE = $id_range;
				$penilaian->ID_KARYAWAN = $id;
				$penilaian->HASIL_PENILAIAN = $hitung;
				$penilaian->save();

				//echo "Id Indikator: ".$id_indikator." | Id Range: ".$id_range." | Bobot Indikator: ".($bobot_indikator*100)."% | Hasil Penilaian: ".$hitung."<br>";
			}
			//echo "Total Nilai: ".number_format($total_nilai, 2)." | Total Bobot: ".number_format(($total_bobot * 100))."%";
			// insert ke tabel rekomendasi
			$rekomendasi = new Rekomendasi;
			$rekomendasi->ID_KARYAWAN = $id;
			$rekomendasi->NILAI_AKHIR = $total_nilai;
			$rekomendasi->STATUS = "belum";
			$rekomendasi->save();
			// update data karyawan sudah dinilai
			$karyawan = Karyawan::find($id);
			$karyawan->STATUS_PENILAIAN = "sudah";
			$karyawan->save();
			// redirect
			$pesan = '<strong>Sukses!</strong> Penilaian karyawan telah disimpan.';
			return Redirect::to('/penilaian')->with('pesan', $pesan);
		} catch(Exception $e)
		{
			$pesan = '<strong>Gagal!</strong> Penilaian karyawan gagal disimpan.';
			return Redirect::to('/penilaian')->with('pesan', $pesan);
		}
	}

	public function doRekomendasi($id)
	{
		$rekomendasi = Rekomendasi::find($id);
		$nilai_akhir = number_format($rekomendasi->NILAI_AKHIR, 2);
		$ket_nilai = '';
		if ($nilai_akhir >= 4.6) {
			$ket_nilai = 'Sangat Baik';
		} elseif ($nilai_akhir >= 3.6) {
			$ket_nilai = 'Baik';
		} elseif ($nilai_akhir >= 2.6) {
			$ket_nilai = 'Cukup';
		} elseif ($nilai_akhir >= 1.6) {
			$ket_nilai = 'Kurang';
		} else {
			$ket_nilai = 'Sangat Kurang';
		}
		$karyawan = Karyawan::find($rekomendasi->ID_KARYAWAN);
		$penilaian = Penilaian::where('ID_KARYAWAN', '=', $karyawan->ID_KARYAWAN)->get();
		$data = array(
			'judul' => 'Rekomendasi : '.$karyawan->NAMA_KARYAWAN.' ('.$karyawan->NIK_KARYAWAN.')',
			'content' => 'do_rekomendasi',
			'karyawan' => $karyawan,
			'penilaian' => $penilaian,
			'rekomendasi' => $rekomendasi,
			'nilai_akhir' => $nilai_akhir,
			'ket_nilai' => $ket_nilai,
			);
		return View::make('page', $data);
	}

	public function actDoRekomendasi($id)
	{
		$rekomendasi = Rekomendasi::find($id);
		$rekomendasi->REKOMENDASI = Input::get('rekomendasi');
		$rekomendasi->STATUS = 'sudah';
		$rekomendasi->save();
		$pesan = '<strong>Sukses!</strong> Rekomendasi karyawan telah disimpan.';
		return Redirect::to('/penilaian/rekomendasi')->with('pesan', $pesan);
	}
    
    public function doNilaiUlang($id)
    {
        try{
            $rekomendasi = Rekomendasi::find($id);
            $karyawan = Karyawan::find($rekomendasi->ID_KARYAWAN);
            $penilaian = Penilaian::where('ID_KARYAWAN', '=', $karyawan->ID_KARYAWAN);
            
            $rekomendasi->delete();
            $penilaian->delete();
            $karyawan->STATUS_PENILAIAN = 'belum';
            $karyawan->save();
            
            $pesan = '<strong>Sukses!</strong> Lakukan penilaian ulang karyawan melalui menu penilaian.';
        } catch(Exception $e){
            $pesan = '<strong>Gagal!</strong> Terjadi kesalahan.';
        }
        return Redirect::to('/penilaian/rekomendasi')->with('pesan', $pesan);
    }
}