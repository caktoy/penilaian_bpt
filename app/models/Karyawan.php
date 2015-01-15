<?php 
/**
* @author Thony Hermawan
*/
class Karyawan extends Eloquent
{
	protected $table = 'karyawan';
	protected $primaryKey = 'ID_KARYAWAN';

	public function divisi()
	{
		return $this->belongsTo('Divisi', 'ID_DIVISI');
	}

	public function rekanan()
	{
		return $this->belongsTo('Rekanan', 'ID_REKANAN');
	}

	public function rekomendasi()
	{
		return $this->hasMany('Rekomendasi', 'ID_KARYAWAN');
	}

	public function penilaian()
	{
		return $this->hasMany('Penilaian', 'ID_PENILAIAN');
	}
}