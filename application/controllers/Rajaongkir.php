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

    public function getCitiesByProvince($provinceId)
{
    $data['provinsi'] = $this->modelRajaongkir->get_provinces();
        
        // Mendapatkan data kota berdasarkan ID provinsi user yang tersimpan
        $provinsi_id = $data['user']['id_provinsi']; // Ganti 1 dengan default provinsi jika diperlukan
        $data['kota'] = $this->modelRajaongkir->get_cities($provinsi_id); 
    echo json_encode($cities);
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


    public function layanan()
    {
        $this->load->view('rajaongkir/layanan');
    }

    public function get_layanan()
    {
        $origin = $this->input->post('origin');
        $destination = $this->input->post('destination');
        $weight = $this->input->post('weight');
        $courier = $this->input->post('courier');

        $layanan = $this->modelRajaongkir->get_ongkir($origin, $destination, $weight, $courier);

        if ($layanan) {
            echo json_encode($layanan);
        } else {
            echo json_encode(['error' => 'Gagal mengambil layanan ekspedisi']);
        }
    }



//     public function get_shipping_cost()
// {
//     $origin = $this->input->post('origin');
//     $destination = $this->input->post('destination');
//     $weight = $this->input->post('weight');
//     $courier = $this->input->post('courier');

//     // Panggil model untuk mendapatkan ongkir
//     $shipping_cost_data = $this->modelRajaongkir->get_shipping_cost($origin, $destination, $weight, $courier);

//     if ($shipping_cost_data && isset($shipping_cost_data[0]['costs'][0]['cost'][0])) {
//         // Ambil ongkir dan estimasi dari hasil response API
//         $ongkir = $shipping_cost_data[0]['costs'][0]['cost'][0]['value'];
//         $estimasi = $shipping_cost_data[0]['costs'][0]['cost'][0]['etd'];

//         echo json_encode(array(
//             'status' => 'success',
//             'ongkir' => $ongkir,
//             'estimasi' => $estimasi
//         ));
//     } else {
//         echo json_encode(array(
//             'status' => 'error',
//             'message' => 'Gagal menghitung ongkos kirim'
//         ));
//     }
// }


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