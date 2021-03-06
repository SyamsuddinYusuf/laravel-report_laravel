<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PL_Header;
use App\PL_Detail;
use App\Ms_Kota;
use App\MS_JADWAL_KAPAL;
use App\MS_CUSTOMER;
use App\SJM_Header;
use DB;
use Charts;

class SliderController extends Controller
{
    public function index(Request $request)
    {
 

            $pl2 = PL_HEADER::select(DB::raw ('tab1.JUMLAH as JumlahPL, tab1.BULAN AS BULAN'))
                ->from(DB::raw('( SELECT TRANS_PACKING_LIST_HEADER.BULAN AS BLN,
                (Select DateName( month , DateAdd( month , TRANS_PACKING_LIST_HEADER.BULAN , -1 ) )) AS BULAN,
                COUNT(DISTINCT TRANS_PACKING_LIST_DETAIL.GROUP_PACKING) AS JUMLAH
                FROM TRANS_PACKING_LIST_HEADER 
                LEFT JOIN TRANS_PACKING_LIST_dETAIL 
                ON TRANS_PACKING_LIST_HEADER.ID = TRANS_PACKING_LIST_dETAIL.ID_PACKING_HEADER
                WHERE TRANS_PACKING_LIST_HEADER.TAHUN IN (2019)
                GROUP BY TRANS_PACKING_LIST_HEADER.BULAN
                ) as tab1'))
                ->groupBy('tab1.BULAN', 'tab1.JUMLAH', 'tab1.BLN')
                ->orderByRaw('tab1.BLN', 'DESC')
                ->get();

        return view('slider', [
             'pl2'         => $pl2,
             'PL3' => response()->json($pl2),
        ]);

        // return response()->json($pl2);
    }



 
}
