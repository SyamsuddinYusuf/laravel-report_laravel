<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PL_Header;
use App\PL_Detail;
use App\Ms_Kota;
use App\MS_JADWAL_KAPAL;
use App\MS_CUSTOMER;
use DB;

class PLController extends Controller
{
    //
    
    public function index($id) {

        $data =  DB::table('TRANS_PACKING_LIST_HEADER')
        ->selectRaw(" TRANS_PACKING_LIST_HEADER.NOMER_PACKING_LIST, MS_CUSTOMER.NAMA_CUSTOMER, TRANS_PACKING_LIST_HEADER.ID, 
        TRANS_PACKING_LIST_DETAIL.SJM_NOMER, TRANS_PACKING_LIST_DETAIL.ITEM, TRANS_PACKING_LIST_DETAIL.QTY_KIRIM, 
        TRANS_PACKING_LIST_HEADER.ID AS ID_PL, TRANS_PACKING_LIST_HEADER.CREATE_dATE")
        ->leftJoin('TRANS_PACKING_LIST_DETAIL', 'TRANS_PACKING_LIST_DETAIL.ID_PACKING_HEADER', '=', 'TRANS_PACKING_LIST_HEADER.ID')
        ->leftJoin('MS_CUSTOMER', 'TRANS_PACKING_LIST_HEADER.ID_CUSTOMER', '=', 'MS_CUSTOMER.ID')
        ->where('TRANS_PACKING_LIST_DETAIL.TAHUN', '=', '2019')
        ->where('TRANS_PACKING_LIST_HEADER.ID', $id)
         ->orderBy('TRANS_PACKING_LIST_HEADER.NOMER_PACKING_LIST', 'MS_CUSTOMER.NAMA_CUSTOMER', 'TRANS_PACKING_LIST_HEADER.ID', 
         'TRANS_PACKING_LIST_DETAIL.SJM_NOMER', 'TRANS_PACKING_LIST_DETAIL.ITEM', 'TRANS_PACKING_LIST_DETAIL.QTY_KIRIM', 
         'TRANS_PACKING_LIST_HEADER.ID', 'TRANS_PACKING_LIST_HEADER.CREATE_dATE')
         ->distinct()
        ->get();

      
        
        return view('pl', [
            'data'    => $data,
        ]);
      }

}
