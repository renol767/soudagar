@extends('layouts.website.template')

@section('content')
<!-- Data User Starts -->
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <table id="datatablecustom" class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key => $data)
                        <tr>
                            <th></th>
                            <th>{{$key + 1}}</th>
                            <th>{{$data->name}}</th>
                            <th>{{$data->email}}</th>
                            <th>{{$data->role}}</th>
                            <th>
                                <a class="nav-link dropdown-toggle dropdown-user-link btn btn-outline-primary" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="" class="me-25"></i>
                                    <span>Aksi</span></a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                                    <a class="dropdown-item" onclick="resetpw_data(this)" href="#" data-bs-toggle="modal" data-bs-target="#resetPassword" data-id="{{$data->id}}"><i class="me-50" data-feather="key"></i>Reset Password</a>
                                    <a class="dropdown-item" onclick="edit_data(this)" href="#" data-bs-toggle="modal" data-bs-target="#editData" data-id="{{$data->id}}" data-nama="{{$data->name}}" data-email="{{$data->email}}" data-role="{{$data->role}}"><i class="me-50" data-feather="edit"></i>Edit</a>
                                    <a class="dropdown-item" onclick="confirm_delete(this)" href="#" data-bs-toggle="modal" data-bs-target="#confirmDelete" data-id="{{$data->id}}"><i class="me-50" data-feather="trash"></i>Hapus</a>
                                </div>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Confirm Delete Users -->
    <!-- Reset Password Modal -->
    <div class="modal modal-slide-in fade" id="confirmDelete" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog sidebar-sm">
            <form class="add-new-record modal-content pt-0" action="{{route('deleteuser')}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" id="deleteuserid" name="deleteuserid">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menghapus user?</h5><br>
                    <button type="submit" class="btn btn-primary data-submit me-1">Confirm</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Reset Password Modal -->
    <div class="modal modal-slide-in fade" id="resetPassword" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog sidebar-sm">
            <form class="add-new-record modal-content pt-0" action="{{route('resetpwuser')}}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="resetpwid" name="resetpwid">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">Reset Password User</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <div class="mb-1">
                        <label class="form-label">Reset New Password</label>
                        <input id="newpassword" type="password" class="form-control" name="newpassword" required autocomplete="current-password">
                    </div>
                    <button type="submit" class="btn btn-primary data-submit me-1">Submit</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal to Edit new record -->
    <div class="modal modal-slide-in fade" id="editData" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog sidebar-sm">
            <form class="add-new-record modal-content pt-0" action="{{route('edituser')}}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="editid" name="editid">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <div class="mb-1">
                        <label class="form-label" for="basic-icon-default-fullname">Name</label>
                        <input type="text" class="form-control dt-full-name" id="editname" name="editname" placeholder="John Doe" aria-label="John Doe" required />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="basic-icon-default-email">Email</label>
                        <input type="text" class="form-control dt-email" id="editemail" name="editemail" placeholder="john.doe@example.com" required aria-label="john.doe@example.com" />
                        <small class="form-text"> You can use letters, numbers & periods </small>
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="basicSelect">Role</label>
                        <select class="form-select" id="editrole" name="editrole" required>
                            <option value="website">Admin Website</option>
                            <option value="gudang">Admin Gudang</option>
                            <option value="reseller">Reseller</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary data-submit me-1">Submit</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    <!-- Modal to add new record -->
    <div class="modal modal-slide-in fade" id="modals-slide-in-create">
        <div class="modal-dialog sidebar-sm">
            <form class="add-new-record modal-content pt-0" action="{{route('insertuser')}}" method="POST">
                @csrf
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">New User</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <div class="mb-1">
                        <label class="form-label" for="basic-icon-default-fullname">Name</label>
                        <input type="text" class="form-control dt-full-name" id="name" name="name" placeholder="John Doe" aria-label="John Doe" required />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="basic-icon-default-email">Email</label>
                        <input type="text" id="basic-icon-default-email" class="form-control dt-email" id="email" name="email" placeholder="john.doe@example.com" required aria-label="john.doe@example.com" />
                        <small class="form-text"> You can use letters, numbers & periods </small>
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="basicSelect">Role</label>
                        <select class="form-select" id="role" name="role" required>
                            <option value="website">Admin Website</option>
                            <option value="gudang">Admin Gudang</option>
                            <option value="reseller">Reseller</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary data-submit me-1">Submit</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endSection()
@section('script')

