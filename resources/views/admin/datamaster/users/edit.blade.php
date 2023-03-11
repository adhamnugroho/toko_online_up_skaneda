@extends('admin.layout.app')


{{-- Content --}}

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="ml-3">Form Ubah {{ $judul }}</h1>
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
                        <form method="get" action="{{ route('usersUpdate', $users->id) }}" class="">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap"
                                        name="nama_lengkap" id="nama_lengkap"
                                        value="{{ old('nama_lengkap') ? old('nama_lengkap') : $users->nama_lengkap }}" />
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Username"
                                        name="username" id="username"
                                        value="{{ old('username') ? old('username') : $users->username }}" />
                                </div>
                                <div class="form-group">
                                    <label for="email">Alamat Email</label>
                                    <input type="email" class="form-control" placeholder="Masukkan Alamat Email"
                                        name="email" id="email"
                                        value="{{ old('email') ? old('email') : $users->email }}" />
                                </div>
                                <div class="form-group">
                                    <label for="password">Password <span class="text-danger">*Masukkan Password Jika Ingin Menggantinya</span> </label>
                                    <input type="password" class="form-control"
                                        placeholder="Masukkan Password Jika Ingin Menggantinya" name="password"
                                        id="password" value="{{ old('password') }}" />
                                </div>
                                <div class="form-group">
                                    <label for="no_telp">No Telephone</label>
                                    <input type="text" class="form-control" placeholder="Masukkan No Telp" name="no_telp"
                                        id="no_telp" value="{{ old('no_telp') ? old('no_telp') : $users->no_telp }}" />
                                </div>
                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <select name="provinsi_id" id="provinsi_id" class="form-control"
                                        onchange="getKabupaten()">

                                        <option value="">.:: Pilih Provinsi ::.</option>

                                        @foreach ($provinsi as $key => $prov)
                                            <option value="{{ $prov->id_provinsi }}"
                                                {{ $prov->id_provinsi == $users->provinsi_id ? 'selected' : '' }}>
                                                {{ $prov->nama_provinsi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kabupaten_id">Kabupaten</label>
                                    <select name="kabupaten_id" id="kabupaten_id" class="form-control">

                                        <option value="">.:: Pilih Kabupaten ::.</option>

                                        @foreach ($kabupaten as $key => $kab)
                                            <option value="{{ $kab->id_kabupaten }}"
                                                {{ $kab->id_kabupaten == $users->kabupaten_id ? 'selected' : '' }}>
                                                {{ $kab->nama_kabupaten }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="kode_pos">Kode Pos</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Kode Pos"
                                        name="kode_pos" id="kode_pos"
                                        value="{{ old('kode_pos') ? old('kode_pos') : $users->kode_pos }}" />
                                </div>
                                <div class="form-group">
                                    <label for="alamat_lengkap">Alamat Lengkap</label>
                                    <textarea type="text" class="form-control" placeholder="Masukkan Alamat Lengkap" name="alamat_lengkap"
                                        id="alamat_lengkap" value="" cols="30" row="3">{{ old('alamat_lengkap') ? old('alamat_lengkap') : $users->alamat_lengkap }}</textarea>
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
    <script>
        $(document).ready(() => {

            getKabupaten()
        })

        function getKabupaten() {

            // alert('succes');

            var id_provinsi = $('#provinsi_id').val();

            // alert('succes1');

            if (id_provinsi) {

                // alert('succes2');

                $.post("{{ route('usersGetKabupaten') }}", {
                    id_provinsi: id_provinsi
                }).done((data) => {

                    // alert('succes3');

                    if (data.status == 'succes') {

                        // alert('succes4');

                        var html = `<option value="">.:: Pilih Kabupaten ::.</option>`

                        data.data.array.forEach((v, i) => {
                            html += `<option value="${v.id_kabupaten}"> ${v.nama_kabupaten} </option>`
                        })

                        $('#kabupaten_id').html(html)
                    } else {

                        toastr.error(`${data.message}`)
                    }
                })
            } else {

                toastr.error('Provinsi Tidak Boleh Kosong')
            }
        }
    </script>
@endsection
