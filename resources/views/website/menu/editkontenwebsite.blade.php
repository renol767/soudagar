@extends('layouts.website.template')

@section('content')
<style>
    .scroll {
        display: block;
        min-height: 500px;
        overflow: auto;
        max-height: 700px;
    }

    .frame {
        display: block;
        min-height: 500px;
        overflow: auto;
        width: 100%;
        max-height: 700px;
    }
</style>

<div class="row">
    <section id="checkbox-radio-button-group">
        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <div class="table-responsive">
                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked onclick="showcase1()">
                <label class="btn btn-outline-primary" for="btnradio1">Showcase 1</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" onclick="showcase2()">
                <label class="btn btn-outline-primary" for="btnradio2">Showcase 2</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" onclick="showcase3()">
                <label class="btn btn-outline-primary" for="btnradio3">Showcase 3</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" onclick="produkdanbrand()">
                <label class="btn btn-outline-primary" for="btnradio4">Produk dan brand</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" onclick="benefit()">
                <label class="btn btn-outline-primary" for="btnradio5">Benefit</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio6" autocomplete="off" onclick="keunggulan()">
                <label class="btn btn-outline-primary" for="btnradio6">Keunggulan</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio7" autocomplete="off" onclick="footer()">
                <label class="btn btn-outline-primary" for="btnradio7">Footer</label>
            </div>
        </div>
    </section>
    <div class="col mt-2">
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
                <form class="form-group mt-2 scroll" method="POST" action="{{ route('simpanKontenWeb') }}" enctype="multipart/form-data">
                    @csrf
                    @foreach ($konten as $data)
                    <input type="hidden" value="{{ $data->id }}" name="id">
                    <div id="showcase1">
                        <label for="showcase1">SHOWCASE 1</label>
                        <input type="text" name="showcase1" class="form-control" placeholder="Buka Usaha Online cuma Modal HP" value="{{ $data->showcase1}}">
                        <label for="deskripsi_showcase1">DESKRIPSI SHOWCASE 1</label>
                        <textarea class="form-control" name="deskripsi_showcase1">{{ $data->deskripsi_showcase1 }}</textarea>
                        <label for="img_showcase1">IMAGE SHOWCASE 1</label>
                        <input type="file" class="form-control" name="img_showcase1">
                    </div>
                    <div id="showcase2">
                        <label for="showcase2">SHOWCASE 2</label>
                        <input type="text" name="showcase2" class="form-control" placeholder="Dapatkan Omzet hingga 100 Juta Rupiah dengan Komisi hingga 10 Juta Rupiah" value="{{ $data->showcase2 }}">
                        <label for="deskripsi_showcase2">DESKRIPSI SHOWCASE 2</label>
                        <textarea class="form-control" name="deskripsi_showcase2">{{ $data->deskripsi_showcase2 }}</textarea>
                        <label for="img_fadeInLeft_Showcase2">IMAGE FADE IN LEFT </label>
                        <input type="file" class="form-control" name="img_fadeInLeft_Showcase2">
                        <label for="img_fadeInUp_Showcase2">IMAGE FADE IN UP </label>
                        <input type="file" class="form-control" name="img_fadeInUp_Showcase2">
                    </div>
                    <div id="showcase3">
                        <label for="showcase3">SHOWCASE 3</label>
                        <input type="text" name="showcase3" class="form-control" placeholder="Produk dari Brand UMKM" value="{{ $data->showcase3 }}">
                        <label for="deskripsi_showcase3">DESKRIPSI SHOWCASE 3</label>
                        <textarea class="form-control" name="deskripsi_showcase3">{{ $data->deskripsi_showcase3 }}</textarea>
                        <label for="img_fadeInLeftShowcase3">IMAGE FADE IN LEFT </label>
                        <input type="file" class="form-control" name="img_fadeInLeft_Showcase3">
                        <label for="img_fadeInUp_Showcase3">IMAGE FADE IN UP </label>
                        <input type="file" class="form-control" name="img_fadeInUp_Showcase3">
                    </div>
                    <div id="produkdanbrand">
                        <label for="produkdanbrand">TAGLINE PRODUK DAN BRAND</label>
                        <input type="text" name="produkdanbrand" class="form-control" placeholder="Reseller dapat menjual 80.000++ Produk dari 700++ Brand Lokal yang dijamin Kualitas dan Keasliannya" value="{{ $data->tagline_produkdanbrand }}">
                    </div>
                    <div id="benefit">
                        <label for="judulBenefit">TAGLINE BENEFIT</label>
                        <input type="text" name="judulBenefit" class="form-control" placeholder="Benefit yang didapatkan Reseller." value="{{ $data->tagline_benefit }}">
                        <label for="deskripsiBenefit">DESKRIPSI</label>
                        <textarea class="form-control" name="deskripsiBenefit">{{ $data->deskripsi_benefit }}</textarea>
                        <label for="img_benefit">IMAGE BENEFIT</label>
                        <input type="file" class="form-control" name="img_benefit">
                        <label for="poinBenefit">POIN BENEFIT</label>
                        <input type="text" name="poinBenefit" class="form-control" value="{{ $data->poin_benefit }}">
                        <small>* Pisahkan dengan tanda -</small><br>
                        <label for="deskripsiPoinBenefit">DESKRIPSI POIN BENEFIT</label>
                        <textarea class="form-control" name="deskripsiPoinBenefit">{{ $data->deskripsi_poin_benefit }}</textarea>
                        <small>* Pisahkan dengan tanda -</small>
                    </div>
                    <div id="keunggulan">
                        <label for="judulKeunggulan">TAGLINE KEUNGGULAN</label>
                        <input type="text" name="judulKeunggulan" class="form-control" placeholder="Produk dari Brand UMKM" value="{{ $data->tagline_keunggulan }}">
                        <label for="deskripsiKeunggulan">DESKRIPSI</label>
                        <textarea class="form-control" name="deskripsiKeunggulan">{{ $data->deskripsi_keunggulan }}</textarea>
                        <label for="img_keunggulan">IMAGE KEUNGGULAN</label>
                        <input type="file" class="form-control" name="img_keunggulan">
                        <label for="poinKeunggulan">POIN KEUNGGULAN</label>
                        <input class="form-control" name="poinKeunggulan" placeholder="Input disini" value="{{ $data->poin_keunggulan }}">
                        <small>* Pisahkan dengan tanda -</small><br>
                        <small>* Contoh murah-gratis-bervariasi</small>
                    </div>
                    <div id="footer">
                        <label for="instagran">Intagram</label>
                        <input type="url" placeholder="https://sosialmedia.com/soudagar.id" name="instagram" value="{{ $data->instagram }}" class="form-control">
                        <label for="facebook">Facebook</label>
                        <input type="url" placeholder="https://sosialmedia.com/soudagar.id" name="facebook" value="{{ $data->facebook }}" class="form-control">
                        <label for="telegram">Telegram</label>
                        <input type="url" placeholder="https://sosialmedia.com/soudagar.id" name="telegram" value="{{ $data->telegram }}" class="form-control">
                        <label for="youtube">YouTube</label>
                        <input type="url" placeholder="https://sosialmedia.com/soudagar.id" name="youtube" value="{{ $data->youtube }}" class="form-control">
                        <label for="youtube">WhatsApp</label>
                        <input type="url" placeholder="https://sosialmedia.com/soudagar.id" name="whatsapp" value="{{ $data->whatsapp }}" class="form-control">
                        <label for="alamat">Alamat</label>
                        <textarea cols="4" name="alamat" class="form-control">{{ $data->alamat }}</textarea>
                    </div>
                    @endforeach
                    <button class="btn btn-primary mt-4" type="submit">Simpan</button>
                    <button class="btn btn-info mt-4" type="button" onclick="preview()">Preview</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col mt-2" id="preview">
        <div class="card">
            <div class="card-header bg-info">
                <div class="card-title text-white">
                    PREVIEW
                    <small><a class="text-white" href="#" onclick="refreshIframe()"><i data-feather='refresh-ccw'></i> Refresh</a></small>
                </div>
            </div>
            <div class="card-body">
                <iframe id="iframe" class="ql-align-center frame" src="{{ URL::to('/') }}"></iframe>
            </div>

        </div>
    </div>
