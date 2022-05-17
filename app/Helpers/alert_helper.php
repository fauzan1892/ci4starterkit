<?php 
function alert_bs() {
    $session = \Config\Services::session();
    if($session->getFlashdata('success')){
        echo '<div class="alert alert-success mb-3 alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>'.$session->getFlashdata('success').'</strong> 
        </div>';
    }
    if($session->getFlashdata('failed')){
      echo '<div class="alert alert-warning mb-3 alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>'.$session->getFlashdata('failed').'</strong> 
      </div>';
    }
}

function alert_swal() {
  $session = \Config\Services::session();
  if($session->getFlashdata('success')){
      echo '<script>
              Swal.fire({
                  title: "Success !",
                  html: "'.$session->getFlashdata('success').'",
                  icon: "success",
                  confirmButtonText: "Ok",
              });
            </script>';
      
  }
  if($session->getFlashdata('failed')){
    echo '<script>
          Swal.fire({
              title: "Failed !",
              html: "'.$session->getFlashdata('failed').'",
              icon: "warning",
              confirmButtonText: "Ok",
          });
        </script>';
  }
}