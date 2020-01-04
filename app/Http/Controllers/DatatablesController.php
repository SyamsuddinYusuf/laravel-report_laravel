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

class DatatablesController extends Controller
{
    public function index(Request $request)
    {
 
        // $pl2 = PL_HEADER::selectRaw("BULAN, COUNT('NOMER_PACKING_LIST.*') as JumlahPL")
        //     ->where('TAHUN', '2019')
        //     ->groupBy('BULAN')
        //     ->orderBy('BULAN', 'asc')
        //     ->get();

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

            $pl = PL_HEADER::selectRaw("COUNT('NOMER_PACKING_LIST.*') as TOTALPL, BULAN")
                ->where('TAHUN', '2019')
                ->where('BULAN','10')
                ->groupBy('BULAN')
                ->get();
             
            $customer = MS_CUSTOMER::selectRaw("COUNT('ID.*') AS CUSTOMER")
                ->where('AKTIF', '1')
                ->get();
            
            $kapal = MS_JADWAL_KAPAL::select(DB::raw('tab1.KPL as KAPAL, tab1.BULAN AS BULAN'))
                ->from(DB::raw('(SELECT COUNT(ID) AS KPL, MONTH(TGL_KEBERANGKATAN) AS BULAN
                FROM MS_JADWAL_KAPAL
                WHERE TAHUN = 2019
                AND MONTH(TGL_KEBERANGKATAN) = 10 
                GROUP BY MONTH(TGL_KEBERANGKATAN)) as tab1'))
                ->groupBy('tab1.BULAN', 'tab1.KPL')
                ->get();

            $sjm = SJM_Header::selectRaw("COUNT('NOMER.*') AS SJM, BULAN")
                ->where('TAHUN', '2019')
                ->where('BULAN', '10')
                ->groupBy('BULAN')
                ->get();
            
                
        //return view('welcome',['models'   => $models]);
        $filters = $request->session()->get('filters');

        $models2 = $this->getContainer($request);

        return view('welcome', [
            // 'models'      => $models,
            'models2'    => $models2,
            'filters'    => $filters,
             'pl2'         => $pl2,
             'pl'          => $pl,
             'customer'     => $customer,
             'kapal'    => $kapal,
             'sjm'      => $sjm,
        ]);
    }

    public function getContainer(Request $request)
    {

        $filters = $request->session()->get('filters');

        $models2 = PL_HEADER::select(DB::raw ('tab1.TOTAL as TOTAL_CONTAINER, tab1.ID_JADWAL_PELAYARAN AS ID, 
                                                tab1.KOTA, tab1.NAMA_KAPAL AS KAPAL, tab1.FOI'))
            ->from(DB::raw('(SELECT TRANS_PACKING_LIST_HEADER.ID_JADWAL_PELAYARAN, 
                                COUNT(DISTINCT TRANS_PACKING_LIST_DETAIL.GROUP_PACKING) AS TOTAL,
                                MS_KOTA.KOTA, 
                                MS_JADWAL_KAPAL.NAMA_KAPAL,
                                MS_JADWAL_KAPAL.FOI
                             FROM TRANS_PACKING_LIST_HEADER 
                             LEFT JOIN TRANS_PACKING_LIST_dETAIL 
                             ON TRANS_PACKING_LIST_HEADER.ID = TRANS_PACKING_LIST_dETAIL.ID_PACKING_HEADER
                             LEFT JOIN MS_KOTA 
                             ON TRANS_PACKING_LIST_HEADER.ID_KOTA_TUJUAN = MS_KOTA.ID
                             LEFT JOIN MS_JADWAL_KAPAL
                             ON TRANS_PACKING_LIST_HEADER.ID_JADWAL_PELAYARAN = MS_JADWAL_KAPAL.ID
                             WHERE TRANS_PACKING_LIST_HEADER.TAHUN IN (2019)
                             GROUP BY TRANS_PACKING_LIST_HEADER.ID_JADWAL_PELAYARAN , 
                                MS_KOTA.KOTA,
                                MS_JADWAL_KAPAL.NAMA_KAPAL,
                                MS_JADWAL_KAPAL.FOI
                             ) as tab1'))
            ->groupBy('tab1.ID_JADWAL_PELAYARAN', 'tab1.TOTAL', 'tab1.KOTA', 'tab1.NAMA_KAPAL', 'tab1.FOI')
            ->orderBy('tab1.ID_JADWAL_PELAYARAN', 'DESC')
            ->paginate(10);
         
  
        if (!empty($filters['kota'])) {
            $models2->where('MS.KOTA.KOTA', 'ilike', '%'.$filters['kota'].'%');
        }

        return  $models2;
    }





    //cari per kota
    public function cari(Request $request)
	{

        $pl = PL_HEADER::selectRaw("COUNT('NOMER_PACKING_LIST.*') as TOTALPL, BULAN")
        ->where('TAHUN', '2019')
        ->where('BULAN','10')
        ->groupBy('BULAN')
        ->get();
     
        $customer = MS_CUSTOMER::selectRaw("COUNT('ID.*') AS CUSTOMER")
            ->where('AKTIF', '1')
            ->get();
            
        $kapal = MS_JADWAL_KAPAL::select(DB::raw('tab1.KPL as KAPAL, tab1.BULAN AS BULAN'))
            ->from(DB::raw('(SELECT COUNT(ID) AS KPL, MONTH(TGL_KEBERANGKATAN) AS BULAN
            FROM MS_JADWAL_KAPAL
            WHERE TAHUN = 2019
            AND MONTH(TGL_KEBERANGKATAN) = 10 
            GROUP BY MONTH(TGL_KEBERANGKATAN)) as tab1'))
            ->groupBy('tab1.BULAN', 'tab1.KPL')
            ->get();

        $sjm = SJM_Header::selectRaw("COUNT('NOMER.*') AS SJM, BULAN")
            ->where('TAHUN', '2019')
            ->where('BULAN', '10')
            ->groupBy('BULAN')
            ->get();

        
        $pl2 = PL_HEADER::select(DB::raw ('tab1.JUMLAH as JumlahPL, tab1.BULAN AS BULAN'))
            ->from(DB::raw('(SELECT TRANS_PACKING_LIST_HEADER.BULAN, 
            COUNT(DISTINCT TRANS_PACKING_LIST_DETAIL.GROUP_PACKING) AS JUMLAH
            FROM TRANS_PACKING_LIST_HEADER 
            LEFT JOIN TRANS_PACKING_LIST_dETAIL 
            ON TRANS_PACKING_LIST_HEADER.ID = TRANS_PACKING_LIST_dETAIL.ID_PACKING_HEADER
            WHERE TRANS_PACKING_LIST_HEADER.TAHUN IN (2019)
            GROUP BY TRANS_PACKING_LIST_HEADER.BULAN
            ) as tab1'))
            ->groupBy('tab1.BULAN', 'tab1.JUMLAH')
            ->orderBy('tab1.BULAN', 'ASC')
            ->get();
    
    
        
        // menangkap data pencarian
        
        $filters = $request->session()->get('filters');
        
        $cari = $request->cari;
          

        $models2 = PL_HEADER::select(DB::raw ('tab1.TOTAL as TOTAL_CONTAINER, tab1.ID_JADWAL_PELAYARAN AS ID, 
                                                tab1.KOTA, tab1.NAMA_KAPAL AS KAPAL, tab1.FOI, tab1.BULAN'))
            ->from(DB::raw('(SELECT TRANS_PACKING_LIST_HEADER.ID_JADWAL_PELAYARAN, 
                                COUNT(DISTINCT TRANS_PACKING_LIST_DETAIL.GROUP_PACKING) AS TOTAL,
                                MS_KOTA.KOTA, 
                                MS_JADWAL_KAPAL.NAMA_KAPAL,
                                MS_JADWAL_KAPAL.FOI,
                                TRANS_PACKING_LIST_HEADER.BULAN
                             FROM TRANS_PACKING_LIST_HEADER 
                             LEFT JOIN TRANS_PACKING_LIST_dETAIL 
                             ON TRANS_PACKING_LIST_HEADER.ID = TRANS_PACKING_LIST_dETAIL.ID_PACKING_HEADER
                             LEFT JOIN MS_KOTA 
                             ON TRANS_PACKING_LIST_HEADER.ID_KOTA_TUJUAN = MS_KOTA.ID
                             LEFT JOIN MS_JADWAL_KAPAL
                             ON TRANS_PACKING_LIST_HEADER.ID_JADWAL_PELAYARAN = MS_JADWAL_KAPAL.ID
                             WHERE TRANS_PACKING_LIST_HEADER.TAHUN IN (2019)
                             GROUP BY TRANS_PACKING_LIST_HEADER.ID_JADWAL_PELAYARAN , 
                                MS_KOTA.KOTA,
                                MS_JADWAL_KAPAL.NAMA_KAPAL,
                                MS_JADWAL_KAPAL.FOI,
                                TRANS_PACKING_LIST_HEADER.BULAN
                             ) as tab1'))
                             
            ->where('tab1.KOTA', 'LIKE', "%".$cari."%")
            ->groupBy('tab1.ID_JADWAL_PELAYARAN', 'tab1.TOTAL', 'tab1.KOTA', 'tab1.NAMA_KAPAL', 'tab1.FOI', 'tab1.BULAN')
            ->orderBy('tab1.ID_JADWAL_PELAYARAN', 'DESC')
            ->paginate(10);


        //FILTER
        if (!empty($filters['kota'])) {
            $models2->where('MS_KOTA.KOTA', 'ilike', '%'.$filters['kota'].'%');
        }

        if (!empty($filters['bulan'])) {
            $models2->where('TRANS_PACKING_LIST_HEADER.BULAN', 'ilike', '%'.$filters['bulan'].'%');
        }

 
        // return $models2;
         //return view('welcome',['models2' => $models2]);

         return view('welcome', [
            // 'models'      => $models,
            'models2'    => $models2,
            'filters'    => $filters, 
            'pl2'         => $pl2,
            'pl'        => $pl,
            'sjm'       => $sjm,
            'customer'  => $customer,
            'kapal'     => $kapal,

        ]);
 
    }



     //cari per kota
     public function caribulan(Request $request)
     {
 
         $pl = PL_HEADER::selectRaw("COUNT('NOMER_PACKING_LIST.*') as TOTALPL, BULAN")
         ->where('TAHUN', '2019')
         ->where('BULAN','10')
         ->groupBy('BULAN')
         ->get();
      
         $customer = MS_CUSTOMER::selectRaw("COUNT('ID.*') AS CUSTOMER")
             ->where('AKTIF', '1')
             ->get();
             
         $kapal = MS_JADWAL_KAPAL::select(DB::raw('tab1.KPL as KAPAL, tab1.BULAN AS BULAN'))
             ->from(DB::raw('(SELECT COUNT(ID) AS KPL, MONTH(TGL_KEBERANGKATAN) AS BULAN
             FROM MS_JADWAL_KAPAL
             WHERE TAHUN = 2019
             AND MONTH(TGL_KEBERANGKATAN) = 10 
             GROUP BY MONTH(TGL_KEBERANGKATAN)) as tab1'))
             ->groupBy('tab1.BULAN', 'tab1.KPL')
             ->get();
 
         $sjm = SJM_Header::selectRaw("COUNT('NOMER.*') AS SJM, BULAN")
             ->where('TAHUN', '2019')
             ->where('BULAN', '10')
             ->groupBy('BULAN')
             ->get();
 
         
         $pl2 = PL_HEADER::select(DB::raw ('tab1.JUMLAH as JumlahPL, tab1.BULAN AS BULAN'))
             ->from(DB::raw('(SELECT TRANS_PACKING_LIST_HEADER.BULAN, 
             COUNT(DISTINCT TRANS_PACKING_LIST_DETAIL.GROUP_PACKING) AS JUMLAH
             FROM TRANS_PACKING_LIST_HEADER 
             LEFT JOIN TRANS_PACKING_LIST_dETAIL 
             ON TRANS_PACKING_LIST_HEADER.ID = TRANS_PACKING_LIST_dETAIL.ID_PACKING_HEADER
             WHERE TRANS_PACKING_LIST_HEADER.TAHUN IN (2019)
             GROUP BY TRANS_PACKING_LIST_HEADER.BULAN
             ) as tab1'))
             ->groupBy('tab1.BULAN', 'tab1.JUMLAH')
             ->orderBy('tab1.BULAN', 'ASC')
             ->get();
     
     
         
         // menangkap data pencarian
         
         $filters = $request->session()->get('filters');
         
         $cari = $request->cari;
           
 
         $models2 = PL_HEADER::select(DB::raw ('tab1.TOTAL as TOTAL_CONTAINER, tab1.ID_JADWAL_PELAYARAN AS ID, 
                                                 tab1.KOTA, tab1.NAMA_KAPAL AS KAPAL, tab1.FOI, tab1.BULAN'))
             ->from(DB::raw('(SELECT TRANS_PACKING_LIST_HEADER.ID_JADWAL_PELAYARAN, 
                                 COUNT(DISTINCT TRANS_PACKING_LIST_DETAIL.GROUP_PACKING) AS TOTAL,
                                 MS_KOTA.KOTA, 
                                 MS_JADWAL_KAPAL.NAMA_KAPAL,
                                 MS_JADWAL_KAPAL.FOI,
                                 TRANS_PACKING_LIST_HEADER.BULAN
                              FROM TRANS_PACKING_LIST_HEADER 
                              LEFT JOIN TRANS_PACKING_LIST_dETAIL 
                              ON TRANS_PACKING_LIST_HEADER.ID = TRANS_PACKING_LIST_dETAIL.ID_PACKING_HEADER
                              LEFT JOIN MS_KOTA 
                              ON TRANS_PACKING_LIST_HEADER.ID_KOTA_TUJUAN = MS_KOTA.ID
                              LEFT JOIN MS_JADWAL_KAPAL
                              ON TRANS_PACKING_LIST_HEADER.ID_JADWAL_PELAYARAN = MS_JADWAL_KAPAL.ID
                              WHERE TRANS_PACKING_LIST_HEADER.TAHUN IN (2019)
                              GROUP BY TRANS_PACKING_LIST_HEADER.ID_JADWAL_PELAYARAN , 
                                 MS_KOTA.KOTA,
                                 MS_JADWAL_KAPAL.NAMA_KAPAL,
                                 MS_JADWAL_KAPAL.FOI,
                                 TRANS_PACKING_LIST_HEADER.BULAN
                              ) as tab1'))
                              
             ->where('tab1.BULAN', '=', $cari)
             ->groupBy('tab1.ID_JADWAL_PELAYARAN', 'tab1.TOTAL', 'tab1.KOTA', 'tab1.NAMA_KAPAL', 'tab1.FOI', 'tab1.BULAN')
             ->orderBy('tab1.ID_JADWAL_PELAYARAN', 'DESC')
             ->paginate(10);
 
 
         //FILTER
         if (!empty($filters['kota'])) {
             $models2->where('MS_KOTA.KOTA', 'ilike', '%'.$filters['kota'].'%');
         }
 
         if (!empty($filters['bulan'])) {
             $models2->where('TRANS_PACKING_LIST_HEADER.BULAN', 'ilike', '%'.$filters['bulan'].'%');
         }
 
  
         // return $models2;
          //return view('welcome',['models2' => $models2]);
 
          return view('welcome', [
             // 'models'      => $models,
             'models2'    => $models2,
             'filters'    => $filters, 
             'pl2'         => $pl2,
             'pl'        => $pl,
             'sjm'       => $sjm,
             'customer'  => $customer,
             'kapal'     => $kapal,
 
         ]);
  
     }
 



 
}
