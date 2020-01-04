<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MS_JADWAL_KAPAL;
use App\MS_Pelayaran;
use App\MS_Kota;
use DB;

class KapalController extends Controller
{
    //
        
    public function index() {

        // $data = MS_JADWAL_KAPAL::selectRaw("MS_PELAYARAN.NAMA_PELAYARAN, NAMA_KAPAL, FOI, MK1.KOTA AS KOTA_ASAL, 
        // MK2.KOTA AS KOTA_TUJUAN, TGL_KEBERANGKATAN AS ETD, TGL_TIBA AS ETA")
        // ->leftJoin('MS_KOTA AS MK1', 'MS_JADWAL_KAPAL.ID_KOTA_ASAL', '=', 'MK1.ID')
        // ->leftJoin('MS_KOTA AS MK2', 'MS_JADWAL_KAPAL.ID_KOTA_TUJUAN', '=', 'MK2.ID')
        // ->leftJoin('MS_PELAYARAN', 'MS_JADWAL_KAPAL.ID_PELAYARAN', '=', 'MS_PELAYARAN.ID')
        // ->where('TAHUN', '2019')
        // ->where('MONTH(TGL_KEBERANGKATAN)', '10')
        // ->get();

        $data = MS_JADWAL_KAPAL::select(DB::raw ('tab1.NAMA_PELAYARAN, tab1.NAMA_KAPAL, tab1.FOI, tab1.KOTA_ASAL, 
                    tab1.KOTA_TUJUAN, tab1.ETD, tab1.ETA'))
                ->from(DB::raw('(SELECT MS_PELAYARAN.NAMA_PELAYARAN, MS_JADWAL_KAPAL.NAMA_KAPAL, 
                        MS_JADWAL_KAPAL.FOI, MK1.KOTA AS KOTA_ASAL, MK2.KOTA AS KOTA_TUJUAN, 
                        MS_JADWAL_KAPAL.TGL_KEBERANGKATAN AS ETD, MS_JADWAL_KAPAL.TGL_TIBA AS ETA
                    FROM MS_JADWAL_KAPAL 
                    LEFT JOIN MS_PELAYARAN 
                    ON MS_JADWAL_KAPAL.ID_PELAYARAN = MS_PELAYARAN.ID
                    LEFT JOIN MS_KOTA AS MK1
                    ON MS_JADWAL_KAPAL.ID_KOTA_ASAL = MK1.ID
                    LEFT JOIN MS_KOTA MK2
                    ON MS_JADWAL_KAPAL.ID_KOTA_TUJUAN = MK2.ID
                    WHERE MS_JADWAL_KAPAL.TAHUN IN (2019)
                    AND MONTH(MS_JADWAL_KAPAL.TGL_KEBERANGKATAN) = 10
                    ) as tab1'))
                ->get();
    
            return view('kapal', [
                'data'    => $data,
            ]);
          }
    
}
