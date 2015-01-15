<?php
/**
* @author Thony Hermawan
*/
class MasterController extends Controller
{
	
	public function master()
	{
		$data = array(
			'judul' => 'Olah Data Master',
			'content' => 'manage_master',
			);
		return View::make('page', $data);
	}

	public function karyawan()
	{
		$data = array(
			'judul' => 'Karyawan',
			'content' => 'list_karyawan',
			'list' => Karyawan::all(),
			);
		return View::make('page', $data);
	}

	public function insertKaryawan()
	{
		$data = array(
			'judul' => 'Tambah Data Karyawan',
			'content' => 'add_karyawan',
			'rekanan' => Rekanan::orderBy('NAMA_REKANAN')->get(),
			'divisi' => Divisi::orderBy('NAMA_DIVISI')->get(),
			);
		return View::make('page', $data);
	}

	public function actInsertKaryawan()
	{
		$nik = Input::get('nik');
		$nama = Input::get('nama');
		$alamat = Input::get('alamat');
		$telp = Input::get('telp');
		$rekanan = Input::get('rekanan');
		$divisi = Input::get('divisi');

		$karyawan = new Karyawan;
		$karyawan->ID_DIVISI = $divisi;
		$karyawan->ID_REKANAN = $rekanan;
		$karyawan->NIK_KARYAWAN = $nik;
		$karyawan->NAMA_KARYAWAN = $nama;
		$karyawan->ALAMAT_KARYAWAN = $alamat;
		$karyawan->TELEPON_KARYAWAN = $telp;
		$affectedRow = $karyawan->save();
		
		$pesan = '<strong>Sukses!</strong> Data karyawan sudah disimpan.';

		return Redirect::to('/master/karyawan')->with('pesan', $pesan);
	}

	public function actDeleteKaryawan($id)
	{
		$karyawan = Karyawan::find($id);
        try{
            $affectedRow = $karyawan->delete();
            $pesan = '<strong>Sukses!</strong> Data karyawan sudah dihapus.';
        } catch(Exception $e){
            $pesan = '<strong>Gagal!</strong> Data karyawan gagal dihapus. Karyawan sudah dilakukan penilaian';
        }
		//if ($affectedRow > 0) {
		//	$pesan = '<strong>Sukses!</strong> Data karyawan sudah dihapus.';
		//} else {
		//	$pesan = '<strong>Gagal!</strong> Data karyawan gagal dihapus.';
		//}
		return Redirect::to('/master/karyawan')->with('pesan', $pesan);
	}

	public function updateKaryawan($id)
	{
		$data = array(
			'judul' => 'Ubah Data Karyawan',
			'content' => 'update_karyawan',
			'karyawan' => Karyawan::find($id),
			'rekanan' => Rekanan::orderBy('NAMA_REKANAN')->get(),
			'divisi' => Divisi::orderBy('NAMA_DIVISI')->get(),
			);
		return View::make('page', $data);
	}

	public function actUpdateKaryawan($id)
	{
		$karyawan = Karyawan::find($id);
		$karyawan->NIK_KARYAWAN = Input::get('nik');
		$karyawan->NAMA_KARYAWAN = Input::get('nama');
		$karyawan->ALAMAT_KARYAWAN = Input::get('alamat');
		$karyawan->TELEPON_KARYAWAN = Input::get('telp');
		$karyawan->ID_REKANAN = Input::get('rekanan');
		$karyawan->ID_DIVISI = Input::get('divisi');
		$affectedRow = $karyawan->save();
		if ($affectedRow > 0) {
			$pesan = '<strong>Sukses!</strong> Data karyawan sudah diubah.';
		} else {
			$pesan = '<strong>Gagal!</strong> Data karyawan gagal diubah.';
		}
		return Redirect::to('/master/karyawan')->with('pesan', $pesan);
	}

	public function divisi()
	{
		$data = array(
			'judul' => 'Divisi', 
			'content' => 'list_divisi',
			'list' => Divisi::all());
		return View::make('page', $data);
	}

