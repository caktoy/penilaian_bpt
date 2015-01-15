<?php
/**
* @author Thony Hermawan
*/
class Divisi extends Eloquent
{
	protected $table = 'divisi';
	protected $primaryKey = 'ID_DIVISI';

	public function karyawan()
	{
		return $this->hasMany('Karyawan', 'ID_DIVISI');
	}
}