<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\kategoriProduk;
use App\Models\Provinsi;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class KategoriProdukController extends Controller
{
    protected $judul = 'Kategori Produk';
    protected $menu = 'datamaster';
    protected $sub_menu = 'kategori_produk';
    protected $direktori = 'admin.datamaster.kategori_produk';


    public function index()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $data['kategori_produk'] = kategoriProduk::orderBy('created_at', 'DESC')->get();

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

        // return $request->all();

        $nama_kategori_produk = $request->nama_kategori_produk;


        // Pengecekan
        if (empty($nama_kategori_produk)) {

            return back()->with('status', 'error')->with('message', 'Kolom Nama Kategori Produk Harus Diisi');
        }




        // Menyimpan data ke database
        $kategori_produk = new kategoriProduk();
        $kategori_produk->nama_kategori_produk = $nama_kategori_produk;
        $kategori_produk->slug_kategori_produk = Str::slug($nama_kategori_produk);
        $kategori_produk->save();

        if ($kategori_produk) {

            return redirect()->route('kategoriProduk')->with('status', 'success')->with('message', 'Berhasil Menyimpan Data');
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

        $data['kategori_produk'] = kategoriProduk::where('id_kategori_produk', $id)->first();

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

        $data['kategori_produk'] = kategoriProduk::where('id_kategori_produk', $id)->first();

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

        // return $request->all();

        $nama_kategori_produk = $request->nama_kategori_produk;



        // Pengecekan
        if (empty($nama_kategori_produk)) {

            return back()->with('status', 'error')->with('message', 'Kolom Nama Kategori Produk Harus Diisi');
        }


        // Menyimpan data ke database
        $kategori_produk = kategoriProduk::where('id_kategori_produk', $id)->first();
        $kategori_produk->nama_kategori_produk = $nama_kategori_produk;
        $kategori_produk->slug_kategori_produk = Str::slug($nama_kategori_produk);
        $kategori_produk->save();

        if ($kategori_produk) {

            return redirect()->route('kategoriProduk')->with('status', 'success')->with('message', 'Berhasil Mengubah Data');
        } else {

            return back()->route('kategoriProduk')->with('status', 'error')->with('message', 'Gagal Mengubah Data');
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
        $kategori_produk = kategoriProduk::where('id_kategori_produk', $id)->first();

        if (!empty($kategori_produk)) {

            $kategori_produk->delete();

            return redirect()->route('kategoriProduk')->with('status', 'success')->with('message', 'Berhasil Menghapus Data');
        } else {

            return redirect()->route('kategoriProduk')->with('status', 'error')->with('message', 'Gagal Menghapus Data');
        }
    }
}
