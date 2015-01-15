<?php 
/**
* @author Thony Hermawan
*/
class Rekanan extends Eloquent
{
	protected $table = 'rekanan';
	protected $primaryKey = 'ID_REKANAN';

	public function karyawan()
	{
		return $this->hasMany('Karyawan', 'ID_REKANAN');
	}
}