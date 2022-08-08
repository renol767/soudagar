@extends('layouts.reseller.template')

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
                                    <th>Brand</th>
                                    <th>Produk</th>
                                    <th>Kuantitas</th>
                                    <th>Jumlah Harga</th>
                                    <th>Jumlah Keuntungan</th>
                                    <th>Status</th>
                                    <th>Tanggal Pengambilan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pengajuan as $key => $data)
                                <tr>
                                    <th></th>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $data->nama_brand }}</td>
                                    <td>{{ $data->nama_produk }}</td>
                                    <td>{{ $data->kuantitas }}</td>
                                    <td>Rp.{{ $data->kuantitas * $data->harga_reseller }}</td>
                                    <td>{{ $data->harga_jual - $data->harga_reseller }}</td>
                                    <td>
                                        @if($data->status == 'sudah bayar')
                                        <span class="badge bg-success">Sudah Bayar</span>
                                        @endif
                                        @if($data->status == 'belum bayar')
                                        <span class="badge bg-secondary">Belum Bayar</span>
                                        @endif
                                    </td>
                                    <td>{{ $data->tanggal_pengambilan }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
                title: 'Tanggal Pengambilan',
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
                }) + 'Tambah pesanan baru',
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