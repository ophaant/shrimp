<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DataController extends Controller
{
    public function getRequest()
    {

//     	$lemari = array( 
//  array('baju', 'celana'),
//  array('laptop', 'komputer'),
//  array('buku', 'pulpen') 

// );
    	
        $client = new \GuzzleHttp\Client();
        $provinsi = $client->get('https://app.jala.tech/api/regions?search&sort=id|province_name&scope=province&per_page=35');
        $response = json_decode($provinsi->getBody()->getContents());
        $array = array_column($response->data, 'province_name');
        $array2 = array_column($response->data, 'province_id');
        
         $client2 = new \GuzzleHttp\Client();
        $request2 = $client2->get('https://app.jala.tech/api/shrimp_prices?search&with=creator,species,region&sort=date,desc&per_page=5');
        $response2 = json_decode($request2->getBody()->getContents());
        // dd($response2);
        // var_dump($aa);
        
    	
        return view('welcome', ['array'=>$array, 'array2'=>$array2, 'response'=>$response, 'response2'=>$response2]);
    }

    public function getRegency(Request $request)
    {
    	
    	$params = $request->country_id;
      
 	$client3 = new \GuzzleHttp\Client(['base_uri' => 'https://app.jala.tech/api/']);
        $request3 = $client3->request('GET','regions?sort=&scope=regency&per_page=600&search='.$params);
        $response3 = json_decode($request3->getBody()->getContents());
   		
    		return response()->json($response3);
    	
    	
    }

    public function detail($parameter)
    {
    	$ids = Crypt::decrypt($parameter);
    	
    	$client4 = new \GuzzleHttp\Client();
        $request4 = $client4->get('https://app.jala.tech/api/shrimp_prices/'.$ids['id']);
        $harga = json_decode($request4->getBody()->getContents());

        $client3 = new \GuzzleHttp\Client(['base_uri' => 'https://app.jala.tech/api/']);
        $request3 = $client3->request('GET','regions?sort=&scope=regency&per_page=600&search='.$ids['provinsi']);
        $provinsi = json_decode($request3->getBody()->getContents());

        
        

        return view ('/detailharga', ['harga'=>$harga->data, 'provinsi'=>$provinsi, 'data'=>$ids]);
    }

    public function getShow(Request $request)
    {
    	
    	$params = $request->country_id;
      
 	$client3 = new \GuzzleHttp\Client(['base_uri' => 'https://app.jala.tech/api/']);
        $request3 = $client3->request('GET','shrimp_prices?with=creator,species,region&sort=date,desc&per_page=500&search='.$params);
        $response2 = json_decode($request3->getBody()->getContents());
   		


    		// $view = view('welcome', compact('response2'))->render();
    	
    	return response()->json($response2);
    }
}
