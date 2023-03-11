@extends('admin.layout.app')


{{-- Content --}}

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="ml-3">Form Tambah {{ $judul }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Form Tambah {{ $judul }}</li>
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
                        <form method="post" action="{{ route('produkStore') }}" class=""
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_produk">Nama Produk</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Produk"
                                        name="nama_produk" id="nama_produk" value="{{ old('nama_produk') }}" required />
                                </div>
                                <div class="form-group">
                                    <label for="id_kategori_produk">Kategori Produk</label>
                                    <select class="form-control" placeholder="Pilih Kategori Produk"
                                        name="id_kategori_produk" id="id_kategori_produk" value="" required>

                                        @foreach ($kategori_produk as $kp)
                                            <option value="{{ $kp->id_kategori_produk }}">{{ $kp->nama_kategori_produk }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="stok_produk">Stok Produk</label>
                                    <input type="number" class="form-control" placeholder="Masukkan Stok Produk"
                                        name="stok_produk" id="stok_produk" value="{{ old('stok_produk') }}"
                                        min="0" required/>
                                </div>
                                <div class="form-group">
                                    <label for="berat_produk">Berat Produk</label>
                                    <input type="number" class="form-control"
                                        placeholder="Masukkan Berat Produk *dalam satuan gram(grm)" name="berat_produk"
                                        id="berat_produk" value="{{ old('berat_produk') }}" min="0" required/>
                                </div>
                                <div class="form-group">
                                    <label for="harga_produk">Harga Produk</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Harga Produk"
                                        name="harga_produk" id="harga_produk" value="{{ old('harga_produk') }}" required/>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi_produk">Deskripsi Produk</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Deskripsi Produk"
                                        name="deskripsi_produk" id="deskripsi_produk"
                                        value="{{ old('deskripsi_produk') }}" />
                                </div>
                                <div class="form-group">
                                    <label for="foto_produk">Foto Produk</label>
                                    <input type="file" class="form-control pt-1" placeholder="Masukkan Foto Produk"
                                        name="foto_produk" id="foto_produk" required/>
                                </div>

                            </div>


                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary mr-3">Simpan</button>
                                <a href="{{ route('users') }}" class="btn btn-warning">Kembali</a>
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
