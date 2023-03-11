@extends('admin.layout.app')


{{-- Content --}}

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="ml-3">Form Detail {{ $judul }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Form Detail {{ $judul }}</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <!-- left column -->
                <div class="col-md-9">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form {{ $judul }}</h3>
                        </div>
                        <!-- /.card-header -->
                        {{-- Form Start --}}
                        <form method="post" action="" class="" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_produk">Nama Produk</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap"
                                        name="nama_produk" id="nama_produk"
                                        value="{{ old('nama_produk') ? old('nama_produk') : $produk->nama_produk }}"
                                        required disabled />
                                </div>
                                <div class="form-group">
                                    <label for="id_kategori_produk">Kategori Produk</label>
                                    <select class="form-control" placeholder="Pilih Kategori Produk"
                                        name="id_kategori_produk" id="id_kategori_produk" value="" required disabled>

                                        @foreach ($kategori_produk as $kp)
                                            <option value="{{ $kp->id_kategori_produk }}"
                                                {{ $kp->id_kategori_produk == $produk->kategori_produk_id ? 'selected' : '' }}>
                                                {{ $kp->nama_kategori_produk }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="stok_produk">Stok Produk</label>
                                    <input type="number" class="form-control" placeholder="Masukkan Stok Produk"
                                        name="stok_produk" id="stok_produk"
                                        value="{{ old('stok_produk') ? old('stok_produk') : $produk->stok_produk }}"
                                        min="0" required disabled />
                                </div>
                                <div class="form-group">
                                    <label for="berat_produk">Berat Produk</label>
                                    <input type="number" class="form-control"
                                        placeholder="Masukkan Berat Produk *dalam satuan gram(grm)" name="berat_produk"
                                        id="berat_produk"
                                        value="{{ old('berat_produk') ? old('berat_produk') : $produk->berat_produk }}"
                                        min="0" required disabled />
                                </div>
                                <div class="form-group">
                                    <label for="harga_produk">Harga Produk</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Harga Produk"
                                        name="harga_produk" id="harga_produk"
                                        value="{{ old('harga_produk') ? old('harga_produk') : $produk->harga_produk }}"
                                        required disabled />
                                </div>
                                <div class="form-group">

                                    <?php if(!empty($produk->deskripsi_produk)): ?>

                                    <label for="deskripsi_produk">Deskripsi Produk</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Deskripsi Produk"
                                        name="deskripsi_produk" id="deskripsi_produk"
                                        value="{{ old('deskripsi_produk') ? old('deskripsi_produk') : $produk->deskripsi_produk }}"
                                        required disabled />

                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <div class="card">
                                        <div class="card-header">
                                            <label for="foto_produk">Foto Produk</label>
                                        </div>
                                        <div class="card-body mx-auto">

                                            <img src="{{ asset('template-admin/img/produk') }}/{{ $produk->foto_produk }}"
                                                alt="*Gambar Produk" width="220">

                                            {{-- <label for="">{{ $produk->foto_produk }}
                                                </label> --}}
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="card-footer">
                                {{-- <button type="submit" class="btn btn-primary mr-3">Simpan</button> --}}
                                <a href="{{ route('produk') }}" class="btn btn-warning">Kembali</a>
                            </div>

                        </form>
                    </div>

                </div>
                <!-- /.card -->
            </div>
            {{-- /.row --}}
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection


{{-- script --}}

@section('script')
@endsection
