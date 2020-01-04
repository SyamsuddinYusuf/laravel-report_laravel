<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PL_Header;
use App\PL_Detail;
use App\Ms_Kota;
use App\MS_JADWAL_KAPAL;
use App\MS_CUSTOMER;
use DB;

class Detail_Container_Controller extends Controller
{
    //
    function index()
    {
        $data =  DB::table('TRANS_PACKING_LIST_HEADER')
        ->selectRaw("TRANS_PACKING_LIST_DETAIL.GROUP_PACKING AS CONTAINER, 
        TRANS_PACKING_LIST_HEADER.NOMER_PACKING_LIST, TRANS_PACKING_LIST_HEADER.NOMER_BL, 
        MS_JADWAL_KAPAL.TGL_KEBERANGKATAN, MS_JADWAL_KAPAL.TGL_TIBA, MS_KOTA.KOTA AS TUJUAN, 
        MS_CUSTOMER.NAMA_CUSTOMER, MS_JADWAL_KAPAL.ID")
        ->leftJoin('TRANS_PACKING_LIST_DETAIL', 'TRANS_PACKING_LIST_DETAIL.ID_PACKING_HEADER', '=', 'TRANS_PACKING_LIST_HEADER.ID')
        ->leftJoin('MS_JADWAL_KAPAL', 'TRANS_PACKING_LIST_HEADER.ID_JADWAL_PELAYARAN', '=', 'MS_JADWAL_KAPAL.ID')
        ->leftJoin('MS_KOTA', 'TRANS_PACKING_LIST_HEADER.ID_KOTA_TUJUAN', '=', 'MS_KOTA.ID')
        ->leftJoin('MS_CUSTOMER', 'TRANS_PACKING_LIST_HEADER.ID_CUSTOMER', '=', 'MS_CUSTOMER.ID')
        ->where('TRANS_PACKING_LIST_DETAIL.TAHUN', '=', '2019')
        ->where('TRANS_PACKING_LIST_HEADER.ID_KOTA_TUJUAN', '=', '22')
        ->orderBy('TRANS_PACKING_LIST_DETAIL.BULAN', 'MS_KOTA.KOTA')
        // ->distinct()
        ->get();
        //->paginate(10);
        

        // return $data;
        return view('detail_container', [
            'data'    => $data,
        ]);
    }

    public function detail($id) {

        $data =  DB::table('TRANS_PACKING_LIST_HEADER')
        ->selectRaw("TRANS_PACKING_LIST_DETAIL.GROUP_PACKING AS CONTAINER, 
        TRANS_PACKING_LIST_HEADER.NOMER_PACKING_LIST, TRANS_PACKING_LIST_HEADER.NOMER_BL, 
        MS_JADWAL_KAPAL.TGL_KEBERANGKATAN, MS_JADWAL_KAPAL.TGL_TIBA, MS_KOTA.KOTA AS TUJUAN, 
        MS_CUSTOMER.NAMA_CUSTOMER, MS_JADWAL_KAPAL.ID, TRANS_PACKING_LIST_HEADER.ID AS ID_PL")
        ->leftJoin('TRANS_PACKING_LIST_DETAIL', 'TRANS_PACKING_LIST_DETAIL.ID_PACKING_HEADER', '=', 'TRANS_PACKING_LIST_HEADER.ID')
        ->leftJoin('MS_JADWAL_KAPAL', 'TRANS_PACKING_LIST_HEADER.ID_JADWAL_PELAYARAN', '=', 'MS_JADWAL_KAPAL.ID')
        ->leftJoin('MS_KOTA', 'TRANS_PACKING_LIST_HEADER.ID_KOTA_TUJUAN', '=', 'MS_KOTA.ID')
        ->leftJoin('MS_CUSTOMER', 'TRANS_PACKING_LIST_HEADER.ID_CUSTOMER', '=', 'MS_CUSTOMER.ID')
        ->where('TRANS_PACKING_LIST_DETAIL.TAHUN', '=', '2019')
        ->where('TRANS_PACKING_LIST_HEADER.ID_JADWAL_PELAYARAN', $id)
         ->orderBy('MS_KOTA.KOTA', 'TRANS_PACKING_LIST_DETAIL.GROUP_PACKING',
         'TRANS_PACKING_LIST_HEADER.NOMER_PACKING_LIST', 'TRANS_PACKING_LIST_HEADER.NOMER_BL', 
         'MS_JADWAL_KAPAL.TGL_KEBERANGKATAN', 'MS_JADWAL_KAPAL.TGL_TIBA', 'MS_CUSTOMER.NAMA_CUSTOMER', 
         'MS_JADWAL_KAPAL.ID', 'TRANS_PACKING_LIST_HEADER.ID')
         ->distinct()
        ->get();

      
        
        return view('detail_container', [
            'data'    => $data,
        ]);
      }
  
}
