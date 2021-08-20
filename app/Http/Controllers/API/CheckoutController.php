<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CheckoutRequest;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class CheckoutController extends Controller
{
    public function checkout(CheckoutRequest $request)
    {
        //variabel data melakukan request semua data kecuali transaction detail
        //kemudian data berdasarkan uuid mendapatkan random number generator
        $data = $request->except('transaction_details');
        $data['uuid'] = 'TRX' . mt_rand(10000,99999) . mt_rand(100,999);

        //variabel transaction membuat data
        $transaction = Transaction::create($data);

        //melakukan request berupa transaction_detail yang bisa disebut sebagai product
        foreach ($request->transaction_details as $product)
        {
            //variabel details berisikan transactions_id dan products_id
            $details[] = new TransactionDetail([
                'transactions_id' => $transaction->id,
                'products_id' => $product,
            ]);

            //temukan variabel product, kemudian lakukan pengurangan kuantitas
            Product::find($product)->decrement('quantity');
        }

        //
        $transaction->details()->saveMany($details);
        return ResponseFormatter::success($transaction);

    }
}
