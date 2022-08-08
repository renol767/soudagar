@extends('layouts.adminGudang.template')

@section('content')
@if (session('failed'))
<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">GAGAL</h4>
    <div class="alert-body">
        {{ session('failed') }}
    </div>
</div>
@endif
@if (session('success'))
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">SUKSES</h4>
    <div class="alert-body">
        {{ session('success') }}
    </div>
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
    <h4 class="alert-heading">ERROR</h4>
    <div class="alert-body">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif
<!-- Data Brand Starts -->
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatablecustom" class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>No</th>
                                    <th>User</th>
                                    <th>Brand</th>
                                    <th>Produk</th>
                                    <th>Kuantitas</th>
                                    <th>Jumlah Harga</th>
                                    <th>Jumlah Keuntungan</th>
                                    <th>Status</th>
                                    <th>Tanggal Pengambilan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pesanan as $key => $data)
                                <tr>
                                    <td></td>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->nama_brand }}</td>
                                    <td>{{ $data->nama_produk }}</td>
                                    <td>{{ $data->kuantitas }}</td>
                                    <td>{{ $data->harga_reseller * $data->kuantitas }}</td>
                                    <td>{{ $data->harga_jual - $data->harga_reseller }}</td>
                                    <td>
                                        @if($data->status == 'sudah bayar')
                                        <a href="{{ route('statuspesanan',$data->id) }}" class="badge bg-success">Sudah Bayar</a>
                                        @endif
                                        @if($data->status == 'belum bayar')
                                        <a href="{{ route('statuspesanan',$data->id) }}" class="badge bg-secondary">Belum Bayar</a>
                                        @endif
                                    </td>
                                    <td>{{ $data->tanggal_pengambilan }}</td>
                                    <td>
                                        <a class="nav-link dropdown-toggle dropdown-user-link btn btn-outline-primary" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="" class="me-25"></i>
                                            <span>Aksi</span></a>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                                            <a class="dropdown-item" onclick="edit_data(this)" href="#" data-bs-toggle="modal" data-bs-target="#editData" data-id="{{$data->id}}" data-name="{{$data->name}}" data-nama_produk="{{$data->nama_produk}}" data-nama_brand="{{$data->nama_brand}}" data-kuantitas="{{ $data->kuantitas }}" data-status="{{ $data->status }}" data-tanggal_pengambilan="{{$data->tanggal_pengambilan}}"><i class="me-50" data-feather="edit"></i>Edit</a>
                                            <a class="dropdown-item" onclick="confirm_delete(this)" href="#" data-bs-toggle="modal" data-bs-target="#confirmDelete" data-id="{{$data->id}}"><i class="me-50" data-feather="trash"></i>Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Confirm Delete Users -->
    <div class="modal modal-slide-in fade" id="confirmDelete" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog sidebar-sm">
            <form class="add-new-record modal-content pt-0" action="{{route('deletepesanan')}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" id="deletepesanan" name="id">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Pesanan</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menghapus pesanan ini?</h5><br>
                    <button type="submit" class="btn btn-primary data-submit me-1">Ya</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal Data Pesanan -->
    <div class="modal modal-slide-in fade" id="editData" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog sidebar-sm">
            <form class="add-new-record modal-content pt-0" enctype="multipart/form-data" action="{{route('editbrand')}}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="editid" name="editid">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pesanan</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <div class="mb-1">
                        <label class="form-label" for="basic-icon-default-fullname">User</label>
                        <input type="text" class="form-control dt-full-name" id="user" name="user" placeholder="Input disini" required>
                    </div>
                    <div class="mb-1">
                        <label for="formFile" class="form-label">Brand</label><br>
                        <input type="text" class="form-control" id="brand" name="brand" placeholder="Input disini">
                    </div>
                    <div class="mb-1">
                        <label for="formFile" class="form-label">Produk</label>
                        <input class="form-control" type="text" id="produk" name="produk" placeholder="Input disini">
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Kuantitas</label>
                        <input id="kuantitas" type="text" class="form-control" name="kuantitas" placeholder="Input disini" required>
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Status</label>
                        <input id="status" type="text" class="form-control" name="status" placeholder="Input disini" required>
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Tanggal Pengambilan</label>
                        <input id="tanggal_pengambilan" type="text" class="form-control" name="tanggal_pengambilan" placeholder="Input disini" required>
                    </div>
                    <button type="submit" class="btn btn-primary data-submit me-1">Simpan</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    <!-- Modal to add new record -->
    <div class="modal modal-slide-in fade" id="modals-slide-in-create">
        <div class="modal-dialog sidebar-sm">
            <form class="add-new-record modal-content pt-0" enctype="multipart/form-data" action="{{route('insertpesanan')}}" method="POST">
                @csrf
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pesanan Baru</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <div class="mb-1">
                        <label class="form-label" for="user">User</label>
                        <select name="user" class="form-control">
                            <option selected disabled>--Pilih--</option>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-1">
                        <label for="brand" class="form-label">Brand</label>
                        <select name="brand" class="form-control">
                            <option selected disabled>--Pilih--</option>
                            @foreach ($brand as $b)
                            <option value="{{ $b->id }}">{{ $b->nama_brand }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-1">
                        <label for="produk" class="form-label">Produk</label>
                        <select name="produk" class="form-control">
                            <option selected disabled>--Pilih--</option>
                            @foreach ($produk as $p)
                            <option value="{{ $p->id }}">{{ $p->nama_produk }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-1">
                        <label for="kuatitas" class="form-label">Kuantitas</label>
                        <input type="text" name="kuantitas" class="form-control" placeholder="Input disini">
                    </div>
                    <div class="md-1">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-control">
                            <option value="belum bayar">Belum Bayar</option>
                            <option value="sudah bayar">Sudah Bayar</option>
                        </select>
                    </div>
                    <div class="md-1">
                        <label for="tanggal_pengambilan" class="form-label">Tanggal Pengambilan</label>
                        <input type="date" name="tanggal_pengambilan" value="{{ date('Y-m-d') }}" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary data-submit me-1 mt-2">Simpan</button>
                    <button type="reset" class="btn btn-outline-secondary mt-2" data-bs-dismiss="modal">Batal</button>
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
        $('#user').val(data.data('name'));
        $('#brand').val(data.data('nama_brand'));
        $('#produk').val(data.data('nama_produk'));
        $('#kuantitas').val(data.data('kuantitas'));
        $('#jumlah').val(data.data('jumlah'));
        $('#status').val(data.data('status'));
        $('#tanggal_pengambilan').val(data.data('tanggal_pengambilan'));
    }

    function confirm_delete(e) {
        var data = $(e);
        $('#deletepesanan').val(data.data('id'));
    }
</script>

<!-- DataTabel -->
<script>
    $('#datatablecustom').DataTable({
        autoFill: true,
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
                        return 'Details of ' + data['nama_brand'];
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