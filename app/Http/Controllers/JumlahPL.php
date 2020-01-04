<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Container;
use App\Container2;

class JumlahPL extends Controller
{
    //
    public function index()
    {
        // $pl = Container::select('NOMER_PACKING_LIST', 'TAHUN', 'BULAN')
        // ->where ('TAHUN', '2019')->where ('BULAN', '10')->paginate(10);
        // $now = Container::now()->format('d');
        // $month = Container::now()->addMonth(1)->format('m');

        $pl = Container::selectRaw("BULAN, COUNT('NOMER_PACKING_LIST.*') as JumlahPL")
        ->where('TAHUN', '2019')//->where(Container::raw(MONTH('CREATE_DATE')), $month) 
        //whereDate('CREATE_DATE', date('Y-m-d'))
        //->where('ID_LOKASI',1)
        ->groupBy('BULAN')
        ->orderBy('BULAN', 'asc')
        ->paginate(10);


        //return view('pl', ['pl' => $pl]);
        return response()->json($pl);
        // return view('JumlahPL')
    }

    // public function AdminView()
    // {
    //  $data=User::all();
    //  return view('AdminPanel')->with('data',$data);
    // }    

    public function cont(){
        
            $total = Container::selectRaw("COUNT('DISTINCT TRANS_PACKING_LIST_DETAIL.GROUP_PACKING.*') as TOTAL_CONTAINER, MS_KOTA.KOTA as KOTA")
            ->join('TRANS_PACKING_LIST_DETAIL', 'TRANS_PACKING_LIST_DETAIL.ID_PACKING_HEADER', '=', 'TRANS_PACKING_LIST_HEADER.ID')
            ->join('MS_KOTA', 'MS_KOTA.ID', '=', 'TRANS_PACKING_LIST_HEADER.ID_KOTA_TUJUAN')
            ->where('TRANS_PACKING_LIST_HEADER.TAHUN', '2019')
            ->groupBy('MS_KOTA.KOTA')
            ->orderBy('MS_KOTA.KOTA', 'asc')
            ->paginate(10);
            return view ( 'welcome' )->withData ( $total );
        
    }
}
