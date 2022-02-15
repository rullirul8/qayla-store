<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\TransactionDetail;
use App\User;

class DashboardTransactionController extends Controller
{
    public function index()
    {
        $transactions = TransactionDetail::with(['transaction.user', 'product.galleries'])
                                        ->whereHas('product', function($product){
                                        });

        $customer = User::count();

        return view('pages.admin.transaction.admin-transactions',[
            'transaction_data' => $transactions->get(),
            'customer' => $customer,
        ]);
    }
    
    public function details()
    {
        return view('pages.admin.transaction.admin-transactions-details');
    }
}
