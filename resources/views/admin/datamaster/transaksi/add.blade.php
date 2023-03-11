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
                        <li class="breadcrumb-item"><a href="{{ route('transaksi') }}">Home</a></li>
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
                        <form method="get" action="{{ route('transaksiStore') }}" class="">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="user_id">Pilih Pembeli</label>
                                    <select class="form-control" placeholder="Pilih Kategori Produk" name="user_id"
                                        id="user_id" value="" required>

                                        <option value="">.:: Pilih Pembeli ::.</option>

                                        @foreach ($users as $us)
                                            <option value="{{ $us->id }}">{{ $us->nama_lengkap }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="produk_id">Pilih Produk</label>
                                    <select class="form-control" placeholder="Pilih Kategori Produk" name="produk_id"
                                        id="produk_id" value="" required>

                                        <option value="">.:: Pilih Produk ::.</option>

                                        @foreach ($produk as $pro)
                                            <option value="{{ $pro->id_produk }}">{{ $pro->nama_produk }}
                                                ({{ $pro->kategori_produk->nama_kategori_produk }})
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_transaksi">Tanggal Transaksi</label>
                                    <input type="date" class="form-control" placeholder="Masukkan Tanggal Transaksi"
                                        name="tanggal_transaksi" id="tanggal_transaksi" value="{{ date('Y-m-d') }}"
                                        required />
                                </div>
                                <div class="form-group">
                                    <label for="ekspedisi">Pilih Ekspedisi</label>
                                    <select class="form-control" placeholder="Pilih Kategori Produk" name="ekspedisi"
                                        id="ekspedisi" value="" required>

                                        <option value="">.:: Pilih Ekspedisi ::.</option>
                                        <option value="jne">JNE</option>
                                        <option value="jnt">JNT</option>
                                        <option value="pos">POS</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="catatan_pembeli">Catatan Pembeli</label>
                                    <textarea class="form-control" placeholder="Silahkan Diisi Bila Ingin Memberi Catatan" name="catatan_pembeli"
                                        id="catatan_pembeli" cols="30" rows="3"></textarea>
                                </div>
                            </div>


                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary mr-3">Simpan</button>
                                <a href="{{ route('transaksi') }}" class="btn btn-warning">Kembali</a>
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
