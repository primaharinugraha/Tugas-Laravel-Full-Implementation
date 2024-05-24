<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function transactionDetail($id)
    {
        // Mengambil transaksi berdasarkan ID dan memastikan pengguna yang login adalah pemilik transaksi
        $transaction = Transaction::where('id', $id)->where('user_id', Auth::id())->with('product', 'user')->firstOrFail();

        // Mengirim data transaksi ke view
        return view('product.transaksi', compact('transaction'));
    }
}
