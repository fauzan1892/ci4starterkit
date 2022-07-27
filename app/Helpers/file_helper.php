<?php 
if(! function_exists('cek_file_avatar')) {
    function cek_file_avatar($img) {
        if($img){
            if(file_exists("./assets/uploads/avatar/".$img)){
                return base_url('assets/uploads/avatar/'.$img);
            }else{
                return base_url('assets/uploads/default/avatar-1.png');
            }
        }else{
            return base_url('assets/uploads/default/avatar-1.png');
        }
    }
}

if(! function_exists('cek_file_avatar_unlink')) {
    function cek_file_avatar_unlink($img){
        if($img){
            if(file_exists("assets/uploads/avatar/".$img)){
                return unlink('assets/uploads/avatar/'.$img);
            }else{
                return '';
            }
        }else{
            return '';
        }
    }
}

if(! function_exists('cek_file_image')) {
    function cek_file_image($img){
        if($img){
            if(file_exists("./assets/uploads/files/".$img)){
                return base_url('assets/uploads/files/'.$img);
            }else{
                return base_url('assets/uploads/default/img01.jpg');
            }
        }else{
            return base_url('assets/uploads/default/img01.jpg');
        }
    }
}

if(! function_exists('cek_file_image_unlink')) {
    function cek_file_image_unlink($img){
        if($img){
            if(file_exists("assets/uploads/files/".$img)){
                return unlink('assets/uploads/files/'.$img);
            }else{
                return '';
            }
        }else{
            return '';
        }
    }
}