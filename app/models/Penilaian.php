<?php 
/**
* @author Thony Hermawan
*/
class Penilaian extends Eloquent
{
	protected $table = 'penilaian';
	protected $primaryKey = 'ID_PENILAIAN';

	public function indikator()
	{
		return $this->belongsTo('Indikator', 'ID_INDIKATOR');
	}

	public function range()
	{
		return $this->belongsTo('RangeNilai', 'ID_RANGE');
	}

	public function karyawan()
	{
		return $this->belongsTo('Karyawan', 'ID_KARYAWAN');
	}
}