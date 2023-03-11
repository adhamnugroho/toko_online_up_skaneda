@extends('admin.layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data {{ $judul }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data {{ $judul }}</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Tabel {{ $judul }}
                            </h3>

                            <div class="card-tools">

                                <div class="input-group input-group-sm" style="width: 200px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">

                            <a href="{{ route('produkCreate') }}" class="btn btn-primary btn-sm">
                                Tambah {{ $judul }}
                            </a>

                            <table id="tabel-data" class="table table-bordered table-hover" id="example2">

                                <br><br>

                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Kategori Produk</th>
                                        <th>Slug Produk</th>
                                        <th>Stok Produk</th>
                                        <th>Berat Produk</th>
                                        <th>Harga Produk</th>
                                        <th>Gambar Produk</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($produk as $key => $p)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $p->nama_produk }}</td>
                                            <td>{{ $p->kategori_produk_id }}</td>
                                            <td>{{ $p->slug_produk }}</td>
                                            <td>{{ $p->stok_produk }}</td>
                                            <td>{{ $p->berat_produk }}</td>
                                            <td>{{ $p->harga_produk }}</td>
                                            <td>
                                                <img src="{{ asset('template-admin/img/produk') }}/{{ $p->foto_produk }}"
                                                alt="*Gambar Produk" width="100">

                                                {{-- {{ $p->foto_produk }} --}}
                                            </td>
                                            <td>
                                                <a href="{{ route('produkShow', $p->id_produk) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('produkEdit', $p->id_produk) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{ route('produkDelete', $p->id_produk) }}"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda ingin menghapus Data?')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Kategori Produk</th>
                                        <th>Slug Produk</th>
                                        <th>Berat Produk</th>
                                        <th>Harga Produk</th>
                                        <th>Gambar Produk</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer clearfix">
                            <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to
                                10 of 57 entries
                            </div>

                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                {{-- <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li> --}}
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
