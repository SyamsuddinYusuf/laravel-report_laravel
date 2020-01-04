<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PL_HEADER;
use Charts;

class CobaController extends Controller
{
    public function index()
    {
        
    	$pack = PL_HEADER::selectRaw("BULAN, COUNT('NOMER_PACKING_LIST.*') as JumlahPL")
                    ->where('TAHUN', '2019')
                    ->groupBy('BULAN')
                    ->get();

        $chart = Charts::database($pack, 'bar', 'highcharts')
            ->title("JUMLAH PACKING LIST")
            ->elementLabel("Total")
            ->dimensions(1000, 500)
            ->responsive(false)
            ->groupByMonth(date('Y'), true);

        return view('coba',compact('chart'));
    }
}
