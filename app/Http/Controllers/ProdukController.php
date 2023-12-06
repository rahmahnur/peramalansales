<?php

namespace App\Http\Controllers;
use App\Models\Produk;


use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::paginate(15);
        return view('data_produk.dataproduk', compact('produk'));
    }

    public function create()
    {
        return view('data_produk.dataproduk_entry');
    }

    //insert data ke database
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_produk' => 'required|min:2',
            'nama_produk' => 'required',
            'harga_produk' => 'required',
        ]);

        Produk::create([
            'kode_produk' => $request->kode_produk,
            'nama_produk' => $request->nama_produk,
            'harga_produk' => $request->harga_produk,
        ]);

        return redirect('/data_produk')->with('status', 'Data Produk berhasil ditambahkan!');
    }


 //edit  database
 public function edit ($id_produk)
 {
     $produk = Produk::find($id_produk);
     return view('data_produk.dataproduk_edit', compact('produk'));
 }

 public function update(Request $request, $id_produk)
 {
    $this->validate($request, [
        'kode_produk' => 'required|min:2',
        'nama_produk' => 'required',
        'harga_produk' => 'required',
     ]);

     $produk = Produk::find($id_produk);

     $produk->update([
        'kode_produk' => $request->kode_produk,
        'nama_produk' => $request->nama_produk,
        'harga_produk' => $request->harga_produk,
    ]);
    
     return redirect('/data_produk')->with('status', 'Data produk berhasil di edit!');
 }

//delete  database
public function delete($id_produk)
{
    $produk = Produk::find($id_produk);
    return view('data_produk.dataproduk_delete', compact('produk'));
}

public function destroy($id_produk)
{
    $produk = Produk::find($id_produk);
    $produk->delete();
    return redirect('/data_produk')->with('status', 'Data berhasil di hapus!');
}

public function search (Request $request){
    $keyword = $request->input('cari');
    $produk = Produk::where ('nama_produk', 'like', "%" .$keyword."%")->paginate(5);

    return view('data_produk.dataproduk', compact('produk'));
}


// public function import(Request $request)
// {
//     if ($request->hasFile('file')) {
//         $file = $request->file('file');

//         try {
//             Excel::import(new ProdukImport, $file);

//             return redirect('/data_produk')->with('success', 'Data berhasil diimpor');
//         } catch (\Exception $e) {
//             return redirect('/data_produk')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
//         }
//     }

//     return redirect('/data_produk')->with('error', 'File tidak diberikan');
// }

}



