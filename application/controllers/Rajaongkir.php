<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rajaongkir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('modelRajaongkir'); // Load model
    }

    public function index()
    {
        $this->load->view('rajaongkir/cek_ongkir');
    }

    // Method untuk mendapatkan daftar provinsi
    public function get_provinces()
    {
        $provinces = $this->modelRajaongkir->get_provinces();
        if ($provinces) {
            echo json_encode(array(
                'status' => 'success',
                'data' => $provinces
            ));
        } else {
            echo json_encode(array(
                'status' => 'error',
                'message' => 'Gagal mengambil data provinsi'
            ));
        }
    }

    // Method untuk mendapatkan daftar kota berdasarkan ID provinsi
    public function get_cities($province_id)
    {
        $cities = $this->modelRajaongkir->get_cities($province_id);
        if ($cities) {
            echo json_encode(array(
                'status' => 'success',
                'data' => $cities
            ));
        } else {
            echo json_encode(array(
                'status' => 'error',
                'message' => 'Gagal mengambil data kota'
            ));
        }
    }

    // Method untuk menghitung ongkos kirim
    public function get_shipping_cost()
    {
        $origin = $this->input->post('origin');
        $destination = $this->input->post('destination');
        $weight = $this->input->post('weight');
        $courier = $this->input->post('courier');

        $shipping_cost = $this->modelRajaongkir->get_shipping_cost($origin, $destination, $weight, $courier);
        if ($shipping_cost) {
            echo json_encode(array(
                'status' => 'success',
                'data' => $shipping_cost
            ));
        } else {
            echo json_encode(array(
                'status' => 'error',
                'message' => 'Gagal menghitung ongkos kirim'
            ));
        }
    }

    public function get_cities_by_keyword($keyword)
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
            "key: " . $this->api_key
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
        log_message('error', "cURL Error #: " . $err);
        return false;
    } else {
        $array_response = json_decode($response, true);
        if (isset($array_response['rajaongkir']['results'])) {
            $results = $array_response['rajaongkir']['results'];
            $filtered_cities = array_filter($results, function ($city) use ($keyword) {
                return stripos($city['city_name'], $keyword) !== false;
            });
            return array_values($filtered_cities); // Mengembalikan hasil yang cocok
        } else {
            log_message('error', "Response tidak valid: " . $response);
            return false;
        }
    }
}

// Method untuk menampilkan kota ke dalam view
    public function tampil_kota() {
        // Mengambil data kota dari model
        $cities = $this->modelRajaongkir->get_all_cities();

        // Jika berhasil mendapatkan data kota
        if ($cities['status'] == 'success') {
            $data['cities'] = $cities['data']; // Data kota yang akan dikirim ke view
        } else {
            $data['error_message'] = $cities['message']; // Mengirim pesan error jika terjadi kegagalan
        }

        // Load view dan kirimkan data kota ke view
        $this->load->view('rajaongkir/kota', $data);
    }
}