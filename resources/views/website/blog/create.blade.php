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
<div class="card">
    <div class="card-body">
        <form method="POST" class="form-group" enctype="multipart/form-data" id="create" action="{{ route('insert_blog') }}">
            @csrf
            <label for="judul">Judul Konten</label>
            <input type="text" name="judul" class="form-control" placeholder="Judul konten..">
            <label for="thumbnail">Image thumnail konten</label>
            <input type="file" name="thumbnail" class="form-control">
            <label for="konten">Isi Konten</label>
            <div id="toolbar"></div>
            <div id="editor"></div>

            <a href="{{ route('blog') }}" class="btn btn-warning mt-2" type="submit">KEMBALI</a>
                <button class="btn btn-primary mt-2" type="submit">SIMPAN</button>
        </form>
    </div>
</div>
@endSection()
@section('script')
<script>
    var toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'], // toggled buttons
        ['blockquote', 'code-block'],

        [{
            'header': 1
        }, {
            'header': 2
        }], // custom button values
        [{
            'list': 'ordered'
        }, {
            'list': 'bullet'
        }],
        [{
            'script': 'sub'
        }, {
            'script': 'super'
        }], // superscript/subscript
        [{
            'indent': '-1'
        }, {
            'indent': '+1'
        }], // outdent/indent
        [{
            'direction': 'rtl'
        }], // text direction

        [{
            'size': ['small', false, 'large', 'huge']
        }], // custom dropdown
        [{
            'header': [1, 2, 3, 4, 5, 6, false]
        }],
        ['link', 'image', 'video', 'formula'], // add's image support
        [{
            'color': []
        }, {
            'background': []
        }], // dropdown with defaults from theme
        [{
            'font': []
        }],
        [{
            'align': []
        }],

        ['clean'] // remove formatting button
    ];

    var quill = new Quill('#editor', {
        container: '#toolbar',
        modules: {
            toolbar: toolbarOptions
        },
        theme: 'snow'
    });
</script>

<script>
    $(document).ready(function() {
        $("#create").on("submit", function() {
            var hvalue = JSON.stringify(quill.root.innerHTML.trim());
            $(this).append("<textarea name='konten' style='display:none'>" + hvalue + "</textarea>");
        });
    });
</script>
@endSection()