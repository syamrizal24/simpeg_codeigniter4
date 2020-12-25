<?php
namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class Model_Pegawai extends Model
{

	protected $table = "pegawai";
	protected $column_order = array('nip','nama','alamat');
	protected $column_search = array('nip','nama','alamat');
	protected $order = array('nip' => 'asc');
	protected $request;
	protected $db;
	protected $dt;

	function __construct(RequestInterface $request){
	   parent::__construct();
	   $this->db = db_connect();
	   $this->request = $request;
	   $this->dt = $this->db->table($this->table);
	}
	
	private function _get_datatables_query(){
		$i = 0;
		foreach ($this->column_search as $item){
			if($this->request->getPost('search')['value']){ 
				if($i===0){
					$this->dt->groupStart();
					$this->dt->like($item, $this->request->getPost('search')['value']);
				}
				else{
					$this->dt->orLike($item, $this->request->getPost('search')['value']);
				}
				if(count($this->column_search) - 1 == $i)
					$this->dt->groupEnd();
			}
			$i++;
		}
		 
		if($this->request->getPost('order')){
				$this->dt->orderBy($this->column_order[$this->request->getPost('order')['0']['column']], $this->request->getPost('order')['0']['dir']);
			} 
		else if(isset($this->order)){
			$order = $this->order;
			$this->dt->orderBy(key($order), $order[key($order)]);
		}
	}
	function get_datatables(){
		$this->_get_datatables_query();
		if($this->request->getPost('length') != -1)
		$this->dt->limit($this->request->getPost('length'), $this->request->getPost('start'));
		$query = $this->dt->get();
		return $query->getResult();
	}
	function count_filtered(){
		$this->_get_datatables_query();
		return $this->dt->countAllResults();
	}
	public function count_all(){
		$tbl_storage = $this->db->table($this->table);
		return $tbl_storage->countAllResults();
	}
	
	public function data_kabupaten(){
		return $this->db->query("select * from kabupaten")->getResult();
	}
	
	public function data_kecamatan($id){
		return $this->db->query("select * from kecamatan where id_kab='$id'")->getResult();
	}
	
	public function data_kelurahan($id){
		return $this->db->query("select * from kelurahan where id_kec='$id'")->getResult();
	}


	public function simpan_pegawai($data){
        $query = $this->db->table('pegawai')->insert($data);
        return $query;
	}
 
    public function update_pegawai($data, $id)
    {
        $query = $this->db->table('pegawai')->update($data, array('nip' => $id));
        return $query;
    }
 
    public function hapus_pegawai($id)
    {
        $query = $this->db->table('pegawai')->delete(array('nip' => $id));
        return $query;
    } 
	
	public function cari_pegawai($id){
		return $this->db->query("select * from pegawai where nip='$id'")->getRow();
	}


}