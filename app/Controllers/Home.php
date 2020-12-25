<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		//$this->db = db_connect();
		
		//$data["kecamatan"] = $this->db->query('select * from kecamatan')->getRow();
		//echo $data["kecamatan"]->nama_kecamatan;
		//foreach($data["kecamatan"] as $coba)
		//{
		//	echo $coba->nama_kecamatan;
		//}
		return view('welcome_message');
	}

	//--------------------------------------------------------------------

}
