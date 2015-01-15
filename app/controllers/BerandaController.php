<?php
/**
* @author Thony Hermawan
*/
class BerandaController extends BaseController
{
	
	public function cekStatusMasuk()
	{
		if (Session::has('username')) {
			return Redirect::to('/beranda');
		} else {
			return Redirect::to('/login');
		}
	}

	public function login()
	{
		$data = array(
			'judul' => 'Login',
			'level' => LevelPengguna::all());
		return View::make('login', $data);
	}

	public function logout()
	{
		Session::flush();
		return Redirect::to('/');
	}

	public function authLogin()
	{
		$username = Input::get('username');
		$password = Input::get('password');
		$login_as = Input::get('login_as');

		$pengguna = Pengguna::whereRaw('NAMA_PENGGUNA = ? and PASS_PENGGUNA = ? and ID_LEVEL = ?',
			array($username, md5($password), $login_as))->take(1)->get();

		$id_pengguna = 0;
		foreach ($pengguna as $key => $value) {
			$id_pengguna = $value->ID_PENGGUNA;
		}

		if (count($pengguna) > 0) {
			// session operasion
			Session::put('id_pengguna', $id_pengguna);
			Session::put('username', $username);
			Session::put('password', Hash::make($password));
			Session::put('level', $login_as);
			// redirect to beranda
			return Redirect::to('/');
		} else {
			return Redirect::to('/login')->with('pesan', 'Maaf, login anda ditolak.');
		}
	}

	public function beranda()
	{
		$top5 = Rekomendasi::orderBy('NILAI_AKHIR', 'desc')->take(5)->get();
		$rek = Rekomendasi::where('STATUS', '=', 'belum')->get();
		$for_pie = DB::select('select b.nama_rekanan as rekanan, count(a.id_rekanan) as jumlah from karyawan a, rekanan b where a.id_rekanan = b.id_rekanan group by b.nama_rekanan order by jumlah desc');
		$data = array(
			'judul' 	=> 'Beranda',
			'content'	=> 'beranda',
			'top5' 		=> $top5,
			'rek'		=> $rek,
			'for_pie'	=> $for_pie,
			);
		return View::make('page', $data);
	}

	public function ubahPassword()
	{
		$data = array(
			'judul' 	=> 'Ubah Password',
			'content'	=> 'ubah_password',
			);
		return View::make('page', $data);
	}

	public function postUbahPassword()
	{
		$id_pengguna = Session::get('id_pengguna');
		$pass_lama = md5(Input::get('pass_lama'));
		$pass_konfirmasi = md5(Input::get('pass_konfirmasi'));
		$pass_baru = md5(Input::get('pass_baru'));

		$validator = Validator::make(
			Input::only('pass_lama', 'pass_konfirmasi', 'pass_baru'),
			array(
				'pass_lama' => 'required',
				'pass_konfirmasi' => 'same:pass_lama',
				'pass_baru' => 'min:5',
				),
			array(
				'required' => ':attribute harus diisi.',
				'same' => 'Tidak sesuai dengan password.',
				'min' => 'Minimal 5 karakter.'
				)
			);

		if ($validator->fails()) {
			$pesan = '<strong>Gagal!</strong> Password gagal diubah.';
			return Redirect::to('/beranda/ubah_password')->withErrors($validator)->with('pesan', $pesan);
		} else {
			$pengguna = Pengguna::find($id_pengguna);
			$pengguna->PASS_PENGGUNA = $pass_baru;
			$pengguna->save();

			$pesan = '<strong>Sukses!</strong> Password berhasil diubah.';
			return Redirect::to('/beranda/ubah_password')->with('pesan', $pesan);
		}
	}
}