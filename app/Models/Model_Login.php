<?php
namespace App\Models;
 
use CodeIgniter\Model;
 
class Model_Login extends Model{
    protected $table = 'login';
    protected $allowedFields = ['id_user','nama','username','password'];
}
?>