<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::with(['category'])->orderBy('created_at', 'DESC');
        if (request()->q != '') {
            $product = $product->where('name', 'LIKE', '%' . request()->q . '%');
        }
        $product = $product->paginate(10);
        return view('products.index', compact('product'));
    }

    public function create()
    {
        $category = Category::orderBy('name', 'DESC')->get();
        return view('products.create', compact('category'));
    }

    public function store(Request $request)
    {
        //VALIDASI REQUESTNYA
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'ilmiah' => 'required|string|max:100',
            'takson' => 'required|string|max:100',
            'ordo' => 'required|string|max:100',
            'category_id' => 'required|exists:categories,id', 
            'price' => 'required|integer',
            'image' => 'required|image|mimes:png,jpeg,jpg'
        ]);

        if ($request->hasFile('image')) {           
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/products', $filename);
            $product = Product::create([
                'name' => $request->name,
                'ilmiah' => $request->ilmiah,
                'slug' => $request->name,
                'category_id' => $request->category_id,
                'ordo' => $request->ordo,
                'takson' => $request->takson,
                'image' => $filename,
                'price' => $request->price,
                'status' => $request->status
            ]);
            return redirect(route('product.index'))->with(['success' => 'Produk Baru Ditambahkan']);
        }
    }

    public function edit($id)
    {
        $product = Product::find($id); 
        $category = Category::orderBy('name', 'DESC')->get();
        return view('products.edit', compact('product', 'category'));
    }

    public function update(Request $request, $id)
    {
        //VALIDASI DATA YANG DIKIRIM
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'ilmiah' => 'required|string|max:100',
            'takson' => 'required|string|max:100',
            'ordo' => 'required|string|max:100',
            'category_id' => 'required|exists:categories,id', 
            'price' => 'required|integer',
            'image' => 'nullable|image|mimes:png,jpeg,jpg' //IMAGE BISA NULLABLE
        ]);

        $product = Product::find($id); //AMBIL DATA PRODUK YANG AKAN DIEDIT BERDASARKAN ID
        $filename = $product->image; //SIMPAN SEMENTARA NAMA FILE IMAGE SAAT INI
    
        //JIKA ADA FILE GAMBAR YANG DIKIRIM
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            //MAKA UPLOAD FILE TERSEBUT
            $file->storeAs('public/products', $filename);
            //DAN HAPUS FILE GAMBAR YANG LAMA
            File::delete(storage_path('app/public/products/' . $product->image));
        }

    //KEMUDIAN UPDATE PRODUK TERSEBUT
        $product->update([
            'name' => $request->name,
            'ilmiah' => $request->ilmiah,
            'slug' => $request->name,
            'category_id' => $request->category_id,
            'ordo' => $request->ordo,
            'takson' => $request->takson,
            'image' => $filename,
            'price' => $request->price,
            'status' => $request->status
        ]);
        return redirect(route('product.index'))->with(['success' => 'Data Produk Diperbaharui']);
    }

    public function destroy($id)
    {
        $product = Product::find($id); 
        File::delete(storage_path('app/public/products/' . $product->image));
        $product->delete();
        return redirect(route('product.index'))->with(['success' => 'Produk Sudah Dihapus']);
    }
}