	public function insertDivisi()
	{
		$data = array('judul' => 'Tambah Data Divisi', 'content' => 'add_divisi');
		return View::make('page', $data);
	}

	public function actInsertDivisi()
	{
		$nama = Input::get('nama');

		$divisi = new Divisi;
		$divisi->nama_divisi = $nama;
		$divisi->save();

		$pesan = '<strong>Sukses!</strong> Data divisi sudah disimpan.';

		return Redirect::to('/master/divisi')->with('pesan', $pesan);
	}

	public function actDeleteDivisi($id)
	{
		$divisi = Divisi::find($id);
        try{
            $divisi->delete();
            $pesan = '<strong>Sukses!</strong> Data divisi sudah dihapus.';
        } catch(Exception $e) {
            $pesan = '<strong>Gagal!</strong> Data divisi gagal dihapus. Data sudah digunakan sebagai sumber data karyawan.';
        }
		//$pesan = '<strong>Sukses!</strong> Data divisi sudah dihapus.';
		return Redirect::to('/master/divisi')->with('pesan', $pesan);
	}

	public function updateDivisi($id)
	{
		$data = array(
			'judul' => 'Ubah Data Divisi',
			'content' => 'update_divisi',
			'data' => Divisi::find($id),
			);
		return View::make('page', $data);
	}

	public function actUpdateDivisi($id)
	{
		$divisi = Divisi::find($id);
        $divisi->NAMA_DIVISI = Input::get('nama');
        try{
            $affectedRow = $divisi->save();
            $pesan = '<strong>Sukses!</strong> Data divisi sudah diubah.';
        } catch(Exception $e) {
            $pesan = '<strong>Gagal!</strong> Data divisi gagal diubah.';
        }
		//if ($affectedRow > 0) {
		//	$pesan = '<strong>Sukses!</strong> Data divisi sudah diubah.';
		//} else{
		//	$pesan = '<strong>Gagal!</strong> Data divisi gagal diubah.';
		//}
		return Redirect::to('/master/divisi')->with('pesan', $pesan);
	}

	public function rekanan()
	{
		$data = array(
			'judul' => 'Perusahaan Rekanan', 
			'content' => 'list_rekanan',
			'list' => Rekanan::all(),
			);
		return View::make('page', $data);
	}

	public function insertRekanan()
	{
		$data = array('judul' => 'Tambah Data Perusahaan', 'content' => 'add_rekanan');
		return View::make('page', $data);
	}

	public function actInsertRekanan()
	{
		$nama = Input::get('nama');
		$alamat = Input::get('alamat');
		$telp = Input::get('telp');

		$rekanan = new Rekanan;
		$rekanan->NAMA_REKANAN = $nama;
		$rekanan->ALAMAT_REKANAN = $alamat;
		$rekanan->TELP_REKANAN = $telp;
		$rekanan->STATUS = 1;
		$affectedRow = $rekanan->save();

		if ($affectedRow > 0) {
			$pesan = '<strong>Sukses!</strong> Data perusahaan sudah disimpan.';
		} else {
			$pesan = '<strong>Gagal!</strong> Data perusahaan gagal disimpan.';
		}

		return Redirect::to('/master/rekanan')->with('pesan', $pesan);
	}

	public function actDeleteRekanan($id)
	{
		$rekanan = Rekanan::find($id);
        try{
            $rekanan->delete();
            $pesan = '<strong>Sukses!</strong> Data perusahaan sudah dihapus.';
        } catch(Exception $e){
            $pesan = '<strong>Gagal!</strong> Data perusahaan gagal dihapus. Data sudah digunakan sebagai sumber data karyawan.';
        }
		return Redirect::to('/master/rekanan')->with('pesan', $pesan);
	}