</div>
@endSection()
@section('script')
<script>
    document.getElementById('preview').style.display = 'none';

    function preview() {
        var option = document.getElementById('preview').style.display
        if (option) {
            document.getElementById('preview').style.display = '';


        } else {
            document.getElementById('preview').style.display = 'none';
        }

    }

    function refreshIframe() {
        const iframe = document.getElementById("iframe");
        iframe.contentWindow.location.reload();
    }
</script>

<script>
    document.getElementById('showcase2').style.display = 'none'
    document.getElementById('showcase3').style.display = 'none'
    document.getElementById('showcase1').style.display = ''
    document.getElementById('benefit').style.display = 'none'
    document.getElementById('produkdanbrand').style.display = 'none'
    document.getElementById('keunggulan').style.display = 'none'
    document.getElementById('footer').style.display = 'none'

    function showcase1() {
        document.getElementById('benefit').style.display = 'none'
        document.getElementById('produkdanbrand').style.display = 'none'
        document.getElementById('keunggulan').style.display = 'none'
        document.getElementById('showcase2').style.display = 'none'
        document.getElementById('showcase3').style.display = 'none'
        document.getElementById('showcase1').style.display = ''
        document.getElementById('footer').style.display = 'none'
    }

    function showcase2() {
        document.getElementById('benefit').style.display = 'none'
        document.getElementById('produkdanbrand').style.display = 'none'
        document.getElementById('keunggulan').style.display = 'none'
        document.getElementById('showcase2').style.display = ''
        document.getElementById('showcase3').style.display = 'none'
        document.getElementById('showcase1').style.display = 'none'
        document.getElementById('footer').style.display = 'none'
    }

    function showcase3() {
        document.getElementById('benefit').style.display = 'none'
        document.getElementById('produkdanbrand').style.display = 'none'
        document.getElementById('keunggulan').style.display = 'none'
        document.getElementById('showcase2').style.display = 'none'
        document.getElementById('showcase3').style.display = ''
        document.getElementById('showcase1').style.display = 'none'
        document.getElementById('footer').style.display = 'none'
    }

    function produkdanbrand() {
        document.getElementById('benefit').style.display = 'none'
        document.getElementById('produkdanbrand').style.display = ''
        document.getElementById('keunggulan').style.display = 'none'
        document.getElementById('showcase2').style.display = 'none'
        document.getElementById('showcase3').style.display = 'none'
        document.getElementById('showcase1').style.display = 'none'
        document.getElementById('footer').style.display = 'none'
    }

    function benefit() {
        document.getElementById('benefit').style.display = ''
        document.getElementById('produkdanbrand').style.display = 'none'
        document.getElementById('keunggulan').style.display = 'none'
        document.getElementById('showcase2').style.display = 'none'
        document.getElementById('showcase3').style.display = 'none'
        document.getElementById('showcase1').style.display = 'none'
        document.getElementById('footer').style.display = 'none'
    }

    function keunggulan() {
        document.getElementById('benefit').style.display = 'none'
        document.getElementById('produkdanbrand').style.display = 'none'
        document.getElementById('keunggulan').style.display = ''
        document.getElementById('showcase2').style.display = 'none'
        document.getElementById('showcase3').style.display = 'none'
        document.getElementById('showcase1').style.display = 'none'
        document.getElementById('footer').style.display = 'none'
    }

    function footer() {
        document.getElementById('benefit').style.display = 'none'
        document.getElementById('produkdanbrand').style.display = 'none'
        document.getElementById('keunggulan').style.display = 'none'
        document.getElementById('showcase2').style.display = 'none'
        document.getElementById('showcase3').style.display = 'none'
        document.getElementById('showcase1').style.display = 'none'
        document.getElementById('footer').style.display = ''
    }
</script>
@endSection()