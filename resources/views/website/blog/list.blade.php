@extends ('layouts.website.template')

@section('content')

<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatablecustom" class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Konten</th>
                                <th>Status</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $key => $blog)
                            <tr>
                                <th></th>
                                <th>{{ $key + 1 }}</th>
                                <th>{{ $blog->judul }}</th>
                                <th class="overflow-auto"><?= $blog->konten; ?></th>
                                <th>{{ $blog->status }}</th>
                                <th><img src="{{asset('images/blog/' . $blog->image)}}" class="me-75" height="100" /></th>
                                <th>
                                    <a class="nav-link dropdown-toggle dropdown-user-link btn btn-outline-primary" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="" class="me-25"></i>
                                        <span>Aksi</span></a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                                        <a class="dropdown-item" onclick="edit_data(this)" href="#" data-bs-toggle="modal" data-bs-target="#editData" data-id="{{$blog->id}}" data-nama="{{$blog->judul}}" data-img="{{$blog->image}}" data-deskripsi="{{$blog->konten}}"><i class="me-50" data-feather="edit"></i>Edit</a>
                                        <a class="dropdown-item" onclick="confirm_delete(this)" href="#" data-bs-toggle="modal" data-bs-target="#confirmDelete" data-id="{{$blog->id}}"><i class="me-50" data-feather="trash"></i>Hapus</a>
                                    </div>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Confirm Delete Users -->
    <div class="modal modal-slide-in fade" id="confirmDelete" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog sidebar-sm">
            <form class="add-new-record modal-content pt-0" action="{{route('deletebrand')}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" id="deletebrandid" name="deletebrandid">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Brand</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menghapus brand? Perintah ini juga menghapus Semua Produk yang terkait di Brand</h5><br>
                    <button type="submit" class="btn btn-primary data-submit me-1">Confirm</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal to Edit new record -->
    <div class="modal modal-slide-in fade" id="editData" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog sidebar-sm">
            <form class="add-new-record modal-content pt-0" enctype="multipart/form-data" action="{{route('editbrand')}}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="editid" name="editid">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <div class="mb-1">
                        <label class="form-label" for="basic-icon-default-fullname">Nama brand</label>
                        <input type="text" class="form-control dt-full-name" id="editjudul" name="editjudul" placeholder="Orang Tua" aria-label="John Doe" required />
                    </div>
                    <div class="mb-1">
                        <label for="formFile" class="form-label">Logo Brand Saat Ini</label><br>
                        <img id="oldimage" src="" class="me-75" height="100" />
                    </div>
                    <div class="mb-1">
                        <label for="formFile" class="form-label">Logo Brand Baru</label>
                        <input class="form-control" type="file" id="newimage" name="newimage" />
                        <small class="form-text">Abaikan jika tidak ingin diubah</small>
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Deskripsi Brand</label>
                        <textarea id="editkonten" type="text" class="form-control" name="editkonten" rows="3" placeholder="Deskripsi Brand" required></textarea>
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
            <form class="add-new-record modal-content pt-0" enctype="multipart/form-data" action="{{route('insertbrand')}}" method="POST">
                @csrf
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">New Brand</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <div class="mb-1">
                        <label class="form-label" for="basic-icon-default-fullname">Nama brand</label>
                        <input type="text" class="form-control dt-full-name" id="judul" name="judul" placeholder="Orang Tua" aria-label="John Doe" required />
                    </div>
                    <div class="mb-1">
                        <label for="formFile" class="form-label">Logo Brand</label>
                        <input class="form-control" type="file" id="image" name="image" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Deskripsi Brand</label>
                        <textarea id="konten" type="text" class="form-control" name="konten" rows="3" placeholder="Deskripsi Brand" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary data-submit me-1">Submit</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Edit / Reset Password Modal -->
<script>
    function edit_data(e) {
        var data = $(e);
        $('#editid').val(data.data('id'))
        $('#editjudul').val(data.data('nama'));
        img = data.data('img');
        oldImage = "/images/brand/" + img + ""
        var base_url = window.location.origin;
        oldImage = base_url + oldImage;
        $('#oldimage').attr('src', oldImage);
        $('#editkonten').val(data.data('deskripsi'));
    }

    function confirm_delete(e) {
        var data = $(e);
        $('#deletebrandid').val(data.data('id'));
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
                data: 'judul'
            },
            {
                data: 'image'
            },
            {
                data: 'konten'
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
                }) + 'Create New Blog',
                className: 'create-new btn btn-primary',
                action: function(e, dt, button, config) {
                    window.location = "{{ route('create_blog') }}"
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
                        return 'Details of ' + data['judul'];
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