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
            $to = $email;
            $title = "Reset Password";
            $message = "";
            // html reset password template
            $message .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
            $message .= '<html xmlns="http://www.w3.org/1999/xhtml">';
            $message .= '<head>';
            $message .= '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
            $message .= '<title>' . $title . '</title>';
            $message .= '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
            $message .= '</head>';
            $message .= '<body style="margin: 0; padding: 0;">';
            $message .= '<table border="0" cellpadding="0" cellspacing="0" width="100%">';
            $message .= '<tr>';
            $message .= '<td style="padding: 10px 0 30px 0;">';
            $message .= '<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">';
            $message .= '<tr>';
            $message .= '<td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">';
            $message .= '<img src="https://i.ibb.co/qxQXxQZ/logo.png" alt="logo" border="0" style="display: block;" />';
            $message .= '</td>';
            $message .= '</tr>';
            $message .= '<tr>';
            $message .= '<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">';
            $message .= '<table border="0" cellpadding="0" cellspacing="0" width="100%">';
            $message .= '<tr>';
            $message .= '<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">';
            $message .= '<b>Hi ' . $data['name'] . '</b>';
            $message .= '</td>';
            $message .= '</tr>';
            $message .= '<tr>';
            $message .= '<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">';
            $message .= '<b>You have requested to reset your password. Please click the link below to reset your password:</b>';
            $message .= '</td>';
            $message .= '</tr>';
            $message .= '<tr>';
            $message .= '<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">';
            $message .= '<a href="' . base_url() . 'reset-password/' . $data['token'] . '" style="color: #2e78b7;">Reset Password</a>';
            $message .= '</td>';
            $message .= '</tr>';
            $message .= '<tr>';
            $message .= '<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">';
            $message .= 'If you did not request a password reset, please ignore this email or reply to let us know.';
            $message .= '</td>';
            $message .= '</tr>';
            $message .= '</table>';
            $message .= '</td>';
            $message .= '</tr>';
            $message .= '<tr>';
            $message .= '<td bgcolor="#ee4c50" style="padding: 30px 30px 30px 30px;">';
            $message .= '<table border="0" cellpadding="0" cellspacing="0" width="100%">';
            $message .= '<tr>';
            $message .= '<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">';
            $message .= '&reg; ' . date('Y') . ' <a href="' . base_url() . '" style="color: #ffffff;"><b>' . $this->config->item('site_name') . '</b></a>';
            $message .= '</td>';
            $message .= '<td align="right" width="25%">';
            $message .= '<table border="0" cellpadding="0" cellspacing="0">';
            $message .= '<tr>';
            $message .= '<td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">';
            $message .= '<a href="' . base_url() . '" style="color: #ffffff;">';
            $message .= '<img src="https://i.ibb.co/qxQXxQZ/logo.png" alt="logo" border="0" style="display: block;" />';
            $message .= '</a>';
            $message .= '</td>';
            $message .= '</tr>';
            $message .= '</table>';
            $message .= '</td>';
            $message .= '</tr>';
            $message .= '</table>';
            $message .= '</td>';
            $message .= '</tr>';
            $message .= '</table>';
            $message .= '</td>';
            $message .= '</tr>';
            $message .= '</table>';
            $message .= '</body>';
            $message .= '</html>';
            sendEmail($to, $title, $message);
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
