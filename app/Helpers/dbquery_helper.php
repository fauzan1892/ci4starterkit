<?php 
function auth(){
    $session = \Config\Services::session();
    $db      = \Config\Database::connect();
    $builder = $db->table('users');
    $builder->select('users.*, users_role.roles');
    $builder->join('users_role', 'users_role.id = users.users_role_id');
    $get = $builder->where('users.id',$session->get('id'));
    $get = $builder->get();
    return $get->getRow();
}

function infoweb(){
    $session = \Config\Services::session();
    $db      = \Config\Database::connect();
    $builder = $db->table('settings');
    $get = $builder->where('id', 1);
    $get = $builder->get();
    return $get->getRow();
}