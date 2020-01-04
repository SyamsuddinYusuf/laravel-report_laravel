<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MS_Customer;
use DB;

class CustomerController extends Controller
{
    //
    
    public function index() {

        $data =  DB::table('MS_CUSTOMER')
        ->selectRaw("MS_CUSTOMER.KODE, MS_CUSTOMER.NAMA_CUSTOMER, MS_CUSTOMER.ALAMAT, MS_KOTA.KOTA, 
        MS_CUSTOMER.TELP_1 AS TELEPON, MS_CUSTOMER.EMAIL_1 AS EMAIL")
        ->leftJoin('MS_KOTA', 'MS_CUSTOMER.ID_KOTA', '=', 'MS_KOTA.ID')
        ->where('MS_CUSTOMER.AKTIF', '1')
        ->get();

      
        
        return view('customer', [
            'data'    => $data,
        ]);
      }
}
