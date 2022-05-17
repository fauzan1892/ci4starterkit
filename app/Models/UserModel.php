<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class UserModel extends Model{
    protected $table = 'users';
    
    protected $allowedFields = [
        'name',
        'email',
        'username',
        'avatar',
        'users_role_id',
        'password',
        'created_at'
    ];

    public function getUser($id = false)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.*, users_role.roles');
        $builder->join('users_role', 'users_role.id = users.users_role_id');
        if($id === false){
            $get = $builder->get();
            return $get;
        }else{
            $get = $builder->where('users.id',$id);
            $get = $builder->get();
            return $get;
        }   
    }
}