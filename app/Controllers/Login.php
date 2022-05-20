<?php
namespace App\Controllers;
use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'title_web'     => 'Login',
            'view_template' => 'contents/auth/login'
        ];
        return view('layouts/auth', $data);
    }

    public function auth()
    {
        $session = session();
        $userModel = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        
        $data = $userModel->where('email', $username)->orWhere('username', $username)->first();
        
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('admin/dashboard');
            
            }else{
                $session->setFlashdata('failed', 'Password is incorrect.');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('failed', 'Email or Username does not exist.');
            return redirect()->to('/login');
        }
    }

    public function reset()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $data = $userModel->where('email', $email)->first();
        if($data){
            $session->setFlashdata('success', 'Please check your email to reset your password.');
            return redirect()->to('/login');
        }else{
            $session->setFlashdata('failed', 'Email does not exist.');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        //hancurkan session 
        //balikan ke halaman login
        $this->session->destroy();
        return redirect()->to('/login');
    }
}