<!-- Edit / Reset Password Modal -->
<script>
    function edit_data(e) {
        var data = $(e);
        $('#editid').val(data.data('id'))
        $('#editname').val(data.data('nama'));
        $('#editemail').val(data.data('email'));
        $('#editrole').val(data.data('role'));
    }

    function resetpw_data(e) {
        var data = $(e);
        $('#resetpwid').val(data.data('id'));
    }

    function confirm_delete(e) {
        var data = $(e);
        $('#deleteuserid').val(data.data('id'));
    }
</script>

<!-- DataTabel -->
<script>
    $('#datatablecustom').DataTable({
        columns: [{
                data: 'responsive_id'
            },
            {
                data: 'id'
            },
            {
                data: 'name'
            },
            {
                data: 'email'
            },
            {
                data: 'role'
            },
            {
                data: ''
            },
        ],
        columnDefs: [{
                // For Responsive
                className: 'control',
                orderable: false,
                responsivePriority: 2,
                targets: 0
            },
            {
                responsivePriority: 1,
                targets: 2
            },
            {
                targets: -1,
                title: 'Actions',
                orderable: false,
            }
        ],
        order: [
            [1, 'asc']
        ],
        dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        displayLength: 7,
        lengthMenu: [7, 10, 25, 50, 75, 100],
        buttons: [{
                extend: 'collection',
                className: 'btn btn-outline-secondary dropdown-toggle me-2',
                text: feather.icons['share'].toSvg({
                    class: 'font-small-4 me-50'
                }) + 'Export',
                buttons: [{
                        extend: 'print',
                        text: feather.icons['printer'].toSvg({
                            class: 'font-small-4 me-50'
                        }) + 'Print',
                        className: 'dropdown-item',
                        exportOptions: {
                            columns: [1, 2, 3, 4],
                            stripHtml: false
                        }
                    },
                    {
                        extend: 'csv',
                        text: feather.icons['file-text'].toSvg({
                            class: 'font-small-4 me-50'
                        }) + 'Csv',
                        className: 'dropdown-item',
                        exportOptions: {
                            columns: [1, 2, 3, 4],
                            stripHtml: false
                        }
                    },
                    {
                        extend: 'excel',
                        text: feather.icons['file'].toSvg({
                            class: 'font-small-4 me-50'
                        }) + 'Excel',
                        className: 'dropdown-item',
                        exportOptions: {
                            columns: [1, 2, 3, 4],
                            stripHtml: false
                        }
                    },
                    {
                        extend: 'pdf',
                        text: feather.icons['clipboard'].toSvg({
                            class: 'font-small-4 me-50'
                        }) + 'Pdf',
                        className: 'dropdown-item',
                        exportOptions: {
                            columns: [1, 2, 3, 4],
                            stripHtml: false
                        }
                    },
                    {
                        extend: 'copy',
                        text: feather.icons['copy'].toSvg({
                            class: 'font-small-4 me-50'
                        }) + 'Copy',
                        className: 'dropdown-item',
                        exportOptions: {
                            columns: [1, 2, 3, 4],
                            stripHtml: false
                        }
                    }
                ],
                init: function(api, node, config) {
                    $(node).removeClass('btn-secondary');
                    $(node).parent().removeClass('btn-group');
                    setTimeout(function() {
                        $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                    }, 50);
                }
            },
            {
                text: feather.icons['plus'].toSvg({
                    class: 'me-50 font-small-4'
                }) + 'Add New Record',
                className: 'create-new btn btn-primary',
                attr: {
                    'data-bs-toggle': 'modal',
                    'data-bs-target': '#modals-slide-in-create'
                },
                init: function(api, node, config) {
                    $(node).removeClass('btn-secondary');
                }
            }
        ],
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function(row) {
                        var data = row.data();
                        return 'Details of ' + data['name'];
                    }
                }),
                type: 'column',
                renderer: function(api, rowIdx, columns) {
                    var data = $.map(columns, function(col, i) {
                        return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                            ?
                            '<tr data-dt-row="' +
                            col.rowIdx +
                            '" data-dt-column="' +
                            col.columnIndex +
                            '">' +
                            '<td>' +
                            col.title +
                            ':' +
                            '</td> ' +
                            '<td>' +
                            col.data +
                            '</td>' +
                            '</tr>' :
                            '';
                    }).join('');

                    return data ? $('<table class="table"/>').append('<tbody>' + data + '</tbody>') : false;
                }
            }
        },
        language: {
            paginate: {
                // remove previous & next text from pagination
                previous: '&nbsp;',
                next: '&nbsp;'
            }
        }
    });
</script>
@endSection()