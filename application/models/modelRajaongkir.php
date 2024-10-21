<?php
defined('BASEPATH') or exit('No direct script access allowed');

class modelRajaongkir extends CI_Model
{
    private $api_key = '16664da495b4b55d8f7356411176588a'; // Masukkan API Key Anda

    // Method untuk mengambil daftar provinsi
    public function get_provinces()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
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
                return $array_response['rajaongkir']['results'];
            } else {
                log_message('error', "Response tidak valid: " . $response);
                return false;
            }
        }
    }

    // Method untuk mengambil daftar kota berdasarkan ID provinsi
    public function get_cities($province_id)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=" . $province_id,
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
                return $array_response['rajaongkir']['results'];
            } else {
                log_message('error', "Response tidak valid: " . $response);
                return false;
            }
        }
    }

    // Method untuk menghitung ongkos kirim berdasarkan asal, tujuan, berat, dan kurir
    public function get_shipping_cost($origin, $destination, $weight, $courier)
    {
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
                return $array_response['rajaongkir']['results'];
            } else {
                log_message('error', "Response tidak valid: " . $response);
                return false;
            }
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

// Fungsi untuk mendapatkan semua kota
    public function get_all_cities() {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: " . $this->api_key
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return array(
                'status' => 'error',
                'message' => "cURL Error #:" . $err
            );
        } else {
            $result = json_decode($response, true);
            if ($result['rajaongkir']['status']['code'] == 200) {
                return array(
                    'status' => 'success',
                    'data' => $result['rajaongkir']['results']
                );
            } else {
                return array(
                    'status' => 'error',
                    'message' => $result['rajaongkir']['status']['description']
                );
            }
        }
    }
}