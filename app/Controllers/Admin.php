<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_Pegawai;
use Config\Services;


class Admin extends BaseController
{
    public $pegawai;
    public $output = [
        'sukses'    => false,
        'pesan'     => '',
        'data'      => []
    ];

    public function __construct()
    {
      //  $this->pegawai = new \App\Models\Model_Pegawai();
    }

    public function index()
    {
		$request = Services::request();
		$pegawai = new Model_Pegawai($request);
		$data["kabupaten"] = $pegawai->data_kabupaten();
        echo view('background_atas');
		echo view('isi',$data);
		echo view('background_bawah');
    }


    public function data_pegawai()
    {
          $request = Services::request();
		  $pegawai = new Model_Pegawai($request);
		  if($request->getMethod(true)=='POST'){
				$lists = $pegawai->get_datatables();
				$data = [];
				$no = $request->getPost("start");
				foreach ($lists as $list) {
						$no++;
						$row = [];
						$row[] = $no;
						$row[] = $list->nip;
						$row[] = $list->nama;
						$row[] = $list->alamat;
						$row[] =
						"<center><a href='javascript:void(0)' onclick='edit_pegawai(" . $list->nip . ")' class='btn btn-xs btn-info'>Ubah</a>
						<a href='javascript:void(0)' onclick='hapus_pegawai(" . $list->nip . ")' class='btn btn-xs btn-danger'>Hapus</a></center>";
						$data[] = $row;
			}
			$output = ["draw" => $request->getPost('draw'),
								"recordsTotal" => $pegawai->count_all(),
								"recordsFiltered" => $pegawai->count_filtered(),
								"data" => $data];
								echo json_encode($output);
		  }
    }
	
	public function cari_kecamatan(){
		$request = Services::request();
		$pegawai = new Model_Pegawai($request);
		$id	= $this->request->getPost('id');
		
			if($id!="")
			{
				$kecamatan = "<option value=''>- Pilih Kecamatan -</option>";
				$data = $pegawai->data_kecamatan($id);
				foreach ($data as $detail ){
				$kecamatan .= "<option value='".str_replace(' ', '',strtoupper($detail->id_kec))."'>".strtoupper($detail->nama_kecamatan)."</option>";
				}
				echo $kecamatan;
			}
			else
			{
				echo "<option value=''>- Pilih Kecamatan -</option>";
			}
		
	}
	
	public function cari_kelurahan(){
		$request = Services::request();
		$pegawai = new Model_Pegawai($request);
		$id	= $this->request->getPost('id');
		
			if($id!="")
			{
				$kelurahan = "<option value=''>- Pilih Kelurahan -</option>";
				$data = $pegawai->data_kelurahan($id);
				foreach ($data as $detail ){
				$kelurahan .= "<option value='".str_replace(' ', '',strtoupper($detail->id_kel))."'>".strtoupper($detail->nama_kelurahan)."</option>";
				}
				echo $kelurahan;
			}
			else
			{
				echo "<option value=''>- Pilih Kelurahan -</option>";
			}
		
	}
	
	
	public function simpan_pegawai()
    {
		$request = Services::request();
		$pegawai = new Model_Pegawai($request);
        $data = array(
            'nip'        => $this->request->getPost('nip'),
            'nama'       => $this->request->getPost('nama'),
            'alamat'     => $this->request->getPost('alamat'),
            'id_kab'     => $this->request->getPost('id_kab'),
            'id_kec'     => $this->request->getPost('id_kec'),
            'id_kel'     => $this->request->getPost('id_kel'),
            'jenis_kelamin'        => $this->request->getPost('jenis_kelamin'),
            'hp'       	 => $this->request->getPost('hp'),
            'email'      => $this->request->getPost('email'),
        );
        $hasil=$pegawai->simpan_pegawai($data);
		echo json_encode($hasil);
    }
	
	
	public function edit_pegawai()
    {
		$request = Services::request();
		$pegawai = new Model_Pegawai($request);
        $data = array(
            'nama'       => $this->request->getPost('nama'),
            'alamat'     => $this->request->getPost('alamat'),
            'id_kab'     => $this->request->getPost('id_kab'),
            'id_kec'     => $this->request->getPost('id_kec'),
            'id_kel'     => $this->request->getPost('id_kel'),
            'jenis_kelamin'        => $this->request->getPost('jenis_kelamin'),
            'hp'       	 => $this->request->getPost('hp'),
            'email'      => $this->request->getPost('email'),
        );
        $hasil=$pegawai->update_pegawai($data,$this->request->getPost('nip'));
		echo json_encode($hasil);
    }
	
	public function hapus_pegawai()
    {
		$request = Services::request();
		$pegawai = new Model_Pegawai($request);
        $id = $this->request->getPost('nip');
        $hasil=$pegawai->hapus_pegawai($id);
		echo json_encode($hasil);
    }
	
	public function cari_pegawai()
    {
		$request = Services::request();
		$pegawai = new Model_Pegawai($request);
        $id = $this->request->getPost('nip');
        $hasil=$pegawai->cari_pegawai($id);
		echo json_encode($hasil);
    }


}