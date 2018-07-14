<?php
/**
* 
*/
class M_user extends CI_Model
{
	
	function validasi_login($username,$password)
	{
		return $this->db
			->select('a.id_user, a.username, a.password, a.nama, b.label AS level, b.level_akses AS level_caption', false)
			->join('pj_akses b', 'a.id_akses = b.id_akses', 'left')
			->where('a.username', $username)
			->where('a.password', sha1($password))
			->where('a.status', 'Aktif')
			->where('a.dihapus', 'tidak')
			->limit(1)
			->get('pj_user a');
	}

	function is_valid($u,$p)
	{
		return $this->db
			->select('id_user')
			->where('id_user', $u)
			->where('password', $p)
			->where('status', 'Aktif')
			->where('dihapus','tidak')
			->limit(1)
			->get('pj_user');

	}
}