<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\api\APIController;
use App\Models\Faq;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function tabungan(Request $request)
    {
        $api = new APIController();
        $response = $api->tabungan();
        $data_tabungan = $response->data->tabungan;

        return view('homepage.pages.customer.tabungan', compact('data_tabungan'));
    }

    public function mutasi(Request $request, $rekening)
    {
        $api = new APIController();
        $response = $api->mutasi($rekening);
        $data_mutasi = $response;
        
        return view('homepage.pages.customer.tabungan-mutasi', compact('data_mutasi'));
    }

    public function deposito(Request $request)
    {
        $api = new APIController();
        $response = $api->deposito();
        $data_deposito = $response->data->deposito;

        return view('homepage.pages.customer.deposito', compact('data_deposito'));
    }

    public function kredit(Request $request)
    {
        $api = new APIController();
        $response = $api->kredit();
        $data_kredit = $response->data->kredit;

        return view('homepage.pages.customer.kredit', compact('data_kredit'));
    }

    public function jadwal_angsuran(Request $request, $rekening)
    {
        $api = new APIController();
        $response = $api->jadwalAngsuran($rekening);
        $data_jadwal_angsuran = $response;
        
        return view('homepage.pages.customer.kredit-jadwal-angsuran', compact('data_jadwal_angsuran'));
    }

    public function insight(Request $request)
    {
        $api = new APIController();
        $response = $api->insight();
        $data_insight = $response->data;

        return view('homepage.pages.customer.insight', compact('data_insight'));
    }

    public function bantuan(Request $request)
    {
        $data_faq = Faq::get();

        return view('homepage.pages.customer.bantuan', compact('data_faq'));
    }
}
