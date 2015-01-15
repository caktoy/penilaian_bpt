<?php
/**
* @author Thony Hermawan
*/
class PenggunaController extends Controller
{
	
	public function pengguna()
	{
		$data = array(
			'judul' => 'Pengguna', 
			'content' => 'list_pengguna',
			'pengguna' => Pengguna::all(),
			);

		return View::make('page', $data);
	}

	public function insertPengguna()
	{
		$data = array(
			'judul' => 'Tambah Pengguna', 
			'content' => 'add_pengguna',
			'level' => LevelPengguna::all(),
			);

		return View::make('page', $data);
	}

	public function actInsertPengguna()
	{
		$pengguna = new Pengguna;
		$pengguna->nama_pengguna = Input::get('nama');
		$pengguna->pass_pengguna = md5(Input::get('pass'));
		$pengguna->id_level = Input::get('level');
		$pengguna->save();
		
		$pesan = '<strong>Sukses!</strong> Data pengguna sudah disimpan.';

		return Redirect::to('/pengguna')->with('pesan', $pesan);
	}

	public function actDeletePengguna($id)
	{
		try {
			if ($id == Session::get('id_pengguna')) {
				$pesan = '<strong>Gagal!</strong> Pengguna sedang aktif.';
			} else {
				$pengguna = Pengguna::find($id);
				$affectedRow = $pengguna->delete();
				if ($affectedRow > 0) {
					$pesan = '<strong>Sukses!</strong> Data pengguna sudah dihapus.';
				} else {
					$pesan = '<strong>Gagal!</strong> Data pengguna gagal dihapus.';
				}
			}
		} catch(Exception $ex) {
			$pesan = '<strong>Gagal!</strong> Data pengguna gagal dihapus.';
		}
		return Redirect::to('/pengguna')->with('pesan', $pesan);
	}

	public function updatePengguna($id)
	{
		$data = array(
			'judul' => 'Ubah Pengguna', 
			'content' => 'update_pengguna',
			'pengguna' => Pengguna::find($id),
			'level' => LevelPengguna::all(),
			);

		return View::make('page', $data);
	}

	public function actUpdatePengguna($id)
	{
		$pengguna = Pengguna::find($id);
		$pengguna->nama_pengguna = Input::get('nama');
		$pengguna->pass_pengguna = md5(Input::get('pass'));
		$pengguna->id_level = Input::get('level');
		$pengguna->save();
		
		$pesan = '<strong>Sukses!</strong> Data pengguna sudah diubah.';

		return Redirect::to('/pengguna')->with('pesan', $pesan);
	}
}