	public function actUpdateRekanan($id)
	{
		$rekanan = Rekanan::find($id);
		$rekanan->NAMA_REKANAN = Input::get('nama');
		$rekanan->ALAMAT_REKANAN = Input::get('alamat');
		$rekanan->TELP_REKANAN = Input::get('telp');
		$rekanan->save();
		$pesan = '<strong>Sukses!</strong> Data perusahaan sudah diubah.';
		return Redirect::to('/master/rekanan')->with('pesan', $pesan);
	}

	public function updateRekanan($id)
	{
		$data = array(
			'judul' => 'Ubah Data Rekanan',
			'content' => 'update_rekanan',
			'data' => Rekanan::find($id),
			);
		return View::make('page', $data);
	}

	public function indikator()
	{
		$data = array(
			'judul' => 'Indikator', 
			'content' => 'list_indikator',
			'indikator' => Indikator::all(),
			);
		return View::make('page', $data);
	}

	public function insertIndikator()
	{
		$data = array(
			'judul' => 'Tambah Data Indikator', 
			'content' => 'add_indikator',
			'jenis_indikator' => JenisIndikator::orderBy('JENIS_INDIKATOR')->get(),
			);
		return View::make('page', $data);
	}

	public function actInsertIndikator()
	{
		$jenis = Input::get('jenis');
		$nama = Input::get('nama');
		$bobot = Input::get('bobot')/100;
		$ket = Input::get('ket');

		$indikator = new Indikator;
		$indikator->id_jenis_indikator = $jenis;
		$indikator->nama_indikator = $nama;
		$indikator->bobot_indikator = $bobot;
		$indikator->ket_indikator = $ket;
		$indikator->save();

		$pesan = '<strong>Sukses!</strong> Data indikator sudah disimpan.';

		return Redirect::to('/master/indikator')->with('pesan', $pesan);
	}

	public function actDeleteIndikator($id)
	{
		$indikator = Indikator::find($id);
        try{
            $affectedRow = $indikator->delete();
            $pesan = '<strong>Sukses!</strong> Indikator sudah dihapus.';
        } catch(Exception $e){
            $pesan = '<strong>Gagal!</strong> Indikator gagal dihapus. Data sudah digunakan sebagai sumber data penilaian.';
        }
		//if ($affectedRow > 0) {
		//	$pesan = '<strong>Sukses!</strong> Indikator sudah dihapus.';
		//} else{
		//	$pesan = '<strong>Gagal!</strong> Indikator gagal dihapus.';
		//}
		return Redirect::to('/master/indikator')->with('pesan', $pesan);
	}

	public function updateIndikator($id)
	{
		$data = array(
			'judul' => 'Ubah Indikator', 
			'content' => 'update_indikator',
			'indikator' => Indikator::find($id),
			'jenis_indikator' => JenisIndikator::orderBy('JENIS_INDIKATOR')->get(),
			);
		return View::make('page', $data);
	}

	public function actUpdateIndikator($id)
	{
		$jenis = Input::get('jenis');
		$nama = Input::get('nama');
		$bobot = Input::get('bobot')/100;
		$ket = Input::get('ket');

		$indikator = Indikator::find($id);
		$indikator->id_jenis_indikator = $jenis;
		$indikator->nama_indikator = $nama;
		$indikator->bobot_indikator = $bobot;
		$indikator->ket_indikator = $ket;
		$indikator->save();

		$pesan = '<strong>Sukses!</strong> Data indikator sudah diubah.';

		return Redirect::to('/master/indikator')->with('pesan', $pesan);
	}

	public function jenisIndikator()
	{
		$data = array(
			'judul' => 'Jenis Indikator', 
			'content' => 'list_jenis_indikator',
			'jenis_indikator' => JenisIndikator::all(),
			);
		return View::make('page', $data);
	}

	public function insertJenisIndikator()
	{
		$data = array('judul' => 'Tambah Jenis Indikator', 'content' => 'add_jenis_indikator');
		return View::make('page', $data);
	}

