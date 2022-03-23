<?php 

    function auth(){
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $get = $builder->where('id',$session->get('id'));
        $get = $builder->get();
        return $get->getRow();
    }