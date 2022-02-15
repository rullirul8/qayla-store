<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\TransactionDetail;
use App\User;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $transactions = TransactionDetail::with(['transaction.user', 'product.galleries'])
                                        ->whereHas('product', function($product){
                                        });

        $customer = User::count();

        return view('pages.dashboard',[
            'transaction_data' => $transactions->get(),
            'customer' => $customer,
        ]);
    }
}
