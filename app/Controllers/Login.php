<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_Login;

class Login extends BaseController {

	public function index()
    {
        helper(['form']);
        echo view('login');
    } 
 
    public function auth()
    {
        $session = session();
		$model = new Model_Login();
        $username = $this->request->getVar('username');
        $password = md5($this->request->getVar('password'));
        $data = $model->where("username='$username' and password='$password'")->first();
        if(!empty($data)){
                $ses_data = [
                    'id_user'       => $data['id_user'],
                    'nama_user'     => $data['nama'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to(base_url('admin/'));
        }else{
            $session->setFlashdata('msg', 'Username atau Password Salah!');
            return redirect()->to(base_url('/'));
        }
    }
 
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
}
