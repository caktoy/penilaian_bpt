<?php 
/**
* @author Thony Hermawan
*/
class RangeNilai extends Eloquent
{
	protected $table = 'range_nilai';
	protected $primaryKey = 'ID_RANGE';

	public function penilaian()
	{
		return $this->hasMany('Penilaian', 'ID_PENILAIAN');
	}
}