<?php 
    echo view('components/ajax/ajax_form',[
            'tipe' => 'edit',
            // 'table' => '#input02',
            'idSubmit' => '#profil_form',
            'urlForm' => base_url('admin/users/update'),
            'modal' => '',
            'form_csrf' => '#csrf_name_profil'
        ]);
    echo view('components/ajax/ajax_form',[
            'tipe' => 'edit',
            // 'table' => '#input02',
            'idSubmit' => '#avatar_form',
            'urlForm' => base_url('admin/users/update_avatar'),
            'modal' => '',
            'form_csrf' => '#csrf_name_avatar'
        ]);
?>
<script>
	$(document).ready(function() {
		$("#ngumpet a").on('click', function(event) {
			event.preventDefault();
			if($('#ngumpet input').attr("type") == "text"){
				$('#ngumpet input').attr('type', 'password');
				$('#ngumpet i').addClass( "fa-eye-slash text-danger" );
				$('#ngumpet i').removeClass( "fa-eye text-success" );
			}else if($('#ngumpet input').attr("type") == "password"){
				$('#ngumpet input').attr('type', 'text');
				$('#ngumpet i').removeClass( "fa-eye-slash text-danger" );
				$('#ngumpet i').addClass( "fa-eye text-success" );
			}
		});
	});
</script>