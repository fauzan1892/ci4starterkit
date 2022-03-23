<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\UserModel;
use Irsyadulibad\DataTables\DataTables;

class Users extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->usermodel = new UserModel();
    }
    
    public function profil()
    {
        $data = [
            'title_web'     => 'Profil - '.auth()->name,
            'sidebar'       => 'profil',
            'edit'          => $this->usermodel->getUser(auth()->id)->getRow(),
            'icons'         => 'fa fa-user-circle',
            'view_template' => 'contents/admin/users/profil'
        ];
        return view('layouts/admin', $data);
    }

    public function update()
    {

        $val = $this->validate([
            "name" => "required",
            "username" => "required",
            "email" => "required",
            'id' => 'required',
        ]);

        if($val)
        {
            $data = [
                'name' => $this->request->getPost("name", FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'username' => $this->request->getPost("username", FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'email' => $this->request->getPost("email", FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            ];

            $password = password_hash($this->request->getPost("password", FILTER_SANITIZE_FULL_SPECIAL_CHARS), PASSWORD_DEFAULT);
            $builder = $this->db->table("users");
            if($password){
                $builder->set('password', $password);
            }
            $builder->where("id", $this->request->getPost("id"));
            $builder->update($data);
            // $this->session->setFlashdata("success"," Berhasil Update Data ! ");
            // return redirect()->to(base_url("users/edit/".$id));
            echo json_encode([
                    "cek" => "success", 
                    "msg" => "Berhasil Update Data ! ",
                    'csrf_hash'  => csrf_hash()
                ]);
        }else{
            // $this->session->setFlashdata("failed"," Gagal Tambah Data ! ".$this->validation->listErrors());
            // return redirect()->to(base_url("users"));
            echo json_encode([
                "cek" => "error", 
                "msg" => "".\Config\Services::validation()->listErrors(),
                'csrf_hash'  => csrf_hash()
            ]);
        }
    }

    public function json()
	{
		return DataTables::use('users_role')->make();
	}
}