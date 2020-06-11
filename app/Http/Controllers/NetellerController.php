<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class NetellerController extends Controller
{
    
    public $client;
    
    public function __construct() {
        $this->client = new Client();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('home');
    }

    public function depositWebhook(Request $request) {
        $data = $request->all();
        file_put_contents('a.txt', json_encode($data));
        try {
            $response = $this->client->post('https://stagingpayment.dimabet.com/api/payment/paysafe/webhook', [RequestOptions::JSON => $request->all()]);        
        } catch (\Exception $e) {
            file_put_contents('a.txt', $e->getMessage());
            throw $e;
        };        
    }
}
