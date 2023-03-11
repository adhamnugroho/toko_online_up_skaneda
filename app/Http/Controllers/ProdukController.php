<?php

namespace App\Http\Controllers;

use App\Models\kategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;
use App\Http\Controllers\ProdukController\fileName;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    protected $judul = 'Produk';
    protected $menu = 'datamaster';
    protected $sub_menu = 'produk';
    protected $direktori = 'admin.datamaster.produk';


    public function index()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $data['produk'] = Produk::with(['kategori_produk'])->orderBy('created_at', 'DESC')->get();

        return view($this->direktori . ".main", $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;

        $data['kategori_produk'] = kategoriProduk::all();

        return view($this->direktori . ".add", $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        // return $request->foto_produk;


        $nama_produk = $request->nama_produk;
        $id_kategori_produk = $request->id_kategori_produk;
        $stok_produk = $request->stok_produk;
        $berat_produk = $request->berat_produk;
        $harga_produk = $request->harga_produk;
        $deskripsi_produk = $request->deskripsi_produk;
        $foto_produk = $request->foto_produk;


        // Pengecekan
        if (empty($nama_produk)) {

            return back()->with('status', 'error')->with('message', 'Kolom Nama Produk Harus Diisi');
        }

        if (empty($id_kategori_produk)) {

            return back()->with('status', 'error')->with('message', 'Kolom Kategori Produk Harus Diisi');
        }

        if (empty($stok_produk)) {

            return back()->with('status', 'error')->with('message', 'Kolom Stok Produk Harus Diisi');
        }

        if (empty($berat_produk)) {

            return back()->with('status', 'error')->with('message', 'Kolom Berat Produk Harus Diisi');
        }

        if (empty($harga_produk)) {

            return back()->with('status', 'error')->with('message', 'Kolom Harga Produk Harus Diisi');
        }

        if (empty($foto_produk)) {

            return back()->with('status', 'error')->with('message', 'Kolom Foto Produk Harus Diisi');
        }


        // Menyimpan data ke database
        $produk = new Produk();
        $produk->nama_produk = $nama_produk;
        $produk->slug_produk = Str::slug($nama_produk);
        $produk->kategori_produk_id = $id_kategori_produk;
        $produk->stok_produk = $stok_produk;
        $produk->berat_produk = $berat_produk;
        $produk->harga_produk = $harga_produk;
        $produk->deskripsi_produk = $deskripsi_produk;

        // memindahkan foto
        $nama_foto = str_replace([' ', '/'], '-', $nama_produk);
        $ext_foto = $foto_produk->getClientOriginalName(); // untuk mengambil nama file beserta ekstension
        $ext_foto1 = $foto_produk->getClientOriginalExtension(); // untuk mengambil ekstensi file saja
        // $filename_save = $foto_produk; // ini untuk alternatif
        $filename =  $ext_foto;
        $temp_foto = 'template-admin/img/produk/';
        $proses = $foto_produk->move($temp_foto,  $filename);

        $produk->foto_produk = $filename;
        $produk->save();

        if ($produk) {

            return redirect()->route('produk')->with('status', 'success')->with('message', 'Berhasil Menyimpan Data');
        } else {

            return back()->withInput()->with('status', 'error')->with('message', 'Gagal Menyimpan Data');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;

        $data['kategori_produk'] = kategoriProduk::all();

        $data['produk'] = Produk::where('id_produk', $id)->first();

        return view($this->direktori . ".show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;

        $data['kategori_produk'] = kategoriProduk::all();
        $data['produk'] = Produk::where('id_produk', $id)->first();

        return view($this->direktori . ".edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // if(is_string($request->foto_produk)) {

        //     return var_dump($request->foto_produk);
        // }

        $nama_produk = $request->nama_produk;
        $id_kategori_produk = $request->id_kategori_produk;
        $stok_produk = $request->stok_produk;
        $berat_produk = $request->berat_produk;
        $harga_produk = $request->harga_produk;
        $deskripsi_produk = $request->deskripsi_produk;
        $foto_produk = $request->foto_produk;


        // Pengecekan
        if (empty($nama_produk)) {

            return back()->with('status', 'error')->with('message', 'Kolom Nama Produk Harus Diisi');
        }

        if (empty($id_kategori_produk)) {

            return back()->with('status', 'error')->with('message', 'Kolom Kategori Produk Harus Diisi');
        }

        if (empty($stok_produk)) {

            return back()->with('status', 'error')->with('message', 'Kolom Stok Produk Harus Diisi');
        }

        if (empty($berat_produk)) {

            return back()->with('status', 'error')->with('message', 'Kolom Berat Produk Harus Diisi');
        }

        if (empty($harga_produk)) {

            return back()->with('status', 'error')->with('message', 'Kolom Harga Produk Harus Diisi');
        }



        // Menyimpan data ke database
        $produk = Produk::where('id_produk', $id)->first();
        $produk->nama_produk = $nama_produk;
        $produk->slug_produk = Str::slug($nama_produk);
        $produk->kategori_produk_id = $id_kategori_produk;
        $produk->stok_produk = $stok_produk;
        $produk->berat_produk = $berat_produk;
        $produk->harga_produk = $harga_produk;
        $produk->deskripsi_produk = $deskripsi_produk;


        // Foto
        if (isset($foto_produk)) {

            // Jika isi dari $foto_produk tidak kosong
            if (!empty($foto_produk) && $foto_produk != '0') {

                // Jika id produk ada dalam database
                if (!empty($produk) && $produk->foto_produk != '') {

                    $path = "template-admin/img/produk/" . $produk->foto_produk;

                    // Jika file sudah ada di direktori
                    if (file_exists($path)) {

                        unlink($path); //Menghapus image di direktory
                    }


                    // memindahkan foto
                    $foto_produk_hilang_quotes = str_replace('"', '',  $foto_produk);
                    $filename = $foto_produk;
                    $temp_foto = "template-admin/img/produk/" . $foto_produk;

                    $asal_foto = "template-admin/dist/img/produk/$foto_produk_hilang_quotes";
                    $proses = File::copy($asal_foto, $temp_foto);

                    $produk->foto_produk = $filename;
                }
            }
        }


        $produk->save();


        if ($produk) {

            return redirect()->route('produk')->with('status', 'success')->with('message', 'Berhasil Mengubah Data');
        } else {

            return back()->withInput()->with('status', 'error')->with('message', 'Gagal Mengubah Data');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::where('id_produk', $id)->first();

        if (!empty($produk)) {

            $produk->delete();

            return redirect()->route('produk')->with('status', 'success')->with('message', 'Berhasil Menghapus Data');
        } else {

            return redirect()->route('produk')->with('status', 'error')->with('message', 'Gagal Menghapus Data');
        }
    }
}
