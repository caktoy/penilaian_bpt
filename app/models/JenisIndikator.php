<?php
/**
* @author Thony Hermawan
*/
class JenisIndikator extends Eloquent
{
	protected $table = 'jenis_indikator';
	protected $primaryKey = 'ID_JENIS_INDIKATOR';

	public function indikator()
	{
		return $this->hasMany('indikator', 'ID_JENIS_INDIKATOR');
	}
}