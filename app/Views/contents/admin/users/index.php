<?= alert_bs();?>
<div class="card">
    <div class="card-header bg-primary text-white">
        Data Users
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-sm table-bordered w-100" id="table-artikel-csrf">
                <thead>
                    <tr>
                        <th> No. </th>
                        <th> Avatar</th>
                        <th> Nama</th>
                        <th> Username</th>
                        <th> E-mail</th>
                        <th> Hak Akses</th>
                        <th> Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
<script>
var tabels = null;
var hash = "<?= csrf_hash() ?>";
$(document).ready(function() {
    tabels = $('#table-artikel-csrf').DataTable({
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
            "data": function(d) {
                d.<?= csrf_token() ?> = hash;
            }
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
                                    class="img-fluid" style="width:70px;height:70px;">
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
                "data": "id",
                "render": function(data, type, row, meta) {
                    return `<div class="btn-group" role="group">
								<button type="button" data-id="${row.id}" class="btn btn-secondary btn-sm" title="Autentikasi">
									<i class="fa fa-ban"></i>
								</button>
								<button type="button" data-id="${row.id}" class="btn btn-success btn-sm" title="Edit">
									<i class="fa fa-edit"></i>
								</button>
								<button type="button" data-id="${row.id}" class="btn btn-danger btn-sm" title="Delete">
									<i class="fa fa-trash"></i>
								</button>
							</div>`;
                }
            },
        ],
    });
    // csrf datatable
    tabels.on('xhr.dt', function(e, settings, json, xhr) {
        hash = json.<?= csrf_token() ?>;
        console.log(hash);
    });
});
</script>