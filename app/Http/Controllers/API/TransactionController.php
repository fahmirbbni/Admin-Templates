<?php

namespace App\Http\Controllers\API;

use App\Models\Transaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function get(Request $request, $id)
    {
        //menginisiasi variabel produk, kemudian ambil details produk berdasarkan id
        //pada transaction model
        $product = Transaction::with(['details.product'])->find($id);

        //jika produk success maka berikan respon berupa produk beserta pesan
        //jika gagal tampilkan null dan pesan + 404
        if($product)
            return ResponseFormatter::success($product, 'Data transaksi berhasil diambil');
        else
            return ResponseFormatter::error(null, 'Data transaksi tidak ada', 404);
    }
}
