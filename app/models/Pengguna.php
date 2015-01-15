<?php
/**
* @author Thony Hermawan
*/
class Pengguna extends Eloquent
{
	protected $table = 'pengguna';
	protected $primaryKey = 'ID_PENGGUNA';

	public function levelpengguna()
	{
		return $this->belongsTo('LevelPengguna', 'ID_LEVEL');
	}
}