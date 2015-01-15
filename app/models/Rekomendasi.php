<?php 
/**
* @author Thony Hermawan
*/
class Rekomendasi extends Eloquent
{
	protected $table = 'rekomendasi';
	protected $primaryKey = 'ID_REKOMENDASI';

	public function karyawan()
	{
		return $this->belongsTo('Karyawan', 'ID_KARYAWAN');
	}
}