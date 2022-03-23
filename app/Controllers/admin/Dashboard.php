<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use Irsyadulibad\DataTables\DataTables;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title_web'     => 'Dashboard',
            'sidebar'       => 'dashboard',
            'icons'         => 'fa fa-dashboard',
            'view_template' => 'contents/admin/dashboard/index'
        ];
        return view('layouts/admin', $data);
    }

    public function json()
	{
		return DataTables::use('users_role')->make();
	}
}
