<script>
let tabels = null;
// let hash = "<?= csrf_hash() ?>";
$(document).ready(function() {
    tabels = $('#table-users-csrf').DataTable({
        "processing": true,
        "responsive": true,
        "serverSide": true,
        "ordering": true, // Set true agar bisa di sorting
        "order": [
            [0, 'asc']
        ], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
        "ajax": {
            "url": "<?= base_url('admin/users/data');?>", // URL file untuk proses select datanya
            "type": "POST",
            // csrf datatable
            // "data": function(d) {
            //     d.<?= csrf_token() ?> = hash;
            // }
        },
        "deferRender": true,
        "aLengthMenu": [
            [5, 10, 50],
            [5, 10, 50]
        ], // Combobox Limit
        "columns": [{
                "data": 'id',
                "sortable": false,
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                "data": "avatar",
                "render": function(data, type, row, meta) {
                    return `<center>
                                <img src="${AvatarExists('<?= base_url('assets/uploads/avatar');?>/'+row.avatar)}" 
                                    class="img-fluid" 
                                    style="width:50px;height:50px;">
                            </center>`;
                }
            },
            {
                "data": "name"
            },
            {
                "data": "username"
            },
            {
                "data": "email"
            },
            {
                "data": "roles"
            },
            {
                "data": "active_users",
                "render": function(data, type, row, meta) {
                    if (row.active_users == 1) {
                        return `<span class="badge badge-success"><i class="fa fa-check"></i> Active</span>`;
                    } else {
                        return `<span class="badge badge-danger"><i class="fa fa-ban"></i> Non Active</span>`;
                    }
                }
            },
            {
                "data": "id",
                "render": function(data, type, row, meta) {
                    return `<div class="btn-group" role="group">
								<button type="button" data-id="${row.id}" class="btn btn-success btn-sm edit" title="Edit">
									<i class="fa fa-edit"></i>
								</button>
								<button type="button" data-id="${row.id}" class="btn btn-danger btn-sm delete" title="Delete">
									<i class="fa fa-trash"></i>
								</button>
							</div>`;
                }
            },
        ],
    });
    // csrf datatable
    // tabels.on('xhr.dt', function(e, settings, json, xhr) {
    //     hash = json.<?= csrf_token() ?>;
    //     $('#csrf_name_addusers').val(hash); // CSRF hash
    //     console.log(hash);
    // });
});
</script>
<?php 
    echo view('components/ajax/ajax_form',[
            'tipe'      => 'tambah',
            'table'     => '#table-users-csrf',
            'idSubmit'  => '#AddUsers',
            'urlForm'   => base_url('admin/users/store'),
            'modal'     => 'close',
        ]);
    echo view('components/ajax/ajax_delete',[
            'table'     => '#table-users-csrf',
            'idSubmit'  => '.delete',
            'urlForm'   => base_url('admin/users/delete'),
        ]);
    echo view('components/ajax/ajax_edit_modal',[
            'tableIdEdit'     => 'table-users-csrf',
            'classButtonEdit' => 'edit',
            'modalIdEdit'     => 'modal-edituser',
            'urlModalEdit'    => base_url('admin/users/edit'),
            'modal_size'      => 'modal-lg',
        ]);
?>