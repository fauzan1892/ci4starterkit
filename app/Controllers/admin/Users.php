<?php
/**
 * App Name
 * 
 * @link       https://www.codekop.com/
 * @version    1.0.1
 * @copyright  Codekop Generator (c) 2022
 * 
 * File      : Users.php
 * Web Name  : Staterkit CodeIgniter 4
 * Developer : Fauzan Falah
 * E-mail    : fauzan1892@codekop.com
 * 
 * 
**/
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\RolesModel;
use App\Libraries\DataTables;

class Users extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->usermodel = new UserModel();
        $this->rolesmodel = new RolesModel();
        $this->DataTables = new DataTables();
    }
    
    /**
     * 
     * Index Table CRUD
     */
    public function index()
    {
        $data = [
            'title_web'     => 'Data Users',
            'sidebar'       => 'users',
            'icons'         => 'fa fa-user-circle',
            'roles'         => $this->rolesmodel->getRoles()->getResult(),
            'view_template' => 'contents/admin/users/index'
        ];
        return view('layouts/admin', $data);
    }

    /**
     * Datatable Users Generate
     */
    public function data()
    {
        $query = "SELECT users_role.roles, users.* FROM users LEFT JOIN users_role ON users_role.id=users.users_role_id";
        $where = null;
        $isWhere = " users.deleted_at IS NULL";
        $cari = array('name','username','email','roles');
        echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $cari);
    }

    /**
     * 
     * Ubah edit
     */
    public function edit()
    {
        $id = $this->request->getPost('id');
        $getid = $this->usermodel->getUser($id)->getRow();
        if(!$getid){ 
            return 'Tidak ada data'; 
        }else{
            if($this->request->getGet('json')){
                return json_encode($getid);
            }else{
                $data = [
                    'edit' => $getid,
                    'roles' => $this->rolesmodel->getRoles()->getResult()
                ]; 
                return view('contents/admin/users/index/modal-edit', $data);
            }
        }
    }

    /**
     * 
     * Ubah Profil
     */
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

    /**
     * 
     * Insert Users
     */
    public function store()
    {
        $val = $this->validate([
            "name" => "required",
            "username" => "required",
            "email" => "required",
            "phone" => "required",
            "address" => "required",
            "password" => "required",
            "retype_password" => "required",
            "active_users" => "required",
            "users_role_id" => "required",
        ]);

        if($val) {
            if($this->request->getPost("password") != $this->request->getPost("retype_password")){
                echo json_encode([
                        "cek" => "error", 
                        "msg" => "retype password not match !",
                        // 'csrf_hash' => csrf_hash()
                    ]);
            }
            $data = [
                'name' => $this->request->getPost("name", FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'username' => $this->request->getPost("username", FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'email' => $this->request->getPost("email", FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'phone' => $this->request->getPost("phone", FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'address' => $this->request->getPost("address", FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'password' => $this->request->getPost("password", FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'active_users' => $this->request->getPost("active_users", FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'users_role_id' => $this->request->getPost("users_role_id", FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $builder = $this->db->table("users");
            $builder->insert($data);
            echo json_encode([
                "cek" => "success", 
                "msg" => "Berhasil Tambah Data ! ",
                // 'csrf_hash'  => csrf_hash()
            ]);
        }else{
            echo json_encode([
                "cek" => "error", 
                "msg" => "".\Config\Services::validation()->listErrors(),
                // 'csrf_hash'  => csrf_hash()
            ]);
        }
    }

    /**
     * 
     * Update Profil
     */
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
            if($this->request->getPost("password") != null){
                $builder->set('password', $password);
            }
            if($this->request->getGet("tipe") == 'edit'){
                $builder->set('phone', $this->request->getPost('phone', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $builder->set('address', $this->request->getPost('address', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $builder->set('active_users', $this->request->getPost('active_users', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $builder->set('users_role_id', $this->request->getPost('users_role_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            }
            $builder->where("id", $this->request->getPost("id"));
            $builder->update($data);
            echo json_encode([
                "cek" => "success", 
                "msg" => "Berhasil Update Data ! ",
                // 'csrf_hash'  => csrf_hash()
            ]);
        }else{
            echo json_encode([
                "cek" => "error", 
                "msg" => "".\Config\Services::validation()->listErrors(),
                // 'csrf_hash'  => csrf_hash()
            ]);
        }
    }

    /**
     * 
     * Update Avatar
     */
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
            // $imageFile->move(WRITEPATH . 'uploads/avatar',$fileName);
            $imageFile->move(ROOTPATH . 'public/assets/uploads/avatar/', $fileName);

            $data = [
                'avatar' => $fileName,
            ];

            cek_file_avatar_unlink($this->request->getPost('avatar_edit'));

            $builder = $this->db->table("users");
            $builder->where("id", $this->request->getPost("id"));
            $builder->update($data);
            echo json_encode([
                "cek" => "success", 
                "msg" => "Berhasil Update Foto ! ",
                'avatar' => $fileName,
                // 'csrf_hash'  => csrf_hash()
            ]);
        }else{
            echo json_encode([
                "cek" => "error", 
                "msg" => "".\Config\Services::validation()->listErrors(),
                // 'csrf_hash'  => csrf_hash()
            ]);
        }
    }

    /**
     * 
     * Delete Users
     */
    public function delete()
    {
        $id = $this->request->getPost("id") ?? 0;
        $edit = $this->usermodel->getUser($id)->getRow();
        if(isset($edit))
        {
            // $builder = $this->db->table("users");
            // $builder->delete(["id" => $id]);
            $data = [
                'deleted_at' => date('Y-m-d H:i:s'),
            ];
            $builder = $this->db->table("users");
            $builder->where("id", $id);
            $builder->update($data);

			echo json_encode(["cek" => "success", "msg" => "Berhasil Hapus Data ! "]);
        }else{
			echo json_encode(["cek" => "error", "msg" => "Data Tidak Ditemukan ! "]);
        }
    }
}