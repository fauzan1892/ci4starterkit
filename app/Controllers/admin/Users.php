<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Libraries\DataTables;

class Users extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->usermodel = new UserModel();
        $this->DataTables = new DataTables();
    }
    
    public function index()
    {
        $data = [
            'title_web'     => 'Data Users',
            'sidebar'       => 'users',
            'icons'         => 'fa fa-user-circle',
            'view_template' => 'contents/admin/users/index'
        ];
        return view('layouts/admin', $data);
    }

    public function data()
    {
        $query = "SELECT users_role.roles, users.* FROM users LEFT JOIN users_role ON users_role.id=users.users_role_id";
        $where = array('users.id' => 1);
        $isWhere = ' AND users_role_id = 1';
        $cari = array('name');
        echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $cari);
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
            echo json_encode([
                "cek" => "success", 
                "msg" => "Berhasil Update Data ! ",
                'csrf_hash'  => csrf_hash()
            ]);
        }else{
            echo json_encode([
                "cek" => "error", 
                "msg" => "".\Config\Services::validation()->listErrors(),
                'csrf_hash'  => csrf_hash()
            ]);
        }
    }

    public function update_avatar()
    {

        $val = $this->validate([
			'avatar' => [
				'rules' => 'uploaded[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/gif,image/png]|max_size[avatar,2048]',
				'errors' => [
					'uploaded' => 'Harus Ada File yang diupload',
					'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size' => 'Ukuran File Maksimal 2 MB'
				]
            ],
            'id' => 'required',
        ]);

        if($val)
        {
            $imageFile = $this->request->getFile('avatar');
            $fileName = $imageFile->getRandomName();
            $imageFile->move('assets/uploads/avatar/', $fileName);

            $data = [
                'avatar' => $fileName,
            ];

            $builder = $this->db->table("users");
            $builder->where("id", $this->request->getPost("id"));
            $builder->update($data);
            echo json_encode([
                "cek" => "success", 
                "msg" => "Berhasil Update Foto ! ",
                'avatar' => $fileName,
                'csrf_hash'  => csrf_hash()
            ]);
        }else{
            echo json_encode([
                "cek" => "error", 
                "msg" => "".\Config\Services::validation()->listErrors(),
                'csrf_hash'  => csrf_hash()
            ]);
        }
    }
}