<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rajaongkir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Rajaongkir_model'); // Load model
    }

    // Method untuk mengecek koneksi ke API
    public function index()
    {
        $this->load->view('rajaongkir/cek_ongkir');
    }

    public function get_provinces()
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
            "key: 16664da495b4b55d8f7356411176588a"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
        log_message('error', "cURL Error #: " . $err);
        echo json_encode(array(
            'status' => 'error',
            'message' => "cURL Error #: " . $err
        ));
    } else {
        $array_response = json_decode($response, true);
        if (isset($array_response['rajaongkir']['results'])) {
            echo json_encode(array(
                'status' => 'success',
                'data' => $array_response['rajaongkir']['results']
            ));
        } else {
            log_message('error', "Response tidak valid: " . $response);
            echo json_encode(array(
                'status' => 'error',
                'message' => "Response tidak valid"
            ));
        }
    }
}


    public function get_cities($province_id)
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=" . $province_id,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
            "key: 16664da495b4b55d8f7356411176588a"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
        log_message('error', "cURL Error #: " . $err);
        echo json_encode(array(
            'status' => 'error',
            'message' => "cURL Error #: " . $err
        ));
    } else {
        $array_response = json_decode($response, true);
        if (isset($array_response['rajaongkir']['results'])) {
            echo json_encode(array(
                'status' => 'success',
                'data' => $array_response['rajaongkir']['results']
            ));
        } else {
            log_message('error', "Response tidak valid: " . $response);
            echo json_encode(array(
                'status' => 'error',
                'message' => "Response tidak valid"
            ));
        }
    }
}


    public function get_shipping_cost()
{
    $origin = $this->input->post('origin'); // ID kota asal
    $destination = $this->input->post('destination'); // ID kota tujuan
    $weight = $this->input->post('weight'); // Berat barang dalam gram
    $courier = $this->input->post('courier'); // Nama ekspedisi

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query(array(
            'origin' => $origin,
            'destination' => $destination,
            'weight' => $weight,
            'courier' => $courier
        )),
        CURLOPT_HTTPHEADER => array(
            "key: 16664da495b4b55d8f7356411176588a"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
        log_message('error', "cURL Error #: " . $err);
        echo json_encode(array(
            'status' => 'error',
            'message' => "cURL Error #: " . $err
        ));
    } else {
        $array_response = json_decode($response, true);
        if (isset($array_response['rajaongkir']['results'])) {
            echo json_encode(array(
                'status' => 'success',
                'data' => $array_response['rajaongkir']['results']
            ));
        } else {
            log_message('error', "Response tidak valid: " . $response);
            echo json_encode(array(
                'status' => 'error',
                'message' => "Response tidak valid"
            ));
        }
    }
}

}