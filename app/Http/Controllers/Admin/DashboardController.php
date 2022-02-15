<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\TransactionDetail;
use App\User;
use App\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $customer = User::count();
        $revenue = Transaction::sum('total_price');
        $transaction = Transaction::count();
        $transactions = TransactionDetail::with(['transaction.user', 'product.galleries'])
                                        ->whereHas('product', function($product){
                                        });

        $customer = User::count();

        return view('pages.admin.dashboard', [
            'customer' => $customer,
            'revenue' => $revenue,
            'transaction' => $transaction,
            'transaction_data' => $transactions->get(),
            'customer' => $customer
        ]);

    }
    
}
