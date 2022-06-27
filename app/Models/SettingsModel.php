<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class SettingsModel extends Model{
    protected $table = 'settings';
    
    protected $allowedFields = [
        "app_name",
        "app_description",
        "app_favicon",
        "app_logo",
        "app_owner",
        "app_phone",
        "app_email",
        "app_address",
        "updated_at",
        "users_id"
    ];

    public function getSettings($id = false)
    {
        if($id === false){
            return $this->get();
        }else{
            return $this->getWhere(['id' => $id]);
        }   
    }
}