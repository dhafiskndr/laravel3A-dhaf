<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\product;

use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index() : View
    {
        //coding untuk ambil data dari model yang namanya product
        $products = product::latest()->paginate(10);

        //coding buat ke interface (view)
        return view('products.index', compact('products'));
    }

    public function create() : view
    {
        #coding buat form tambah produk
        return view('products.tambahproduk');
    }

    public function store(Request $request):RedirectResponse
    {
        //membuat variasi form
        $request->validate([
            'txtnama' => 'required',
            'txtdeskripsi' => 'required|min:5',
            'txtstok' => 'required|numeric',
            'txtharga' => 'required|numeric'
        ]);

        //coding simpan data
        product::create([
            'title' => $request->txtnama,
            'description' => $request->txtdeskripsi,
            'price' => $request->txtharga,
            'stock' => $request->txtstok
        ]);

        return redirect()->route('products.index');
    }

    public function edit(string $id) : View
    {
        //coding untuk ambil data ke model berdasarkan id(primary key)
        $products = product::findOrFail($id);
        
        //coding menuju interface sambil membawa data yang didapat berdasarkan id
        return view('products.editproduk', compact('products'));
    }

    public function update (Request $request, $id): RedirectResponse
    {

        $request->validate([
            'txtnama' => 'required',
            'txtdeskripsi' => 'required|min:5',
            'txtstok' => 'required|numeric',
            'txtharga' => 'required|numeric'
        ]);

            //validasi data yng mau diedit atauatau nggk berdasarkan id(primary key)
        $products = product::findOrFail($id);

        //coding simpan data
        $products->update([
            'title' => $request->txtnama,
            'description' => $request->txtdeskripsi,
            'price' => $request->txtharga,
            'stock' => $request->txtstok
        ]);

        return redirect()->route('products.index');
    }

    public function destroy(string $id): RedirectResponse
    {
        $products = product::findOrFail($id);

        $products->delete();

        return redirect()->route('products.index');
    }


}