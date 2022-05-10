<?php
/**
 * File      : Users.php
 * Web Name  : App Name
 * Developer : Your Name
 * E-mail    : Your Email
 * 
 */
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\RolesModel;

class Roles extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->rolesmodel = new RolesModel();
    }
    public function index()
    {
        $data = [
            'title_web'     => 'Data Roles',
            'sidebar'       => 'roles',
            'icons'         => 'fa fa-ban',
            'roles'         => $this->rolesmodel->getRoles()->getResult(),
            'view_template' => 'contents/admin/roles/index'
        ];
        return view('layouts/admin', $data);
    }

    public function store()
    {
        $val = $this->validate([
            "roles" => "required",
        ]);

        if($val)
        {
            $data = [
               'roles' => $this->request->getPost("roles", FILTER_SANITIZE_FULL_SPECIAL_CHARS),
               'created_at' => date('Y-m-d H:i:s'),
            ];

            $builder = $this->db->table("users_role");
            $builder->insert($data);
            $this->session->setFlashdata("success"," Berhasil Tambah Data ! ");
            return redirect()->to(base_url("admin/roles"));
			// echo json_encode(["cek" => "success", "msg" => "Berhasil Tambah Data ! "]);
        }else{
            $this->session->setFlashdata("failed"," Gagal Tambah Data ! ".$this->validation->listErrors());
            return redirect()->to(base_url("admin/roles"));
            // echo json_encode(["cek" => "error", "msg" => "".$this->validation->listErrors()]);
        }
    }                                            
    public function update()
    {
        $val = $this->validate([
            'id' => "required",
            "roles" => "required",
        ]);
        $id = $this->request->getPost("id");
        if($val)
        {
            $data = [
                'roles' => $this->request->getPost("roles", FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            ];

            $builder = $this->db->table("users_role");
            $builder->where("id", $this->request->getPost("id"));
            $builder->update($data);
            $this->session->setFlashdata("success"," Berhasil Update Data ! ");
            return redirect()->to(base_url("admin/roles"));
			// echo json_encode(["cek" => "success", "msg" => "Berhasil Update Data ! "]);
        }else{
            $this->session->setFlashdata("failed"," Gagal Update Data ! ".$this->validation->listErrors());
            return redirect()->to(base_url("admin/roles"));
            // echo json_encode(["cek" => "error", "msg" => "".$this->validation->listErrors()]);
        }
    }   

    public function delete($id)
    {
        $edit = $this->rolesmodel->getRoles($id)->getRow();
        if(isset($edit))
        {
            $builder = $this->db->table("users_role");
            $builder->delete(["id" => $id]);
            $this->session->setFlashdata("success", "Berhasil Hapus Data !");
            return redirect()->to(base_url("admin/roles"));
			// echo json_encode(["cek" => "success", "msg" => "Berhasil Hapus Data ! "]);
        }else{
            $this->session->setFlashdata("failed","ID : ".$id." cannot be found.");
            return redirect()->to(base_url("admin/roles"));
			// echo json_encode(["cek" => "error", "msg" => "Data Tidak Ditemukan ! "]);
        }
    }
}