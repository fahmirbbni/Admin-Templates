<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all(Request $request)
    {
        //inisiasi variabel id, limit, name, slug, type, price_from, price_to
        //melakukan request berupa input data dari masing2 field
        $id = $request->input('id');
        $limit = $request->input('limit', 10);
        $name = $request->input('name');
        $slug = $request->input('slug');
        $type = $request->input('type');
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        //jika id sudah di input maka buat variabel baru bernama produk
        //yang di dalamnya mengambil galleries dari model produk berdasarkan id
        if($id) 
        {
            $product = Product::with('galleries')->find($id);
            if($product)
                return ResponseFormatter::success($product, 'Data Product Berhasil Diambil');
            else 
                return ResponseFormatter::error(null, 'Data Product Tidak Ada', 404);   
        }

        //jika slug sudah di input maka buat variabel baru bernama produk
        //yang di dalamnya mengambil galleries dari model produk berdasarkan id
        if($slug) 
        {
            $product = Product::with('galleries')->where('slug', $slug)->first();

            if($product)
                return ResponseFormatter::success($product, 'Data Product Berhasil Diambil');
            else 
                return ResponseFormatter::error(null, 'Data Product Tidak Ada', 404);   
        }

        //variabel produk berisikan table galleries dari model product
        //galleries berisikan foto produk berdasarkan id
        $product = Product::with('galleries');

        if($name)
            $product->where('name', 'like', '%' . $name .'%');
        if($type)
            $product->where('type', 'like', '%' . $type .'%');
        if($price_from)
            $product->where('price', '>=', $price_from);
        if($price_to)
            $product->where('price', '<=', $price_to);
        return ResponseFormatter::success($product->paginate($limit),
            'Data list produk berhasil diambil'
        );
    }
}
