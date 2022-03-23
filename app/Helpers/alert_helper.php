<?php 
function alert_bs() {
    $session = \Config\Services::session();
    if($session->getFlashdata('success')){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>'.$session->getFlashdata('success').'</strong> 
        </div>';
    }
    if($session->getFlashdata('failed')){
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>'.$session->getFlashdata('failed').'</strong> 
      </div>';
    }
}

