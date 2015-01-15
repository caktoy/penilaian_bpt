<?php 
/**
* @author Thony Hermawan
*/
class Indikator extends Eloquent
{
	protected $table = 'indikator';
	protected $primaryKey = 'ID_INDIKATOR';

	public function jenisindikator()
	{
		return $this->belongsTo('jenisindikator', 'ID_JENIS_INDIKATOR');
	}

	public function penilaian()
	{
		return $this->hasMany('Penilaian', 'ID_PENILAIAN');
	}
}