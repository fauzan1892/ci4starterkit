<?php
/**
 * App Name
 * 
 * @link       https://www.codekop.com/
 * @version    1.0.1
 * @copyright  Codekop Generator (c) 2022
 * 
 * File      : Settings.php
 * Web Name  : Staterkit CodeIgniter 4
 * Developer : Fauzan Falah
 * E-mail    : fauzan1892@codekop.com
 * 
 * 
**/
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\SettingsModel;

class Settings extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->settingsmodel = new SettingsModel();
    }

    public function index()
    {
        $data = [
            'title_web'     => 'Profil Aplikasi',
            'sidebar'       => 'settings',
            'icons'         => 'fa fa-cog',
            'edit'          => $this->settingsmodel->getSettings(1)->getRow(),
            'view_template' => 'contents/admin/settings/index'
        ];
        return view('layouts/admin', $data);
    }

    public function update()
    {

        $data = [
            'app_name' => $this->request->getPost("app_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            'app_description' => $this->request->getPost("app_description", FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            // 'app_favicon' => $this->request->getPost("app_favicon", FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            // 'app_logo' => $this->request->getPost("app_logo", FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            'app_owner' => $this->request->getPost("app_owner", FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            'app_phone' => $this->request->getPost("app_phone", FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            'app_email' => $this->request->getPost("app_email", FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            'app_address' => $this->request->getPost("app_address", FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            'updated_at' => date("Y-m-d H:i:s"),
            'users_id' => auth()->id,
        ];
        $app_favicon = $this->request->getFile('app_favicon');
        if ($app_favicon->isValid()) {
            $valFavicon = $this->validate([
                'app_favicon' => [
                    'rules' => 'uploaded[app_favicon]|mime_in[app_favicon,image/jpg,image/jpeg,image/gif,image/png]|max_size[app_favicon,2048]',
                    'errors' => [
                        'uploaded' => 'Harus Ada File yang diupload',
                        'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                        'max_size' => 'Ukuran File Maksimal 2 MB'
                    ]
                ],
            ]);

            if($valFavicon) {
                $imageFile = $app_favicon;
                $fileName = $imageFile->getRandomName();
                $imageFile->move(ROOTPATH . 'public/assets/uploads/files/', $fileName);
                $data['app_favicon'] = [ $fileName ];
                cek_file_image_unlink($this->request->getPost('app_favicon_edit'));
            }else{
                $this->session->setFlashdata("failed",\Config\Services::validation()->listErrors());
                echo \Config\Services::validation()->listErrors();
                return redirect()->to(base_url("admin/settings"));
                exit;
            }
        }

        $app_logo = $this->request->getFile('app_logo');
        if ($app_logo->isValid()) {
            $valLogo = $this->validate([
                'app_logo' => [
                    'rules' => 'uploaded[app_logo]|mime_in[app_logo,image/jpg,image/jpeg,image/gif,image/png]|max_size[app_logo,2048]',
                    'errors' => [
                        'uploaded' => 'Harus Ada File yang diupload',
                        'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                        'max_size' => 'Ukuran File Maksimal 2 MB'
                    ]
                ],
            ]);

            if($valLogo) {
                $imageFile = $app_logo;
                $fileName = $imageFile->getRandomName();
                $imageFile->move(ROOTPATH . 'public/assets/uploads/files/', $fileName);
                $data['app_logo'] = [ $fileName ];
                cek_file_image_unlink($this->request->getPost('app_logo_edit'));
            }else{
                $this->session->setFlashdata("failed",\Config\Services::validation()->listErrors());
                return redirect()->to(base_url("admin/settings"));
                exit;
            }
        }

        $builder = $this->db->table("settings");
        $builder->where("id", 1);
        $builder->update($data);
        $this->session->setFlashdata("success"," Berhasil Update Data ! ");
        return redirect()->to(base_url("admin/settings"));
        
    }              

}