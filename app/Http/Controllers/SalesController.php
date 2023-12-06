<?php

namespace App\Http\Controllers;
use App\Models\Sales;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sales::all();
        return view('data_sales.datasales', compact('sales'));
    }

    public function create()
    {
        return view('data_sales.datasales_entry');
    } 

    //insert data ke database
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_sales' => 'required|min:2',
            'nama_sales' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
        ]);

        Sales::create([
            'kode_sales' => $request->kode_sales,
            'nama_sales' => $request->nama_sales,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
        ]);

        return redirect('/data_sales')->with('status', 'Data Sales berhasil ditambahkan!');
    }

    //edit  database
    public function edit ($id_sales)
    {
        $sales = Sales::find($id_sales);
        return view('data_sales.datasales_edit', compact('sales'));
    }
   
    public function update(Request $request, $id_sales)
    {
        $this->validate($request, [
            'kode_sales' => 'required|min:2',
            'nama_sales' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
        ]);
   
        $sales = Sales::find($id_sales);
   
        $sales->update([
            'kode_sales' => $request->kode_sales,
            'nama_sales' => $request->nama_sales,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
       ]);
       
        return redirect('/data_sales')->with('status', 'Data sales berhasil di edit!');
    }

 //delete  database
public function delete($id_sales)
{
    $sales = Sales::find($id_sales);
    return view('data_sales.datasales_delete', compact('sales'));
}

public function destroy($id_sales)
{
    $sales = Sales::find($id_sales);
    $sales->delete();
    return redirect('/data_sales')->with('status', 'Data sales berhasil di hapus!');
}

}



