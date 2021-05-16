<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MidtransController extends Controller
{
    private function midtransInit()
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-UzcGTvEaajGCpfrg26sK5Ize';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
    }
    

    public function getTokenGet(Request $request)
    {
        $this->midtransInit();
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => (integer) $request->price,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ),   
        );
        return \Midtrans\Snap::getSnapToken($params);
    }
    

    // public function getSnapToken(Request $request)
    // {
    //     $this->midtransInit();
    //     $params = array(
    //         'transaction_details' => array(
    //             'order_id' => rand(),
    //             'gross_amount' => (integer) $request->price,
    //         ),
    //         'customer_details' => array(
    //             'first_name' => $request->name,
    //             'email' => $request->email,
    //         ),   
    //     );
    //     return \Midtrans\Snap::getSnapToken($params);
    // }

    public function getSnapToken()
    {
        $this->midtransInit();
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 100000,
            ),
            'customer_details' => array(
                'first_name' => "nisa",
                // 'last_'
                'email' => "nisa@gmail.com",
            ),   
        );
        return \Midtrans\Snap::getSnapToken($params);
    }

    public function bayar(){
        return view('welcome');
    }
    

    public function getSnapToken2($params)
    {
        $this->midtransInit();
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            ),
            'customer_details' => array(
                'first_name' => 'Dian',
                'last_name' => 'Sulistyarini',
                'email' => 'dian.pra@example.com',
                'phone' => '08111222333',
            ),
        );

        return \Midtrans\Snap::getSnapToken($params);
    }
   
}
