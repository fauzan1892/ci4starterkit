<?php 
    echo view('components/ajax/ajax_form',[
            'tipe' => 'edit',
            // 'table' => '#input02',
            'idSubmit' => '#profil_form',
            'urlForm' => base_url('admin/users/update'),
            'modal' => '',
            // 'form_csrf' => '#csrf_name_profil'
        ]);
    echo view('components/ajax/ajax_form',[
            'tipe' => 'edit',
            // 'table' => '#input02',
            'idSubmit' => '#avatar_form',
            'urlForm' => base_url('admin/users/update_avatar'),
            'modal' => '',
            // 'form_csrf' => '#csrf_name_avatar'
        ]);
?>
<script>
	$(document).ready(function() {
		$("#pw_profil a").on('click', function(event) {
			event.preventDefault();
			if($('#pw_profil input').attr("type") == "text"){
				$('#pw_profil input').attr('type', 'password');
				$('#pw_profil i').addClass( "fa-eye-slash text-danger" );
				$('#pw_profil i').removeClass( "fa-eye text-success" );
			}else if($('#pw_profil input').attr("type") == "password"){
				$('#pw_profil input').attr('type', 'text');
				$('#pw_profil i').removeClass( "fa-eye-slash text-danger" );
				$('#pw_profil i').addClass( "fa-eye text-success" );
			}
		});
	});
</script>