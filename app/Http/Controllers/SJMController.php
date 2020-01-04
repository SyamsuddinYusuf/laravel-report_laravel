<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SJM_Header;
use App\MS_Customer;
use App\MS_Kota;
use DB;

class SJMController extends Controller
{
    //
      
    public function index($bulan) {

    $data = SJM_Header::selectRaw("NOMER, BULAN, MS_KOTA.KOTA AS KOTA_TUJUAN, MS_CUSTOMER.NAMA_CUSTOMER, 
    TRANS_SURAT_JALAN_MASUK_HEADER.ATTRIBUTE1 AS SJK_GUDANG, TRANS_SURAT_JALAN_MASUK_HEADER.ATTRIBUTE2 AS SJM_GUDANG, 
    SUPPLIER, CREATE_dATE AS TANGGAL")
    ->leftJoin('MS_KOTA', 'TRANS_SURAT_JALAN_MASUK_HEADER.ID_KOTA_TUJUAN', '=', 'MS_KOTA.ID')
    ->leftJoin('MS_CUSTOMER', 'TRANS_SURAT_JALAN_MASUK_HEADER.ID_CUSTOMER', '=', 'MS_CUSTOMER.ID')
    ->where('TAHUN', '2019')
    ->where('BULAN', $bulan)
    ->get();

        return view('sjm', [
            'data'    => $data,
        ]);
      }

}
