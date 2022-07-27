<?php 
if(! function_exists('sendEmail')) {
    function sendEmail($to, $title, $message){
        $db      = \Config\Database::connect();
        $builder = $db->table('settings');
        $get     = $builder->where('id', 1);
        $get     = $builder->get();
        $infoweb = $get->getRow();

        $email = \Config\Services::email();
        $email->setFrom($infoweb->email, $infoweb->app_name);
        $email->setTo($to);
        // $this->email->attach($attachment);
        $email->setSubject($title);
        $email->setMessage($message);
        if(! $email->send()){
            $data_error = $email->printDebugger(['headers']);
            print_r($data_error);
        }else{
            return true;
        }
    }
}