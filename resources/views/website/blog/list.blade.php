@extends ('layouts.website.template')

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

<style>
    .table-cell {position: relative; overflow: hidden; display: table-cell;}
</style>
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
                                <th>Status</th>
                                <th>Thumbnail</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $key => $blog)
                            <tr>
                                <td></td>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $blog->judul }}</td>
                                <td>@if($blog->status == 'publish')
                                    <span class="badge bg-info">{{ $blog->status }}</span></td>
                                    @endif
                                    @if($blog->status == 'draft')
                                    <span class="badge bg-secondary">{{ $blog->status }}</span></td>
                                    @endif
                                <td><img src="{{asset('images/blog/' . $blog->image)}}" class="me-75" height="100" /></td>
                                <td>
                                    <a class="nav-link dropdown-toggle dropdown-user-link btn btn-outline-primary" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="" class="me-25"></i>
                                        <span>Aksi</span></a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                                        @if($blog->status == 'publish')
                                            <a class="dropdown-item" href="{{ route('draft_blog',$blog->id) }}"><i class="me-50" data-feather='archive'></i></i>Draft</a>
                                        @endif
                                        @if($blog->status == 'draft')
                                        <a class="dropdown-item" href="{{ route('publish_blog',$blog->id) }}"><i class="me-50" data-feather='monitor'></i></i>Publish</a>
                                        @endif
                                        <a class="dropdown-item" href="{{ route('edit_blog',$blog->id)}}"><i class="me-50" data-feather="edit"></i>Edit</a>
                                        <a class="dropdown-item" onclick="confirm_delete(this)" href="#" data-bs-toggle="modal" data-bs-target="#confirmDelete" data-id="{{$blog->id}}"><i class="me-50" data-feather="trash"></i>Hapus</a>
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
    <!-- Confirm Delete Users -->
    <div class="modal modal-slide-in fade" id="confirmDelete" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog sidebar-sm">
            <form class="add-new-record modal-content pt-0" action="{{route('delete_blog')}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" id="deletebrandid" name="id">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Blog</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menghapus blog?</h5><br>
                    <button type="submit" class="btn btn-primary data-submit me-1">Confirm</button>
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