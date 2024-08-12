<?php

namespace App\Http\Controllers\Dashboard\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout($clientId){
        $client=Client::find($clientId);
        return view('Dashboard.order.checkout',compact('client'));
    }
}
