<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class RolesModel extends Model{
    protected $table = 'users_role';
    
    protected $allowedFields = [
        'roles',
        'created_at',
        'deleted_at'
    ];

    public function getRoles($id = false)
    {
        if($id === false){
            return $this->get();
        }else{
            return $this->getWhere(['id' => $id]);
        }   
    }
}