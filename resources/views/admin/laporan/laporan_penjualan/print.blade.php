@extends('admin.layout.app')

@section('content')
    <table id="tabel-data" class="table table-bordered table-hover tabel-reponsive" id="example2">

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
                            @foreach ($lp->transaksi_detail as $td)
                                <li>
                                    {{ $td->produk->nama_produk }}
                                </li>
                            @endforeach
                        </ol>
                    </td>

                    <td>
                        <ul>
                            @foreach ($lp->transaksi_detail as $td)
                                <li>
                                    {{ $td->qty }}
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td> {{ $lp->tanggal_transaksi }} </td>
                    <td> {{ $lp->status_transaksi }} </td>
                    <td>
                        PROVINSI {{ $lp->provinsi->nama_provinsi ? $lp->provinsi->nama_provinsi : '-' }},
                        {{ $lp->kabupaten->nama_kabupaten ? $lp->kabupaten->nama_kabupaten : '-' }}, KODE POS
                        {{ $lp->kode_pos ? $lp->kode_pos : '-' }},
                        {{ $lp->alamat_lengkap ? $lp->alamat_lengkap : '-' }}
                    </td>
                    <td>{{ $lp->ekspedisi }}</td>
                    <td>
                        {{ $lp->catatan_pembeli ? $lp->catatan_pembeli : '-' }}
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
@endsection


@section('script')
    <script>
        window.print();
        window.onfocus = function() {
            window.close();
        }
    </script>
@endsection
