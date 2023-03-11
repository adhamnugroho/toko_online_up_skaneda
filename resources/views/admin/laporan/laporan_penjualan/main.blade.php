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

                            <form action="{{ route('laporanPenjualan') }}" method="GET">

                                <div class="row mb-2">

                                    <div class="col">
                                        Range Tanggal
                                    </div>

                                    <div class="col-4">

                                        <input type="date" class="form-control" name="tanggal_awal" id="tanggal_awal"
                                            value="{{ isset($_GET['tanggal_awal']) ? $_GET['tanggal_awal'] : date('Y-m-d') }}">
                                    </div>

                                    <div class="col-0">
                                        -
                                    </div>

                                    <div class="col-4">

                                        <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir"
                                            value="{{ isset($_GET['tanggal_akhir']) ? $_GET['tanggal_akhir'] : date('Y-m-d') }}">
                                    </div>
                                </div>

                                <div class="col">

                                    <button type="submit" class="btn btn-primary">

                                        <i class="fa fa-search"></i>
                                        Cari
                                    </button>

                                    <a href="" class="btn btn-warning" onclick="print()">

                                        <i class="fa fa-print"></i>
                                        Print
                                    </a>
                                </div>

                            </form>

                            <table id="tabel-data" class="table table-bordered table-hover" id="example2">

                                <br><br>

                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Transaksi</th>
                                        <th>Kode Invoice</th>
                                        <th>Nama Pembeli</th>
                                        <th>Produk</th>
                                        <th>QTY</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Status Transaksi</th>
                                        <th>Ekspedisi</th>
                                        <th>Alamat Tujuan</th>
                                        <th>Catatan Pembeli</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($laporan_penjualan as $key => $lp)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $lp->kode_transaksi }}</td>
                                            <td>{{ $lp->kode_invoice }}</td>
                                            <td>{{ $lp->users->nama_lengkap }}</td>

                                            <td>
                                                <ol>
                                                    @foreach($lp->transaksi_detail as $td)

                                                        <li>
                                                            {{ $td->produk->nama_produk }}
                                                        </li>
                                                    @endforeach
                                                </ol>
                                            </td>

                                            <td>
                                                <ul>
                                                    @foreach($lp->transaksi_detail as $td)
                                                        <li>
                                                            {{ $td->qty }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td> {{ $lp->tanggal_transaksi }} </td>
                                            <td> {{ $lp->status_transaksi }} </td>
                                            <td>
                                                PROVINSI {{ ($lp->provinsi->nama_provinsi) ? $lp->provinsi->nama_provinsi : '-' }}, {{ ($lp->kabupaten->nama_kabupaten) ? $lp->kabupaten->nama_kabupaten : '-' }}, KODE POS {{ ($lp->kode_pos) ? $lp->kode_pos : '-' }}, {{ ($lp->alamat_lengkap) ? $lp->alamat_lengkap : '-' }}
                                            </td>
                                            <td>{{ $lp->ekspedisi }}</td>
                                            <td>
                                                {{ ($lp->catatan_pembeli) ? $lp->catatan_pembeli : '-' }}
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Transaksi</th>
                                        <th>Kode Invoice</th>
                                        <th>Nama Pembeli</th>
                                        <th>Produk</th>
                                        <th>QTY</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Status Transaksi</th>
                                        <th>Ekspedisi</th>
                                        <th>Alamat Tujuan</th>
                                        <th>Catatan Pembeli</th>
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


@section('script')

    <script>

        $('#tabel-data').DataTable();

        function print() {
            
            var tanggal_awal = $('#tanggal_awal').val();
            var tanggal_akhir = $('#tanggal_akhir').val();

            alert(tanggal_awal tanggal_akhir)

            window.open(`{{ route('laporanPenjualanPrint') }} ? tanggal_awal = ${tanggal_awal} & tanggal_akhir = ${tanggal_akhir}`, '_blank');
        }
    </script>
    
@endsection