	public function actInsertJenisIndikator()
	{
		$jenis_indikator = new JenisIndikator;
		$jenis_indikator->jenis_indikator = Input::get('nama');
		$jenis_indikator->save();

		$pesan = '<strong>Sukses!</strong> Data jenis indikator sudah disimpan.';

		return Redirect::to('/master/jenis_indikator')->with('pesan', $pesan);
	}

	public function actDeleteJenisIndikator($id)
	{
		$jenis_indikator = JenisIndikator::find($id);
        try{
            $affectedRow = $jenis_indikator->delete();
            $pesan = '<strong>Sukses!</strong> Jenis indikator sudah dihapus.';
        } catch(Exception $e){
            $pesan = '<strong>Gagal!</strong> Jenis Indikator gagal dihapus. Data sudah digunakan sebagai sumber data penilaian.';
        }
		//if ($affectedRow > 0) {
		//	$pesan = '<strong>Sukses!</strong> Jenis indikator sudah dihapus.';
		//} else{
		//	$pesan = '<strong>Gagal!</strong> Jenis Indikator gagal dihapus.';
		//}
		return Redirect::to('/master/jenis_indikator')->with('pesan', $pesan);
	}

	public function updateJenisIndikator($id)
	{
		$data = array(
			'judul' => 'Ubah Jenis Indikator', 
			'content' => 'update_jenis_indikator',
			'jenis_indikator' => JenisIndikator::find($id),
			);
		return View::make('page', $data);
	}

	public function actUpdateJenisIndikator($id)
	{
		$jenis_indikator = JenisIndikator::find($id);
		$jenis_indikator->jenis_indikator = Input::get('nama');
		$jenis_indikator->save();

		$pesan = '<strong>Sukses!</strong> Data jenis indikator sudah disimpan.';

		return Redirect::to('/master/jenis_indikator')->with('pesan', $pesan);
	}

	public function rangeNilai()
	{
		$data = array(
			'judul' => 'Range Nilai', 
			'content' => 'list_range_nilai',
			'range_nilai' => RangeNilai::all(),
			);
		return View::make('page', $data);
	}

	public function insertRangeNilai()
	{
		$data = array('judul' => 'Tambah Range Nilai', 'content' => 'add_range_nilai');
		return View::make('page', $data);
	}

	public function actInsertRangeNilai()
	{
		$range_nilai = new RangeNilai;
		$range_nilai->KET_RANGE = Input::get('nama');
		$range_nilai->NILAI_RANGE = Input::get('nilai');
		$range_nilai->save();

		$pesan = '<strong>Sukses!</strong> Range nilai sudah disimpan.';

		return Redirect::to('/master/range_nilai')->with('pesan', $pesan);
	}

	public function actDeleteRangeNilai($id)
	{
		$range_nilai = RangeNilai::find($id);
        try {
            $affectedRow = $range_nilai->delete();
            $pesan = '<strong>Sukses!</strong> Range nilai sudah dihapus.';
        } catch(Exception $e) {
            $pesan = '<strong>Gagal!</strong> Range nilai gagal dihapus. Data sudah digunakan untuk penilaian.';
        }
		//if ($affectedRow > 0) {
		//	$pesan = '<strong>Sukses!</strong> Range nilai sudah dihapus.';
		//} else{
		//	$pesan = '<strong>Gagal!</strong> Range nilai gagal dihapus.';
		//}
		return Redirect::to('/master/range_nilai')->with('pesan', $pesan);
	}

	public function updateRangeNilai($id)
	{
		$data = array(
			'judul' => 'Ubah Range Nilai', 
			'content' => 'update_range_nilai',
			'range_nilai' => RangeNilai::find($id),
			);
		return View::make('page', $data);
	}

	public function actUpdateRangeNilai($id)
	{
		$range_nilai = RangeNilai::find($id);
		$range_nilai->KET_RANGE = Input::get('nama');
		$range_nilai->NILAI_RANGE = Input::get('nilai');
		$range_nilai->save();

		$pesan = '<strong>Sukses!</strong> Range nilai sudah diubah.';

		return Redirect::to('/master/range_nilai')->with('pesan', $pesan);
	}
}