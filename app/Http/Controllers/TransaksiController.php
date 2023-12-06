<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use App\Models\Produk;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    //
    public function index()
    {
        $transaksi = Transaksi::paginate(10);
        return view('data_transaksi.datatransaksi', compact('transaksi'));
    }

    public function create()
    {
        $produk = Produk::all();
       // $transaksi = Transaksi::all();
        return view('data_transaksi.datatransaksi_entry', compact('produk'));
    }
    

    //insert data ke database
    public function store(Request $request)
    {
        // $this->validate($request, [
        //    'kode_transaksi' => 'required',
        //   'id_produk' => 'required',
        //      'metode_pembayaran' => 'required',
        //     'tanggal pengajuan' => 'required',
        //  ]);

        Transaksi::create([
            'kode_transaksi' => $request->kode_transaksi,
            'id_produk' => $request->id_produk,
            'metode_pembayaran' => $request->metode_pembayaran,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
        ]);

        return redirect('/data_transaksi')->with('status', 'Data Transaksi berhasil ditambahkan!');
    }

    //edit  database
    public function edit ($id_transaksi) 
    {
        $transaksi = Transaksi::find($id_transaksi);
        $produk = Produk::all();
        return view('data_transaksi.datatransaksi_edit', compact('transaksi', 'produk'));
    }
   
    public function update(Request $request, $id_transaksi)
    {
        // $this->validate($request, [
        //     'kode_transaksi' => 'required|min:2',
        //     'id_produk' => 'required',
        //     'metode_pembayaran' => 'required',
        //     'tanggal pengajuan' => 'required',
        // ]);
   
        $transaksi = Transaksi::find($id_transaksi);
   
        $transaksi->update([
            'kode_transaksi' => $request->kode_transaksi,
            'id_produk' => $request->id_produk,
            'metode_pembayaran' => $request->metode_pembayaran,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
       ]);
       
        return redirect('/data_transaksi')->with('status', 'Data Transaksi berhasil di edit!');
    }

 //delete  database
public function delete($id_transaksi)
{
    $transaksi = Transaksi::find($id_transaksi);
    return view('data_transaksi.datatransaksi_delete', compact('transaksi'));
}

public function destroy($id_transaksi)
{
    $transaksi = Transaksi::find($id_transaksi);
    $transaksi->delete();
    return redirect('/data_transaksi')->with('status', 'Data Transaksi berhasil di hapus!');
}

}