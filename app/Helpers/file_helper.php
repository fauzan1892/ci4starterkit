<?php 
    function cek_file_avatar($img){
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