<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\UserModel;
use Irsyadulibad\DataTables\DataTables;

class Users extends BaseController
{
    public function __construct()
    {
        $this->usermodel = new UserModel();
    }
    
    public function profil()
    {
        $data = [
            'title_web'     => 'Profil - '.auth()->name,
            'sidebar'       => 'profil',
            'edit'          => $this->usermodel->getUser(auth()->id)->getRow(),
            'icons'         => 'fa fa-user-circle',
            'view_template' => 'contents/admin/profil/index'
        ];
        return view('layouts/admin', $data);
    }

    public function json()
	{
		return DataTables::use('users_role')->make();
	}
}
