<?php 
/**
* @author Thony Hermawan
*/
class LevelPengguna extends Eloquent
{
	protected $table = 'level_pengguna';
	protected $primaryKey = 'ID_LEVEL';

	public function pengguna()
	{
		return $this->hasMany('Pengguna', 'ID_LEVEL');
	}
}