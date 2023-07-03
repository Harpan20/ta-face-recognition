<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use Exception;

class APIController extends Controller
{
    public $api_middleware_url;
    public $default_curl_options;

    public function __construct()
    {

        $this->api_middleware_url = env('BASE_API_URL', null);

        $this->api_middleware_url_login = $this->api_middleware_url . '/login';
        $this->api_middleware_url_tabungan = $this->api_middleware_url . '/tabungan';
        $this->api_middleware_url_mutasi = $this->api_middleware_url . '/mutasi';
        $this->api_middleware_url_deposito = $this->api_middleware_url . '/deposito';
        $this->api_middleware_url_kredit = $this->api_middleware_url . '/kredit';
        $this->api_middleware_url_jadwal_angsuran = $this->api_middleware_url . '/jadwal-angsuran';
        $this->api_middleware_url_insight = $this->api_middleware_url . '/insight';

        $token = session('token') ?? '';

        $token_header = 'X-Auth-Token:' . $token;

        $this->default_curl_options = [
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type:application/json',
                $token_header
            ],
        ];
    }

    public function login($username, $password)
    {
        $post_params = [
            'login' => $username,
            'password' => $password,
        ];

        $curlOptions = $this->default_curl_options;
        $curlOptions[CURLOPT_POSTFIELDS] = json_encode($post_params);

        $url = $this->api_middleware_url_login;
        $datas = $this->openCurl($url, $curlOptions);

        return json_decode($datas);
    }

    public function tabungan()
    {
        $curlOptions = $this->default_curl_options;
        //$curlOptions[CURLOPT_HTTPHEADER] = json_encode($post_params);

        $url = $this->api_middleware_url_tabungan;
        $datas = $this->openCurl($url, $curlOptions);

        return json_decode($datas);
    }

    public function mutasi($rekening)
    {
        $curlOptions = $this->default_curl_options;
        $post_params = [
            'rekening' => $rekening,
        ];
        $curlOptions[CURLOPT_POSTFIELDS] = json_encode($post_params);

        $url = $this->api_middleware_url_mutasi;
        $datas = $this->openCurl($url, $curlOptions);

        return json_decode($datas);
    }

    public function deposito()
    {
        $curlOptions = $this->default_curl_options;
        //$curlOptions[CURLOPT_HTTPHEADER] = json_encode($post_params);

        $url = $this->api_middleware_url_deposito;
        $datas = $this->openCurl($url, $curlOptions);

        return json_decode($datas);
    }

    public function kredit()
    {
        $curlOptions = $this->default_curl_options;
        //$curlOptions[CURLOPT_HTTPHEADER] = json_encode($post_params);

        $url = $this->api_middleware_url_kredit;
        $datas = $this->openCurl($url, $curlOptions);

        return json_decode($datas);
    }

    public function jadwalAngsuran($rekening)
    {
        $curlOptions = $this->default_curl_options;
        $post_params = [
            'rekening' => $rekening,
        ];
        $curlOptions[CURLOPT_POSTFIELDS] = json_encode($post_params);

        $url = $this->api_middleware_url_jadwal_angsuran;
        $datas = $this->openCurl($url, $curlOptions);

        return json_decode($datas);
    }

    public function insight()
    {
        $curlOptions = $this->default_curl_options;
        //$curlOptions[CURLOPT_HTTPHEADER] = json_encode($post_params);

        $url = $this->api_middleware_url_insight;
        $datas = $this->openCurl($url, $curlOptions);

        return json_decode($datas);
    }

    function openCurl($url, $arrOption = [])
    {
        try {
            $ch = curl_init();

            if (FALSE === $ch) {
                throw new Exception('failed to initialize');
            }

            curl_setopt($ch, CURLOPT_URL, $url);

            foreach ($arrOption as $option => $value) {
                curl_setopt($ch, $option, $value);
            }

            $result     = curl_exec($ch);

            if (FALSE === $result) {
                throw new Exception(curl_error($ch), curl_errno($ch));
            }

            $arrayResult = json_decode($result, true);
            if (isset($arrayResult['status']) && boolval(abs($arrayResult['status'])) === false) {
                if (isset($arrayResult['text'])) {
                    throw new Exception($arrayResult['text']);
                }
            }
        } catch (Exception $e) {
            $result = sprintf('Curl failed with error #%d: %s', $e->getCode(), $e->getMessage());
        }

        curl_close($ch);

        return $result;
    }
}
