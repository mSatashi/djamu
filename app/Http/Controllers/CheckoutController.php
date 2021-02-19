<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
	public function get_province(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: 1a854acdf61d345b0003dbe13af16d78"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			//ini kita decode data nya terlebih dahulu
			$response=json_decode($response,true);
			//ini untuk mengambil data provinsi yang ada di dalam rajaongkir resul
			$data_pengirim = $response['rajaongkir']['results'];
			return $data_pengirim;
		}
	}

	public function get_city($id){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  	CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=$id",
		  	CURLOPT_RETURNTRANSFER => true,
		  	CURLOPT_ENCODING => "",
		  	CURLOPT_MAXREDIRS => 10,
		  	CURLOPT_TIMEOUT => 30,
		  	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  	CURLOPT_CUSTOMREQUEST => "GET",
		  	CURLOPT_HTTPHEADER => array(
		    	"key: 1a854acdf61d345b0003dbe13af16d78"
		  	),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  	echo "cURL Error #:" . $err;
		} else {
			$response=json_decode($response,true);
			$data_kota = $response['rajaongkir']['results'];
			return json_encode($data_kota);
		}
	}

	public function get_ongkir($origin, $destination, $weight, $courier){
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=$weight&courier=$courier",
			CURLOPT_HTTPHEADER => array(
			"content-type: application/x-www-form-urlencoded",
			"key: 1a854acdf61d345b0003dbe13af16d78"
		),
		));
		
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		
		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$response=json_decode($response,true);
			$data_ongkir = $response['rajaongkir']['results'];
			return json_encode($data_ongkir);
		}
	}

    public function checkout(){
		//memanggil function get_province
		$provinsi = $this->get_province();
		//mengarah kepada file checkout.blade.php yang ada di view
		return view('checkout', ['provinsi' => $provinsi]);
	}
}
