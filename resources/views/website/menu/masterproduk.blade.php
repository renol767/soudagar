@extends('layouts.website.template')

@section('content')
<!-- Data Produk Starts -->
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <table id="datatablecustom" class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No</th>
                            <th>Nama Brand</th>
                            <th>Nama Produk</th>
                            <th>Foto Produk</th>
                            <th>Deskripsi Produk</th>
                            <th>Stok</th>
                            <th>Hg. Reseller</th>
                            <th>Hg. Jual</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $key => $data)
                        <tr>
                            <th></th>
                            <th>{{$key + 1}}</th>
                            <th>{{$data->nama_brand}}</th>
                            <th>{{$data->nama_produk}}</th>
                            <th><img src="{{asset('images/produk/' . $data->foto_produk)}}" class="me-75" height="100" /></th>
                            <th>{{$data->deskripsi_produk}}</th>
                            <th>{{$data->stok_produk}}</th>
                            <th>{{$data->harga_reseller}}</th>
                            <th>{{$data->harga_jual}}</th>
                            <th>
                                <a class="nav-link dropdown-toggle dropdown-user-link btn btn-outline-primary" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="" class="me-25"></i>
                                    <span>Aksi</span></a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                                    <a class="dropdown-item" onclick="edit_data(this)" href="#" data-bs-toggle="modal" data-bs-target="#editData" data-id="{{$data->id}}" data-brand="{{$data->id_brand}}" data-produk="{{$data->nama_produk}}" data-img="{{$data->foto_produk}}" data-deskripsi="{{$data->deskripsi_produk}}" data-stok="{{$data->stok_produk}}" data-hg-r="{{$data->harga_reseller}}" data-hg-j="{{$data->harga_jual}}"><i class="me-50" data-feather="edit"></i>Edit</a>
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
    <div class="modal modal-slide-in fade" id="confirmDelete" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog sidebar-sm">
            <form class="add-new-record modal-content pt-0" action="{{route('deleteproduk')}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" id="deleteprodukid" name="deleteprodukid">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Produk</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menghapus produk?</h5><br>
                    <button type="submit" class="btn btn-primary data-submit me-1">Confirm</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal to Edit new record -->
    <div class="modal modal-slide-in fade" id="editData" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog sidebar-sm">
            <form class="add-new-record modal-content pt-0" enctype="multipart/form-data" action="{{route('editproduk')}}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="editid" name="editid">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <div class="mb-1">
                        <label class="form-label" for="select2-basic">Brand</label>
                        <select class="select2 form-select" id="editid_brand" name="editid_brand" required>
                            @foreach($brands as $key => $brand)
                            <option value="{{$brand->id}}">{{$brand->nama_brand}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="basic-icon-default-fullname">Nama Produk</label>
                        <input type="text" class="form-control dt-full-name" id="editnama_produk" name="editnama_produk" placeholder="Anggur Merah" aria-label="John Doe" required />
                    </div>
                    <div class="mb-1">
                        <label for="formFile" class="form-label">Foto Produk Saat Ini</label><br>
                        <img id="oldimage" src="" class="me-75" height="100" />
                    </div>
                    <div class="mb-1">
                        <label for="formFile" class="form-label">Foto Produk</label>
                        <input class="form-control" type="file" id="newfoto_produk" name="newfoto_produk" />
                        <small class="form-text">Abaikan jika tidak ingin diubah</small>
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Deskripsi Produk</label>
                        <textarea id="editdeskripsi_produk" type="text" class="form-control" name="editdeskripsi_produk" rows="3" placeholder="Deskripsi Produk" required></textarea>
                    </div>
                    <div class="mb-1">
                        <label for="formFile" class="form-label">Stok Produk</label>
                        <input class="form-control" type="text" id="editstok_produk" name="editstok_produk" />
                    </div>
                    <label for="formFile" class="">Harga Reseller</label>
                    <div class="input-group mb-1">
                        <span class="input-group-text">Rp.</span>
                        <input class="form-control" type="text" id="editharga_reseller" name="editharga_reseller" placeholder="10000" />
                    </div>
                    <label for="formFile" class="">Harga Jual</label>
                    <div class="input-group mb-1">
                        <span class="input-group-text">Rp.</span>
                        <input class="form-control" type="text" id="editharga_jual" name="editharga_jual" placeholder="10000" />
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
            <form class="add-new-record modal-content pt-0" enctype="multipart/form-data" action="{{route('insertproduk')}}" method="POST">
                @csrf
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">New Produk</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <div class="mb-1">
                        <label class="form-label" for="select2-basic">Brand</label>
                        <select class="select2 form-select" id="id_brand" name="id_brand" required>
                            @foreach($brands as $key => $brand)
                            <option value="{{$brand->id}}">{{$brand->nama_brand}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="basic-icon-default-fullname">Nama Produk</label>
                        <input type="text" class="form-control dt-full-name" id="nama_produk" name="nama_produk" placeholder="Anggur Merah" aria-label="John Doe" required />
                    </div>
                    <div class="mb-1">
                        <label for="formFile" class="form-label">Foto Produk</label>
                        <input class="form-control" type="file" id="foto_produk" name="foto_produk" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Deskripsi Brand</label>
                        <textarea id="deskripsi_produk" type="text" class="form-control" name="deskripsi_produk" rows="3" placeholder="Deskripsi Produk" required></textarea>
                    </div>
                    <div class="mb-1">
                        <label for="formFile" class="form-label">Stok Produk</label>
                        <input class="form-control" type="text" id="stok_produk" name="stok_produk" />
                    </div>
                    <label for="formFile" class="">Harga Reseller</label>
                    <div class="input-group mb-1">
                        <span class="input-group-text">Rp.</span>
                        <input class="form-control" type="text" id="harga_reseller" name="harga_reseller" placeholder="10000" />
                    </div>
                    <label for="formFile" class="">Harga Jual</label>
                    <div class="input-group mb-1">
                        <span class="input-group-text">Rp.</span>
                        <input class="form-control" type="text" id="harga_jual" name="harga_jual" placeholder="10000" />
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
        $('#editid_brand').val(data.data('brand')).change();
        $('#editnama_produk').val(data.data('produk'));
        img = data.data('img');
        oldImage = "/images/produk/" + img + ""
        var base_url = window.location.origin;
        oldImage = base_url + oldImage;
        $('#oldimage').attr('src', oldImage);
        $('#editdeskripsi_produk').val(data.data('deskripsi'));
        $('#editstok_produk').val(data.data('stok'));
        $('#editharga_reseller').val(data.data('hg-r'));
        $('#editharga_jual').val(data.data('hg-j'));
    }

    function confirm_delete(e) {
        var data = $(e);
        $('#deleteprodukid').val(data.data('id'));
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
                data: 'nama_brand'
            },
            {
                data: 'nama_produk'
            },
            {
                data: 'foto_produk'
            },
            {
                data: 'deskripsi_produk'
            },
            {
                data: 'stok_produk'
            },
            {
                data: 'harga_reseller'
            },
            {
                data: 'harga_jual'
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
<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
@endSection()